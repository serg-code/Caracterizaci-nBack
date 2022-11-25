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
    Route::get('usuario', [\App\Http\Controllers\UsuarioController::class, 'actual']);
    Route::post('saludo', [\App\Http\Controllers\LoginController::class, 'saludar']);
    Route::post('logout', [\App\Http\Controllers\LoginController::class, 'cerrar']);
    Route::apiResource('usuarios', \App\Http\Controllers\UsuarioController::class)
        ->except(['store']);
    Route::apiResource('preguntas', \App\Http\Controllers\secciones\PreguntasController::class)
        ->only(['index', 'show']);
    Route::apiResource('hogar', \App\Http\Controllers\HogarController::class)
        ->only(['index', 'store', 'show']);
    Route::post('respuestas', [\App\Http\Controllers\RespuestasController::class, 'guardarRespuestasSeccion']);
    Route::post('respuestas/completo', [\App\Http\Controllers\RespuestasController::class, 'guardarRespuesta']);
});

Route::get('departamento', [\App\Http\Controllers\ubicaciones\DepartamentosController::class, 'listarDepartamentos']);
Route::get('municipio/{codigoDepartamento}', [\App\Http\Controllers\ubicaciones\MunicipiosController::class, 'mostrarMunicipiosDepartamento']);

Route::apiResource('departamento', \App\Http\Controllers\ubicaciones\DepartamentosController::class)
    ->only(['index']);
Route::apiResource('municipio', \App\Http\Controllers\ubicaciones\MunicipiosController::class)
    ->only(['show']);


Route::group([], function ()
{
    Route::get('tipo-identificacion', [\App\Http\Controllers\TipoIdentificacionController::class, 'index']);
});
