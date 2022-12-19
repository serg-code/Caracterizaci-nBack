<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;

    public function __construct()
    {
        $this->valor = 0;
    }

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

    public static function guardarOpcion(array $datosOpcion)
    {
        $pregunta = new Opcion($datosOpcion);
        $pregunta->save();
    }
}
