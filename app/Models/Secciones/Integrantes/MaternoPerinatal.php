<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaternoPerinatal extends Model
{
    use HasFactory;
    protected $table = 'primera_infancia';

    protected $fillable = [
        'ma_integrante',
        'ma_aceptacion_embarazo',
        'ma_fecha_control_prenatal',
        'ma_fecha_ultima_regla',
        'ma_fecha_parto',
        'ma_ganancia_peso',
        'ma_gestacion',
        'ma_carnet',
        'ma_prenatal_mensual',
        'ma_examen_serologia_1_trimestre',
        'ma_examen_serologia_2_trimestre',
        'ma_examen_serologia_3_trimestre',
        'ma_examen_vih_1_trimestre',
        'ma_examen_vih_2_trimestre',
        'ma_examen_vih_3_trimestre',
        'ma_odontologico',
        'ma_suplementacion',
        'ma_sedentarismo',
        'ma_bebidas_alcoholicas',
        'ma_fecha_ultimo_parto',
        'ma_depresion_postparto',
        'ma_atencion_institucional',
        'ma_aborto_no_especificado',
        'ma_hemorragia_precoz',
        'ma_hemorragia_anteparto',
        'ma_hipertension',
        'ma_vomitos',
        'ma_atencion_madre',
        'ma_diabetes_mellitus',
        'ma_hallazgo_anormal',
        'ma_parto_unico',
        'ma_parto-complicado',
        'ma_hemorragia_postparto',
        'ma_parto_cesarea',
        'ma_otras_complicaciones_parto',
        'ma_otras_complicaciones_purperio',
        'ma_hospitalizacion_sifilis',
        'ma_edad_gestacional',
        'ma_plan_canguro',
        'ma_curso_maternidad_paternidad',
        'ma_atencion_medica',
        'ma_atencion_enfermeria',
        'ma_atencion_odontologica',
        'ma_antigeno_hepatitis_b',
        'ma_cancer_cuello_uterino',
        'ma_glicemia_ayuna',
        'ma_hemoclasificacion',
        'ma_hemograma',
        'ma_hemoparasitos_chagas',
        'ma_toxoplasma',
        'ma_rubeola',
        'ma_varicela',
        'ma_prueba_treponemica_sifilis',
        'ma_urocultivo',
        'ma_prueba_vih',
        'ma_espermograma',
        'ma_citologia',
        'ma_elisa',
        'ma_micronutrientes',
        'ma_atencion_prenatal_medica_general',
        'ma_atencion_prenatal_enfermeria',
        'ma_atencion_prenatal_medica_obstetra',
        'ma_atencion_prenatal_consulta_nutricion',
        'ma_vacunacion_toxoide',
        'ma_vacunacion_difteria',
        'ma_vacunacion_tosferina',
        'ma_vacunacion_influenza',
        'ma_ecografia_obstetrica',
        'ma_ecografia_anatomico',
        'ma_interrupcion_voluntaria_embarazo',
        'ma_asesoria_anticonceptiva_ive',
        'ma_atencion_purperio',
        'ma_atencion_pediatria',
        'ma_atencion_recien_nacido',
        'ma_hemograma_recien_nacido',
        'ma_hemoclasificacion_recien_nacido',
        'ma_sifilis_recien_nacido',
        'ma_vih_recien_nacido',
        'ma_chagas_recien_nacido',
        'ma_tsh_recien_nacido',
        'ma_tamizaje_genetico_recien_nacido',
          
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarmaterno_perinatal(array $datosmaterno_perinatal)
    {
        $pregunta = new PrimeraInfancia($datosmaterno_perinatal);
        $pregunta->save();
    }

    public function eliminar()
    {
        MaternoPerinatal::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}