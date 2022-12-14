<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrio_vereda extends Model
{
    use HasFactory;
    protected $table = 'Barrio_vereda';
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'id_municipio',
        'tipo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
