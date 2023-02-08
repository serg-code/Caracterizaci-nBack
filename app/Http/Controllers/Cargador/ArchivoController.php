<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Imports\CargadorImport;
use App\Models\Cargadores;
use App\Models\Intentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoController extends Controller
{

    private string $disco = 'public';
    public function guardarArchivos(Request $request, $cargadorId)
    {
        $validador = Validator::make(
            $request->all(),
            [
                'archivo' => 'required|mimes:csv,txt,xlsx',
                // 'nombreTabla' => 'required|string',
            ],
            [
                'archivo.required' => 'El archivo es necesario',
                'archivo.mimes' => 'El archivo debe tener una extensión (csv, xlsx)',
                'nombreTabla.required' => 'El nombre es necesario',
                'nombreTabla.string' => 'El nombre debe ser un texto',
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

        $cargador = Cargadores::find($cargadorId);
        if (empty($cargador)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos este cargador'
            );
        }

        //guardar archivo enviado
        $archivo = $request->file('archivo');
        $fecha = now();
        $nombreGuardar = $request->user()->id . '-' . $fecha->getTimestamp() . '-' . $archivo->getClientOriginalName();
        $archivo->storeAs('Cargadores', $nombreGuardar, $this->disco);

        $cargador->columnas;
        $inteto = new Intentos([
            'id_usuario' => $request->user()->id,
            'id_cargador' => $cargadorId,
            'nombre_archivo' => $nombreGuardar,
            'nombre_archivo_original' => $archivo->getClientOriginalName(),
        ]);

        // $inteto->save();
        Excel::import(new CargadorImport($cargador), $archivo);

        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Datos guardados exitosamente',
            [
                'intento' => $inteto,
            ]
        );
    }
}