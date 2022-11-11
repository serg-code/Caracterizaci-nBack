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

    //relacion 1:n
    public function Municipios()
    {
        return $this->hasMany(Municipio::class, 'codigo_dane');
    }
}
