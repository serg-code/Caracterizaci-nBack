<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class animalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id"=> "345", "ref_campo" => "gatos", "pregunta_opcion" => "NO", "valor" => "3"]);
        Opcion::create(["id"=> "345", "ref_campo" => "gatos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "346", "ref_campo" => "gatos", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "347", "ref_campo" => "gatos", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "348", "ref_campo" => "perros", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "349", "ref_campo" => "perros", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "350", "ref_campo" => "perros", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "351", "ref_campo" => "perros", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "352", "ref_campo" => "equinos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "353", "ref_campo" => "equinos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "354", "ref_campo" => "equinos", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "355", "ref_campo" => "equinos", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "356", "ref_campo" => "aves", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "357", "ref_campo" => "aves", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "358", "ref_campo" => "porcinos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id"=> "359", "ref_campo" => "porcinos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id"=> "360", "ref_campo" => "porcinos", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "361", "ref_campo" => "porcinos", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "362", "ref_campo" => "animales_no_rabia", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id"=> "363", "ref_campo" => "animales_si_rabia", "pregunta_opcion" => "numero", "valor" => "0"]);
        
    }
}
