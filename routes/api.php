<?php

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


Route::post('login', [
    \App\Http\Controllers\LoginController::class,
    'login'
]);

Route::group(['middleware' => ['auth:sanctum']], function ()
{
    /**
     * para utilizar filtros de los uarios
     */
    Route::get('usuario', [\App\Http\Controllers\UsuarioController::class, 'actual']);
    Route::post('logout', [\App\Http\Controllers\LoginController::class, 'cerrar']);
    Route::apiResource('usuarios', \App\Http\Controllers\UsuarioController::class);

    Route::apiResource('roles', \App\Http\Controllers\RolesController::class);
    Route::post('roles/otorgar', [\App\Http\Controllers\RolesController::class, 'otorgarRol']);
    Route::delete('roles/revocar', [\App\Http\Controllers\RolesController::class, 'revocarRol']);


    Route::apiResource('permisos', \App\Http\Controllers\PermisosController::class)->except(['destroy']);
    Route::post('permisos/otorgar', [\App\Http\Controllers\PermisosController::class, 'otorgarPermisos']);
    Route::delete('permisos/revocar', [\App\Http\Controllers\PermisosController::class, 'revocarPermisos']);

    Route::apiResource('preguntas', \App\Http\Controllers\secciones\PreguntasController::class)
        ->only(['index', 'show']);
    Route::get('ciuu', [\App\Http\Controllers\CiuuController::class, 'listar']);

    Route::apiResource('hogar', \App\Http\Controllers\HogarController::class)
        ->only(['index', 'store', 'show']);
    Route::post(
        'hogar/completo',
        [\App\Http\Controllers\Respuestas\HogarFinalizadoController::class, 'finalizarHogar']
    );
    Route::get('hogar/{id}/integrantes', [\App\Http\Controllers\HogarController::class, 'integrantesHogar']);

    Route::apiResource('integrante', \App\Http\Controllers\IntegrantesController::class)
        ->only(['store', 'show', 'destroy', 'index']);
    Route::post(
        'integrante/completo',
        [\App\Http\Controllers\Respuestas\IntegranteFinalizadoController::class, 'finalizarIntegrante']
    );

    Route::post('respuestas', [\App\Http\Controllers\RespuestasController::class, 'guardarRespuestaParcial']);
    Route::put('respuestas', [\App\Http\Controllers\RespuestasController::class, 'actualizarRespuesta']);
    Route::post('respuestas/completo', [\App\Http\Controllers\RespuestasController::class, 'guardarRespuesta']);

    Route::get('tipos', [\App\Http\Controllers\TipoController::class, 'obtenerTipos']);

    Route::get('cie10', [\App\Http\Controllers\Cie10Controller::class, 'listar']);

    Route::apiResource('barrio_vereda', \App\Http\Controllers\BarrioVeredaController::class);

    Route::get('reporte/{reporteId}', [\App\Http\Controllers\ReporteController::class, 'show']);
    Route::put('reporte/{reporteId}', [\App\Http\Controllers\ReporteController::class, 'update']);

    Route::post('cargador/tabla', [\App\Http\Controllers\Cargador\TablaController::class, 'crearTabla']);
});

Route::group([], function ()
{
    Route::get('tipo-identificacion', [\App\Http\Controllers\TipoIdentificacionController::class, 'index']);
    // Route::get('reporte/{reporteId}', [\App\Http\Controllers\ReporteController::class, 'show']);
});
