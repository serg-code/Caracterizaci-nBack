<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inducciones extends Model
{
    use HasFactory;
    protected $table = 'inducciones';


            protected $fillable = [
                'primera infancia',
                'infancia',
                'adolescencia',
                'juventud',
                'adultez',
                'vejez',
                'preconcepcional',
                'maternoperinatal',
                'sin curso vida'
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
