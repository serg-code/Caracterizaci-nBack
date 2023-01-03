<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adultez extends Model
{
    use HasFactory;
    protected $table = 'adultez';

    protected $fillable = [
        'adul_valoracion_peso',
        'adul_valoracion_talla',
'adul_imc',
'adul_asesoria_anticoncepcion',
'adul_planifica',
'adul_metodo_planifica',
'adul_desde_cuando_planifica',
'adul_razones_no_planifica',
'adul_parejas_sexuales_al_año',
'adul_enfermedad_cronica',
'adul_cual_enfermedad_cronica',
'adul_seguimiento_enfermedad_cronica',
'adul_control_adultos',
'adul_antecedentes_diabetes',
'adul_antecedentes_hipertension',
'adul_antecedentes_colesterol',
'adul_perimetro_abdominal',
'adul_atencion_medica',
'adul_salud_bucal',
'adul_cancer_cuello_uterino_adn_vph',
'adul_cancer_cuello_uterino_adn_vph_positivo',
'adul_colposcopia_cervico_uterina',
'adul_biopsia_cervico_uterina',
'adul_cancer_mama_mamografia',
'adul_cancer_mama_valoracion_clinica',
'adul_cancer_prostata',
'adul_vasectomia',
'adul_esterilizacion_femenina',
'adul_vias_esterilizacion',
'adul_profilaxis',
'adul_detartraje_supragingival',
'adul_fiebre_amarilla',
'adul_prueba_vih',

         
            ];
        
            protected $hidden = [
                'created_at',
                'updated_at',
            ];
            public function pregunta()
            {
                return $this->belongsTo(Pregunta::class, 'ref_campo');
            }
        
            public static function guardaradultez(array $datosadultez)
            {
                $pregunta = new Infancia($datosadultez);
                $pregunta->save();
            }
        
            public function eliminar()
            {
                Adultez::where('id_integrante', '=', $this->id_integrante)->delete();
            }
        }