<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReporteExport implements ShouldAutoSize, FromArray
{

    public function __construct(
        protected $coleccion
    )
    {
    }

    public function array(): array
    {
        return $this->coleccion;
    }
}
