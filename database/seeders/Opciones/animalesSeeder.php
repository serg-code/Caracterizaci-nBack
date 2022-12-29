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
        Opcion::create(["ref_campo" => "gatos", "pregunta_opcion" => "NO", "valor" => "3"]);
        Opcion::create(["ref_campo" => "gatos", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "gatos_cuantos", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "gatos_vacunados", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["ref_campo" => "perros", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "perros", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "perros_cuantos", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "perros_vacunados", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["ref_campo" => "equinos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "equinos", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "equinos_cuantos", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "equinos_vacunados", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["ref_campo" => "aves", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "aves", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "porcinos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "porcinos", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "porcinos_cuantos", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "porcinos_vacunados", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "animales_no_rabia", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "animales_si_rabia", "pregunta_opcion" => "numero", "valor" => "0"]);

    }
}
