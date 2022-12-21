<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animales extends Model
{
    use HasFactory;
    protected $table = 'animales';

    protected $fillable = [
        'gatos',
        'gatos',
        'gatos',
        'perros',
        'perros',
        'perros',
        'equinos',
        'equinos',
        'equinos',
        'aves',
        'porcinos',
        'porcinos',
        'porcinos',
        'animales_no_rabia',
        'animales_si_rabia',
        

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

