<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Hogar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HogarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listadoHogares = Hogar::all();

        $respuesta = new RespuestaHttp(
            200,
            'Succes',
            'Listado de Hogares',
            [
                'hogares' => $listadoHogares,
            ]
        );

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
            $respuesta = new RespuestaHttp(400, 'bad request', 'Valide la informaicon', $validador->getMessageBag());
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $hogar = new Hogar($request->all());
        $hogar->save();

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar,
        ];
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
        $hogar = Hogar::find($id);

        $respuesta = new RespuestaHttp();
        $respuesta->data = ['hogar' => $hogar];

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
}
