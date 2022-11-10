<?php

namespace App\Models;

class Respuesta
{

    public function __construct(
        public int $codigoHttp = 200,
        public string $titulo = 'succes',
        public string $mensaje = '',
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
