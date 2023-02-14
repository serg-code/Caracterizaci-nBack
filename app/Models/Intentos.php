<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intentos extends Model
{
    protected $fillable = [
        'id',
        'id_usuario',
        'id_cargador',
        'nombre_archivo',
        'nombre_archivo_original',
        'cantidad_errores',
        'created_at'
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function cargador()
    {
        return $this->belongsTo(Cargadores::class, 'id_cargador', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}