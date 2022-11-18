<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $fillable = [
        'ref_campo',
        'ref_seccion',
        'descripcion',
        'tipo',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'ref_seccion');
    }

    public static function guardarPregunta(array $datos)
    {
        $pregunta = new Pregunta($datos);
        $pregunta->save();

        if (!empty($datos['opciones']))
        {
            foreach ($datos['opciones'] as $opcion)
            {
                $datos = [
                    'ref_campo' => $pregunta->ref_campo,
                    'pregunta_opcion' => $opcion['pregunta_opcion'],
                ];
                $opciondb = new Opcion($datos);
                $opciondb->save();
            }
        }
    }
}
