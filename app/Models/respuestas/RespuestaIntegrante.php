<?php

namespace App\Models\respuestas;

use App\Models\Integrantes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaIntegrante extends Model
{
    use HasFactory;

    protected $table = 'respuestas_integrantes';

    protected $fillable = [
        'id',
        'hogar_uuid',
        'id_integrante',
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

    public function integrante()
    {
        return $this->belongsTo(Integrantes::class, 'id');
    }
}
