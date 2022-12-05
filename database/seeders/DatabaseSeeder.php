<?php

namespace Database\Seeders;

use App\Models\model\cuidados_domiciliarios;
use Database\Seeders\seeder\accidenteseeder;
use Database\Seeders\seeder\cuidado_enfermedadesSeeder;
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
            new Cuidado_enfermedadesSeeder(),
            new Cuidados_domiciliarios(),
            new Accidenteseeder(),
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
