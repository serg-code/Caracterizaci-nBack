<?php

namespace App\Models\Tipos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIdentificacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_identificacion';

    protected $fillable = [
        'id',
        'tipo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
