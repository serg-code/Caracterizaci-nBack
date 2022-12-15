<?php

namespace App\Http\Controllers\Respuestas;

use App\Dev\ControlIntegrante;
use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Integrantes;
use App\Models\Pregunta;
use App\Models\respuestas\RespuestaIntegrante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegranteFinalizadoController extends Controller
{
    protected Integrantes $integrante;
    protected array $errores;
    protected array $secciones;

    public function __construct()
    {
        $this->errores = [];
    }

    public function finalizarIntegrante(Request $request)
    {
        $validacion = Validator::make(
            $request->all(),
            [
                'integrante' => 'required',
                'encuesta' => 'required',
            ],
            [
                'integrante.required' => 'El integrante es necesario',
                'encuesta.required' => 'La encuesta es necesaria',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No encontramos algunos datos',
                $validacion->getMessageBag()
            );
        }

        $integrantePeticion = $request->input('integrante');
        $encuesta = $request->input('encuesta');

        $errorValidacion = $this->validacion($integrantePeticion, $encuesta);

        if (!empty($errorValidacion))
        {
            return RespuestaHttp::respuestaObjeto($errorValidacion);
        }


        $respuestasIintegrante = new RespuestaIntegrante(['id_integrante' => $this->integrante->id]);
        $respuestasIintegrante->eliminarRespuestas();
        $this->secciones = $integrantePeticion['secciones'];

        $seccionAccidentes = $this->secciones['accidentes'];
        $this->recorrerRespuestas(
            $seccionAccidentes['respuestas'],
            $seccionAccidentes['ref_seccion']
        );

        $seccionCuidadosDomiciliario = $this->secciones['cuidados_domiciliario'];
        $this->recorrerRespuestas(
            $seccionCuidadosDomiciliario['respuestas'],
            $seccionCuidadosDomiciliario['ref_seccion']
        );

        $seccionCuidadoEnfermedades = $this->secciones['cuidado_enfermedades'];
        $this->recorrerRespuestas(
            $seccionCuidadoEnfermedades['respuestas'],
            $seccionCuidadoEnfermedades['ref_seccion']
        );

        if (!empty($this->errores))
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Encontrmos errores al validar la encuesta',
                $this->errores
            );
        }

        foreach ($this->secciones as $seccion)
        {
            $respuestas = $seccion['respuestas'];
            $this->guardadoFinal($respuestas);
        }

        $this->integrante->actualizarIntegrante([
            'id' => $this->integrante->id,
            'estado_registro' => 'FINALIZADO'
        ]);

        return RespuestaHttp::respuesta(
            201,
            'succes',
            'Encuesta validada y guardada exitosamente',
            [
                'integrante' => $this->integrante,
            ]
        );
    }

    protected function validarSecciones(array $secciones = []): array
    {
        $errores = [];
        $listado = SeccionesIntegrante::obtenerSecciones();

        foreach ($listado as $seccion)
        {
            $seccionEncontrada = $this->buscarSeccion($seccion, $secciones);
            if ($seccionEncontrada === false)
            {
                $errores[$seccion] = [
                    "No encontramos la seccion $seccion"
                ];
            }
        }

        return $errores;
    }

    protected function buscarSeccion(string $refSeccion, array $secciones): bool
    {
        foreach ($secciones as $seccion)
        {
            if ($seccion['ref_seccion'] === $refSeccion)
            {
                return true;
            }
        }

        return false;
    }

    protected function validacion(array $integrante, array $encuesta): ?RespuestaHttp
    {

        $controlIntegrante = new ControlIntegrante($integrante, $encuesta);
        $controlIntegrante->actualizarIntegrante(false);
        $errores = $controlIntegrante->getErrores();

        if (!empty($errores))
        {
            return new RespuestaHttp(
                400,
                'bad request',
                'Encontramos algunos errores en la informacion',
                [
                    $errores,

                ]
            );
        }

        $secciones = $integrante['secciones'];
        $errorSecciones = $this->validarSecciones($secciones);
        $errores = array_merge($errorSecciones);

        if (!empty($errores))
        {
            return new RespuestaHttp(
                400,
                'Bad request',
                'Encontramos unos errores en la validacion',
                $errores
            );
        }

        $this->integrante = $controlIntegrante->getIntegrante();
        return null;
    }

    protected function guardadoFinal(array $respuestas)
    {
        foreach ($respuestas as $refCampo => $respuestaFormulario)
        {
            $pregunta = Pregunta::where('ref_campo', '=', $refCampo)->first();
            $respuesta = new RespuestaIntegrante([
                'id_integrante' => $this->integrante->id,
                'ref_campo' => $refCampo,
                'pregunta' => $pregunta->descripcion,
                'respuesta' => $respuestaFormulario,
                // 'puntaje' => ?,
            ]);
            $respuesta->save();
        }
    }

    protected function recorrerRespuestas(array $respuestas, string $refSeccion)
    {
        $listadoPreguntas = SeccionesIntegrante::getPreguntasSeccion($refSeccion);

        foreach ($listadoPreguntas as $ref_campo => $validaciones)
        {
            if (empty($respuestas[$ref_campo]))
            {
                $this->errores[$ref_campo] = ["No encontramos la pregunta $ref_campo"];
                continue;
            }

            if (empty($validaciones))
            {
                continue;
            }

            if ($respuestas[$ref_campo] != $validaciones->respuestaHabilita)
            {
                // dd('eliminar');
                unset($listadoPreguntas[$validaciones->refCampoHabilita]);
                unset($this->secciones[$refSeccion]['respuestas'][$validaciones->refCampoHabilita]);
            }
        }

        return $listadoPreguntas;
    }
}
