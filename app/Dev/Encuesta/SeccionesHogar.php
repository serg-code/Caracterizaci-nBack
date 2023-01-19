<?php

namespace App\Dev\Encuesta;

use App\Dev\Puntaje;
use App\Http\Controllers\Validador\Hogar\ValidarAnimales;
use App\Http\Controllers\Validador\Hogar\ValidarFactoresProtectores;
use App\Http\Controllers\Validador\Hogar\ValidarHabitosConsumo;
use App\Http\Controllers\Validador\Hogar\ValidarMortalidad;
use App\Http\Controllers\Validador\Hogar\ValidarSeguridadAlimentaria;
use App\Http\Controllers\Validador\Hogar\ValidarVivienda;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Hogar\Hogar;

class SeccionesHogar
{
    public int $puntaje;
    protected array $errores;

    public function __construct(
        protected Hogar $hogar,
        protected $secciones,
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
    }

    public function recorrer()
    {
        foreach ($this->secciones as $seccion)
        {
            $puntajeControl = new Puntaje($seccion['respuestas']);
            $this->puntaje += $puntajeControl->getPuntaje();
            $this->errores = array_merge($this->errores, $puntajeControl->getErrores());

            if (empty($seccion['ref_seccion']) && empty($seccion['respuestas']))
            {
                return null;
            }

            //agregar id del hogar
            $seccion['respuestas']['hogar_id'] = $this->hogar->id;
            $respuesta = Secciones::seleccionarSeccion(
                $seccion['ref_seccion'],
                $seccion['respuestas']
            );

            try
            {

                if (!empty($respuesta))
                {
                    $this->guardarRespuesta($respuesta);
                }
            }
            catch (\Throwable $th)
            {
                dd($th);
            }
        }
    }

    protected function guardarRespuesta($respuesta)
    {
        $respuesta->eliminar();
        $respuesta->save();
    }

    public function obtenerPuntaje()
    {
        return $this->puntaje;
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public static function obtenerValidador(string $nombreSeccion, array $seccion): ?ValidacionEncuesta
    {
        return match ($nombreSeccion)
        {
            'factores_protectores' => new ValidarFactoresProtectores($seccion),
            'habitos_consumo' => new ValidarHabitosConsumo($seccion),
            'vivienda' => new ValidarVivienda($seccion),
            'animales' => new ValidarAnimales($seccion),
            'mortalidad' => new ValidarMortalidad($seccion),
            'seguridad_alimentaria' => new ValidarSeguridadAlimentaria($seccion),
            default => null,
        };
    }

    public static function obtenerSecciones(): array
    {
        return [
            'factores_protectores',
            'habitos_consumo',
            'vivienda',
            'animales',
            'mortalidad',
            'seguridad_alimentaria',
        ];
    }
}
