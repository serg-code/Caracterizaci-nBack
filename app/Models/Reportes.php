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
        'nombre',
        'user_id',
    ];

    protected $hidden = [
        'query',
        'created_at',
        'updated_at',
    ];

    public function variables()
    {
        return $this->hasMany(Variables::class, 'reporte_id', 'id');
    }
}
