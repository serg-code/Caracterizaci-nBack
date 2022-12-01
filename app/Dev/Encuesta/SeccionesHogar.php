<?php

namespace App\Dev\Encuesta;

use App\Models\Hogar;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;

class SeccionesHogar
{

    public function __construct(
        protected Hogar $hogar,
        protected $secciones = [],
    )
    {
    }

    public function recorrer()
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
            'habitos_consumo' => new HabitosConsumo($datosGuardar),
            'factores_protectores' => new FactoresProtectores($datosGuardar),
            default => null,
        };
    }
}
