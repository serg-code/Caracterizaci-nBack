<?php

namespace App\Dev\Validacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class RolValidacion
{

    public static function validar(Request $request): ?MessageBag
    {
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

        if ($validador->fails())
        {
            return $validador->getMessageBag();
        }

        return null;
    }
}
