<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hogar extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'hogar';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'zona',
        'departamento',
        'municipio',
        'tipo',
        'barrio',
        'direccion',
        'geolocalizacion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
