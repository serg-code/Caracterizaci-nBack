<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Integrantes extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'integrantes';
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'hogar_id',
        'id_usuario',
        'tipo_identificacion',
        'identificacion',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'sexo',
        'rh',
        'estado_civil',
        'telefono',
        'correo',
        'cabeza_familia',
        'puntaje_obtenido',
        'puntaje_max',
        'estado_registro',
        'porcentaje',
        'color',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hogar()
    {
        return $this->hasMany(Hogar::class, 'id');
    }

    public function tipoIdentificacion()
    {
        return $this->belongsTo(TipoIdentifacion::class, 'tipo_identificacion');
    }

    public function inducciones()
    {
        return $this->hasMany(Inducciones::class, 'id_integrante', 'id');
    }

    public static function guardarIntegrante(array $datos): Integrantes
    {
        $integrante = Integrantes::find($datos['id'] ?? '');

        if (empty($integrante))
        {
            $datos['puntaje_max'] = 180;
            $integrante = new Integrantes($datos);
            $integrante->save();
            return $integrante;
        }
    }

    public static function actualizarIntegrante(array $datos)
    {
        $integrante =  Integrantes::find($datos['id'] ?? 'uuid');

        if (!empty($integrante))
        {
            unset($datos['id']);
            $integrante->update($datos);
            return $integrante;
        }

        return null;
    }

    public function obtenerEdad(): int
    {
        return Carbon::createFromFormat('Y-m-d', $this->fecha_nacimiento)->age;
    }

    public function obtenerMesesEdad(): int
    {
        $fechaActual = now();
        $edad = $fechaActual->diff($this->fecha_nacimiento);
        return $edad->m + ($edad->y * 12);
    }

    public function scopeSearch(Builder $query, $busqueda): Builder
    {
        return $query->where('primer_nombre', '=', $busqueda)
            ->orWhere('segundo_nombre', '=', $busqueda)
            ->orWhere('primer_apellido', '=', $busqueda)
            ->orWhere('segundo_apellido', '=', $busqueda)
            ->orWhere('correo', '=', $busqueda);
    }
}
