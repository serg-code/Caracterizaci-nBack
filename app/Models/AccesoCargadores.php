<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class AccesoCargadores extends Model
{
    use HasFactory;

    protected $table = 'acceso_reporte';

    protected $fillable = [
        'id_cargador',
        'role_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cargador()
    {
        return $this->belongsTo(Cargadores::class, 'id', 'id_cargador');
    }

    public function rol()
    {
        return $this->belongsTo(Role::class, 'id', 'role_id');
    }
}