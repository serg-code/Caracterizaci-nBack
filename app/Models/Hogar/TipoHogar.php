<?php

namespace App\Models\Hogar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHogar extends Model
{
    use HasFactory;

    protected $table = 'tipo_hogar';

    protected $fillable = [
        'id',
        'tipo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hogar()
    {
        return $this->hasMany(Hogar::class, 'tipo');
    }
}
