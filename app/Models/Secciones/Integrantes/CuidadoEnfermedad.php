<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuidadoEnfermedad extends Model
{
    use HasFactory;

    protected $table = 'cuidado_enfermedades';

    protected $fillable = [
        'id_integrante',
        'cancer',
        'artritis_remautidea',
        'vih_sida',
        'hemofilia',
        'insuficiencia_renal',
        'fuma',
        'actividad_fisica',
        'vacuna_fiebre_amarilla',
        'diabetes',
        'hipertencion_trimestral',
        'diabetes_trimestral',
        'tension_sistolica',
        'tension_diastolica',
        'hemoglobina_glococilada',
        'enfermedades_costosas',
        'parejas_sexuales_año',
        'ha_estado_embarazada',
        'cuantos_embarazos_ha_tenido',
        'hijos_muertos_parto_natural',
        'hijos_vivos_parto_natural',
        'hijos_muertos_por_cesarea',
        'hijos_vivos_por_cesarea',
        'cuantos_abortos',
        'cuantos_gemelos_multiples',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarcuidado_enfermedades(array $datoscuidado_enfermedades)
    {
        $pregunta = new CuidadoEnfermedad($datoscuidado_enfermedades);
        $pregunta->save();
    }

    public function eliminar()
    {
        CuidadoEnfermedad::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}
