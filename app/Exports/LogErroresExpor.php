<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LogErroresExpor implements FromCollection, ShouldAutoSize, WithHeadings
{

    public function __construct(protected Collection $coleccion)
    {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->coleccion;
    }

    public function headings(): array
    {
        return [
            'Error',
            'Ubicacion Error',
            'No intento',
        ];
    }
}