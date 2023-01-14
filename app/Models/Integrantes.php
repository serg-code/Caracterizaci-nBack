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
            $integrante->update([
                'id' => $datos['id'] ?? $integrante->id,
                'hogar_id' => $datos['hogar_id'] ?? $integrante->hogar_id,
                'tipo_identificacion' => $datos['tipo_identificacion'] ?? $integrante->tipo_identificacion,
                'identificacion' => $datos['identificacion'] ?? $integrante->identificacion,
                'primer_nombre' => $datos['primer_nombre'] ?? $integrante->primer_nombre,
                'segundo_nombre' => $datos['segundo_nombre'] ?? $integrante->segundo_nombre,
                'primer_apellido' => $datos['primer_apellido'] ?? $integrante->primer_apellido,
                'segundo_apellido' => $datos['segundo_apellido'] ?? $integrante->segundo_apellido,
                'rh' => $datos['rh'] ?? $integrante->rh,
                'estado_civil' => $datos['estado_civil'] ?? $integrante->estado_civil,
                'telefono' => $datos['telefono'] ?? $integrante->telefono,
                'correo' => $datos['correo'] ?? $integrante->correo,
                'cabeza_familia' => $datos['cabeza_familia'] ?? $integrante->cabeza_familia,
                'puntaje_obtenido' => $datos['puntaje_obtenido'] ?? $integrante->puntaje_obtenido,
                'puntaje_max' => $datos['puntaje_max'] ?? $integrante->puntaje_max,
                'encuesta' => $datos['encuesta'] ?? $integrante->encuesta,
                'estado_registro' => $datos['estado_registro'] ?? $integrante->estado_registro,
                'fecha_nacimiento' => $datos['fecha_nacimiento'] ?? $integrante->fecha_nacimiento,
            ]);
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
