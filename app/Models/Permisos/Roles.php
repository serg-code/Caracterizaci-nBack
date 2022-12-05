<?php

namespace App\Models\Permisos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'id',
        'name',
    ];

    protected $hidden = [
        'guard_name',
        'created_at',
        'updated_at',
    ];
}
