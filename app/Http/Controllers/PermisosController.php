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
            $respuesta = new RespuestaHttp(
                200,
                'Bad request',
                'algo ha salido mal',
                []
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $respuesta = new RespuestaHttp();
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
