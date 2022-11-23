<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        $usuario = new User(['name' => 'admin', 'email' => 'mail@mail.com', 'password' => '123asd']);
        $usuario->save();

        $listadoSeeders = [
            new RolesSeeder(),
            new PreguntaSeeder(),
            new OpcionesSeeder(),
            new IdentificacionSeeder(),
            new ParentescoSeeder(),
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
