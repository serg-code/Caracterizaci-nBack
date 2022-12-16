<?php

namespace App\Dev\Encuesta;

use App\Dev\Puntaje;
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

            $this->guardarRespuesta($respuesta);
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

    public static function getPreguntasSeccion(string $seccion): array
    {
        return match ($seccion)
        {
            'factores_protectores' => SeccionesHogar::preguntasFactoresProtectores(),
            'habitos_consumo' => SeccionesHogar::preguntasHabitosConsumo(),
            default => [],
        };
    }

    public static function preguntasFactoresProtectores(): array
    {
        return [
            'tipo_familia' => null,
            'duermen_ninos_ninas_adultos' => null,
            'problemas_alcohol' => null,
            'consume_tranquilizantes' => null,
            'relaciones_cordiales_respetuosas' => null,
            'lavar_manos_antes_comer' => null,
            'lavar_manos_antes_preparar_alimentos' => null,
            'fumigar_vivienda' => null,
            'secretaria_fumigado' => null,
            'acido_borico_cucarachas' => null,
        ];
    }

    public static function preguntasHabitosConsumo(): array
    {
        return [
            'consumo_huevos_crudos' => null,
            'alimentos_perecederos' => null,
            'hierve_leche' => null,
            'lavar_frutas_verduras' => null,
            'alimentos_crudos_separados_cocidos' => null,
        ];
    }
}
