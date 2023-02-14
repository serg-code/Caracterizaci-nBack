<?php

namespace App\Models\Hogar;

use App\Models\Departamento;
use App\Models\Integrantes;
use App\Models\MotivosNoResponde;
use App\Models\Municipio;
use App\Models\Respuesta;
use App\Models\secciones\FactoresProtectores;
use App\Models\secciones\HabitosConsumo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
        'id_usuario',
        'barrio_vereda_id',
        'zona',
        'cod_dpto',
        'cod_mun',
        'tipo',
        'puntaje_max',
        'puntaje_obtenido',
        'direccion',
        'geolocalizacion',
        'encuesta',
        'estado_registro',
        'realizo_encuesta',
        'motivos',
        'observaciones',
        'porcentaje',
        'color',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [];

    public static function guardarHogar(array $datos): ?Hogar
    {
        $hogar = Hogar::find($datos['id'] ?? 'uuid');

        if (empty($hogar)) {
            $hogar = new Hogar($datos);
            $hogar->save();

            return $hogar;
        }

        return $hogar;
    }

    public static function actualizarHogar(array $datos): ?Hogar
    {
        $hogar = Hogar::find($datos['id'] ?? 'uuid');
        if (!empty($hogar)) {
            $hogar->update([
                'barrio_vereda_id' => $datos['barrio_vereda_id'] ?? $hogar->barrio_vereda_id,
                'zona' => $datos['zona'] ?? $hogar->zona,
                'cod_dpto' => $datos['cod_dpto'] ?? $hogar->cod_dpto,
                'cod_mun' => $datos['cod_mun'] ?? $hogar->cod_mun,
                'tipo' => $datos['tipo'] ?? $hogar->tipo,
                'direccion' => $datos['direccion'] ?? $hogar->direccion,
                'geolocalizacion' => $datos['geolocalizacion'] ?? $hogar->geolocalizacion,
                'encuesta' => $datos['encuesta'] ?? $hogar->encuesta,
                'estado_registro' => $datos['estado_registro'] ?? $hogar->estado_registro,
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
        return $this->belongsTo(Departamento::class, 'cod_dpto');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'cod_mun');
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

    public function motivoNoResponde()
    {
        return $this->belongsTo(MotivosNoResponde::class, 'id', 'motivos');
    }

    public function scopeSearch(Builder $query, $dato): Builder
    {
        return $query
            ->join('departamentos', 'hogar.cod_dpto', '=', 'departamentos.codigo_dane')
            ->join('municipios', 'hogar.cod_mun', '=', 'municipios.codigo_dane')
            ->join('integrantes', 'hogar.id', '=', 'integrantes.hogar_id')
            ->orWhere('hogar.direccion', 'like', "%$dato%")
            ->orWhere('hogar.id', 'like', "%$dato%")
            ->orWhere('departamentos.nombre', 'like', "%$dato%")
            ->orWhere('municipios.nombre', 'like', "%$dato%")
            ->orWhere('integrantes.identificacion', 'like', "%$dato%")
            ->orWhere('integrantes.correo', 'like', "%$dato%");
    }

    public function scopeFechas(Builder $query, $fechaIncio, $fechaFIn = ''): Builder
    {
        $fechaIncioFiltro = Carbon::parse($fechaIncio);
        $fechaFinFiltro = $this->escojerDia($fechaFIn);
        $fechaFinFiltro->endOfDay();
        return $query->where('created_at', '>=', $fechaIncioFiltro)->where('created_at', '<=', $fechaFinFiltro);
    }

    private function escojerDia(string $fecha)
    {
        if (empty($fecha)) {
            return Carbon::now();
        }

        return Carbon::parse($fecha);
    }
}