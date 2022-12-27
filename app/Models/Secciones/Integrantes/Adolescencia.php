<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adolescencia extends Model
{
    use HasFactory;
    protected $table = 'adolescencia';

    protected $fillable = [
        'adol_peso',
'adol_talla',
'adol_imc',
'adol_asesoria_anticonceptiva_12_a_17_anios',
'adol_planifica',
'adol_metodo_planficica',
'adol_desde_cuando_planifica',
'adol_razon_no_planifica',
'adol_atencion_medica_12_16_anios',
'adol_atencion_enfermeria_13_17_anios',
'adol_salud_bucal_12_a_17_anios',
'adol_fluor_12_a_17_anios',
'adol_profilaxis_12_a_17_anios',
'adol_sellantes_12_a_17_anios',
'adol_supragingival_12_a_17_anios',
'adol_vacunacion_12_a_17_anios',
'adol_vacuna_fiebre_amarilla',
'adol_vacuna_vph',
'adol_vacuna_toxoide_tetanico',

         
            ];
        
            protected $hidden = [
                'created_at',
                'updated_at',
            ];
            public function pregunta()
            {
                return $this->belongsTo(Pregunta::class, 'ref_campo');
            }
        
            public static function guardaradolescencia(array $datosadolescencia)
            {
                $pregunta = new Infancia($datosadolescencia);
                $pregunta->save();
            }
        
            public function eliminar()
            {
                Adolescencia::where('id_integrante', '=', $this->id_integrante)->delete();
            }
        }
