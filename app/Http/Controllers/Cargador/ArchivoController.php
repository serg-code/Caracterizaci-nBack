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
    private array $sqlValidador;
    private array $error;

    public function __construct()
    {
        $this->sqlValidador = [];
        $this->error = [];
    }

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
        $inteto = new Intentos([
            'id_usuario' => $request->user()->id,
            'id_cargador' => $cargadorId,
            'nombre_archivo' => $nombreGuardar,
            'nombre_archivo_original' => $archivo->getClientOriginalName(),
        ]);

        $inteto->save();
        try {
            Excel::import(new CargadorImport($cargador), $archivo);
        } catch (\Throwable $th) {
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Valide la informacion del archivo subido'
            );
        }

        $columnas = $cargador->columnas;
        $nombreTabla = str_replace(' ', '_', $cargador->nombre);
        foreach ($columnas as $columna) {
            $json = json_decode($columna->json);
            $validador = explode('|', $json->parametros->validar);
            $sql = $this->matchTipoValidador($validador[2], $columna->nombre, $nombreTabla);
            dd($sql);
        }

        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Datos guardados exitosamente',
            [
                'intento' => $inteto,
                'cargador' => $cargador,
            ]
        );
    }

    private function matchTipoValidador(string $tipoValidar, string $nombreColumna, string $nombreTabla): string
    {
        $validador = explode(':', $tipoValidar);
        return match ($validador[0]) {
            'long' => "SELECT sub, cc FROM $nombreTabla WHERE NOT(CHAR_LENGTH($nombreColumna) $validador[1]);",
            'type' => "SELECT sub, cc FROM $nombreTabla WHERE " . $this->matchType($validador[1], $nombreColumna) . ';',
        };
    }

    private function matchType(string $type, string $nombreColumna): string
    {
        $regularEmail = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
        return match ($type) {
            'number' => 'NOT(' . $nombreColumna . ' REGEXP ' . '"' . $regularEmail . '")',
            'decimal' => 'NOT(' . $nombreColumna . ' REGEXP "' . "^[0-9]+([.][0-9]+)?$" . '")',
            'email' => 'NOT(' . $nombreColumna . ' REGEXP ' . '"' . $regularEmail . '")',
        };
    }

}