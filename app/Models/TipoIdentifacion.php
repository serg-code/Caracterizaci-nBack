<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIdentifacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_identificacion';

    protected $fillable = [
        'id',
        'tipo_identificacion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
