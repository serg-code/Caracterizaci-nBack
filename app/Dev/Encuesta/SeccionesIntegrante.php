<?php

namespace App\Dev\Encuesta;

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
            'accidentes',
            'cuidado_enfermedades',
            'cuidados_domiciliarios',
            'enfermedades_salud_publica',
            'morbilidad',
            'salud_mental',
            'identificacion_ciudadana',
        ];
    }

    public static function getPreguntasSeccion(string $seccion): ?array
    {
        return match ($seccion)
        {
            'accidentes' => SeccionesIntegrante::preguntasAccidentes(),
            'cuidado_enfermedades' => SeccionesIntegrante::preguntasCuidadoEnfermedades(),
            'cuidados_domiciliarios' => SeccionesIntegrante::preguntasCuidadosDomiciliarios(),
            'enfermedades_salud_publica' => SeccionesIntegrante::preguntasEnfermedadesSaludPublica(),
            'morbilidad' => SeccionesIntegrante::preguntasMorvilidad(),
            'salud_mental' => SeccionesIntegrante::preguntasSaludMental(),

            default => [],
        };
    }

    public static function preguntasAccidentes(): array
    {
        return [
            'accidentes_laborales' => null,
            'accidentes_transito' => new PreguntaEncuesta('tipo_lesion', 69),
            'tipo_lesion' => null,
        ];
    }

    public static function preguntasCuidadosDomiciliarios(): array
    {
        return [
            'cuidados_domiciliarios' => null,
            'diagnostico_principal' => null,
            'causa' => null,
            'fecha_inicio_domiciliario' => null,
            'oxigeno_domiciliario' => new PreguntaEncuesta('plan_aprobado', 85),
            'plan_aprobado' => null,
        ];
    }

    public static function preguntasCuidadoEnfermedades(): array
    {
        return [
            'actividad_fisica' => null,
            'artritis_remautidea' => null,
            'cancer' => null,
            'diabetes' => null,
            'diabetes_trimestral' => null,
            'enfermedades_costosas' => null,
            'enfermedades_cronicas' => null,
            'fuma' => null,
            'hemofilia' => null,
            'hemoglobina_glococilada' => null,
            'hipertencion_trimestral' => null,
            'insuficiencia_renal' => null,
            'tension_diastolica' => null,
            'tension_sistolica' => null,
            'vacuna_fiebre_amarilla' => null,
            'vih_sida' => null,
        ];
    }

    public static function preguntasSaludMental(): array
    {
        return [
            'depresion' => null,
            'intento_suicidio' => null,
            'trastorno_afectivo' => null,
            'bulimia' => null,
            'anorexia' => null,
            'tratamiento' => null,
            'diagnostico' => null,
            'violencia_fisica' => null,
            'violencia_psicologica' => null,
            'violencia_sexual' => null,
            'violencia_institucional' => null,
            'violencia_social' => null,
            'violencia_gestacion' => null,
        ];
    }

    public static function preguntasEnfermedadesSaludPublica(): array
    {
        return [
            'intoxicacion' => null,
            'malaria' => null,
            'brucelosis' => null,
            'sika_chicungunya' => null,
            'sifilis' => null,
            'leishmaniasis' => null,
            'lepra' => null,
            'chagas' => null,
            'tuberculosis' => null,
            'dengue' => null,
            'varicela' => null,
        ];
    }

    public static function preguntasMorvilidad(): array
    {
        return [
            'propiedades_piel' => null,
            'propiedades_respiratorio' => null,
            'enfermedades_congenitas' => null,
            'enfermedad_cronica' => null,
            'controlada' => null,
        ];
    }
    //plan_aprobado
}
