<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use App\Models\TipoIdentifacion;
use Illuminate\Http\Request;

class TipoIdentificacionController extends Controller
{
    public function index()
    {
        $tiposIdentificacion = TipoIdentifacion::all();
        $respuesta = new Respuesta();
        $respuesta->data = [
            'tipos_identificacion' => $tiposIdentificacion,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
