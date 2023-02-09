<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Cargadores;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CargadoresController extends Controller
{
    private Cargadores $cargador;

    public function __construct()
    {
    }

    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? 10;

        if (empty($datosUrl)) {
            $listadoHogares = Cargadores::select()->paginate($cantidadPaginar);

            return RespuestaHttp::respuesta(
                200,
                'Succes',
                'Listado de cargadores',
                $listadoHogares
            );
        }

        //filtro de usuarios
        $hogares = QueryBuilder::for (Cargadores::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::scope('search'),
            ])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de cargadores',
            $hogares
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show($idCargador)
    {
        $cargador = Cargadores::find($idCargador);

        if (empty($cargador)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'Cargador no encontrado'
            );
        }

        $this->cargador = Cargadores::find($idCargador)->with(['usuarioCrea', 'intentos.usuario'])->first();
        return RespuestaHttp::respuesta(200, 'succes', 'Cargador', [$this->cargador]);
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}