<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seguridad_alimentariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Opcion::create(["ref_campo" => "falto_dinero", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "falto_dinero", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "animales_silvestres", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "animales_silvestres", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "consume_cerdo_res_pollo", "pregunta_opcion" => "menor que 3 = 5", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_huevos", "pregunta_opcion" => "menor que 3 = 5", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_frijol_lentejas", "pregunta_opcion" => "menor que 3 = 5", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_lacteos", "pregunta_opcion" => "menor que 3 = 5 ", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_harinas", "pregunta_opcion" => "mayor a 4 = 5", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_verduras", "pregunta_opcion" => "menor que 3 = 5 ", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_frutas_frescas", "pregunta_opcion" => "menor que 3 = 5 ", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_enlatados", "pregunta_opcion" => "menor que 3 = 5 ", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_platano_yuca", "pregunta_opcion" => "mayor a 3 = 5", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "consume_gaseosas", "pregunta_opcion" => "mayor a 2 = 5", "valor" => "0"]);


    }
}
