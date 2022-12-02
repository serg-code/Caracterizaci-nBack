<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class HogarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['cantidad'] ?? env('LIMITEPAGINA_USUARIO', 20);

        if (empty($datosUrl))
        {
            $listadoHogares = Hogar::paginate($cantidadPaginar);

            $respuesta = new RespuestaHttp(
                200,
                'Succes',
                'Listado de Hogares',
                $listadoHogares
            );

            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        //filtro de usuarios
        $hogares = QueryBuilder::for(Hogar::class)
            ->allowedFields(['id', 'zona', 'cod_dpto', 'cod_mun', 'tipo'])
            ->paginate($cantidadPaginar);

        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'listado de hogares',
            $hogares
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
        $hogar->integrantes;
        $hogar->factoresProtectores = FactoresProtectores::where('hogar_id', '=', $id)->latest()->first();
        $hogar->habitosConsumo = HabitosConsumo::where('hogar_id', '=', $id)->latest()->first();

        $respuesta = new RespuestaHttp();
        $respuesta->data = $hogar;

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
