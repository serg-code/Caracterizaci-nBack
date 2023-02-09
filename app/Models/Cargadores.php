<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cargadores extends Model
{

    protected $table = 'cargadores';

    protected $fillable = [
        "id",
        "id_usuario",
        "nombre",
        "procesarErrores",
    ];

    protected $hidden = [
        "sql",
        "delete_temp",
        "updated_at",
    ];

    public function columnas()
    {
        return $this->hasMany(CargadoresColumns::class, 'id_cargador', 'id');
    }

    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function intentosRealizados()
    {
        return Intentos::where('id_cargador', $this->id)->count();
    }

    public function intentos()
    {
        return $this->hasMany(Intentos::class, 'id_cargador');
    }

    public function scopeSearch(Builder $query, $dato)
    {
        return $query->where('id', $dato)->orWhere('nombre', 'like', "%$dato%");
    }
}