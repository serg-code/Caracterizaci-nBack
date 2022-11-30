<?php

namespace App\Models\respuestas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaHogar extends Model
{
    use HasFactory;

    protected $table = 'respuestas_hogar';

    protected $fillable = [
        'id',
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
