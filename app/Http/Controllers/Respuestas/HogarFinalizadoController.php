<?php

namespace App\Http\Controllers\Respuestas;

use App\Dev\Encuesta\SeccionesHogar;
use App\Dev\Hogar\ActualizarHogar;
use App\Dev\Hogar\crearHogar;
use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Hogar\Hogar;
use App\Models\Pregunta;
use App\Models\respuestas\RespuestaHogar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HogarFinalizadoController extends Controller
{

    protected Hogar $hogar;
    protected array $errores;
    protected array $secciones;
    protected int $puntuacion;

    public function __construct()
    {
        $this->errores = [];
        $this->puntuacion = 0;
    }

    public function finalizarHogar(Request $request)
    {
        $validacion = Validator::make(
            $request->all(),
            [
                'hogar' => 'required',
            ],
            [
                'hogar.required' => 'El hogar es necesario',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Algo ha salido mal',
                $validacion->getMessageBag()
            );
        }

        $hogarPeticion = $request->input('hogar');
        $hogar = Hogar::find($hogarPeticion['id']);

        if (empty($hogar))
        {
            $encuesta = $hogarPeticion['encuesta'];
            unset($hogarPeticion['encuesta']);
            $crearHogar = new crearHogar($hogarPeticion);
            $hogar = $crearHogar->getHogar();

            $hogar = Hogar::actualizarHogar([
                'id' => $hogar->id,
                'encuesta' => $encuesta,
            ]);
        }

        $this->eliminarRespuesta($hogar->id);
        $this->secciones = $hogarPeticion['secciones'];
        $listadoSecciones = SeccionesHogar::obtenerSecciones();

        foreach ($listadoSecciones as $refSeccion)
        {
            $seccion = $this->secciones[$refSeccion]['respuestas'];
            $validador = SeccionesHogar::obtenerValidador($refSeccion, $seccion);

            if (empty($validador))
            {
                continue;
            }

            $validador->validar();
            $errorValidacion = $validador->obtenerErrores();
            $this->errores = array_merge($this->errores, $errorValidacion);
            $this->puntuacion += $validador->obtenerPuntaje();

            //actualizar la seccion
            $this->secciones[$refSeccion]['respuestas'] = $validador->obtenerSeccion();
        }

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
            $idHogar = $hogar->id;
            try
            {

                $this->guardadoFinal($respuestas, $idHogar);
            }
            catch (\Throwable $th)
            {
                continue;
            }
        }



        //? validador del hogar
        // $actualizarHogar = new ActualizarHogar($hogarPeticion, $secciones);
        // $errores = $actualizarHogar->getErrores();
        // $hogar = $actualizarHogar->getHogar();

        // if (!empty($errores))
        // {
        //     return RespuestaHttp::respuesta(
        //         400,
        //         'Bad request',
        //         'Algo ha salido mal al momento de validar la encuesta',
        //         $errores
        //     );
        // }

        // $this->eliminarRespuesta($hogar->id);
        // foreach ($secciones as $seccion)
        // {
        //     $respuestas = $seccion['respuestas'];
        //     $idHogar = $hogar->id;
        //     try
        //     {

        //         $this->guardadoFinal($respuestas, $idHogar);
        //     }
        //     catch (\Throwable $th)
        //     {
        //         continue;
        //     }
        // }

        // $hogar = $hogar->actualizarHogar([
        //     'id' => $hogar->id,
        //     'estado_registro' => 'FINALIZADO'
        // ]);

        return RespuestaHttp::respuesta(200, 'succes', 'Encuesta del hogar finalizada', [
            'hogar' => $hogar,
        ]);
    }

    protected function eliminarRespuesta(string $id)
    {
        RespuestaHogar::where('hogar_uuid', '=', $id)->delete();
    }

    protected function guardadoFinal(array $respuestas, string $idHogar)
    {
        foreach ($respuestas as $refCampo => $respuestaFormulario)
        {
            $pregunta = Pregunta::where('ref_campo', '=', $refCampo)->first();
            $respuesta = new RespuestaHogar([
                'hogar_uuid' => $idHogar,
                'ref_campo' => $refCampo,
                // 'puntaje' => ?,
                'pregunta' => $pregunta->descripcion,
                'respuesta' => $respuestaFormulario,
            ]);
            $respuesta->save();
        }
    }
}
