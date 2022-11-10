<?php

namespace App\Models;

class Respuesta
{

    public string $mensaje;

    public function __construct(
        public int $codigoHttp = 200,
        public string $titulo = 'succes',
        public array $data = [],
    )
    {
    }

    public function cambiar(
        int $codigoHttp = 200,
        string $titulo = 'succes',
        array $data = [],
    )
    {
        $this->codigoHttp = $codigoHttp;
        $this->titulo = $titulo;
        $this->data = $data;
    }
}
