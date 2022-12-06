<?php

namespace App\Http\Controllers\secciones;

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
        // $factores_protectores = Pregunta::where('ref_seccion', '=', 'factores_protectores')->get();
        // $habitos_consumo = Pregunta::where('ref_seccion', '=', 'habitos_consumo')->get();
        $seccionesHogar = Pregunta::where('ref_seccion', '=', 'factores_protectores')
            ->orWhere('ref_seccion', '=', 'habitos_consumo')
            ->get();

        //secciones integrantes
        // $accidentes = Pregunta::where('ref_seccion', '=', 'accidentes')->get();
        // $cuidado_enfermedades = Pregunta::where('ref_seccion', '=', 'cuidado_enfermedades')->get();
        // $cuidados_domiciliario = Pregunta::where('ref_seccion', '=', 'cuidados_domiciliario')->get();
        $seccionesIntegrante = Pregunta::where('ref_seccion', '=', 'accidentes')
            ->orWhere('ref_seccion', '=', 'cuidado_enfermedades')
            ->orWhere('ref_seccion', '=', 'cuidados_domiciliario')
            ->get();


        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            "hogar" => Pregunta::FormatoRespuesta($seccionesHogar),
            "integrantes" => Pregunta::FormatoRespuesta($seccionesIntegrante),
            // "hogar" => [
            //     Pregunta::FormatoRespuesta($seccionesHogar),
            // ],
            // "integrantes" => [
            //     "accidentes" => Pregunta::FormatoRespuesta($accidentes),
            //     "cuidado_enfermedades" => Pregunta::FormatoRespuesta($cuidado_enfermedades),
            //     "cuidados_domiciliario" => Pregunta::FormatoRespuesta($cuidados_domiciliario),
            // ],
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
