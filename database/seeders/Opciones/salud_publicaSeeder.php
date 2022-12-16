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

        Opcion::create(["id"=> "118", "ref_campo" => "Tuberculósis", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "119", "ref_campo" => "Tuberculósis", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "120", "ref_campo" => "Lepra", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "121", "ref_campo" => "Lepra", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "122", "ref_campo" => "Chagas", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "123", "ref_campo" => "Chagas", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "124", "ref_campo" => "Sifílis", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "125", "ref_campo" => "Sifílis", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "126", "ref_campo" => "Dengue", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "127", "ref_campo" => "Dengue", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "128", "ref_campo" => "Malaria", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "129", "ref_campo" => "Malaria", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "130", "ref_campo" => "Leishmaniasis", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "131", "ref_campo" => "Leishmaniasis", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "132", "ref_campo" => "Brucelosis", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "133", "ref_campo" => "Brucelosis", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "134", "ref_campo" => "Sika- chicungunya", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "135", "ref_campo" => "Sika- chicungunya", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "136", "ref_campo" => "Varicela", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "137", "ref_campo" => "Varicela", "descripcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "138", "ref_campo" => "Intoxicación", "descripcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "139", "ref_campo" => "Intoxicación", "descripcion" => "SI", "valor" => "3"]);
       
    }
}
