<?php

namespace App\Dev\Usuario;

use App\Dev\RespuestaHttp;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Usuario
{

    public static function modificarUsuario(User $usuario, string $metodo, array $datos): RespuestaHttp
    {
        $actualizar = [];

        if ($metodo === 'PATCH')
        {
            $validador = Validator::make(
                $datos,
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
                'password' => $datos['password'],
            ];

            $usuario->tokens()->delete();
        }

        if ($metodo === 'PUT')
        {
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
