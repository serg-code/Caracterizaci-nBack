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
Pregunta::create(["ref_campo"=> "gatos_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos gatos?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "gatos_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos gatos vacuandos?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "perros", "ref_seccion" => "animales", "descripcion" => "Perros", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "perros_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos perros?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "perros_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos perros vacuandos?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "equinos", "ref_seccion" => "animales", "descripcion" => "Equinos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "equinos_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos equinos?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "equinos_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos equinos vacunados?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "aves", "ref_seccion" => "animales", "descripcion" => "Aves", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "porcinos", "ref_seccion" => "animales", "descripcion" => "Porcinos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "porcinos_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos porcinos?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "porcinos_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos porcinos vacunados?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "animales_no_rabia", "ref_seccion" => "animales", "descripcion" => "Animales silvestres que no trasmiten rabia", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "animales_si_rabia", "ref_seccion" => "animales", "descripcion" => "Otros animales silvestres que si trasmiten rabia", "tipo" => "numero"]);

    }
}
