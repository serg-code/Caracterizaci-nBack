<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $primaryKey = 'ref_campo';

    protected $keyType = 'string';

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

    public function opciones()
    {
        return $this->hasMany(Opcion::class, 'ref_campo');
    }

    public static function guardarPregunta($datos)
    {
        $preguntadb = DB::selectOne("SELECT * FROM preguntas WHERE ref_campo=?", [$datos['ref_campo']]);

        if (empty($preguntadb))
        {
            $pregunta = new Pregunta($datos);
            $pregunta->save();
        }

        if (!empty($datos['opciones']))
        {
            foreach ($datos['opciones'] as $opcion)
            {
                $datosOpcion = [
                    'ref_campo' => $datos['ref_campo'],
                    'pregunta_opcion' => $opcion['pregunta_opcion'],
                ];
                $opciondb = new Opcion($datosOpcion);
                $opciondb->save();
            }
        }
    }

    public static function PreguntasOpciones(): ?array
    {
        $preguntas = Pregunta::all();
        return Pregunta::FormatoRespuesta($preguntas);
    }

    public static function FormatoRespuesta($preguntas): ?array
    {
        $listado = [];

        foreach ($preguntas as $pregunta)
        {
            //obtener las opciones de las preguntas
            $pregunta->opciones;
            $listado["$pregunta->ref_campo"] = (object) $pregunta;
        }
        return $listado;
    }

    public static function ObtenerPregunta(string $refcampo = ''): array|Pregunta
    {
        $pregunta = Pregunta::where('ref_campo', '=', $refcampo)->first();

        if (empty($pregunta))
        {
            return [];
        }

        return $pregunta;
    }
}
