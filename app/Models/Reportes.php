<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;
    protected $table = 'reportes';

    protected $fillable = [
      'id',
        'descripcion',
        'columns',
        'query',
        'nombre',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
