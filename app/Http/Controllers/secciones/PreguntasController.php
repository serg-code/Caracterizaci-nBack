<?php

namespace App\Http\Controllers\secciones;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            //obtener las opciones de las preguntas
            $pregunta->opciones;
            $listado["$pregunta->ref_campo"] = (object) $pregunta;
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

        $seccionInput = $request->input('seccion');
        $secciondb = DB::selectOne('SELECT * FROM secciones WHERE ref_seccion=?', [$seccionInput]);

        if (empty($secciondb))
        {
            $seccion = new Seccion(['ref_seccion' => $seccionInput]);
            $seccion->save();
            return $this->guardarPreguntas($request->input('preguntas'), $seccion->ref_seccion);
        }

        return $this->guardarPreguntas($request->input('preguntas'), $secciondb->ref_seccion);
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

    public function guardarPreguntas(array $preguntas, $seccion)
    {
        foreach ($preguntas as $pregunta)
        {
            $pregunta['ref_seccion'] = $seccion;
            Pregunta::guardarPregunta($pregunta);
        }

        $respuesta = new Respuesta();
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
