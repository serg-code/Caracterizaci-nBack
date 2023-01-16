<?php

namespace Database\Seeders;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id" => "993", "motivos" => "No hay nadie presente"]);
        Opcion::create(["id" => "994", "motivos" => "No quizo responder"]);
        Opcion::create(["id" => "995", "motivos" => "Solos habian niños presentes"]);
    }
}
