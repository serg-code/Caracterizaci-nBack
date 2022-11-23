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
            $this->recorrerSecciones($datos['secciones'], $hogar);
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

                $this->recorrerSecciones($integrante['secciones'], $hogar);
            }
        }

        $respuesta = new RespuestaHttp(
            201,
            'Created',
            'Formularios guardados exitosamente'
        );
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

    public function recorrerSecciones(array $secciones, Hogar $hogar)
    {
        foreach ($secciones as $seccionRespuesta)
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
}
