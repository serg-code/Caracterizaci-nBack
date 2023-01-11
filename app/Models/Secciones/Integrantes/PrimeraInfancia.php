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
        'pi_valoracion_nutricional',
        'pi_desarrollo_lenguaje',
        'pi_desarrollo_motora',
        'pi_desarrollo_conducta',
        'pi_desarrollo_probelmas_visuales',
        'pi_desarrollo_problemas_auditivos',
        'pi_desparasitado',
        'pi_hospitalizacion_nacer',
        'pi_carnet_vacunacion',
        'pi_vacuna_bcg_rn',
        'pi_vacuna_polio_d1',
        'pi_vacuna_polio_d2',
        'pi_vacuna_polio_d3',
        'pi_vacuna_polio_r1',
        'pi_vacuna_polio_r2',
        'pi_vacuna_hepatitis_a',
        'pi_vacuna_hepatitis_b_rn',
        'pi_vacuna_influenza_estacional',
        'pi_vacuna_neumococo_d1',
        'pi_vacuna_neumococo_d2',
        'pi_vacuna_neumococo_d3',
        'pi_vacuna_rotavirus_d1',
        'pi_vacuna_rotavirus_d2',
        'pi_vacuna_fiebre_amarilla',
        'pi_vacuna_dpt_d1',
        'pi_vacuna_dpt_d2',
        'pi_vacuna_pentavalente_d1',
        'pi_vacuna_pentavalente_d2',
        'pi_vacuna_pentavalente_d3',
        'pi_vacuna_srp_d1',
        'pi_vacuna_srp_d2',
        'pi_vacuna_varicela',
        'pi_atencion_medica',
        'pi_atencion_medica',
        'pi_atencion_medica',
        'pi_atencion_medica',
        'pi_atencion_medica',
        'pi_atencion_medica',
        'pi_atencion_enfermeria',
        'pi_atencion_enfermeria',
        'pi_atencion_enfermeria',
        'pi_atencion_enfermeria',
        'pi_atencion_enfermeria',
        'pi_atencion_enfermeria',
        'pi_atencion_lactancia',
        'pi_tsh',
        'pi_fluor',
        'pi_profilaxis',
        'pi_sellantes',
        'pi_higiene_bucal',
        'pi_caries',
        'pi_consulta_odontologica',

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
