<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intentos extends Model
{
    protected $fillable = [
        'id',
        "id_usuario",
        "id_cargador",
        'nombre_archivo_original',
        "nombre_archivo",
    ];

    public function cargador()
    {
        return $this->hasMany(Cargadores::class, 'id_cargador', 'cargador');
    }
    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id', 'usuarios');
    }
}