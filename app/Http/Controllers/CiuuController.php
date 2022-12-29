<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Secciones\Hogar\CIUU;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CiuuController extends Controller
{
    public function listar()
    {
        $listado = CIUU::all();

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Listado CIUU',
            $listado
        );
    }

    public function filtrar(Request $request)
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? 50;

        if (empty($datosUrl))
        {
            $listadoCie = CIUU::paginate($cantidadPaginar);

            return RespuestaHttp::respuesta(
                200,
                'succes',
                'listado de CIUU',
                $listadoCie
            );
        }

        //filtrar
        $listadoCie = QueryBuilder::for(CIUU::class)
            ->allowedFilters([
                AllowedFilter::scope('search'),
                AllowedFilter::exact('codigo'),
                'descrip'
            ])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de CIUU',
            $listadoCie
        );
    }
}
