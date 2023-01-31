<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variables extends Model
{
    use HasFactory;
    protected $table = 'variables';

    protected $fillable = [
        'id',
        'reporte_id',
        'ref',
        'tipo',
        'label',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function reporte()
    {
        return $this->belongsTo(Reportes::class, 'id', 'reporte_id');
    }
}
