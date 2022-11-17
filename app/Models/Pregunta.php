<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    // public function __construct(
    //     public string $refCampo = '',
    //     public string $refSeccion = '',
    //     public string $descripcion = '',
    //     public string $tipo = '',
    //     public bool $estado = false
    // )
    // {
    // }

    protected $table = 'preguntas';

    protected $fillable = [
        'ref_campo',
        'ref_seccion',
        'descripcion',
        'tipo',
        'estado'
    ];
}
