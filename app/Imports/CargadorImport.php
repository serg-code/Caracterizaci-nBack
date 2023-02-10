<?php

namespace App\Imports;

use App\Models\Cargadores;
use App\Models\CargadoresColumns;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class CargadorImport implements ToCollection
{
    protected array $columnas;
    private int $cantidadColumna;

    public function __construct(
        protected Cargadores $cargador
    )
    {
        $this->columnas = CargadoresColumns::where('id_cargador', '=', $this->cargador->id)->get(['nombre'])->toArray();
        $this->cantidadColumna = sizeof($this->columnas);
        $this->nombreTabla = $cargador->nombre_tabla;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $datos = array_map(function ($columna) {
            $datoGuardar = [];

            for ($i = 0; $i < $this->cantidadColumna; $i++) {
                $datoGuardar[$this->columnas[$i]['nombre']] = $columna[$i];
            }

            return $datoGuardar;
        }, $collection->toArray());
        DB::table($this->cargador->nombre_tabla)->insertOrIgnore($datos);
    }

}