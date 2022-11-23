<?php

namespace App\Http\Controllers;

use App\Models\Hogar;
use App\Models\Integrantes;
use App\Models\RespuestaHttp;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;
use Illuminate\Http\Request;

class RespuestasController extends Controller
{
    public function guardarRespuestas(Request $request)
    {
        $datos = $request->input('hogar');
        $hogar = Hogar::guardarHogar($datos);

        if (empty($hogar))
        {
            $respuesta = new RespuestaHttp(400, 'Bad request', 'No se puede obtener el hogar');
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        //recorrer secciones
        if (!empty($datos['secciones']))
        {
            foreach ($datos['secciones'] as $seccionRespuesta)
            {
                //agregar id del hogar
                $seccionRespuesta['respuestas']['hogar_id'] = $hogar->id;
                $respuesta = $this->detectarSeccion(
                    $seccionRespuesta['ref_seccion'],
                    $seccionRespuesta['respuestas']
                );
                !empty($respuesta) ? $respuesta->save() : null;
            }
        }


        //recorrer integrantes
        if (!empty($datos['integrantes']))
        {
            foreach ($datos['integrantes'] as $integrante)
            {
                $integrante['id'] = $integrante['uuid'];
                $integrante['hogar_id'] = $hogar->id;
                $integrantedb = new Integrantes($integrante);
                $integrantedb->save();
            }
        }

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function detectarSeccion(string $seccion, array $datosGuardar)
    {
        $secciones = [
            'habitos_consumo' => new HabitosConsumo($datosGuardar),
            'factores_protectores' => new FactoresProtectores($datosGuardar),
        ];
        return !empty($secciones[$seccion]) ? $secciones[$seccion] : null;
    }
}
