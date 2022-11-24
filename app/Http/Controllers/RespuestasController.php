<?php

namespace App\Http\Controllers;

use App\Models\Hogar;
use App\Models\Integrantes;
use App\Models\Pregunta;
use App\Models\RespuestaHttp;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;
use Illuminate\Http\Request;

/**
 * * buscar id de las opcioens que sean necesarias
 * * validar las opcioens
 * * reglas de negocio
 */

class RespuestasController extends Controller
{
    public function guardarRespuestasSeccion(Request $request)
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

    public function detectarSeccion(string $seccion, ?array $datosGuardar = [])
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

    public function guardarRespuesta(Request $request)
    {
        $datos = $request->input('hogar');
        $hogar = Hogar::guardarHogar($datos);

        if (empty($hogar))
        {
            $respuesta = new RespuestaHttp(400, 'Bad request', 'No se encontraton datos');
        }

        if (!empty($datos['secciones']))
        {
            foreach ($datos['secciones'] as $dato)
            {

                foreach ($dato['respuestas'] as $respuestaClave => $respuestaValor)
                {
                    $pregunta = Pregunta::ObtenerPregunta($respuestaClave);

                    if (empty($pregunta))
                    {
                        $respuesta = new RespuestaHttp(
                            400,
                            'bad request',
                            'error al buscar la pregunta',
                            [
                                'errores' => [
                                    'pregunta' => "$respuestaClave no es una pregunta valida",
                                ]
                            ]
                        );
                        return response()->json($respuesta, $respuesta->codigoHttp);
                    }

                    if (!$this->buscarOpciones($pregunta, $respuestaValor))
                    {
                        $respuesta = new RespuestaHttp(
                            400,
                            'bad request',
                            'error al buscar la pregunta',
                            [
                                'errores' => [
                                    'respuesta' => [
                                        'pregunta' => $pregunta->descripcion,
                                        'respuesta' => "$respuestaValor no es una respuesta valida valida para la pregunta",
                                    ]
                                ]
                            ]
                        );
                        return response()->json($respuesta, $respuesta->codigoHttp);
                    }

                    if (!empty($pregunta) && !empty($pregunta->opciones))
                    {
                        $respuesta = new RespuestaHttp();
                        $respuesta->data = [
                            'data' => $pregunta,
                        ];
                        return response()->json($respuesta, $respuesta->codigoHttp);
                    }
                }
            }
        }
    }

    public function buscarOpciones(Pregunta $pregunta, $respuesta): bool
    {
        $estado = false;

        foreach ($pregunta->opciones as $opcion)
        {
            if ($opcion->valor == $respuesta)
            {
                $estado = true;
                break;
            }
        }

        return $estado;
    }
}
