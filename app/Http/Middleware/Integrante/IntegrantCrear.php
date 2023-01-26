<?php

namespace App\Http\Middleware\Integrante;

use App\Dev\RespuestaHttp;
use Closure;
use Illuminate\Http\Request;

class IntegrantCrear
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
        $permiso = $usuario->hasPermissionTo('crear integrante');

        if (!$permiso)
        {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No se ha encontrado el recurso solicitado',
                [
                    'integrante' => 'No encontramos la ruta',
                ]
            );
        }

        return $next($request);
    }
}
