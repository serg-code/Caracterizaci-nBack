<?php

namespace Database\Seeders;

use App\Models\MotivosNoResponde;
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
        MotivosNoResponde::create(["id" => "1", "motivos" => "No hay nadie presente"]);
        MotivosNoResponde::create(["id" => "2", "motivos" => "No quizo responder"]);
        MotivosNoResponde::create(["id" => "3", "motivos" => "Solos habian niños presentes"]);
    }
}
