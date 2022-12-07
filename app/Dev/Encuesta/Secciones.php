<?php

namespace App\Dev\Encuesta;

use App\Models\Hogar\Hogar;
use App\Models\Secciones\Hogar\FactoresProtectores;
use App\Models\Secciones\Hogar\HabitosConsumo;
use App\Models\Secciones\Integrantes\Accidente;
use App\Models\Secciones\Integrantes\CuidadoDomiciliario;
use App\Models\Secciones\Integrantes\CuidadoEnfermedad;

class Secciones
{

    public static function seleccionarSeccion(string $refSeccion, $datosGuardar)
    {
        return match ($refSeccion)
        {
            //secciones del Hogar
            'habitos_consumo' => new HabitosConsumo($datosGuardar),
            'factores_protectores' => new FactoresProtectores($datosGuardar),

            //secciones de integrantes
            'accidentes' => new Accidente($datosGuardar),
            'cuidado_enfermedades' => new CuidadoEnfermedad($datosGuardar),
            'cuidados_domiciliario' => new CuidadoDomiciliario($datosGuardar),

            default => null,
        };
    }
}
