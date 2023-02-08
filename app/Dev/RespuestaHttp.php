<?php

namespace App\Dev;

class RespuestaHttp
{

    public function __construct(
        public int $codigoHttp = 200,
        public string $titulo = 'succes',
        public string $mensaje = '',
        public $data = null,
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

    public static function respuesta(
        int $codigoHttp = 200,
        string $titulo = 'succes',
        string $mensaje = '',
        $data = null,
    )
    {
        $respuesta = new RespuestaHttp($codigoHttp, $titulo, $mensaje, $data);
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public static function respuestaObjeto(RespuestaHttp $respuesta)
    {
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}