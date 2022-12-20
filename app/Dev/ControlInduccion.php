<?php

namespace App\Dev;

use App\Models\Inducciones;
use App\Models\Integrantes;

class ControlInduccion
{
    protected array $inducciones;

    public function __construct(
        protected Integrantes $integrante,
        protected array $secciones = []
    )
    {
        $this->inducciones = [];
        $this->induccionTension();
    }

    public function getInducciones(): array
    {
        return $this->inducciones;
    }

    protected function induccionTension()
    {
        $cuidadoEnfermedades = $this->secciones['cuidado_enfermedades']['respuestas'];
        if ($cuidadoEnfermedades['tension_sistolica'] >= 140 || $cuidadoEnfermedades['tension_diastolica'] >= 90)
        {
            $induccion = new Inducciones([
                'id_integrante' => $this->integrante->id,
                'id_tipo_induccion' => 39,
            ]);
            $induccion->save();
            array_push($this->inducciones, $induccion);
        }
    }

    protected function hemoglobinaGlococilada()
    {
        $cuidadoEnfermedades = $this->secciones['cuidado_enfermedades']['respuestas'];
        if ($cuidadoEnfermedades['hemoglobina_glococilada'] >= 7)
        {
            $induccion = new Inducciones([
                'id_integrante' => $this->integrante->id,
                'id_tipo_induccion' => 49,
            ]);
            $induccion->save();
            array_push($this->inducciones, $induccion);
        }
    }
}
