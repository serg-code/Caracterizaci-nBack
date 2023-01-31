<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class AccesoReporte extends Model
{
    use HasFactory;

    protected $table = 'acceso_reporte';

    protected $fillable = [
        'reporte_id',
        'role_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function reporte()
    {
        return $this->belongsTo(Reportes::class, 'id', 'reporte_id');
    }

    public function rol()
    {
        return $this->belongsTo(Role::class, 'id', 'role_id');
    }
}
