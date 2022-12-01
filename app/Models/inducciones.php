<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inducciones extends Model
{
    use HasFactory;

    protected $table = 'inducciones';

    protected $fillable = [
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
        'created_at',
        'updated_at',
    ];

    public static function Guardarinducciones(array $datos)
    {
        $parentesco = new inducciones($datos);
        $parentesco->save();
    }
}
