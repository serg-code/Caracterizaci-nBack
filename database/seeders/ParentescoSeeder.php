<?php

namespace Database\Seeders;

use App\Models\Parentesco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parentesco::GuardarParentesco(['descripcion' => 'Cónyuge o compañero(a) Permanente']);
        Parentesco::GuardarParentesco(['descripcion' => 'Hijo(a)']);
        Parentesco::GuardarParentesco(['descripcion' => 'Padre o Madre']);
        Parentesco::GuardarParentesco(['descripcion' => 'Segundo grado de consanguinidad']);
        Parentesco::GuardarParentesco(['descripcion' => 'Tercer grado de consanguinidad']);
        Parentesco::GuardarParentesco(['descripcion' => 'Menor de 12 años sin consanguinidad']);
        Parentesco::GuardarParentesco(['descripcion' => 'Padre o Madre del Cónyugue']);
        Parentesco::GuardarParentesco(['descripcion' => 'Otros no parientes']);
        Parentesco::GuardarParentesco(['descripcion' => 'Amigo o conocido']);
        Parentesco::GuardarParentesco(['descripcion' => 'Vecino']);
        Parentesco::GuardarParentesco(['descripcion' => 'Sin Relación']);
    }
}
