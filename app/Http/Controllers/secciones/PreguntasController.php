<?php

namespace App\Http\Controllers\secciones;

use App\Dev\Encuesta\SeccionesHogar;
use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //secciones hogar
        $seccionesHogar = Pregunta::whereIn('ref_seccion', SeccionesHogar::obtenerSecciones())->get();

        //secciones integrantes
        $seccionesIntegrante = Pregunta::whereIn('ref_seccion', SeccionesIntegrante::obtenerSecciones())->get();


        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            "hogar" => Pregunta::FormatoRespuesta($seccionesHogar),
            "integrantes" => Pregunta::FormatoRespuesta($seccionesIntegrante),
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = new RespuestaHttp();
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listadoPreguntas = Pregunta::where('ref_seccion', '=', $id)->get();
        $listado = Pregunta::FormatoRespuesta($listadoPreguntas);

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'preguntas' => $listado,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function guardarPreguntas(array $preguntas, $seccion)
    {
        foreach ($preguntas as $pregunta)
        {
            $pregunta['ref_seccion'] = $seccion;
            Pregunta::guardarPregunta($pregunta);
        }

        $respuesta = new RespuestaHttp();
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
