<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infancia extends Model
{
    use HasFactory;

    protected $table = 'infancia';

    protected $fillable = [
        'id_integrante',
        'in_peso',
        'in_talla',
        'in_desarrollo_lenguaje',
        'in_desarrollo_motora',
        'in_desarrollo_conducta',
        'in_desarrollo_probelmas_visuales',
        'in_desarrollo_problemas_auditivos',
        'in_desparasitado',
        'in_carnet_vacunacion',
        'in_vacuna_dpt_r2',
        'in_vacuna_polio_r2',
        'in_vacuna_srp_r1',
        'in_vacuna_fiebre_amarilla',
        'in_vacuna_vph_d1',
        'in_vacuna_vph_d2',
        'in_vacuna_vph_d3',
        'in_caries',
        'in_consulta_odontologica',
        'in_uso_seda_dental',
        'in_fluor',
        'in_profilaxis',
        'in_sellantes',
        'in_atencion_medica',
        'in_atencion_enfermeria',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarinfancia(array $datosinfancia)
    {
        $pregunta = new Infancia($datosinfancia);
        $pregunta->save();
    }

    public function eliminar()
    {
        Infancia::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}
