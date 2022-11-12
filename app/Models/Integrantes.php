<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{
    use HasFactory;

    protected $table = 'integrantes';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'tipo_identificacion',
        'identificacion',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'rh',
        'estado_civil',
        'hogar_id',
        'telefono',
        'correo',
        'cabeza_familia',
    ];

    public function hogar()
    {
        return $this->hasMany(Hogar::class, 'hogar_id');
    }
}
