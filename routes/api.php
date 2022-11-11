<?php

use App\Models\Departamento;
use App\Models\Respuesta;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/usuarios', [\App\Http\Controllers\UsuarioController::class, 'store']);
Route::apiResource('usuarios', \App\Http\Controllers\UsuarioController::class, ['middleware' => ['auth:sanctum']])
    ->only(['update', 'show', 'delete']);

Route::post('login', [
    \App\Http\Controllers\LoginController::class,
    'login'
]);

Route::group(['middleware' => ['auth:sanctum']], function ()
{
    Route::post('saludo', [\App\Http\Controllers\LoginController::class, 'saludar']);
    Route::post('logout', [\App\Http\Controllers\LoginController::class, 'cerrar']);
});

Route::get('/departamentos', function ()
{
    $respuesta = new Respuesta();
    $respuesta->data = Departamento::all();
    return response()->json($respuesta, $respuesta->codigoHttp);
});
Route::get('/departamentos/{id}', function ($id)
{
    $respuesta = new Respuesta();
    $respuesta->data = Departamento::find($id);
    return response()->json($respuesta, $respuesta->codigoHttp);
});
