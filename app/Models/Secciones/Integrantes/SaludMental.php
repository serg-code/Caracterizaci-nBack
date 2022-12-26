<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaludMental extends Model
{
    use HasFactory;

    protected $table = 'salud_mental';

    protected $fillable = [
        'id_integrante',
        'depresion',
        'intento_suicidio',
        'esquizofrenia',
        'trastorno_afectivo',
        'bulimia',
        'anorexia',
        'tratamiento',
        'diagnostico',
        'violencia_fisica',
        'violencia_psicologica',
        'violencia_sexual',
        'violencia_institucional',
        'violencia_social',
        'violencia_gestacion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarsalud_mental(array $datossalud_mental)
    {
        $pregunta = new SaludMental($datossalud_mental);
        $pregunta->save();
    }

    public function eliminar()
    {
        SaludMental::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}

