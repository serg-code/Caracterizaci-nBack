<?php

namespace App\Dev\Validacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class PermisoValidacion
{

    public static function validar(Request $request): ?MessageBag
    {
        $validador = Validator::make(
            $request->all(),
            [
                'permiso' => 'required|exists:permissions,name'
            ],
            [
                'permiso.required' => 'El permiso a otorgar es necesario',
                'permiso.exists:' => 'El permiso no es valido',
            ]
        );

        if ($validador->fails())
        {
            return $validador->getMessageBag();
        }

        return null;
    }
}
