<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInduccion extends Model
{
    use HasFactory;

    protected $table = 'tipos_induccion';

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

    public function inducciones()
    {
        return $this->hasMany(Inducciones::class, 'id_tipo_induccion');
    }
}
