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
Opcion::create(["id"=> "140", "ref_campo" => "Enfermedad crónica", "descripcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "141", "ref_campo" => "Enfermedad crónica", "descripcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "142", "ref_campo" => "Enfermedad crónica", "descripcion" => "texto", "valor" => "0"]);
Opcion::create(["id"=> "143", "ref_campo" => "¿Controlada?", "descripcion" => "No controlada", "valor" => "5"]);
Opcion::create(["id"=> "144", "ref_campo" => "¿Controlada?", "descripcion" => "Médico", "valor" => "0"]);
Opcion::create(["id"=> "145", "ref_campo" => "¿Controlada?", "descripcion" => "Programa", "valor" => "0"]);
Opcion::create(["id"=> "146", "ref_campo" => "¿Controlada?", "descripcion" => "Institución de salud", "valor" => "0"]);
Opcion::create(["id"=> "147", "ref_campo" => "Propiedades sintomaticos respiratorio", "descripcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "148", "ref_campo" => "Propiedades sintomaticos respiratorio", "descripcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "149", "ref_campo" => "Propiedades sintomaticos de la piel", "descripcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "150", "ref_campo" => "Propiedades sintomaticos de la piel", "descripcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "151", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Ninguna", "valor" => "0"]);
Opcion::create(["id"=> "152", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Paralisis cerebral", "valor" => "0"]);
Opcion::create(["id"=> "153", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Dowm", "valor" => "0"]);
Opcion::create(["id"=> "154", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Edwer", "valor" => "0"]);
Opcion::create(["id"=> "155", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Patar", "valor" => "0"]);
Opcion::create(["id"=> "156", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Defecto cardiaco", "valor" => "0"]);
Opcion::create(["id"=> "157", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Mal formaciones físicas motoras", "valor" => "0"]);
Opcion::create(["id"=> "158", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Sindrome autista", "valor" => "0"]);
Opcion::create(["id"=> "159", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Hidrocefália", "valor" => "0"]);
Opcion::create(["id"=> "160", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Acondroplacia - Pseudo acondroplacia (enanismo)", "valor" => "0"]);
Opcion::create(["id"=> "161", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Mal formaciones del sistema nervioso", "valor" => "0"]);
Opcion::create(["id"=> "162", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Labio leporino - paladar hendido", "valor" => "0"]);
Opcion::create(["id"=> "163", "ref_campo" => "Enfermedades congenitas", "descripcion" => "Enfermedades raras y huerfanas", "valor" => "0"]);
Opcion::create(["id"=> "164", "ref_campo" => "Enfermedades congenitas", "descripcion" => "¿Cuál?", "valor" => "0"]);

    }
}
