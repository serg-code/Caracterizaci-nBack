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
    protected string $nombreTabla;
    private int $cantidadColumna;

    public function __construct(
        protected Cargadores $cargador
    )
    {
        $this->columnas = CargadoresColumns::where('id_cargador', '=', $this->cargador->id)->get()->toArray();
        $this->cantidadColumna = sizeof($this->columnas);
        $this->nombreTabla = str_replace(' ', '_', $this->cargador->nombre);
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $datos = array_map(function ($columna) {
            $datoGuardar = [];

            // for ($i = 0; $i < $this->cantidadColumnas; $i++) {
            //     $datoGuardar[$this->nombreColumnas[$i]] = $columna[$i];
            // }
            for ($i = 0; $i < $this->cantidadColumna; $i++) {
                try {

                    $datoGuardar[$this->columnas[$i]['nombre']] = $columna[$i];
                } catch (\Throwable $th) {
                    //throw $th;
                    // dd($this->columnas[$i]['nombre']);
                    dd($columna);
                }
            }

            return $datoGuardar;
        }, $collection->toArray());
        DB::table($this->nombreTabla)->insertOrIgnore($datos);
    }

}