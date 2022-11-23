<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIdentifacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_identificacion';

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'tipo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function guardarIdentificacion(array $datos)
    {
        $tipoIdentificacion = new TipoIdentifacion($datos);
        $tipoIdentificacion->save();
    }

    public function integrantes()
    {
        return $this->hasMany(Integrantes::class, 'tipo_identificacion');
    }
}
