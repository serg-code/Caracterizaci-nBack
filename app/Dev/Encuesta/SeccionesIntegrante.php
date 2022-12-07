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
            if (!empty($seccion['ref_seccion']) && !empty($seccion['respuestas']))
            {
                $respuesta = Secciones::seleccionarSeccion(
                    $seccion['ref_seccion'],
                    $seccion['respuestas']
                );

                if (empty($respuesta))
                {
                    return null;
                }
                !empty($respuesta) ? $respuesta->save() : null;
            }
        }
    }
}
