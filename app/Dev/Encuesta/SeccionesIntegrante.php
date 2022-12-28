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
            'primera_infancia',
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
            'morbilidad' => SeccionesIntegrante::preguntasMorbiilidad(),
            'salud_mental' => SeccionesIntegrante::preguntasSaludMental(),
            'identificacion_ciudadana', => SeccionesIntegrante::preguntasIdentificacionCiudadana(),
            'primera_infancia', => SeccionesIntegrante::preguntasPrimeraInfancia(),
            'infancia', => SeccionesIntegrante::preguntasInfancia(),
            'adolescencia' => SeccionesIntegrante::preguntasAdolescencia(),

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

    public static function preguntasMorbiilidad(): array
    {
        return [
            'propiedades_piel' => null,
            'propiedades_respiratorio' => null,
            'enfermedades_congenitas' => null,
            'enfermedad_cronica' => null,
            'enfermedad_cronica_cual' => null,
            'controlada' => null,
            'propiedades_respiratorio' => null,
            'propiedades_piel' => null,
            'enfermedades_congenitas' => null,
            'enfermedades_congenitas_cual' => null,
        ];
    }

    protected function preguntasIdentificacionCiudadana(): array
    {
        return [
            'ayudas_tenicas' => null,
            'cual_programa' => null,
            'discapacidad' => null,
            'esta_estudiando' => null,
            'grupo_atencion_especial' => null,
            'grupo_etnia' => null,
            'ocupacion_ingreso' => null,
            'por_que' => null,
            'programas' => null,
            'seguridad_social' => null,
        ];
    }

    public static function preguntasPrimeraInfancia(): array
    {
        return [
            'pi_peso_al_nacer' => null,
            'pi_peso_actual' => null,
            'pi_talla_al_nacer',
            'pi_talla_actual' => null,
            'pi_valoracion_nutricional_verde' => null,
            'pi_valoracion_nutricional_amarillo' => null,
            'pi_valoracion_nutricional_rojo' => null,
            'pi_desarrollo_lenguaje' => null,
            'pi_desarrollo_motora' => null,
            'pi_desarrollo_conducta' => null,
            'pi_desarrollo_probelmas_visuales' => null,
            'pi_desarrollo_problemas_auditivos' => null,
            'pi_desparasitado' => null,
            'pi_hospitalizacion_nacer' => null,
            'pi_carnet_vacunacion' => null,
            'pi_vacuna_bcg_rn' => null,
            'pi_vacuna_polio_d1' => null,
            'pi_vacuna_polio_d2' => null,
            'pi_vacuna_polio_d3' => null,
            'pi_vacuna_polio_r1' => null,
            'pi_vacuna_polio_r2' => null,
            'pi_vacuna_hepatitis' => null,
            'pi_vacuna_hepatitis_b_rn' => null,
            'pi_vacuna_influenza_estacional' => null,
            'pi_vacuna_neumococo_d1' => null,
            'pi_vacuna_neumococo_d2' => null,
            'pi_vacuna_neumococo_d3' => null,
            'pi_vacuna_rotavirus_d1' => null,
            'pi_vacuna_rotavirus_d2' => null,
            'pi_vacuna_fiebre_amarilla' => null,
            'pi_vacuna_dpt_d1' => null,
            'pi_vacuna_dpt_d2' => null,
            'pi_vacuna_pentavalente_d1' => null,
            'pi_vacuna_pentavalente_d2' => null,
            'pi_vacuna_pentavalente_d3' => null,
            'pi_vacuna_srp_d1' => null,
            'pi_vacuna_srp_d2' => null,
            'pi__vacuna_varicela' => null,
            'pi_atencion_medica' => null,
            'pi_atencion_enfermeria' => null,
            'pi_atencion_enfermeria' => null,
            'pi_atencion_lactancia' => null,
            'pi_tsh' => null,
            'pi_fluor' => null,
            'pi_profilaxis' => null,
            'pi_sellantes' => null,
            'pi_higiene_bucal' => null,
            'pi_caries' => null,
            'pi_consulta_odontologica' => null,
        ];
    }

    public static function preguntasInfancia(): array
    {
        return [
            'in_peso' => null,
            'in_talla' => null,
            'in_desarrollo_lenguaje' => null,
            'in_desarrollo_motora' => null,
            'in_desarrollo_conducta' => null,
            'in_desarrollo_probelmas_visuales' => null,
            'in_desarrollo_problemas_auditivos' => null,
            'in_desparasitado' => null,
            'in_carnet_vacunacion' => null,
            'in_vacuna_dpt_r2' => null,
            'in_vacuna_polio_r2' => null,
            'in_vacuna_srp_r1' => null,
            'in_vacuna_fiebre_amarilla' => null,
            'in_vacuna_vph_d1' => null,
            'in_vacuna_vph_d2' => null,
            'in_vacuna_vph_d3' => null,
            'in_caries' => null,
            'in_consulta_odontologica' => null,
            'in_uso_seda_dental' => null,
            'in_fluor' => null,
            'in_profilaxis' => null,
            'in_sellantes' => null,
            'in_atencion_medica' => null,
            'in_atencion_enfermeria' => null,
        ];
    }

    public static function preguntasAdolescencia(): array
    {
        return [
            'adol_peso'=> null,
            'adol_talla'=> null,
            'adol_imc'=> null,
            'adol_asesoria_anticonceptiva'=> null,
            'adol_planifica'=> null,
            'adol_metodo_planficica'=> null,
            'adol_desde_cuando_planifica'=> null,
            'adol_razon_no_planifica'=> null,
            'adol_atencion_medica'=> null,
            'adol_atencion_enfermeria'=> null,
            'adol_salud_bucal'=> null,
            'adol_fluor'=> null,
            'adol_profilaxis'=> null,
            'adol_sellantes'=> null,
            'adol_supragingival'=> null,
            'adol_vacunacion'=> null,
            'adol_vacuna_fiebre_amarilla'=> null,
            'adol_vacuna_vph'=> null,
            'adol_vacuna_toxoide_tetanico'=> null,
        ];
    }

}
