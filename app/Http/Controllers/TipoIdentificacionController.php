<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\TipoIdentifacion;

class TipoIdentificacionController extends Controller
{
    public function index()
    {
        $tiposIdentificacion = TipoIdentifacion::all();
        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'tipos_identificacion' => $tiposIdentificacion,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
