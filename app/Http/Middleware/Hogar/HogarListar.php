<?php

namespace App\Http\Middleware\Hogar;

use App\Dev\RespuestaHttp;
use Closure;
use Illuminate\Http\Request;

class HogarListar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario = $request->user();
        $continuar = $usuario->hasPermissionTo('listar hogar');

        if (!$continuar)
        {
            return RespuestaHttp::respuesta(404, 'Not found', 'No se ha encontrado el recurso solicitado');
        }

        return $next($request);
    }
}
