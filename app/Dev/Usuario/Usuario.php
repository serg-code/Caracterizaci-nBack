<?php

namespace App\Dev\Usuario;

use App\Dev\RespuestaHttp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Usuario
{

    public static function modificarUsuario(Request $request, User $usuario): RespuestaHttp
    {
        $actualizar = [];

        if ($request->method() === 'PATCH')
        {
            $validador = Validator::make(
                $request->all(),
                [
                    'password' => 'required',
                    'confirmPassword' => 'required|same:password',
                ],
                [
                    'password.required' => 'La contraseña es necesaria',
                    'confirmPassword.required' => 'Se necesita confirmar la contraseña',
                    'confirmPassword.same' => 'Las contraseñas no coinciden '
                ]
            );

            if ($validador->fails())
            {
                return new RespuestaHttp(
                    400,
                    'Bad request',
                    'algunos datos no son validos',
                    $validador->getMessageBag()
                );
            }

            $actualizar = [
                'password' => bcrypt($request->input('password'))

            ];

            $usuario->tokens()->delete();
        }

        if ($request->method() === 'PUT')
        {
            $datos = $request->all();

            $actualizar = [
                'name' => $datos['name'] ?? $usuario->name,
                'email' => $datos['email'] ?? $usuario->email,
            ];
        }

        $usuario->update($actualizar);
        return new RespuestaHttp(
            200,
            'succes',
            'Usuario modificado',
            [
                'usuario' => $usuario
            ]
        );
    }
}
