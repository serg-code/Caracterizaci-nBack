<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    use HasFactory;
    protected $table = 'vivienda';

    protected $fillable = [
        'hogar_id',
'encuesta_sisben',
'ficha_sisben',
'puntaje_sisben',
'nivel_sisben',
'tipos_vivienda',
'tipos_tenecia',
'servicios_sanitarios',
'tipos_alumbrado',
'dormitorios',
'humo_vivienda',
'fuentes_agua',
'tratamiento_agua',
'tipos_tratamiento_agua',
'tipos_disposicion_basura',
'reciclan',
'iluminacion_adecuada',
'ventilacion_adecuada',
'roedores',
'reservorios_agua',
'anjenos',
'tipos_insectos_vectores',
'conservacion_alimentos',
'actividad_productiva',
'ciuu',
'tipos_material_piso',
'tipos_material_techo',
'tipos_material_paredes',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hogar()
    {
        return $this->belongsTo(Hogar::class, 'hogar_id');
    }

    public function eliminar()
    {
        Vivienda::where('hogar_id', '=', $this->hogar_id)->delete();
    }
}
