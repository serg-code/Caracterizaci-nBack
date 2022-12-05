<?php

namespace App\Models\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accidentes extends Model
{
    use HasFactory;
    protected $table = 'accidentes';

    protected $fillable = [
        'id_integrante',
        'accidentes_transito',
        'tipo_lesion',
        'accidentes_laborales',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardaraccidentes(array $datosaccidente)
    {
        $pregunta = new accidentes($datosaccidente);
        $pregunta->save();
    }
}

