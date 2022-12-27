<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animales extends Model
{
    use HasFactory;
    protected $table = 'animales';

    protected $fillable = [
        'hogar_id',
        'gatos',
        'gatos_cuantos',
        'gatos_vacunados',
        'perros',
        'perros_cuantos',
        'perros_vacunados',
        'equinos',
        'equinos-cuantos',
        'equinos_vacunados',
        'aves',
        'porcinos',
        'porcinos_cuantos',
        'porcinos_vacunados',
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
        Animales::where('hogar_id', '=', $this->hogar_id)->delete();
    }
}

