<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Cargadores;
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
                'nombreTabla' => 'required|string',
                'columnas' => 'required|array',
            ],
            [
                'nombreTabla.required' => 'El nombre es necesario',
                'nombreTabla.string' => 'El nombre debe ser un texto',
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

        $nombreTabla = $request->input('nombreTabla');
        $procesarErrores = $request->input('procesarErrores');
        $nombreTablaSlug = str_replace(' ', '_', $request->input('nombreTabla'));
        $columnas = $request->input('columnas');
        $sqlColumnas = $this->sqlColumnas($columnas);

        if (!empty($this->errores)) {
            return RespuestaHttp::respuesta(400, 'Bad request', 'Hemos encontrado un error', $this->errores);
        }

        $sql = "CREATE TABLE `$nombreTablaSlug` $sqlColumnas;";
        $estadoCrear = $this->crearTablaSql($sql, $nombreTablaSlug);

        if ($estadoCrear->codigoHttp == 201) {
            $cargadores = new Cargadores([
                'id_usuario' => $request->user()->id,
                'nombre' => $nombreTabla,
                'sql' => $sql,
                'procesarErrores' => $procesarErrores,
            ]);
            $cargadores->save();
        }

        return RespuestaHttp::respuestaObjeto($estadoCrear);
    }

    private function sqlColumnas(array $columnas): string
    {
        $sql = '(' . $this->sub();
        $this->errores = [];
        foreach ($columnas as $nombreColumna => $columna) {
            $validar = $this->validarColumna($columna, $nombreColumna);

            if (!empty($validar)) {
                array_push($this->errores, $validar);
                continue;
            }

            $columnaNombre = str_replace(' ', '_', $nombreColumna);
            $tipoDato = $this->tipoDato($columna['tipo'], $columna['parametros']);

            if (empty($tipoDato)) {
                array_push($this->errores, "No encontramos el tipo de dato en la columna $nombreColumna");
                continue;
            }

            $unique = $columna['unico'];
            $nullable = $columna['nulo'];
            $sql .= "`$columnaNombre` $tipoDato" . (($unique) ? ' UNIQUE' : '') . (($nullable) ? ',' : ' NOT NULL,');
        }

        $sql = substr($sql, 0, -1);
        $sql .= ')';
        return $sql;
    }

    private function validarColumna(array $columna, string $nombreColumna): array
    {
        $validador = Validator::make(
            $columna,
            [
                'tipo' => 'required',
                'nulo' => 'required|boolean',
                'unico' => 'required|boolean',
                // 'parametros' => 'required'
            ],
            [
                'tipo.required' => "El tipo de dato de la columna ($nombreColumna) es necesario",
                'nulo.required' => "Es obligatorio marcar si la columna ($nombreColumna) es nula",
                'nulo.boolean' => "El valor de nulo en la columna ($nombreColumna) debe ser (true o false)",
                'unico.required' => "Es necesario determinar si la columna ($nombreColumna) es única",
                'unico.boolean' => "El valor de nulo en la columna ($nombreColumna) debe ser (true o false)",
                'parametros.required' => "Los parametros de la columna ($nombreColumna) son necesarios",
            ]
        );

        return $validador->getMessageBag()->toArray();
    }

    private function tipoDato(string $tipo, $parametros): ?string
    {
        return match ($tipo) {
            'entero' => 'int' . $this->logitudTipoDato($parametros, ''),
            'texto' => 'varchar' . $this->logitudTipoDato($parametros, 255),
            'texto largo' => 'TEXT',
            'fecha' => 'datetime',
            'decimal' => 'decimal' . $this->logitudTipoDato($parametros, ''),
            'boolean' => 'bool',

            default => null,
        };
    }

    private function logitudTipoDato(array $parametros, string|int $valorMaximo): string
    {
        if (empty($parametros['longitud'])) {
            return "($valorMaximo)";
        }

        $logitud = $parametros['longitud'];
        return "($logitud)";
    }

    private function crearTablaSql(string $sql, string $nombreTabla): RespuestaHttp
    {
        try {
            $creado = DB::statement($sql);
            if (!$creado) {
                return new RespuestaHttp(400, 'Bad request', 'Algo ha salido mal');
            }

            return new RespuestaHttp(
                201,
                'Created',
                'Tabla creada de manera exitosa',
                [
                    'talba' => "Tabla ($nombreTabla) creada exitosamente",
                    'nombre' => $nombreTabla,
                ]
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new RespuestaHttp(400, 'Bad Request', 'Algo salio mal al momento de crear la tabla');
        }
    }

    private function sub(): string
    {
        return "`sub` BIGINT AUTO_INCREMENT UNIQUE,";
    }
}