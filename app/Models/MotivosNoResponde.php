<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivosNoResponde extends Model
{
    use HasFactory;

    protected $table = 'motivos_no_responde';

    protected $fillable = [
        'id',
        'motivos',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function GuardarMotivosNoResponde(array $datos)
    {
        $parentesco = new MotivosNoResponde($datos);
        $parentesco->save();
    }
}
