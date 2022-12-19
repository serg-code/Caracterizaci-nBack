<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificaionCiudadana extends Model
{
    use HasFactory;
    protected $table = 'identificacion_ciudadana';

    protected $fillable = [
        'grupo_etnia',
'grupo_atencion_especial',
'programas',
'cual_programa',
'seguridad_social',
'esta_estudiando',
'por_que',
'ocupacion_ingreso',
'discapacidad',
'ayudas_tenicas',
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

    public function eliminar()
    {
        CuidadoDomiciliario::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}