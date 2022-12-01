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
            new RolesSeeder(),
            new SeccionesSeeder(),
            new PreguntaSeeder(),
            new OpcionesSeeder(),
            new IdentificacionSeeder(),
            new ParentescoSeeder(),
            new DepartamentosSeeder(),
            new MunicipiosSeeder(),
            new UsuariosSeeder(),
            new InduccionesSeeder(),
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
