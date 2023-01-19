<?php

namespace App\Http\Controllers\Respuestas;

use App\Dev\ControlInduccion;
use App\Dev\ControlIntegrante;
use App\Dev\Encuesta\OpcionPregunta;
use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Inducciones;
use App\Models\Integrantes;
use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\respuestas\RespuestaIntegrante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegranteFinalizadoController extends Controller
{
    protected Integrantes $integrante;
    protected array $errores;
    protected array $secciones;
    protected int $puntuacion;

    public function __construct()
    {
        $this->errores = [];
        $this->puntuacion = 0;
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
        $this->integrante = Integrantes::find($integrantePeticion['id']);

        if (empty($this->integrante))
        {
            return RespuestaHttp::respuesta(
                404,
                'Bad request',
                'Integrante no encontrado'
            );
        }

        RespuestaIntegrante::where('id_integrante', '=', $this->integrante->id)->delete();
        $this->secciones = $integrantePeticion['secciones'];
        $listadoSecciones = SeccionesIntegrante::obtenerSecciones();

        foreach ($listadoSecciones as $nombreSeccion)
        {
            if (empty($this->secciones[$nombreSeccion]))
            {
                array_push($this->errores, ["$nombreSeccion" => "No encontramos la seccion $nombreSeccion"]);
                continue;
            }

            //buscar validador
            $validador = SeccionesIntegrante::obtenerValidador(
                $nombreSeccion,
                $this->integrante,
                $this->secciones[$nombreSeccion]['respuestas'] ?? []
            );
            if (empty($validador))
            {
                continue;
            }

            $validador->validar();
            $errorValidacion = $validador->obtenerErrores();
            $this->errores = array_merge($this->errores, $errorValidacion);
            $this->puntuacion += $validador->obtenerPuntaje();

            //actualizar la seccion
            $this->secciones[$nombreSeccion]['respuestas'] = $validador->obtenerSeccion();
        }

        // foreach ($this->secciones as $refSeccion => $datos)
        // {
        //     $this->recorrerRespuestas($datos['respuestas'], $refSeccion);
        // }

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
            try
            {
                $this->guardadoFinal($respuestas);
            }
            catch (\Throwable $th)
            {
                continue;
            }
        }

        $this->integrante->actualizarIntegrante([
            'id' => $this->integrante->id,
            'estado_registro' => 'FINALIZADO',
            'puntaje_obtenido' => $this->puntuacion,
        ]);

        $inducciones = new ControlInduccion($this->integrante, $this->secciones);
        $listaInducciones = $inducciones->getInducciones();

        return RespuestaHttp::respuesta(
            201,
            'succes',
            'Encuesta validada y guardada exitosamente',
            [
                'integrante' => $this->integrante,
                'inducciones' => $listaInducciones,
            ]
        );
    }

    protected function validarSecciones(array $secciones = []): array
    {
        $errores = [];
        $listado = SeccionesIntegrante::obtenerSecciones();

        foreach ($listado as $seccion)
        {
            if (empty($secciones[$seccion]))
            {
                $errores[$seccion] = [
                    "No encontramos la seccion $seccion"
                ];
            }
        }

        return $errores;
    }

    protected function validacion(array $integranteDatos, array $encuesta): ?RespuestaHttp
    {
        $controlIntegrante = new ControlIntegrante($integranteDatos, $encuesta);
        $integrante = Integrantes::find($integranteDatos['id']);

        if (empty($integrante))
        {
            $errores = $controlIntegrante->validarCrearIntegrante($integranteDatos);
            if (empty($errores))
            {
                $integrante = new Integrantes($integranteDatos);
                $integrante->save();
            }
        }


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

        $secciones = $integranteDatos['secciones'];
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
        Inducciones::where('id_integrante', '=', $this->integrante->id)->delete();
        return null;
    }

    protected function guardadoFinal(array $respuestas)
    {
        foreach ($respuestas as $refCampo => $respuestaFormulario)
        {
            $pregunta = Pregunta::where('ref_campo', '=', $refCampo)->first();
            $opcion = 0;

            if (!empty($pregunta->tipo) && $pregunta->tipo != 'texto' || $pregunta->tipo !== 'texto_largo')
            {
                $opcion = Opcion::find($respuestaFormulario);
            }

            $respuesta = new RespuestaIntegrante([
                'id_integrante' => $this->integrante->id,
                'ref_campo' => $refCampo,
                'pregunta' => $pregunta->descripcion,
                'respuesta' => $respuestaFormulario,
                'puntaje' => $opcion->valor ?? 0,
            ]);
            $respuesta->save();
        }
    }

    protected function validarRespuesta(string $ref_campo, $respuesta): ?string
    {
        $pregunta = Pregunta::ObtenerPregunta($ref_campo);
        if (empty($pregunta))
        {
            return "$ref_campo no es una pregunta valida";
        }

        $resultado = OpcionPregunta::buscarRespuestaOpcion($pregunta, $respuesta);
        if ($resultado->estado === 'error')
        {
            return "$respuesta no es una respuesta valida para $ref_campo";
        }

        if ($resultado->estado !== 'error')
        {
            $this->puntuacion += $resultado->datos['puntaje'];
        }
        return null;
    }
}
