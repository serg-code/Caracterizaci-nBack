<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

    protected $table = 'parentescos';

    protected $fillable = [
        'id',
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function GuardarParentesco(array $datos)
    {
        $parentesco = new Parentesco($datos);
        $parentesco->save();
        return $parentesco;
    }
}
