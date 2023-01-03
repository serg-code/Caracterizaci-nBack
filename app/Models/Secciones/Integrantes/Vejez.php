<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vejez extends Model
{
    use HasFactory;
    protected $table = 'adultez';

    protected $fillable = [
        'id_integrante',
        've_valoracion_peso',
        've_valoracion_talla',
        've_imc',
        've_asesoria_anticoncepcion',
        've_planifica',
        've_metodo_planifica',
        've_desde_cuando_planifica',
        've_razones_no_planifica',
        've_parejas_sexuales_al_año',
        've_enfermedad_cronica',
        've_cual_enfermedad_cronica',
        've_seguimiento_enfermedad_cronica',
        've_control_adultos',
        've_antecedentes_diabetes',
        've_antecedentes_hipertension',
        've_alteracion_colesterol',
        've_perimetro_abdominal',
        've_salud_medica',
        've_salud_bucal',
        've_cancer_cuello_uterino_adn_vph',
        've_cancer_cuello_uterino_adn_vph_positivo',
        've_colposcopia_uterina',
        've_bioscopia_uterina',
        've_cancer_mama_mamografia',
        've_cancer_mama_valoracion_clinica',
        've_cancer_prostata_psa',
        've_cancer_prostata_rectal',
        've_vasectomia',
        've_esterilizacion_femenina',
        've_vias_esterilizacion',
        've_profilaxis',
        've_detartraje_supragingival',
        've_vacuna_fiebre_amarilla',
        've_vacuna_influenza',
        've_prueba_vih',
                 
            ];
        
            protected $hidden = [
                'created_at',
                'updated_at',
            ];
            public function pregunta()
            {
                return $this->belongsTo(Pregunta::class, 'ref_campo');
            }
        
            public static function guardarvejez(array $datosvejez)
            {
                $pregunta = new Vejez($datosvejez);
                $pregunta->save();
            }
        
            public function eliminar()
            {
                Vejez::where('id_integrante', '=', $this->id_integrante)->delete();
            }
        }
