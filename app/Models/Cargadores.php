<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Cargadores extends Model
{
    protected $fillable = [
        "id",
        "id_usuario",
        "nombre",
        "procesarErrores",
    ];

    protected $hidden = [
        "sql",
        "nombre_tabla",
        "delete_temp",
        "updated_at",
    ];

    public function columnas()
    {
        return $this->hasMany(CargadoresColumns::class, 'id_cargador', 'id');
    }
    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id', 'id_usuarios');
    }
}