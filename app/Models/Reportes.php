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
        'nombre',
        'descripcion',
        'id_usuario',
    ];

    protected $hidden = [
        'query',
        'created_at',
        'updated_at',
    ];

    public function variables()
    {
        return $this->hasMany(Variable::class, 'reporte_id', 'id');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function acceso()
    {
        return $this->hasMany(AccesoReporte::class, 'reporte_id', 'id');
    }
}
