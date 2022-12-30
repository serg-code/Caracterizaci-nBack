<?php

namespace App\Dev\Encuesta;

use App\Models\Secciones\Hogar\Animales;
use App\Models\Secciones\Hogar\FactoresProtectores;
use App\Models\Secciones\Hogar\HabitosConsumo;
use App\Models\Secciones\Hogar\Mortalidad;
use App\Models\Secciones\Hogar\SeguridadAlimentaria;
use App\Models\Secciones\Hogar\Vivienda;
use App\Models\Secciones\Integrantes\Accidente;
use App\Models\Secciones\Integrantes\Adolescencia;
use App\Models\Secciones\Integrantes\CuidadoDomiciliario;
use App\Models\Secciones\Integrantes\CuidadoEnfermedad;
use App\Models\Secciones\Integrantes\EnfermedadesSaludPublica;
use App\Models\Secciones\Integrantes\Infancia;
use App\Models\Secciones\Integrantes\Morbilidad;
use App\Models\Secciones\Integrantes\PrimeraInfancia;
use App\Models\Secciones\Integrantes\SaludMental;

class Secciones
{

    public static function seleccionarSeccion(string $refSeccion, $datosGuardar = [])
    {
        return match ($refSeccion)
        {
            //secciones del Hogar
            'habitos_consumo' => new HabitosConsumo($datosGuardar),
            'factores_protectores' => new FactoresProtectores($datosGuardar),
            'vivienda' => new Vivienda($datosGuardar),
            'amianles' => new Animales($datosGuardar),
            'mortalidad' => new Mortalidad($datosGuardar),
            'mortalidad' => new SeguridadAlimentaria($datosGuardar),

            //secciones de integrantes
            'accidentes' => new Accidente($datosGuardar),
            'cuidado_enfermedades' => new CuidadoEnfermedad($datosGuardar),
            'cuidados_domiciliarios' => new CuidadoDomiciliario($datosGuardar),
            'enfermedades_salud_publica' => new EnfermedadesSaludPublica($datosGuardar),
            'morbilidad' => new Morbilidad($datosGuardar),
            'salud_mental' => new SaludMental($datosGuardar),
            'primera_infancia' => new PrimeraInfancia($datosGuardar),
            'infancia' => new Infancia($datosGuardar),
            'adolescencia' => new Adolescencia($datosGuardar),

            default => null,
        };
    }

    public static function recorrerSecciones(array $secciones = []): ?array
    {
        $datos = array_map(function ($seccion)
        {
            // code ...
            // $tipoSeccion = Secciones::seleccionarSeccion($seccion)
        }, $secciones);

        return $datos;
    }
}
