<?php

namespace App\Dev\Encuesta;

class PreguntaEncuesta
{

    public function __construct(
        public string $refCampoHabilita,
        public $respuestaHabilita
    )
    {
    }
}
