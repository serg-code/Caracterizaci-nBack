<?php

namespace App\Http\Controllers\secciones;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeccionesController extends Controller
{
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

    public function index(string $seccion)
    {
        $respuesta = new RespuestaHttp();
        return response()->json($respuesta, $respuesta->codigoHttp);
    }


    public function storea(Request $request)
    {
        $validacion = Validator::make(
            $request->all(),
            [
                'listado' => 'required|array'
            ],
            [
                'listado.required' => 'El listado de preguntas es necesario',
                'listado.array' => 'El listado de preguntas debe ser un array',
            ]
        );

        if ($validacion->fails())
        {
            $respuesta = new RespuestaHttp(
                400,
                'Bad request',
                'Algunos datos son invalidos',
                [
                    'errores' => $validacion->getMessageBag(),
                ]
            );

            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        foreach ($request->input('listado') as $seccion)
        {
            //crear seccion
            foreach ($seccion['preguntas'] as $pregunta)
            {
                $this->guardarPregunta($pregunta, $seccion['seccion']);
            }
        }

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'listado' => $request->input('listado'),
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function guardarPregunta($pregunta, string $refSeccion)
    {
        $pregunta = new Pregunta($pregunta);
        $pregunta->ref_Seccion = $refSeccion;
        $pregunta->save();
    }
}
