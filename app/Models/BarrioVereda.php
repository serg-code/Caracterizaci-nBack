<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarrioVereda extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'Barrio_vereda';
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'id_municipio',
        'tipo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function municipio()
    {
        return $this->hasMany(Municipio::class, 'id_municipio');
    }

    public function actualizar(array $datosActualizar)
    {
        $this->update($datosActualizar);
    }

    public function scopeSearch(Builder $query, $dato)
    {
        return $query->join('codigo_dane', 'barrio_vereda.id_municipio', '=', 'municipios.codigo_dane')
            ->where('municipios.nombre', 'like', "%$dato%");
    }
}
