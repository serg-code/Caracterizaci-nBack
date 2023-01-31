<?php

namespace App\Http\Middleware\Usuario;

use App\Dev\RespuestaHttp;
use Closure;
use Illuminate\Http\Request;

class UsuarioListar
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
        $permiso = $usuario->hasPermissionTo('listar usuarios');

        if (!$permiso)
        {
            $url = $request->url();
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No se ha encontrado el recurso solicitado',
                [
                    'usuarios' => 'No encontramos la ruta',
                ]
            );
        }

        return $next($request);
    }
}