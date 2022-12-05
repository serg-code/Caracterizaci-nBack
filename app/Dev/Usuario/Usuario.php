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
        $usuarioHacePeticion = $this->request->user();
        if ($this->validarId() && $usuarioHacePeticion->hasRole(['Administrador', 'Super Administrador']))
        {
            return true;
        }

        if ($this->usuario->id === $this->request->user()->id)
        {
            return true;
        }

        return false;
    }

    protected function validarId(): bool
    {
        return ($this->usuario->id !== $this->request->user()->id);
    }

    public static function validaroRoles(User $usuario, array $roles): bool
    {
        return $usuario->hasRole($roles);
    }

    public static function validarPermiso(User $usuario, array $permisos): bool
    {
        return $usuario->hasAnyPermission($permisos);
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

    public function otorgarPermiso(string $permiso)
    {
        $this->usuario->can($permiso);
    }

    public function revocarRol(string $rol)
    {
        $this->usuario->removeRole($rol);
    }
}
