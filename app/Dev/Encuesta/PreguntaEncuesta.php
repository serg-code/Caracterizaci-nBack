<?php

namespace App\Dev\Encuesta;

class PreguntaEncuesta
{

    public function __construct(
        protected string $refSeccion,
        protected string $refPregunta,
        protected $preguntasHabilita = [],
    )
    {
    }

    public function getSeccion(): string
    {
        return $this->refSeccion;
    }

    public function getRefPregunta(): string
    {
        return $this->refPregunta;
    }

    public function getPregunasRequeridas()
    {
        return $this->preguntasHabilita;
    }

    public function getDatos(): array
    {
        return [
            'ref_seccion' => $this->refSeccion,
            'ref_pregunta' => $this->refPregunta,
            'preguntaAvilita' => $this->preguntasHabilita,
        ];
    }
}
