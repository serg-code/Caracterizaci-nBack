<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguridadAlimentaria extends Model
{
    use HasFactory;
    protected $table = 'vivienda';

    protected $fillable = [
'animales_silvestres',
'consume_cerdo_res_pollo',
'consume_huevos',
'consume_frijol_lentejas',
'consume_lacteos',
'consume_harinas',
'consume_verduras',
'consume_Frutas_frescas',
'consume_enlatados',
'consume_Platano_yuca',
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
        HabitosConsumo::where('hogar_id', '=', $this->hogar_id)->delete();
    }
}
