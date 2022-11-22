<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            new PreguntaSeeder(),
            new RespuestaSeeder(),
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
