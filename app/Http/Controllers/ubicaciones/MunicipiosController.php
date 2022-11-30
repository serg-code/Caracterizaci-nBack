<?php

namespace App\Http\Controllers\ubicaciones;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Municipio;

class MunicipiosController extends Controller
{
    public function mostrarMunicipiosDepartamento($codigoDepartamento)
    {
        $municipios = Municipio::where('cod_dpto', '=', $codigoDepartamento)->get();

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'municipios' => $municipios,
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
