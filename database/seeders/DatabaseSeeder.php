<?php

namespace Database\Seeders;


use Database\Seeders\Opciones\accidenteseeder;
use Database\Seeders\Opciones\cuidado_enfermedadesSeeder;
use Database\Seeders\Opciones\cuidados_domiciliariosSeeder;
use Database\Seeders\Opciones\morbilidadOpcionesSeeder;
use Database\Seeders\Opciones\salud_mentalSeeder;
use Database\Seeders\Opciones\salud_publicaSeeder;
use Database\Seeders\Preguntas\AccidentesSeeder;
use Database\Seeders\Preguntas\CuidadoDomiciliarioSeeder;
use Database\Seeders\Preguntas\CuidadoEnfermedadesSeeder;
use Database\Seeders\Preguntas\MorbilidadSeeder;
use Database\Seeders\Preguntas\SaludMentalSeeder;
use Database\Seeders\Preguntas\SaludPublicaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $listadoSeeders = [
            //autentificacion
            new RolesSeeder(),

            //tablas tipo
            new IdentificacionSeeder(),
            new ParentescoSeeder(),
            new InduccionesSeeder(),

            new SeccionesSeeder(),

            //preguntas
            new PreguntaSeeder(),
            new AccidentesSeeder(),
            new CuidadoDomiciliarioSeeder(),
            new CuidadoEnfermedadesSeeder(),
            new SaludMentalSeeder(),
            new SaludPublicaSeeder(),
            new MorbilidadSeeder(),

            //opciones
            new OpcionesSeeder(),
            new accidenteseeder(),
            new cuidados_domiciliariosSeeder(),
            new cuidado_enfermedadesSeeder(),
            new salud_mentalSeeder(),
            new salud_publicaSeeder(),
            new morbilidadOpcionesSeeder(),

            //departamentos y municipios
            new DepartamentosSeeder(),
            new MunicipiosSeeder(),

            //usuarios
            new UsuariosSeeder(),

            new cie10Seeder(),
        ];

        $this->correrSeeders($listadoSeeders);
    }

    public function correrSeeders(array $listadoSeeders)
    {
        foreach ($listadoSeeders as $seeder)
        {
            $seeder->run();
        }
    }
}
