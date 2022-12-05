<?php

namespace App\Models\Tipos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInduccion extends Model
{
    use HasFactory;

    protected $table = 'tipos_induccion';

    protected $fillable = [
        'id',
        'curso_vida',
        'tipo_atencion',
        'genero',
        'edad_minima',
        'edad_maxima',
        'grupo_etario',
        'frecuencia',
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];
}
