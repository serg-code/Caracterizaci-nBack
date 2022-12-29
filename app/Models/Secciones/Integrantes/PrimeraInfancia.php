<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimeraInfancia extends Model
{
    use HasFactory;

protected $table = 'primera_infancia';

    protected $fillable = [
        'id_integrante',
'pi_peso_al_nacer',
'pi_peso_actual',
'pi_talla_al_nacer',
'pi_talla_actual',
'pi_valoracion_nutricional_verde',
'pi_valoracion_nutricional_amarillo',
'pi_valoracion_nutricional_rojo',
'pi_desarrollo_lenguaje',
'pi_desarrollo_motora',
'pi_desarrollo_conducta',
'pi_desarrollo_probelmas_visuales',
'pi_desarrollo_problemas_auditivos',
'pi_desparasitado',
'pi_hospitalizacion_nacer',
'pi_carnet_vacunacion',
'pi_vacuna_bcg_rn',
'pi_vacuna_polio_d1_2_a_3_mes',
'pi_vacuna_polio_d2_4_a_5_mes',
'pi_vacuna_polio_d3_6_a_17_mes',
'pi_vacuna_polio_r1_18_mes',
'pi_vacuna_polio_r2_5_años',
'pi_vacuna_hepatitis_a_12_mes',
'pi_vacuna_hepatitis_b_rn',
'pi_vacuna_influenza_estacional_6_mes',
'pi_vacuna_neumococo_d1_2_mes',
'pi_vacuna_neumococo_d2_4_mes',
'pi_vacuna_neumococo_d3_12_mes',
'pi_vacuna_rotavirus_d1_2_mes',
'pi_vacuna_rotavirus_d2_4_mes',
'pi_vacuna_fiebre_amarilla_18_mes',
'pi_vacuna_dpt_d1_18_mes',
'pi_vacuna_dpt_d2_5_anios',
'pi_vacuna_pentavalente_d1_2_mes',
'pi_vacuna_pentavalente_d2_4_mes',
'pi_vacuna_pentavalente_d3_6_mes',
'pi_vacuna_srp_d1_12_mes',
'pi_vacuna_srp_d2_5_anios',
'pi_vacuna_varicela_12_mes',
'pi_atencion_medica_1_mes',
'pi_atencion_medica_4_a_5_mes',
'pi_atencion_medica_12_a_18_mes',
'pi_atencion_medica_24_a_29_mes',
'pi_atencion_medica_3_años',
'pi_atencion_medica_4_anios',
'pi_atencion_enfermeria_2_a_3_mes',
'pi_atencion_enfermeria_6_a_8_mes',
'pi_atencion_enfermeria_9_a_11_mes',
'pi_atencion_enfermeria_19_a_23_mes',
'pi_atencion_enfermeria_30_a_35_mes',
'pi_atencion_enfermeria_4_anios',
'pi_atencion_lactancia_1_a_6_mes',
'pi_tsh',
'pi_fluor_1_a_5_anios',
'pi_profilaxis_1_a_5_anios',
'pi_sellantes_3_anios',
'pi_higiene_bucal',
'pi_caries',
'pi_consulta_odontologica_6_mes_a_5_anios',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarprimera_infancia(array $datosprimera_infancia)
    {
        $pregunta = new PrimeraInfancia($datosprimera_infancia);
        $pregunta->save();
    }

    public function eliminar()
    {
        PrimeraInfancia::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}