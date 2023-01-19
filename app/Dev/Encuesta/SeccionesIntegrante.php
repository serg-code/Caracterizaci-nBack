<?php

namespace App\Dev\Encuesta;

use App\Http\Controllers\Validador\Integrante\ValidarAccidentes;
use App\Http\Controllers\Validador\Integrante\ValidarAdolescencia;
use App\Http\Controllers\Validador\Integrante\ValidarAdultez;
use App\Http\Controllers\Validador\Integrante\ValidarCuidadoEnfermedades;
use App\Http\Controllers\Validador\Integrante\ValidarCuidadosDomiciliarios;
use App\Http\Controllers\Validador\Integrante\ValidarEnfermedadesSaludPublica;
use App\Http\Controllers\Validador\Integrante\ValidarIdentificacionCiudadana;
use App\Http\Controllers\Validador\Integrante\ValidarInfancia;
use App\Http\Controllers\Validador\Integrante\ValidarJuventud;
use App\Http\Controllers\Validador\Integrante\ValidarMaternoPerinatal;
use App\Http\Controllers\Validador\Integrante\ValidarMorbilidad;
use App\Http\Controllers\Validador\Integrante\ValidarPrimeraInfancia;
use App\Http\Controllers\Validador\Integrante\ValidarSaludMental;
use App\Http\Controllers\Validador\Integrante\ValidarVejez;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class SeccionesIntegrante
{
    public int $puntaje;
    protected array $errores;

    public function __construct(
        protected Integrantes $integrante,
        protected array $secciones = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
    }

    public function recorrerSecciones()
    {
        foreach ($this->secciones as $seccion)
        {
            // $puntajeControl = new Puntaje($seccion['respuestas']);
            // $this->puntaje += $puntajeControl->getPuntaje();
            // $this->errores = array_merge($this->errores, $puntajeControl->getErrores());

            if (empty($seccion['ref_seccion']) && empty($seccion['respuestas']))
            {
                continue;
            }

            $seccion['respuestas']['id_integrante'] = $this->integrante->id;
            $respuesta = Secciones::seleccionarSeccion(
                $seccion['ref_seccion'],
                $seccion['respuestas']
            );
            $this->guardarRespuesta($respuesta);
        }
    }

    protected function guardarRespuesta($respuesta)
    {
        if (!empty($respuesta))
        {
            $respuesta->eliminar();
            $respuesta->save();
        }
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public static function obtenerSecciones(): array
    {
        return [
            'primera_infancia',
            'infancia',
            'adolescencia',
            'juventud',
            'adultez',
            'vejez',
            'materno_perinatal',
            'accidentes',
            'cuidado_enfermedades',
            'cuidados_domiciliarios',
            'enfermedades_salud_publica',
            'morbilidad',
            'salud_mental',
            'identificacion_ciudadana',
        ];
    }

    public static function obtenerValidador(string $nombreSeccion = '', Integrantes $integrante, array $seccion,): ?ValidacionEncuesta
    {
        return match ($nombreSeccion)
        {
            'primera_infancia' => new ValidarPrimeraInfancia($integrante, $seccion),
            'infancia' => new ValidarInfancia($integrante, $seccion),
            'adolescencia' => new ValidarAdolescencia($integrante, $seccion),
            'juventud' => new ValidarJuventud($integrante, $seccion),
            'adultez' => new ValidarAdultez($integrante, $seccion),
            'vejez' => new ValidarVejez($integrante, $seccion),
            'materno_perinatal' => new ValidarMaternoPerinatal($integrante, $seccion),
            'accidentes' => new ValidarAccidentes($integrante, $seccion),
            'cuidado_enfermedades' => new ValidarCuidadoEnfermedades($integrante, $seccion),
            'cuidados_domiciliarios' => new ValidarCuidadosDomiciliarios($integrante, $seccion),
            'enfermedades_salud_publica' => new ValidarEnfermedadesSaludPublica($integrante, $seccion),
            'morbilidad' => new ValidarMorbilidad($integrante, $seccion),
            'salud_mental' => new ValidarSaludMental($integrante, $seccion),
            'identificacion_ciudadana' => new ValidarIdentificacionCiudadana($integrante, $seccion),

            default => null,
        };
    }
}
