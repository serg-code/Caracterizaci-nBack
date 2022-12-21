<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Secciones\Hogar\CIUU;
use Illuminate\Http\Request;

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
}
