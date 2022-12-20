<?php

namespace App\Dev;

use App\Models\Inducciones;
use App\Models\Integrantes;
use App\Models\TipoInduccion;

class ControlInduccion
{
    protected array $inducciones;
    protected int $edad;

    public function __construct(
        protected Integrantes $integrante,
        protected array $secciones = []
    )
    {
        $this->inducciones = [];
        $this->edad = $this->integrante->obtenerMesesEdad();
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
            $idTipoInduccio = $this->matchInduccionTension();
            $induccion = new Inducciones([
                'id_integrante' => $this->integrante->id,
                'id_tipo_induccion' => $idTipoInduccio,
            ]);
            $induccion->save();
            array_push($this->inducciones, $induccion);
        }
    }

    protected function matchInduccionTension(): ?int
    {
        $mesesEdad = $this->edad;
        return match (true)
        {
            ($mesesEdad <= 60) => 17,
            ($mesesEdad <= 708) => 55,
            ($mesesEdad >= 720) => 66,
            default => 0
        };
    }

    protected function hemoglobinaGlococilada()
    {
        $cuidadoEnfermedades = $this->secciones['cuidado_enfermedades']['respuestas'];
        if ($cuidadoEnfermedades['hemoglobina_glococilada'] >= 7)
        {
            $idInduccion = $this->matchHemoglobinaGlococilada();
            $induccion = new Inducciones([
                'id_integrante' => $this->integrante->id,
                'id_tipo_induccion' => $idInduccion,
            ]);
            $induccion->save();
            array_push($this->inducciones, $induccion);
        }
    }

    protected function matchHemoglobinaGlococilada()
    {
        $mesesEdad = $this->edad;
        return match ($mesesEdad)
        {
            ($mesesEdad >= 0 && $mesesEdad <= 60) => 15,
            ($mesesEdad >= 348 && $mesesEdad <= 708) => 52,
            ($mesesEdad >= 720) => 67,

            default => 49,
        };
    }
}
