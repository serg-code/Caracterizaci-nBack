<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "gatos", "ref_seccion" => "animales", "descripcion" => "Gatos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "gatos", "ref_seccion" => "animales", "descripcion" => "Gatos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "gatos", "ref_seccion" => "animales", "descripcion" => "Gatos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "perros", "ref_seccion" => "animales", "descripcion" => "Perros", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "perros", "ref_seccion" => "animales", "descripcion" => "Perros", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "perros", "ref_seccion" => "animales", "descripcion" => "Perros", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "equinos", "ref_seccion" => "animales", "descripcion" => "Equinos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "equinos", "ref_seccion" => "animales", "descripcion" => "Equinos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "equinos", "ref_seccion" => "animales", "descripcion" => "Equinos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "aves", "ref_seccion" => "animales", "descripcion" => "Aves", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "porcinos", "ref_seccion" => "animales", "descripcion" => "Porcinos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "porcinos", "ref_seccion" => "animales", "descripcion" => "Porcinos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "porcinos", "ref_seccion" => "animales", "descripcion" => "Porcinos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "animales_no_rabia", "ref_seccion" => "animales", "descripcion" => "animalessilvestres que no trasmiten rabia", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "animales_si_rabia", "ref_seccion" => "animales", "descripcion" => "Otros animalessilvestres que si trasmiten rabia", "tipo" => "numero"]);

    }
}
