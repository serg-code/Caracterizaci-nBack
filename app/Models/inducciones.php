<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inducciones extends Model
{
    use HasFactory;
    protected $table = 'inducciones';


            protected $fillable = [
                'Primera Infancia',
                'Infancia',
                'Adolescencia',
                'Juventud',
                'Adultez',
                'Vejez',
                'Preconcepcional',
                'Maternoperinatal',
                'Sin curso vida'
            ];

            protected $hidden = [
                'deleted_at',
            ];

            public static function Guardarinducciones(array $datos)
            {
                $parentesco = new inducciones($datos);
                $parentesco->save();
            }
        }
