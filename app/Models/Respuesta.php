<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table = 'respuestas';

    protected $fillable = [
        'hogar_uuid',
        'ref_seccion',
        'ref_campo',
        'puntaje',
        'pregunta',
        'respuesta',
    ];

    public function hogar()
    {
        return $this->belongsTo(Hogar::class, 'hogar_uuid');
    }
}
