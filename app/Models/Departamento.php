<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $primaryKey = 'codigo_dane';

    protected $keyType = 'string';

    protected $fillable = [
        'codigo_dane',
        'nombre',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function GuardarDepartamento(array $datos)
    {
        $departamento = new Departamento($datos);
        $departamento->save();
    }

    //relacion 1:n
    public function Municipios()
    {
        return $this->hasMany(Municipio::class, 'cod_dpto');
    }

    public function DepartamentoHogar()
    {
        return $this->hasMany(Hogar::class, 'cod_dpto');
    }
}
