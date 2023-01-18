<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Cie10;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Cie10Controller extends Controller
{

    public function listar()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? 50;

        if (empty($datosUrl))
        {
            $listadoCie = Cie10::paginate($cantidadPaginar);

            return RespuestaHttp::respuesta(
                200,
                'succes',
                'listado de Cie10',
                $listadoCie
            );
        }

        //filtrar
        $listadoCie = QueryBuilder::for(Cie10::class)
            ->allowedFilters([
                AllowedFilter::scope('search'),
                AllowedFilter::exact('codigo'),
                'descripcion'
            ])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de Cie10',
            $listadoCie
        );
    }
}
