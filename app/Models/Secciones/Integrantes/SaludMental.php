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

    public static function guardarcuidado_domiciliarios(array $datoscuidado_domiciliarios)
    {
        $pregunta = new CuidadoDomiciliario($datoscuidado_domiciliarios);
        $pregunta->save();
    }

    public function eliminar()
    {
        CuidadoDomiciliario::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}
