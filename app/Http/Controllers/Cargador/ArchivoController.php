<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Imports\CargadorImport;
use App\Models\Cargadores;
use App\Models\Intentos;
use App\Models\LogErrores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $archivo = $request->file('archivo');
        $nombreGuardar = $this->guardarArchivo($request->user()->id, $archivo);
        $inteto = new Intentos([
            'id_usuario' => $request->user()->id,
            'id_cargador' => $cargadorId,
            'nombre_archivo' => $nombreGuardar,
            'nombre_archivo_original' => $archivo->getClientOriginalName(),
        ]);

        $inteto->save();
        $this->crearTabla($cargador->sql, $cargador->nombre_tabla);
        $this->importarArchivo($cargador, $archivo);
        $columnas = $cargador->columnas;
        $nombreTabla = $cargador->nombre_tabla;
        foreach ($columnas as $columna) {
            $json = json_decode($columna->json);
            if (empty($json->parametros->validar)) {
                continue;
            }

            $validador = explode('|', $json->parametros->validar);
            for ($i = 0; $i < sizeof($validador); $i++) {
                $sql = $this->matchTipoValidador($validador[$i], $columna->nombre, $nombreTabla, $inteto->id);
                DB::statement($sql);
            }
        }

        $cantidadErrores = LogErrores::where('intento', $inteto->id)->count();
        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Datos guardados exitosamente',
            [
                'cantidadErrores' => $cantidadErrores,
                'descarga' => "",
                'intento' => $inteto,
            ]
        );
    }

    private function matchTipoValidador(string $tipoValidar, string $nombreColumna, string $nombreTabla, int $idIntento): string
    {
        $fecha = now();
        $insert = "INSERT INTO log_errores (texto_error, ubicacion_error, intento, created_at, updated_at)";
        $validador = explode(':', $tipoValidar);
        return match ($validador[0]) {
            'long' => "$insert
            SELECT CONCAT('Error en la linea ', sub, ' el campo $nombreColumna no cumple con el rango $validador[1]'), sub, '$idIntento', '$fecha', '$fecha' 
            FROM (SELECT sub, cc FROM $nombreTabla WHERE NOT(CHAR_LENGTH($nombreColumna) $validador[1])) as error;",

            'type' => "$insert SELECT CONCAT('Error en la linea ', sub, ' el campo $nombreColumna no es del tipo " . $validador[1] . "')" .
            ",sub, '$idIntento', '$fecha', '$fecha' FROM " .
            "(SELECT sub, cc FROM $nombreTabla WHERE " . $this->matchType($validador[1], $nombreColumna) . ') AS error;',
        };
    }

    private function matchType(string $type, string $nombreColumna): string
    {
        $regularEmail = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
        return match ($type) {
            'numero' => 'NOT(' . $nombreColumna . ' REGEXP ' . '"^[0-9]+$")',
            'decimal' => 'NOT(' . $nombreColumna . ' REGEXP ' . '"^[0-9]+([.][0-9]+)?$")',
            'email' => 'NOT(' . $nombreColumna . ' REGEXP ' . '"' . $regularEmail . '")',
        };
    }

    private function crearTabla(string $sql, string $nombreTabla)
    {
        try {
            DB::statement($sql);
        } catch (\Throwable $th) {
            //throw $th;
            DB::statement("DROP TABLE $nombreTabla");
            DB::statement($sql);
        }
    }

    private function guardarArchivo(int $idUsuario, $archivo): string
    {
        $fecha = now();
        $nombreGuardar = $idUsuario . '-' . $fecha->getTimestamp() . '-' . $archivo->getClientOriginalName();
        $archivo->storeAs('Cargadores', $nombreGuardar, $this->disco);
        return $nombreGuardar;
    }

    private function importarArchivo(Cargadores $cargador, $archivo)
    {
        try {
            Excel::import(new CargadorImport($cargador), $archivo);
        } catch (\Throwable $th) {
            dd($th);
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Valide la informacion del archivo subido'
            );
        }
    }

}