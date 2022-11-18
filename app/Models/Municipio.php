<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';
    protected $primaryKey = 'codigo_dane';
    protected $keyType = 'string';

    protected $fillable = [
        'codigo_dane',
        'nombre',
        'cod_dpto',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //relacion de n:1
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'cod_dpto');
    }
}
