<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hogar extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'hogar';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'zona',
        'departamento',
        'municipio',
        'tipo',
        'barrio',
        'direccion',
        'geolocalizacion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function guardarHogar(array $datos): ?Hogar
    {
        try
        {
            $hogar = new Hogar([
                'id' => $datos['uuid'],
                'zona' => $datos['zona'],
                'cod_dpto' => $datos['cod_dpto'],
                'cod_mun' => $datos['cod_mun'],
                'tipo' => $datos['tipo'],
                'barrio' => $datos['barrio'],
                'direccion' => $datos['direccion'],
                'geolocalizacion' => $datos['geolocalizacion'],
            ]);
            $hogar->save();

            return $hogar;
        }
        catch (\Throwable $th)
        {
            return Hogar::find($datos['uuid']);
        }
    }

    public function integrantes()
    {
        return $this->hasMany(Integrantes::class, 'hogar_id');
    }

    //? relacion con municipios y deperatamentos
}
