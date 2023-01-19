<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;

class ValidarAccidentes extends ValidacionIntegrante implements ValidacionEncuesta
{

    public function validar()
    {
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    public function obtenerPreguntas(): array
    {
        return [
            'accidentes_transito' => new PreguntaEncuesta('tipo_lesion', 36),
            'tipo_lesion' => null,
            'accidentes_laborales' => null,
        ];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
    }
}
