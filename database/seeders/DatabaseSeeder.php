<?php

namespace Database\Seeders;

use App\Models\model\cuidados_domiciliarios;
use Database\Seeders\Opciones\accidenteseeder;
use Database\Seeders\Opciones\cuidado_enfermedadesSeeder;
use Database\Seeders\Opciones\cuidados_domiciliariosSeeder;
use Database\Seeders\Preguntas\AccidentesSeeder;
use Database\Seeders\Preguntas\CuidadoDomiciliarioSeeder;
use Database\Seeders\Preguntas\CuidadoEnfermedadesSeeder;
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

            //opciones
            new OpcionesSeeder(),
            new accidenteseeder(),
            new cuidados_domiciliariosSeeder(),
            new cuidado_enfermedadesSeeder(),

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
