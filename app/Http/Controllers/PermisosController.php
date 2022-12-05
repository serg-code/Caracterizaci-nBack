<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermisosController extends Controller
{
    public function otorgarPermisos(Request $request, $id_usuario)
    {
        # code...
    }

    public function otorgarRol(Request $request, $id_usuario)
    {
        $usuario = User::find($id_usuario);
        $controlUsuario = new Usuario($usuario, $request);

        $validador = Validator::make(
            $request->all(),
            [
                'rol' => 'required|exists:roles,name',
            ],
            [
                'rol.required' => 'El rol es necesario',
                'rol.exists' => 'El rol declarado no es valido',
            ]
        );

        if ($validador->fails() || !$controlUsuario->permitir())
        {

            $respuesta = new RespuestaHttp(
                400,
                'Bad request',
                'No puede realizar esta accion',
                [
                    $validador->getMessageBag(),
                ]
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $controlUsuario->otorgarRol($request->input('rol'));
        $respuesta = new RespuestaHttp(
            201,
            'created',
            'rol otorgado con exito',
            [
                "usuario" => $usuario,
            ]
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function revocarRol(Request $request, $id_usuario)
    {
        $usuario = User::find($id_usuario);
        $controlUsuario = new Usuario($usuario, $request);

        $validador = Validator::make(
            $request->all(),
            [
                'rol' => 'required|exists:roles,name',
            ],
            [
                'rol.required' => 'El rol es necesario',
                'rol.exists' => 'El rol declarado no es valido',
            ]
        );

        if ($validador->fails() || !$controlUsuario->permitir())
        {

            $respuesta = new RespuestaHttp(
                400,
                'Bad request',
                'No puede realizar esta accion',
                [
                    $validador->getMessageBag(),
                ]
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $controlUsuario->revocarRol($request->input('rol'));
        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'rol removido exitosamente',
            [
                'usuario' => $usuario,
            ]
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
