<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificaionCiudadana extends Model
{
    use HasFactory;
    protected $table = 'identificacion_ciudadana';

    protected $fillable = [
        'id_integrante',
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

    public static function guardaridentificacion_ciudadana(array $datosidentificacion_ciudadana)
    {
        $pregunta = new IdentificaionCiudadana($datosidentificacion_ciudadana);
        $pregunta->save();
    }

    public function eliminar()
    {
        IdentificaionCiudadana::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}