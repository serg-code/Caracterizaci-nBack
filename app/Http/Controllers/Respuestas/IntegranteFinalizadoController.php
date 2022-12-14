<?php

namespace App\Http\Controllers\Respuestas;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegranteFinalizadoController extends Controller
{
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

        $integrante = $request->input('integrante');
        $encuesta = $request->input('encuesta');
        //encontrar integrante

        //guardar integrante

        //guardado con validacion
    }
}
