<?php

namespace Database\Seeders;

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

            //opciones
            new OpcionesSeeder(),

            //departamentos y municipios
            new DepartamentosSeeder(),
            new MunicipiosSeeder(),

            //usuarios
            new UsuariosSeeder(),
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
