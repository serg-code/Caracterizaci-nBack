<?php

namespace Database\Seeders;

use App\Models\TipoIdentifacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIdentifacion::guardarIdentificacion(['id' => 'CC', 'tipo' => 'Cedula de ciudadania']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'TI', 'tipo' => 'Targeta de identidad']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'CE', 'tipo' => 'Cedula de extranjeria']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'PA', 'tipo' => 'Pasaporte']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'CD', 'tipo' => 'Carne diplomatico']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'SC', 'tipo' => 'Salvoconducto']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'PE', 'tipo' => 'Permiso especial de permanencia']);
        TipoIdentifacion::guardarIdentificacion(['id' => 'DE', 'tipo' => 'Documento extranjero']);
    }
}
