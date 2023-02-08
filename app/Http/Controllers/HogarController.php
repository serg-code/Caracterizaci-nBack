<?php

namespace App\Http\Controllers;

use App\Dev\Hogar\ActualizarHogar;
use App\Dev\Hogar\crearHogar;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HogarController extends Controller
{

    public function __construct()
    {
        $this->middleware('hogar.listar', ['only' => ['index', 'show']]);
        $this->middleware('hogar.crear', ['only' => 'store']);
        $this->middleware('permission:eliminar hogar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? env('LIMITEPAGINA_USUARIO', 10);
        $select = [
            'hogar.id',
            'hogar.barrio_vereda_id',
            'hogar.zona',
            'hogar.cod_dpto',
            'hogar.cod_mun',
            'hogar.tipo',
            'hogar.direccion',
            'hogar.estado_registro',
            'hogar.puntaje_max',
            'hogar.puntaje_obtenido',
            'hogar.color',
            'hogar.porcentaje',
            'hogar.created_at',
            'hogar.updated_at',
        ];

        if (empty($datosUrl)) {
            $listadoHogares = Hogar::select($select)
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
        $hogares = QueryBuilder::for (Hogar::class)
            ->select($select)
            ->allowedFilters([
                AllowedFilter::scope('search'),
                AllowedFilter::scope('fechas'),
                AllowedFilter::exact('id'),
                'zona',
                'cod_dpto',
                'cod_mun',
                'tipo',
                'estado_registro',
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

        if ($validacion->fails()) {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No encontramos informacion',
                $validacion->getMessageBag()
            );
        }

        $hogarPeticion = $request->input('hogar');
        $id = $hogarPeticion['id'];
        $hogar = Hogar::find($id);

        if (empty($hogar)) {
            $hogarPeticion['puntaje_max'] = env('PUNTAJE_MAX', 180);
            $crearHogar = new crearHogar($hogarPeticion, $request->user()->id);
            $respuestaCrearHogar = $crearHogar->getRespuesta();
            return RespuestaHttp::respuestaObjeto($respuestaCrearHogar);
        }

        if (!empty($hogar)) {
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