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
        'id_integrante',
        'ref_campo',
        'puntaje',
        'pregunta',
        'respuesta',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hogar()
    {
        return $this->belongsTo(Hogar::class, 'hogar_uuid');
    }

    public function integrante()
    {
        return $this->belongsTo(Integrantes::class, 'id');
    }

    public function eliminarRespuestas()
    {
        RespuestaIntegrante::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}
