<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Dev\Validacion\PermisoValidacion;
use App\Models\User;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function otorgarPermisos(Request $request, $idUsuario)
    {
        $usuario = User::find($idUsuario);
        $controlUsuario = new Usuario(User::find($idUsuario), $request);
        $errores = PermisoValidacion::validar($request);

        if ($controlUsuario->permitir() || !empty($usuario) || !empty($errores))
        {
            return RespuestaHttp::respuesta(
                401,
                'Bad request',
                'algo ha salido mal'
            );
        }

        return RespuestaHttp::respuesta();
    }
}
