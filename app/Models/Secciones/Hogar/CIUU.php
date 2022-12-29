<?php

namespace App\Models\Secciones\Hogar;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CIUU extends Model
{
    use HasFactory;
    protected $table = 'ciuu';
    protected $primaryKey = 'codigo';
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'descrip',
        'ind',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function scopeSearch(Builder $query, $dato): Builder
    {
        return $query->where('codigo', 'like', "%$dato%")
            ->orWhere('descrip', 'like', "%$dato%");
    }
}
