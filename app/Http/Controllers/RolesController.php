<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Dev\Validacion\RolValidacion;
use App\Models\Permisos\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function listarRoles(Request $request)
    {

        $usuario = $request->user();
        if (!Usuario::validaroRoles($usuario, ['Super Administrador', 'Administrador']))
        {
            return RespuestaHttp::respuesta(
                401,
                'unautorized',
                'algo ha salido mal'
            );
        }

        $roles = Roles::all();
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de roles',
            [
                $roles
            ]
        );
    }

    public function otorgarRol(Request $request, $idUsuario)
    {
        $usuario = User::find($idUsuario);
        $controlUsuario = new Usuario($usuario, $request);
        $errores = RolValidacion::validar($request);

        if (!empty($errores) || !$controlUsuario->permitir())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No puede realizar esta accion',
                $errores
            );
        }

        $controlUsuario->otorgarRol($request->input('rol'));
        return RespuestaHttp::respuesta(
            201,
            'created',
            'rol otorgado con exito',
            [
                "usuario" => $usuario,
            ]
        );
    }

    public function revocarRol(Request $request, $idUsuario)
    {
        $usuario = User::find($idUsuario);
        $controlUsuario = new Usuario($usuario, $request);
        $errores = RolValidacion::validar($request);

        if (!empty($errores) || !$controlUsuario->permitir())
        {

            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No puede realizar esta accion',
                $errores
            );
        }

        $controlUsuario->revocarRol($request->input('rol'));
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'rol removido exitosamente',
            [
                'usuario' => $usuario,
            ]
        );
    }
}
