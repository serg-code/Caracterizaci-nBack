<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

    protected $table = 'parentescos';

    protected $primaryKey = 'tipo';

    protected $keyType = 'string';

    protected $fillable = [
        'tipo',
        'descripcion',
    ];
}
