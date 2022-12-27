<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguridadAlimentaria extends Model
{
    use HasFactory;
    protected $table = 'vivienda';

    protected $fillable = [
        'hogar_id',
'falto_dinero',
'animales_silvestres',
'consume_cerdo_res_pollo',
'consume_huevos',
'consume_frijol_lentejas',
'consume_lacteos',
'consume_harinas',
'consume_verduras',
'consume_frutas_frescas',
'consume_enlatados',
'consume_platano_yuca',
'consume_gaseosas',
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
        SeguridadAlimentaria::where('hogar_id', '=', $this->hogar_id)->delete();
    }
}
