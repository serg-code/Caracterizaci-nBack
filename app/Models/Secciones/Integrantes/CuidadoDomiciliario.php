<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuidadoDomiciliario extends Model
{
    use HasFactory;

    protected $table = 'cuidado_domiciliarios';

    protected $fillable = [
        'id_integrante',
        'cuidados_domiciliarios',
        'diagnostico_principal',
        'causa',
        'fecha_inicio_domiciliario',
        'oxigeno_domiciliario',
        'plan_aprobado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardarcuidado_domiciliarios(array $datoscuidado_domiciliarios)
    {
        $pregunta = new CuidadoDomiciliario($datoscuidado_domiciliarios);
        $pregunta->save();
    }
}
