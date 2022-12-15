<?php

namespace App\Dev\Encuesta;

use App\Dev\Puntaje;
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
            $puntajeControl = new Puntaje($seccion['respuestas']);
            $this->puntaje += $puntajeControl->getPuntaje();
            $this->errores = array_merge($this->errores, $puntajeControl->getErrores());

            if (empty($seccion['ref_seccion']) && empty($seccion['respuestas']))
            {
                return null;
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
            'cuidados_domiciliario',
            'cuidado_enfermedades',
        ];
    }

    public static function obtenerListado(): array
    {
        return [

            //* accidentes
            new PreguntaEncuesta('accidentes', 'accidentes_laborales'),
            new PreguntaEncuesta('accidentes', 'accidentes_transito', [
                'respuesta' => 69,
                'ref_campo' => 'tipo_lesion'
            ]),
            new PreguntaEncuesta('accidentes', 'tipo_lesion'),

            //* cuidados domiciliarios
            new PreguntaEncuesta('cuidados_domiciliario', 'causa'),
            new PreguntaEncuesta('cuidados_domiciliario', 'cuidados_domiciliarios'),
            new PreguntaEncuesta('cuidados_domiciliario', 'diagnostico_principal'),
            new PreguntaEncuesta('cuidados_domiciliario', 'fecha_inicio_domiciliario'),
            new PreguntaEncuesta('cuidados_domiciliario', 'oxigeno_domiciliario', [
                'respuesta' => 85,
                'ref_campo' => 'plan_aprobado'
            ]),
            new PreguntaEncuesta('cuidados_domiciliario', 'plan_aprobado'),

            //* cuidado enfermedades
            new PreguntaEncuesta('cuidado_enfermedades', 'actividad_fisica'),
            new PreguntaEncuesta('cuidado_enfermedades', 'artritis_remautidea'),
            new PreguntaEncuesta('cuidado_enfermedades', 'cancer'),
            new PreguntaEncuesta('cuidado_enfermedades', 'diabetes'),
            new PreguntaEncuesta('cuidado_enfermedades', 'diabetes_trimestral'),
            new PreguntaEncuesta('cuidado_enfermedades', 'enfermedades_costosas'),
            new PreguntaEncuesta('cuidado_enfermedades', 'enfermedades_cronicas'),
            new PreguntaEncuesta('cuidado_enfermedades', 'fuma'),
            new PreguntaEncuesta('cuidado_enfermedades', 'hemofilia'),
            new PreguntaEncuesta('cuidado_enfermedades', 'hemoglobina_glococilada'),
            new PreguntaEncuesta('cuidado_enfermedades', 'hipertencion_trimestral'),
            new PreguntaEncuesta('cuidado_enfermedades', 'insuficiencia_renal'),
            new PreguntaEncuesta('cuidado_enfermedades', 'tension_diastolica'),
            new PreguntaEncuesta('cuidado_enfermedades', 'tension_sistolica'),
            new PreguntaEncuesta('cuidado_enfermedades', 'vacuna_fiebre_amarilla'),
            new PreguntaEncuesta('cuidado_enfermedades', 'vih_sida'),

        ];
    }
}
