<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortalidad extends Model
{
    use HasFactory;
    protected $table = 'vivienda';

    protected $fillable = [
        'hogar_id',
        'fallecido_familiar',
        'sexo_fallecido',
        'edad_fallecido',
        'causa_muerte',
        'fecha_muerte',
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
        Mortalidad::where('hogar_id', '=', $this->hogar_id)->delete();
    }
}
