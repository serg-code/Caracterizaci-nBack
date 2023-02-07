<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargadoresColumn extends Model
{
    protected $fillable = [
        "id_cargador", 
        "nombre",
        "json",
    ];

    public function cargador()
    {
        return $this->belongsTo(cargadores::class, 'id', 'id_cargador');
    }
}