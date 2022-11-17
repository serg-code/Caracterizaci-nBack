<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    public function FunctionName()
    {
        return sizeof($this->pregunta) === 0;
    }

    protected $table = 'secciones';

    protected $fillable = [
        'hogar_id',
        'ref_seccion',
    ];
}
