<?php

namespace App\Http\Controllers;

use App\Dev\Hogar\ActualizarHogar;
use App\Dev\Hogar\crearHogar;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\Municipio;
use App\Models\Secciones\Hogar\FactoresProtectores;
use App\Models\Secciones\Hogar\HabitosConsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\AllowedFilter;
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
        $cantidadPaginar = $datosUrl['per_page'] ?? env('LIMITEPAGINA_USUARIO', 10);

        if (empty($datosUrl))
        {
            $listadoHogares = Hogar::select([
                'id',
                'barrio_vereda_id',
                'zona',
                'cod_dpto',
                'cod_mun',
                'tipo',
                'direccion',
                'estado_registro',
            ])
                ->with(['municipio.departamento'])
                ->paginate($cantidadPaginar);

            return RespuestaHttp::respuesta(
                200,
                'Succes',
                'Listado de Hogares',
                $listadoHogares
            );
        }

        //filtro de usuarios
        $hogares = QueryBuilder::for(Hogar::class)
            ->select([
                'id',
                'barrio_vereda_id',
                'zona',
                'cod_dpto',
                'cod_mun',
                'tipo',
                'direccion',
                'estado_registro',
            ])
            ->allowedFilters([
                AllowedFilter::scope('search'),
                AllowedFilter::exact('id'),
                'zona',
                'cod_dpto',
                'cod_mun',
                'tipo'
            ])
            ->with(['municipio.departamento'])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de hogares',
            $hogares
        );
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
                'hogar' => 'required'
            ],
            [
                'hogar.required' => 'Se necesitan los datos del Hogar'
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(400, 'Bad request', 'No encontramos informacion', $validacion->getMessageBag());
        }

        $hogarPeticion = $request->input('hogar');
        $id = $hogarPeticion['id'];
        $hogar = Hogar::find($id);

        if (empty($hogar))
        {
            $hogarPeticion['puntaje_max'] = 180;
            $crearHogar = new crearHogar($hogarPeticion);
            $respuestaCrearHogar = $crearHogar->getRespuesta();
            return RespuestaHttp::respuestaObjeto($respuestaCrearHogar);
        }

        if (!empty($hogarPeticion['secciones']))
        {
            $secciones = $hogarPeticion['secciones'];
            $actualizarHogar = new ActualizarHogar($hogarPeticion, $secciones);
            $respuesta = $actualizarHogar->getRespuesta();
            return RespuestaHttp::respuestaObjeto($respuesta);
        }

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Hogar Creado exitosamente',
            [
                'hogar' => $hogar,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hogar = Hogar::where('id', '=', $id)
            ->with(['integrantes.inducciones.tipoInduccion'])
            ->first();

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

    public function integrantesHogar($id)
    {
        $hogar = Hogar::select([
            'id',
            'puntaje_max',
            'puntaje_obtenido'
        ])
            ->where('id', '=', $id)
            ->with(['integrantes.inducciones.tipoInduccion'])
            ->first();

        $respuesta = new RespuestaHttp();
        $respuesta->data = $hogar;

        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
