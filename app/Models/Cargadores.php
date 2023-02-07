<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cargadores extends Model
{
    protected $fillable = [
        "id",
        "id_usuario",
        "nombre",
        "sql",
        "delete_temp",
        "procesarErrores"
    ];

    public function columnas()
    {
        return $this->hasMany(CargadoresColumn::class, 'id_cargador', 'id');
    }
    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id', 'id_usuarios');
    }
}