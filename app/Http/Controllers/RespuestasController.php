<?php

namespace App\Http\Controllers;

use App\Dev\Encuesta\OpcionPregunta;
use App\Dev\Encuesta\SeccionesHogar;
use App\Dev\Notificacion;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\Integrantes;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * todo: validar el tipo de respuesta a guardar
 */
class RespuestasController extends Controller
{
    public function guardarRespuestaParcial(Request $request)
    {
        $datos = $request->input('hogar');
        $hogar = Hogar::guardarHogar($datos);

        if (empty($hogar))
        {
            return RespuestaHttp::respuesta(400, 'Bad request', 'No se puede obtener el hogar');
        }

        $this->recorrerSecciones($hogar, $datos['secciones']);
        $this->recorrerIntegrantes($hogar, $datos['integrantes']);
        $hogar = Hogar::find($hogar->id);
        $hogar->integrantes;

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Formularios guardados exitosamente',
            [
                'hogar' => $hogar,
            ]
        );
    }

    public function actualizarRespuesta(Request $request)
    {
        $datos = $request->input('hogar');

        $validacion = $this->validarDatosActualizacion($datos);

        if (!empty($validacion))
        {
            return response()->json($validacion, $validacion->codigoHttp);
        }

        $hogar = Hogar::actualizarHogar($datos);
        if (empty($hogar))
        {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos el hogar',
                [
                    'error' => 'No se ha encontrado el hogar con el id'
                ]
            );
        }

        $this->recorrerSecciones($hogar, $datos['secciones']);
        $this->recorrerIntegrantes($hogar, $datos['integrantes']);

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar,
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function guardarRespuesta(Request $request)
    {
        $datos = $request->input('hogar');
        $respuesta = new RespuestaHttp();
        $hogar = Hogar::guardarHogar($datos);
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
                $respuestaEsOpcion = OpcionPregunta::buscarRespuestaOpcion($respuestaValor, $pregunta->opciones);
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

    protected function recorrerSecciones(Hogar $hogar, array $secciones = [])
    {

        if (!empty($secciones))
        {
            $seccionesHogar = new SeccionesHogar($hogar, $secciones);
            $seccionesHogar->recorrer();
            $hogar->puntaje_obtenido = $seccionesHogar->obtenerPuntaje();
            $hogar->update(
                $hogar->attributesToArray()
            );
        }
    }

    protected function recorrerIntegrantes(Hogar $hogar, array $integrantes = [])
    {
        if (empty($integrantes))
        {
            return null;
        }

        foreach ($integrantes as $integrante)
        {
            $integrante['hogar_id'] = $integrante['hogar_id'] ?? $hogar->id;
            $integrante = Integrantes::guardarIntegrante($integrante);
            // if (!empty($integrante['secciones']))
            // {
            //     $seccionesIntegrante = new SeccionesIntegrante($integrante, $seccionesHogar);
            //     $seccionesIntegrante->recorrerSecciones();
            // }
        }
    }

    protected function validarDatosActualizacion($datos): ?RespuestaHttp
    {
        $validacion = Validator::make(
            $datos,
            [
                'id' => 'required'
            ],
            [
                'id.required' => 'El id es necesario para realizar esta accion',
            ]
        );

        if ($validacion->fails())
        {
            return new RespuestaHttp(400, 'Bad Request', 'Datos erroneos', $validacion->getMessageBag());
        }

        return null;
    }
}
