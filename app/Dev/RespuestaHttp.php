<?php

namespace App\Dev;

class RespuestaHttp
{

    public function __construct(
        public int $codigoHttp = 200,
        public string $titulo = 'succes',
        public string $mensaje = '',
        public  $data = null,
    )
    {
    }

    public function cambiar(
        int $codigoHttp = 200,
        string $titulo = 'succes',
        string $mensaje = '',
        array $data = [],
    )
    {
        $this->codigoHttp = $codigoHttp;
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
        $this->data = $data;
    }
}
