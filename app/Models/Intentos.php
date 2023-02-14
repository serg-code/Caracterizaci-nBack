<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intentos extends Model
{
    protected $fillable = [
        'id',
        'id_usuario',
        'id_cargador',
        'nombre_archivo_original',
        'cantidad_errores',
        'created_at'
    ];

    protected $hidden = [
        'nombre_archivo',
        'updated_at',
    ];

    public function cargador()
    {
        return $this->belongsTo(Cargadores::class, 'id_cargador', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function scopeSearch(Builder $query, $dato): Builder
    {
        return $query
            ->join('cargadores', 'intentos.id_cargador', '=', 'cargadores.id')
            ->where('cargadores.nombre', 'like', "%$dato%");
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
            return now();
        }

        return Carbon::parse($fecha);
    }
}