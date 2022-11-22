<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;

    protected $table = 'opciones';

    protected $fillable = [
        'id',
        'ref_campo',
        'pregunta_opcion',
        'valor',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public function guardarPregunta(array $datosOpcion)
    {
        $pregunta = new Opcion($datosOpcion);
        $pregunta->save();
    }
}
