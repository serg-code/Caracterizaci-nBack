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
use App\Models\Secciones\Integrantes\Adultez;
use App\Models\Secciones\Integrantes\CuidadoDomiciliario;
use App\Models\Secciones\Integrantes\CuidadoEnfermedad;
use App\Models\Secciones\Integrantes\EnfermedadesSaludPublica;
use App\Models\Secciones\Integrantes\Infancia;
use App\Models\Secciones\Integrantes\Juventud;
use App\Models\Secciones\Integrantes\MaternoPerinatal;
use App\Models\Secciones\Integrantes\Morbilidad;
use App\Models\Secciones\Integrantes\PrimeraInfancia;
use App\Models\Secciones\Integrantes\SaludMental;
use App\Models\Secciones\Integrantes\Vejez;

class Secciones
{

    public static function seleccionarSeccion(string $refSeccion, $datosGuardar = [])
    {
        return match ($refSeccion)
        {
            //secciones del Hogar
            'animales' => new Animales($datosGuardar),
            'factores_protectores' => new FactoresProtectores($datosGuardar),
            'habitos_consumo' => new HabitosConsumo($datosGuardar),
            'mortalidad' => new Mortalidad($datosGuardar),
            'seguridad_alimentaria' => new SeguridadAlimentaria($datosGuardar),
            'vivienda' => new Vivienda($datosGuardar),

            //secciones de integrantes
            'accidentes' => new Accidente($datosGuardar),
            'adolescencia' => new Adolescencia($datosGuardar),
            'adultez' => new Adultez($datosGuardar),
            'cuidados_domiciliarios' => new CuidadoDomiciliario($datosGuardar),
            'cuidado_enfermedades' => new CuidadoEnfermedad($datosGuardar),
            'enfermedades_salud_publica' => new EnfermedadesSaludPublica($datosGuardar),
            'infancia' => new Infancia($datosGuardar),
            'juventud' => new Juventud($datosGuardar),
            'materno_perinatal' => new MaternoPerinatal($datosGuardar),
            'morbilidad' => new Morbilidad($datosGuardar),
            'primera_infancia' => new PrimeraInfancia($datosGuardar),
            'salud_mental' => new SaludMental($datosGuardar),
            'vejez' => new Vejez($datosGuardar),

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
