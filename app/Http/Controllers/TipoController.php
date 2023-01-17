<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Hogar\TipoHogar;
use App\Models\MotivosNoResponde;
use App\Models\TipoIdentifacion;
use App\Models\Tipos\Parentesco;
use App\Models\Tipos\TipoInduccion;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function obtenerTipos()
    {
        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'parentescos' => Parentesco::all(),
            'tipo_induccion' => TipoInduccion::all(),
            'tipo_hogar' => TipoHogar::all(),
            'tipo_identificacion' => TipoIdentifacion::all(),
            'tipo_barrio_vereda' => [
                [
                    'descripcion' => 'Barrio'
                ],
                [
                    'descripcion' => 'Vereda'
                ],
                [
                    'descripcion' => 'Corregimiento'
                ],
                [
                    'descripcion' => 'Rural disperso'
                ],
            ],
            'motivos_no_responde' => MotivosNoResponde::all(),
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
