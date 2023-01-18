<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    use HasFactory;
    protected $table = 'Cie10';
    protected $primaryKey = 'codigo';
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'descripcion',
        'altoCosto',
        'patologia',
        'genero',
        'eMin',
        'eMax',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function Guardarinducciones(array $datos)
    {
        $parentesco = new Cie10($datos);
        $parentesco->save();
    }

    public function scopeSearch(Builder $query, $dato): Builder
    {
        return $query->where('codigo', 'like', "%$dato%")
            ->orWhere('descrip', 'like', "%$dato%");
    }
}
