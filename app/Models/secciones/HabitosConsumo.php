<?php

namespace App\Models\secciones;

use App\Models\Hogar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabitosConsumo extends Model
{
    use HasFactory;

    protected $table = 'habitos_consumo';

    protected $fillable = [
        'hogar_id',
        'consumo_huevos_crudos',
        'alimentos_perecederos',
        'hierve_leche',
        'lavar_frutas_verduras',
        'alimentos_crudos_separados_cocidos',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hogar()
    {
        return $this->belongsTo(Hogar::class, 'hogar_id');
    }
}
