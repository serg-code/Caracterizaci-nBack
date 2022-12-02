<?php

use App\Dev\RespuestaHttp;
use App\Models\Departamento;
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

Route::post('login', [
    \App\Http\Controllers\LoginController::class,
    'login'
]);

Route::group(['middleware' => ['auth:sanctum']], function ()
{
    /**
     * para utilizar filtros de los uarios
     * http://sosaludaps.backend.test/api/usuarios/?filter[email]=example&cantidad=cantidad_listar
     */
    Route::get('usuario', [\App\Http\Controllers\UsuarioController::class, 'actual']);
    Route::post('saludo', [\App\Http\Controllers\LoginController::class, 'saludar']);
    Route::post('logout', [\App\Http\Controllers\LoginController::class, 'cerrar']);
    Route::apiResource('usuarios', \App\Http\Controllers\UsuarioController::class)
        ->except(['store']);
    Route::apiResource('preguntas', \App\Http\Controllers\secciones\PreguntasController::class)
        ->only(['index', 'show']);
    Route::apiResource('hogar', \App\Http\Controllers\HogarController::class)
        ->only(['index', 'store', 'show']);
    Route::post('respuestas', [\App\Http\Controllers\RespuestasController::class, 'guardarRespuestaParcial']);
    Route::post('respuestas/completo', [\App\Http\Controllers\RespuestasController::class, 'guardarRespuesta']);
});

Route::group([], function ()
{
    Route::get('tipo-identificacion', [\App\Http\Controllers\TipoIdentificacionController::class, 'index']);
});
