<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargadoresColumns extends Model
{

    protected $table = 'cargadores_columns';
    protected $fillable = [
        "id_cargador",
        "nombre",
        "json",
    ];

    public function cargador()
    {
        return $this->belongsTo(Cargadores::class, 'id', 'id_cargador');
    }
}