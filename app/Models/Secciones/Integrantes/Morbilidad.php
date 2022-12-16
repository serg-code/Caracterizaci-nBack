<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morbilidad extends Model
{
    use HasFactory;
    protected $table = 'morbilidad';

    protected $fillable = [
        'id_integrante',
            'enfermedad_cronica',
            'enfermedad_cronica',
            'controlada',
            'propiedades_respiratorio',
            'propiedades_piel',
            'enfermedades_congenitas',
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
