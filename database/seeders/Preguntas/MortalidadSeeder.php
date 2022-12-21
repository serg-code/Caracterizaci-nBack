<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MortalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "fallecido_familiar", "ref_seccion" => "mortalidad", "descripcion" => "¿Ha fallecido algun miembro del grupo familiar recientemente?", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "sexo_fallecido", "ref_seccion" => "mortalidad", "descripcion" => "Sexo del fallecido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "edad_fallecido", "ref_seccion" => "mortalidad", "descripcion" => "Edad del fallecido", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "causa_muerte", "ref_seccion" => "mortalidad", "descripcion" => "Causa de muerte", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "fecha_muerte", "ref_seccion" => "mortalidad", "descripcion" => "Fecha de muerte", "tipo" => "fecha"]);
    }
}
