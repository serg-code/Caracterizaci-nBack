<?php

namespace App\Http\Controllers\ubicaciones;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Departamento;

class DepartamentosController extends Controller
{
    public function listarDepartamentos()
    {
        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'departamentos' => Departamento::all(),
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }
}
