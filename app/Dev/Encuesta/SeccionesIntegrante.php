<?php

namespace App\Dev\Encuesta;

use App\Http\Controllers\Validador\Integrante\ValidarPrimeraInfancia;
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

    public static function obtenerValidador(Integrantes $integrante, array $seccion, string $nombreSeccion = ''): ?ValidacionEncuesta
    {
        return match ($nombreSeccion)
        {
            'primera_infancia' => new ValidarPrimeraInfancia($integrante, $seccion),
            'infancia' => null,
            'adolescencia' => null,
            'juventud' => null,
            'adultez' => null,
            'vejez' => null,
            'materno_perinatal' => null,
            'accidentes' => null,
            'cuidado_enfermedades' => null,
            'cuidados_domiciliarios' => null,
            'enfermedades_salud_publica' => null,
            'morbilidad' => null,
            'salud_mental' => null,
            'identificacion_ciudadana' => null,

            default => null,
        };
    }

    // ! retirar
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
            // 'primera_infancia', => SeccionesIntegrante::preguntasPrimeraInfancia(),
            'infancia', => SeccionesIntegrante::preguntasInfancia(),
            'adolescencia' => SeccionesIntegrante::preguntasAdolescencia(),
            'juventud' => SeccionesIntegrante::preguntasJuventud(),
            'adultez' => SeccionesIntegrante::preguntasAdultez(),
            'vejez' => SeccionesIntegrante::preguntasVejez(),
            'materno_perinatal' => SeccionesIntegrante::preguntasMaternoPerinatal(),

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
            'fuma' => null,
            'hemofilia' => null,
            'hemoglobina_glococilada' => null,
            'hipertencion_trimestral' => null,
            'insuficiencia_renal' => null,
            'tension_diastolica' => null,
            'tension_sistolica' => null,
            'vacuna_fiebre_amarilla' => null,
            'vih_sida' => null,
            'ha_estado_embarazada' => null,
            'cuantos_embarazos_ha_tenido' => null,
            'hijos_muertos_parto_natural' => null,
            'hijos_vivos_parto_natural' => null,
            'hijos_muertos_por_cesarea' => null,
            'hijos_vivos_por_cesarea' => null,
            'cuantos_abortos' => null,
            'cuantos_gemelos_multiples' => null,

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
            'grupo_etnia' => null,
            'grupo_atencion_especial' => null,
            'programas' => null,
            'cual_programa' => null,
            'seguridad_social' => null,
            'esta_estudiando' => null,
            'tipo_educacion' => null,
            'por_que' => null,
            'ocupacion_ingreso' => null,
            'discapacidad' => null,
            'ayudas_tenicas' => null,

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
            'adol_peso' => null,
            'adol_talla' => null,
            'adol_imc' => null,
            'adol_asesoria_anticonceptiva' => null,
            'adol_planifica' => null,
            'adol_metodo_planficica' => null,
            'adol_desde_cuando_planifica' => null,
            'adol_razon_no_planifica' => null,
            'adol_atencion_medica' => null,
            'adol_atencion_enfermeria' => null,
            'adol_salud_bucal' => null,
            'adol_fluor' => null,
            'adol_profilaxis' => null,
            'adol_sellantes' => null,
            'adol_supragingival' => null,
            'adol_vacunacion' => null,
            'adol_vacuna_fiebre_amarilla' => null,
            'adol_vacuna_vph' => null,
            'adol_vacuna_toxoide_tetanico' => null,
        ];
    }

    public static function preguntasJuventud(): array
    {
        return [
            'juv_cancer_cuello_uterino' => null,
            'juv_colposcopia' => null,
            'juv_bioscopia_cervico' => null,
            'juv_examen_seno' => null,
            'juv_control_medico' => null,
            'juv_planifica' => null,
            'juv_metodo_planifica' => null,
            'juv_tiempo_metodo' => null,
            'juv_asesoria_anticoncepcion' => null,
            'juv_razones_no_planifica' => null,
            'juv_parejas_sexuales_al_anio' => null,
            'juv_atencion_medica' => null,
            'juv_atencion_enfermeria' => null,
            'juv_salud_vocal' => null,
            'juv_vasectomia' => null,
            'juv_esterilizacion_femenina' => null,
            'juv_vias_esterilizacion' => null,
            'juv_profilaxis' => null,
            'juv_detartraje_supragingival' => null,
            'juv_prueba_vih' => null,
            'juv_antecedentes_diabetes' => null,
            'juv_antecedentes_hipertension' => null,
            'juv_alteracion_colesterol' => null,
            'juv_perimetro_abdominal' => null,

        ];
    }

    public static function preguntasAdultez(): array
    {
        return [
            'adul_valoracion_peso' => null,
            'adul_valoracion_talla' => null,
            'adul_imc' => null,
            'adul_asesoria_anticoncepcion' => null,
            'adul_planifica' => null,
            'adul_metodo_planifica' => null,
            'adul_desde_cuando_planifica' => null,
            'adul_razones_no_planifica' => null,
            'adul_parejas_sexuales_al_anio' => null,
            'adul_control_adultos' => null,
            'adul_antecedentes_diabetes' => null,
            'adul_antecedentes_hipertension' => null,
            'adul_antecedentes_colesterol' => null,
            'adul_perimetro_abdominal' => null,
            'adul_atencion_medica' => null,
            'adul_salud_bucal' => null,
            'adul_cancer_cuello_uterino_adn_vph' => null,
            'adul_cancer_cuello_uterino_adn_vph_positivo' => null,
            'adul_colposcopia_cervico_uterina' => null,
            'adul_biopsia_cervico_uterina' => null,
            'adul_cancer_mama_mamografia' => null,
            'adul_cancer_mama_valoracion_clinica' => null,
            'adul_cancer_prostata' => null,
            'adul_vasectomia' => null,
            'adul_esterilizacion_femenina' => null,
            'adul_vias_esterilizacion' => null,
            'adul_profilaxis' => null,
            'adul_detartraje_supragingival' => null,
            'adul_fiebre_amarilla' => null,
            'adul_prueba_vih' => null,
        ];
    }

    public static function preguntasVejez(): array
    {
        return [
            've_valoracion_peso' => null,
            've_valoracion_talla' => null,
            've_imc' => null,
            've_asesoria_anticoncepcion' => null,
            've_planifica' => null,
            've_metodo_planifica' => null,
            've_desde_cuando_planifica' => null,
            've_razones_no_planifica' => null,
            've_parejas_sexuales_al_anio' => null,
            've_control_adultos' => null,
            've_antecedentes_diabetes' => null,
            've_antecedentes_hipertension' => null,
            've_alteracion_colesterol' => null,
            've_perimetro_abdominal' => null,
            've_salud_medica' => null,
            've_salud_bucal' => null,
            've_cancer_cuello_uterino_adn_vph' => null,
            've_cancer_cuello_uterino_adn_vph_positivo' => null,
            've_colposcopia_uterina' => null,
            've_bioscopia_uterina' => null,
            've_cancer_mama_mamografia' => null,
            've_cancer_mama_valoracion_clinica' => null,
            've_cancer_prostata_psa' => null,
            've_cancer_prostata_rectal' => null,
            've_vasectomia' => null,
            've_esterilizacion_femenina' => null,
            've_vias_esterilizacion' => null,
            've_profilaxis' => null,
            've_detartraje_supragingival' => null,
            've_vacuna_fiebre_amarilla' => null,
            've_vacuna_influenza' => null,
            've_prueba_vih' => null,
        ];
    }

    public static function preguntasMaternoPerinatal(): array
    {
        return [
            'ma_aceptacion_embarazo' => null,
            'ma_fecha_control_prenatal' => null,
            'ma_fecha_ultima_regla' => null,
            'ma_fecha_parto' => null,
            'ma_ganancia_peso' => null,
            'ma_gestacion' => null,
            'ma_carnet' => null,
            'ma_prenatal_mensual' => null,
            'ma_examen_serologia_1_trimestre' => null,
            'ma_examen_serologia_2_trimestre' => null,
            'ma_examen_serologia_3_trimestre' => null,
            'ma_examen_vih_1_trimestre' => null,
            'ma_examen_vih_2_trimestre' => null,
            'ma_examen_vih_3_trimestre' => null,
            'ma_odontologico' => null,
            'ma_suplementacion' => null,
            'ma_sedentarismo' => null,
            'ma_bebidas_alcoholicas' => null,
            'ma_fecha_ultimo_parto' => null,
            'ma_depresion_postparto' => null,
            'ma_atencion_institucional' => null,
            'ma_aborto_no_especificado' => null,
            'ma_hemorragia_precoz' => null,
            'ma_hemorragia_anteparto' => null,
            'ma_hipertension' => null,
            'ma_vomitos' => null,
            'ma_atencion_madre' => null,
            'ma_diabetes_mellitus' => null,
            'ma_hallazgo_anormal' => null,
            'ma_parto_unico' => null,
            'ma_parto_complicado' => null,
            'ma_hemorragia_postparto' => null,
            'ma_parto_cesarea' => null,
            'ma_otras_complicaciones_parto' => null,
            'ma_otras_complicaciones_purperio' => null,
            'ma_hospitalizacion_sifilis' => null,
            'ma_edad_gestacional' => null,
            'ma_plan_canguro' => null,
            'ma_curso_maternidad_paternidad' => null,
            'ma_atencion_medica' => null,
            'ma_atencion_enfermeria' => null,
            'ma_atencion_odontologica' => null,
            'ma_antigeno_hepatitis_b' => null,
            'ma_cancer_cuello_uterino' => null,
            'ma_glicemia_ayuna' => null,
            'ma_hemoclasificacion' => null,
            'ma_hemograma' => null,
            'ma_hemoparasitos_chagas' => null,
            'ma_toxoplasma' => null,
            'ma_rubeola' => null,
            'ma_varicela' => null,
            'ma_prueba_treponemica_sifilis' => null,
            'ma_urocultivo' => null,
            'ma_prueba_vih' => null,
            'ma_espermograma' => null,
            'ma_citologia' => null,
            'ma_elisa' => null,
            'ma_micronutrientes' => null,
            'ma_atencion_prenatal_medica_general' => null,
            'ma_atencion_prenatal_enfermeria' => null,
            'ma_atencion_prenatal_medica_obstetra' => null,
            'ma_atencion_prenatal_consulta_nutricion' => null,
            'ma_vacunacion_toxoide' => null,
            'ma_vacunacion_difteria' => null,
            'ma_vacunacion_tosferina' => null,
            'ma_vacunacion_influenza' => null,
            'ma_ecografia_obstetrica' => null,
            'ma_ecografia_anatomico' => null,
            'ma_interrupcion_voluntaria_embarazo' => null,
            'ma_asesoria_anticonceptiva_ive' => null,
            'ma_atencion_purperio' => null,
            'ma_atencion_pediatria' => null,
            'ma_atencion_recien_nacido' => null,
            'ma_hemograma_recien_nacido' => null,
            'ma_hemoclasificacion_recien_nacido' => null,
            'ma_sifilis_recien_nacido' => null,
            'ma_vih_recien_nacido' => null,
            'ma_chagas_recien_nacido' => null,
            'ma_tsh_recien_nacido' => null,
            'ma_tamizaje_genetico_recien_nacido' => null,
        ];
    }
}
