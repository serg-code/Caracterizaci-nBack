<?php

namespace App\Models\Hogar;

use App\Models\Departamento;
use App\Models\Integrantes;
use App\Models\Municipio;
use App\Models\Respuesta;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hogar extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'hogar';
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'zona',
        'cod_dpto',
        'cod_mun',
        'tipo',
        'puntaje_max',
        'puntaje_obtenido',
        'barrio',
        'direccion',
        'geolocalizacion',
        'encuesta',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function guardarHogar(array $datos): ?Hogar
    {
        $hogar =  Hogar::find($datos['id'] ?? 'uuid');

        if (empty($hogar))
        {
            $hogar = new Hogar($datos);
            $hogar->save();

            return $hogar;
        }

        return $hogar;
    }

    public static function actualizarUsuario(array $datos): ?Hogar
    {
        $hogar =  Hogar::find($datos['id'] ?? 'uuid');

        if (!empty($hogar))
        {
            $hogar->update([
                'zona' => $datos['zona'] ?? $hogar->zona,
                'cod_dpto' => $datos['cod_dpto'] ?? $hogar->cod_dpto,
                'cod_mun' => $datos['cod_mun'] ?? $hogar->cod_mun,
                'tipo' => $datos['tipo'] ?? $hogar->tipo,
                'barrio' => $datos['barrio'] ?? $hogar->barrio,
                'direccion' => $datos['direccion'] ?? $hogar->direccion,
                'geolocalizacion' => $datos['geolocalizacion'] ?? $hogar->geolocalizacion,
                'encuesta' => $datos['encuesta'] ?? $hogar->encuesta,
            ]);

            return $hogar;
        }

        return null;
    }

    public function integrantes()
    {
        return $this->hasMany(Integrantes::class, 'hogar_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'hogar_uuid');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'codigo_dane');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'codigo_dane');
    }

    public function factoresProtectores()
    {
        return $this->hasMany(FactoresProtectores::class, 'hogar_id');
    }

    public function habitosConsumo()
    {
        return $this->hasMany(HabitosConsumo::class, 'hogar_id');
    }

    public function tipoHogar()
    {
        return $this->belongsTo(TipoHogar::class, 'tipo');
    }
}
