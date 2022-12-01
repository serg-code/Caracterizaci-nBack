<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $table = 'secciones';
    protected $primaryKey = 'ref_seccion';
    protected $keyType = 'string';

    protected $fillable = [
        'ref_seccion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'ref_seccion');
    }
}
