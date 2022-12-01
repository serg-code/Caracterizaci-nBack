<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'integrantes';
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
    protected $fillable = [
        'id',
        'tipo_identificacion',
        'identificacion',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'rh',
        'estado_civil',
        'hogar_id',
        'telefono',
        'correo',
        'cabeza_familia',
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

    public static function guardarIntegrante(array $datos): Integrantes
    {
        $integrante = Integrantes::find($datos['uuid'] ?? '');

        if (empty($integrante))
        {
            $integrante = new Integrantes($datos);
            $integrante->save();
            return $integrante;
        }

        return $integrante;
    }
}
