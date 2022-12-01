<?php

namespace App\Dev\Encuesta;

use App\Models\Integrantes;

class SeccionesIntegrante
{

    public function __construct(
        protected Integrantes $integrante,
        protected array $secciones = [],
    )
    {
    }

    public function recorrerSecciones()
    {
        foreach ($this->secciones as $seccion)
        {
            //agregar id del hogar
            $seccion['respuestas']['hogar_id'] = $this->hogar->id;
            if (!empty($seccion['ref_seccion']) && !empty($seccion['respuestas']))
            {
                $respuesta = $this->seleccionarSeccion(
                    $seccion['ref_seccion'],
                    $seccion['respuestas']
                );
                !empty($respuesta) ? $respuesta->save() : null;
            }
        }
    }

    public function seleccionarSeccion(?string $seccion = '', ?array $datosGuardar = [])
    {
        return match ($seccion)
        {
            default => null,
        };
    }
}
