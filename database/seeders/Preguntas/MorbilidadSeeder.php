<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MorbilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "enfermedad_cronica", "ref_seccion" => "morbilidad", "descripcion" => "Enfermedad crónica", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "enfermedad_cronica", "ref_seccion" => "morbilidad", "descripcion" => "Enfermedad crónica", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "controlada", "ref_seccion" => "morbilidad", "descripcion" => "¿Controlada?", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "propiedades_respiratorio", "ref_seccion" => "morbilidad", "descripcion" => "Propiedades sintomaticos respiratorio", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "propiedades_piel", "ref_seccion" => "morbilidad", "descripcion" => "Propiedades sintomaticos de la piel", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "enfermedades_congenitas", "ref_seccion" => "morbilidad", "descripcion" => "Enfermedades congenitas", "tipo" => "selección"]);


    }
}
