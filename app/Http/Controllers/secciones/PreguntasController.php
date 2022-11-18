<?php

namespace App\Http\Controllers\secciones;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        $listado = array();

        foreach ($preguntas as $pregunta)
        {
            $preguntaEstructura = [
                'descipcion' => $pregunta->descripcion,
                'ref_seccion' => $pregunta->ref_seccion,
                'opciones' => [],
            ];
            $listado["$pregunta->ref_campo"] = (object) $preguntaEstructura;
        }

        $respuesta = new Respuesta();
        $respuesta->data = [
            "preguntas" => $listado,
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
        $validacion = Validator::make(
            $request->all(),
            [
                'seccion' => 'required',
                'preguntas' => 'required|array',
            ],
            [
                'seccion.required' => 'La seccion es necesaria',
                'preguntas.required' => 'El listado de preguntas es necesario',
                'preguntas.array' => 'El listado de preguntas debe ser un array',
            ]
        );

        if ($validacion->fails())
        {
            $respuesta = new Respuesta(
                400,
                'Bad request',
                'Algunos datos son invalidos',
                [
                    'errores' => $validacion->getMessageBag(),
                ]
            );

            return response()->json($respuesta, $respuesta->codigoHttp);
        }


        $seccion = new Seccion(['ref_seccion' => $request->input('seccion')]);
        $seccion->save();

        foreach ($request->input('preguntas') as $pregunta)
        {
            $pregunta['ref_seccion'] = $seccion->ref_seccion;
            Pregunta::guardarPregunta($pregunta);
        }


        $respuesta = new Respuesta();
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
        //
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
}
