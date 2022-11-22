<?php

namespace App\Http\Controllers;

use App\Models\Hogar;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HogarController extends Controller
{
    public function crearHogar(Request $request)
    {
        $validador = Validator::make(
            $request->all(),
            [
                'zona' => 'required',
                'departamento' => 'required',
                'municipio' => 'required',
                'barrio' => 'required',
                'direccion' => 'required',
                'geolocalizacion' => 'required',
            ],
            [
                'zona.required' => 'La zona es necesaria',
                'departamento.required' => 'Departamento necesario',
                'municipio.required' => 'Municion necesario',
                'barrio.required' => 'El barrio es necesario',
                'direccion.required' => 'La direccion es necesaria',
                'geolocalizacion.required' => 'Los datos de geolalizacion son necesarios',
            ]
        );

        if ($validador->fails())
        {
            $respuesta = new Respuesta(400, 'bad request', 'Valide la informaicon', $validador->getMessageBag());
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $hogar = new Hogar($request->all());
        $hogar->save();

        $respuesta = new Respuesta();
        $respuesta->data = [
            'hogar' => $hogar,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
