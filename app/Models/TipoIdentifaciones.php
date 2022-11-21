<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIdentifaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tipo_identificacion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
