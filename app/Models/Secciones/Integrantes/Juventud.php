<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juventud extends Model
{
    use HasFactory;
    protected $table = 'juventud';

    protected $fillable = [
        'id_integrante',
        'juv_cancer_cuello_uterino',
        'juv_colposcopia',
        'juv_bioscopia_cervico',
        'juv_examen_seno',
        'juv_control_medico',
        'juv_planifica',
        'juv_metodo_planifica',
        'juv_tiempo_metodo',
        'juv_asesoria_anticoncepcion',
        'juv_razones_no_planifica',
        'juv_parejas_sexuales_al_anio',
        'juv_atencion_medica',
        'juv_atencion_enfermeria',
        'juv_salud_vocal',
        'juv_vasectomia',
        'juv_esterilizacion_femenina',
        'juv_vias_esterilizacion',
        'juv_profilaxis',
        'juv_detartraje_supragingival',
        'juv_prueba_vih',
        'juv_antecedentes_diabetes',
        'juv_antecedentes_hipertension',
        'juv_alteracion_colesterol',
        'juv_perimetro_abdominal',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarjuventud(array $datosjuventud)
    {
        $pregunta = new Juventud($datosjuventud);
        $pregunta->save();
    }

    public function eliminar()
    {
        Juventud::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}
