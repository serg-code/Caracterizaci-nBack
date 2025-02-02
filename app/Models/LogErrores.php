<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogErrores extends Model
{
    protected $fillable = [
        'id',
        "texto_error",
        "ubicacion_error",
        "intento",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function intentos()
    {
        return $this->hasMany(Intentos::class, 'id', 'intento');
    }
}