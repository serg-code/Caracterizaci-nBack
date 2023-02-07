<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Imports\CargadorImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoController extends Controller
{

    public function guardarArchivos(Request $request)
    {
        $validador = Validator::make(
            $request->all(),
            [
                'archivo' => 'required|mimes:csv,txt,xlsx',
                'nombreTabla' => 'required|string',
            ],
            [
                'archivo.required' => 'El archivo es necesario',
                'archivo.mimes' => 'El archivo debe tener una extensión (csv, xlsx)',
                'nombreTabla.required' => 'El nombre es necesario',
                'nombreTabla.string' => 'El nombre debe ser un texto',
                'columnas.required' => 'La columnas son necesarias',
                'columnas.array' => 'Las columnas deben ser un listado',
            ]
        );

        if ($validador->fails()) {
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Error al momento de validar la informacion',
                $validador->getMessageBag()
            );
        }

        $nombreTabla = $request->input('nombreTabla');
        $archivo = $request->file('archivo');

        Excel::import(new CargadorImport($nombreTabla), $archivo);

        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Datos guardados exitosamente '
        );
    }
}