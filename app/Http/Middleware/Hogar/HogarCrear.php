<?php

namespace App\Http\Middleware\Hogar;

use App\Dev\RespuestaHttp;
use Closure;
use Illuminate\Http\Request;

class HogarCrear
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
        $permiso = $usuario->hasPermissionTo('crear hogar');

        if (!$permiso)
        {
            $url = $request->url();
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No se ha encontrado el recurso solicitado',
                [
                    'hogar' => 'No encontramos la ruta',
                ]
            );
        }

        return $next($request);
    }
}
