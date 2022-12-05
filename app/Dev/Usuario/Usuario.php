<?php

namespace App\Dev\Usuario;

use App\Dev\RespuestaHttp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Usuario
{

    public function __construct(
        public ?User $usuario,
        protected ?Request $request,
    )
    {
    }

    public function permitir(): bool
    {
        if ($this->usuario->id !== $this->request->user()->id)
        {
            // $this->usuario->getAllPermissions();
            $usuarioHacePeticion = $this->request->user();
            $usuarioHacePeticion->getRoleNames();

            foreach ($usuarioHacePeticion->roles as $rol)
            {
                if ($rol->name == 'Super Administrador' || $rol->name == 'Administrador')
                {
                    return true;
                }
            }
        }

        return false;
    }

    public function modificarUsuario(): RespuestaHttp
    {

        // $usuarioAuth->id !== $this->usuario->id
        $actualizar = [];
        $datos = $this->request->all();
        $metodo = $this->request->method();

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

            $this->usuario->tokens()->delete();
        }

        if ($metodo === 'PUT')
        {
            $actualizar = [
                'name' => $datos['name'] ?? $this->usuario->name,
                'email' => $datos['email'] ?? $this->usuario->email,
            ];
        }

        $this->usuario->update($actualizar);
        return new RespuestaHttp(
            200,
            'succes',
            'Usuario modificado',
            [
                'usuario' => $this->usuario
            ]
        );
    }

    public function otorgarRol(string $rol)
    {
        $this->usuario->assignRole($rol);
    }

    public function revocarRol(string $rol)
    {
        $this->usuario->removeRole($rol);
    }
}
