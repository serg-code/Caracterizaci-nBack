<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inducciones extends Model
{
    use HasFactory;

    protected $table = 'inducciones';

    protected $fillable = [
        'id',
        'id_tipo_induccion',
        'id_integrante',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function Guardarinducciones(array $datos)
    {
        $parentesco = new inducciones($datos);
        $parentesco->save();
    }
}
