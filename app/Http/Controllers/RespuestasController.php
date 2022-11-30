<?php

namespace App\Http\Controllers;

use App\Dev\Notificacion;
use App\Dev\RespuestaHttp;
use App\Models\Hogar;
use App\Models\Integrantes;
use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;
use Illuminate\Http\Request;

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
            'Formularios guardados exitosamente',
            [
                'hogar' => $hogar,
            ]
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
        $respuesta = new RespuestaHttp();
        $hogar = Hogar::find($datos['uuid']);
        $errores = [];

        if (empty($hogar) || empty($datos['secciones']))
        {
            $respuesta->cambiar(
                400,
                'Bad request',
                'No se encontraton datos',
                [
                    'errores' => [
                        'hogar' => empty($hogar) ? 'No se ha podido encontrar el hogar' : null,
                        'seccion' => empty($datos['seccion']) ? 'No se encontraton secciones' : null,
                    ]
                ]
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        foreach ($datos['secciones'] as $seccion)
        {

            foreach ($seccion['respuestas'] as $respuestaClave => $respuestaValor)
            {
                $pregunta = Pregunta::ObtenerPregunta($respuestaClave);

                if (empty($pregunta))
                {
                    array_push($errores, "$respuestaClave no es una pregunta valida");
                    break;
                }

                //validar que valor de la opcion sea igual al del puntaje de la opcion
                $respuestaEsOpcion = $this->buscarRespuestaOpcion($respuestaValor, $pregunta->opciones);
                if ($respuestaEsOpcion->estado === 'error')
                {
                    array_push(
                        $errores,
                        "$respuestaValor no es una respuesta valida valida para la pregunta ($pregunta->descripcion)"
                    );
                    break;
                }

                $respuestaGuardar = new Respuesta([
                    'hogar_uuid' => $hogar->id,
                    'ref_seccion' => $pregunta->ref_seccion,
                    'ref_campo' => $pregunta->ref_campo,
                    'puntaje' => $respuestaEsOpcion->datos['puntaje'] ?? 0,
                    'pregunta' => $pregunta->descripcion,
                    'respuesta' => $respuestaEsOpcion->datos['respuesta'] ?? $respuestaValor,
                ]);
                $respuestaGuardar->save();
            }
        }

        $respuesta->data = [
            'errores' => $errores,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function buscarRespuestaOpcion($respuesta, $opcionesPregunta = []): Notificacion
    {
        $estado = new Notificacion();

        if (empty($opcionesPregunta))
        {
            return new Notificacion('encontrado', ['respuesta' => $opcionesPregunta]);
        }

        foreach ($opcionesPregunta as $opcion)
        {
            if ($opcion->valor == $respuesta)
            {
                return new Notificacion('encontrado', ['puntaje' => $opcion->valor, 'respuesta' => $opcion->pregunta_opcion]);
            }
        }

        return $estado;
    }
}
