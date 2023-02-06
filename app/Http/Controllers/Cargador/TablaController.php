<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TablaController extends Controller
{
    protected array $errores;

    public function __construct()
    {
        $this->errores = [];
    }

    public function crearTabla(Request $request)
    {
        $validador = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|string',
                'columnas' => 'required|array',
            ],
            [
                'nombre.required' => 'El nombre es necesario',
                'nombre.string' => 'El nombre debe ser un texto',
                'columnas.required' => 'La columnas son necesarias',
                'columnas.array' => 'Las columnas deben ser un listado',
            ]
        );

        if ($validador->fails()) {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Algunos datos son erroneos',
                $validador->getMessageBag(),
            );
        }

        $nombreTabla = $request->input('nombre');
        $columnas = $request->input('columnas');
        $sqlColumnas = $this->sqlColumnas($columnas);

        if (!empty($this->errores)) {
            return RespuestaHttp::respuesta(400, 'Bad request', 'Hemos encontrado un error', $this->errores);
        }

        $sql = "CREATE TABLE `$nombreTabla` $sqlColumnas;";
        $creado = DB::statement($sql);
        if (!$creado) {
            return RespuestaHttp::respuesta(400, 'Bad request', 'Algo ha salido mal');
        }

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Tabla creada de manera exitosa',
            ['talba' => 'Tabla creada']
        );
    }

    private function sqlColumnas(array $columnas): string
    {
        $sql = '(';
        $this->errores = [];
        foreach ($columnas as $columna) {
            $validar = $this->validarColumna($columna);

            if (!empty($validar)) {
                array_push($this->errores, $validar);
                continue;
            }

            $nombreColumna = $columna['nombre'];
            $tipoDato = $this->tipoDato($columna['tipo']);
            $nullable = $columna['nulo'];
            $sql .= "`$nombreColumna` $tipoDato " . (($nullable) ? ',' : 'NOT NULL,');
        }

        $sql = substr($sql, 0, -1);
        $sql .= ')';
        return $sql;
    }

    private function validarColumna(array $columna): array
    {
        $validador = Validator::make(
            $columna,
            [
                'nombre' => 'required|string',
                'tipo' => 'required',
                'nulo' => 'required|boolean'
            ],
            [
                'nombre.required' => 'El nombre de la columna es requerido',
                'nombre.string' => 'El nombre de la columna debe ser texto',
                'tipo.required' => 'El tipo de la columna es necesario',
                'nulo.required' => 'Es obligatorio marcar si la columna es nula',
                'nulo.boolean' => 'El valor de nulo debe ser (true o false)'
            ]
        );

        return $validador->getMessageBag()->toArray();
    }

    private function tipoDato(string $tipo): string
    {
        return match ($tipo) {
            'entero' => 'int',
            'texto' => 'varchar(250)',
            'texto largo' => 'TEXT',

            default => 'bool',
        };
    }
}