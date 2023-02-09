<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\BarrioVereda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BarrioVeredaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:listar BarrioVereda', ['only' => ['show', 'index']]);
        $this->middleware('permission:editar BarrioVereda', ['only' => ['update']]);
        $this->middleware('permission:eliminar BarrioVereda', ['only' => ['destroy']]);
    }


    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? 10;

        if (empty($datosUrl)) {
            $listadoHogares = BarrioVereda::with(['municipio.departamento'])->paginate($cantidadPaginar);

            return RespuestaHttp::respuesta(
                200,
                'Succes',
                'Listado de barrios / veredas',
                $listadoHogares
            );
        }

        //filtro de usuarios
        $hogares = QueryBuilder::for (BarrioVereda::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('id_municipio'),
                AllowedFilter::exact('tipo'),
                AllowedFilter::scope('search'),
            ])
            ->allowedIncludes(['municipio'])
            ->with(['municipio.departamento'])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de barrios / veredas',
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
                'id_municipio' => 'required|exists:municipios,codigo_dane',
                'tipo' => 'required',
                'nombre' => 'required',
            ],
            [
                'id_municipio.required' => 'El id del municipio es necesario',
                'id_municipio.exists' => 'El id del municipio no es valido',
                'tipo.required' => 'El tipo es necesario',
                'nombre.required' => 'El nombre es necesario',
            ]
        );

        if ($validacion->fails()) {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Erro al validar algunos datos',
                $validacion->getMessageBag()
            );
        }

        $barrioVereda = new BarrioVereda($request->all());
        $barrioVereda->save();

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'El barrio/vereda fue creado con exito',
            [
                "barrio_vereda" => $barrioVereda,
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
        $barrioVereda = BarrioVereda::find($id);

        if (empty($barrioVereda)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'Barrio o Vereda no encontrado',
                [
                    'id' => [
                        'No encontramos el barrio o vereda solicitado',
                    ]
                ]
            );
        }

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Barrio o Vereda encontrado',
            [
                $barrioVereda,
            ]
        );
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
        $barrioVereda = BarrioVereda::find($id);

        if (empty($barrioVereda)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'Barrio o Vereda no encontrado',
                [
                    'id' => [
                        'No encontramos el barrio o vereda solicitado',
                    ]
                ]
            );
        }

        $barrioVereda->actualizar($request->all());

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Barrio o Vereda actualizado',
            [
                'barrio_vereda' => $barrioVereda,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            BarrioVereda::where('id', '=', $id)->delete();
            return RespuestaHttp::respuesta(
                200,
                'succes',
                'Barrio/Vereda eliminado con exito'
            );
        } catch (\Throwable $th) {
            return RespuestaHttp::respuesta(
                400,
                'bad request',
                'No se puede eliminar este Barrio/Vereda'
            );
        }
    }
}