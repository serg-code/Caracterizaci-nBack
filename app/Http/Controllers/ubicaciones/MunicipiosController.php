<?php

namespace App\Http\Controllers\ubicaciones;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Municipio;
use Spatie\QueryBuilder\QueryBuilder;

class MunicipiosController extends Controller
{
    public function mostrarMunicipiosDepartamento($codigoDepartamento)
    {
        $municipios = Municipio::where('cod_dpto', '=', $codigoDepartamento)->paginate(30);

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'municipios' => $municipios,
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
