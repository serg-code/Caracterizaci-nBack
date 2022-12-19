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

        Opcion::create(["id"=> "118", "ref_campo" => "tuberculosis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "119", "ref_campo" => "tuberculosis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "120", "ref_campo" => "lepra", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "121", "ref_campo" => "lepra", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "122", "ref_campo" => "chagas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "123", "ref_campo" => "chagas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "124", "ref_campo" => "sifilis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "125", "ref_campo" => "sifilis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "126", "ref_campo" => "dengue", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "127", "ref_campo" => "dengue", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "128", "ref_campo" => "malaria", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "129", "ref_campo" => "malaria", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "130", "ref_campo" => "leishmaniasis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "131", "ref_campo" => "leishmaniasis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "132", "ref_campo" => "brucelosis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "133", "ref_campo" => "brucelosis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "134", "ref_campo" => "sika_chicungunya", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "135", "ref_campo" => "sika_chicungunya", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "136", "ref_campo" => "varicela", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "137", "ref_campo" => "varicela", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "138", "ref_campo" => "intoxicacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "139", "ref_campo" => "intoxicacion", "pregunta_opcion" => "SI", "valor" => "3"]);
       
    }
}
