<?php

namespace App\Http\Controllers;

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
 * todo: calcular los puntajes
 */
class RespuestasController extends Controller
{
    public function guardarRespuestaParcial(Request $request)
    {
        $datos = $request->input('hogar');
        $hogar = Hogar::guardarHogar($datos);

        if (empty($hogar))
        {
            $respuesta = new RespuestaHttp(400, 'Bad request', 'No se puede obtener el hogar');
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $this->recorrerSecciones($hogar, $datos['secciones']);
        $this->recorrerIntegrantes($hogar, $datos['integrantes']);

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

    public function actualizarRespuesta(Request $request)
    {
        $datos = $request->input('hogar');

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
            $respuesta = new RespuestaHttp(400, 'Bad Request', 'Datos erroneos', $validacion->getMessageBag());
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $hogar = Hogar::actualizarUsuario($datos);
        if (empty($hogar))
        {
            $respuesta = new RespuestaHttp(
                404,
                'Not found',
                'No encontramos el hogar',
                [
                    'error' => 'No se ha encontrado el hogar con el id'
                ]
            );

            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $this->recorrerSecciones($hogar, $datos['secciones']);

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar,
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    protected function recorrerSecciones(Hogar $hogar, array $secciones = [])
    {
        if (!empty($secciones))
        {
            $seccionesHogar = new SeccionesHogar($hogar, $secciones);
            $seccionesHogar->recorrer();
        }
    }

    protected function recorrerIntegrantes(Hogar $hogar, array $integrantes = [])
    {
        if (!empty($integrantes))
        {
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
