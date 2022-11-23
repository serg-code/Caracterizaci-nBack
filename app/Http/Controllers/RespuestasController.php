<?php

namespace App\Http\Controllers;

use App\Models\Hogar;
use App\Models\RespuestaHttp;
use Illuminate\Http\Request;

class RespuestasController extends Controller
{
    public function guardarRespuestas(Request $request)
    {
        $datos = $request->input('hogar');
        $hogar = Hogar::guardarHogar($datos);


        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
