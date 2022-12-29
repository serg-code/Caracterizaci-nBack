<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class salud_publicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Opcion::create(["ref_campo" => "tuberculosis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tuberculosis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "lepra", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "lepra", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "chagas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "chagas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "sifilis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "sifilis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "dengue", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "dengue", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "malaria", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "malaria", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "leishmaniasis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "leishmaniasis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "brucelosis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "brucelosis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "sika_chicungunya", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "sika_chicungunya", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "varicela", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "varicela", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "intoxicacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "intoxicacion", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
