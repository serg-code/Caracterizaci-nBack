<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class morbilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Opcion::create(["id"=> "140", "ref_campo" => "enfermedad_cronica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "141", "ref_campo" => "enfermedad_cronica", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "142", "ref_campo" => "enfermedad_cronica", "pregunta_opcion" => "texto", "valor" => "0"]);
Opcion::create(["id"=> "143", "ref_campo" => "controlada", "pregunta_opcion" => "No controlada", "valor" => "5"]);
Opcion::create(["id"=> "144", "ref_campo" => "controlada", "pregunta_opcion" => "Médico", "valor" => "0"]);
Opcion::create(["id"=> "145", "ref_campo" => "controlada", "pregunta_opcion" => "Programa", "valor" => "0"]);
Opcion::create(["id"=> "146", "ref_campo" => "controlada", "pregunta_opcion" => "Institución de salud", "valor" => "0"]);
Opcion::create(["id"=> "147", "ref_campo" => "propiedades_respiratorio", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "148", "ref_campo" => "propiedades_respiratorio", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "149", "ref_campo" => "propiedades_piel", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "150", "ref_campo" => "propiedades_piel", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "151", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Ninguna", "valor" => "0"]);
Opcion::create(["id"=> "152", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Paralisis cerebral", "valor" => "0"]);
Opcion::create(["id"=> "153", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Dowm", "valor" => "0"]);
Opcion::create(["id"=> "154", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Edwer", "valor" => "0"]);
Opcion::create(["id"=> "155", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Patar", "valor" => "0"]);
Opcion::create(["id"=> "156", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Defecto cardiaco", "valor" => "0"]);
Opcion::create(["id"=> "157", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Mal formaciones físicas motoras", "valor" => "0"]);
Opcion::create(["id"=> "158", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Sindrome autista", "valor" => "0"]);
Opcion::create(["id"=> "159", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Hidrocefália", "valor" => "0"]);
Opcion::create(["id"=> "160", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Acondroplacia - Pseudo acondroplacia (enanismo)", "valor" => "0"]);
Opcion::create(["id"=> "161", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Mal formaciones del sistema nervioso", "valor" => "0"]);
Opcion::create(["id"=> "162", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Labio leporino - paladar hendido", "valor" => "0"]);
Opcion::create(["id"=> "163", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Enfermedades raras y huerfanas", "valor" => "0"]);
Opcion::create(["id"=> "164", "ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "¿Cuál?", "valor" => "0"]);

    }
}
