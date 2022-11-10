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

Route::apiResource('usuarios', App\Http\Controllers\UsuarioController::class)
    ->only(['store', 'show']);


Route::post('login', [
    \App\Http\Controllers\LoginController::class,
    'login'
]);

Route::post('saludo', [
    \App\Http\Controllers\LoginController::class,
    'saludar'
])->middleware('auth:sanctum');

Route::post('logout', [
    \App\Http\Controllers\LoginController::class,
    'cerrar'
])->middleware('auth:sanctum');
