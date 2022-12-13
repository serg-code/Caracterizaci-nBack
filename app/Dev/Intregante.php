<?php

namespace App\Dev;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class Integrante
{

    public static function validarCrearIntegrante(array $datosIntegrante): ?MessageBag
    {
        $validacion = Validator::make(
            $datosIntegrante,
            [
                'hogar_id' => 'required|exists:hogar,id',
                'tipo_identificacion' => 'required|exists:tipo_identificacion,id',
                'identificacion' => 'required',
                'primer_nombre' => 'required',
                'primer_apellido' => 'required',
                'rh' => 'required',
                'estado_civil' => 'required',
                'correo' => 'email'
            ],
            [
                'hogar_id.required' => 'El id del hogar es necesario',
                'hogar_id.exists' => 'El id del hogar no es valido',
                'tipo_identificacion.required' => 'El tipo de indentificacion es obligatorio',
                'tipo_identificacion.exist' => 'El tipo de identificacion no es valido',
                'identificacion.required' => 'La identificacion es obligatoria',
                'primer_nombre.required' => 'El primer_nombre es obligatoria',
                'primer_apellido.required' => 'El primer_apellido es obligatoria',
                'rh.required' => 'El rh es obligatoria',
                'estado_civil.required' => 'El estado_civil es obligatoria',
                'correo.required' => 'El correo es obligatoria',
            ]
        );

        if ($validacion->fails())
        {
            return $validacion->getMessageBag();
        }

        return null;
    }
}
