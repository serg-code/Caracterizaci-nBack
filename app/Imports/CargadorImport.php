<?php

namespace App\Imports;

use App\Dev\RespuestaHttp;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class CargadorImport implements ToCollection
{
    protected array $nombreColumnas;
    protected int $cantidadColumnas;

    public function __construct(
        protected string $nombreTabla = '',
    )
    {
        $estado = DB::select("SHOW COLUMNS FROM " . $this->nombreTabla);
        $this->nombreColumnas = $this->obtenerNombreColumnas($estado);
        $this->cantidadColumnas = sizeof($this->nombreColumnas);
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        $datos = array_map(function ($columna) {
            $datoGuardar = [];

            for ($i = 0; $i < $this->cantidadColumnas; $i++) {
                $datoGuardar[$this->nombreColumnas[$i]] = $columna[$i];
            }

            return $datoGuardar;
        }, $collection->toArray());

        DB::table($this->nombreTabla)->insertOrIgnore($datos);
    }

    private function obtenerNombreColumnas(array $columnas): array
    {
        $nombreColumnas = [];
        foreach ($columnas as $columna) {
            array_push($nombreColumnas, $columna->Field);
        }

        return $nombreColumnas;
    }
}