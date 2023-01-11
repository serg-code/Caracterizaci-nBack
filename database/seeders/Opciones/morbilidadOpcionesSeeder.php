<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class morbilidadOpcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["ref_campo" => "enfermedad_cronica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "enfermedad_cronica", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "enfermedad_cronica_cual", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "controlada", "pregunta_opcion" => "No controlada", "valor" => "5"]);
        Opcion::create(["ref_campo" => "controlada", "pregunta_opcion" => "Médico", "valor" => "0"]);
        Opcion::create(["ref_campo" => "controlada", "pregunta_opcion" => "Programa", "valor" => "0"]);
        Opcion::create(["ref_campo" => "controlada", "pregunta_opcion" => "Institución de salud", "valor" => "0"]);
        Opcion::create(["ref_campo" => "propiedades_respiratorio", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "propiedades_respiratorio", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "propiedades_piel", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "propiedades_piel", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Ninguna", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Paralisis cerebral", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Dowm", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Edwer", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Patar", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Defecto cardiaco", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Mal formaciones físicas motoras", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Sindrome autista", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Hidrocefália", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Acondroplacia - Pseudo acondroplacia (enanismo)", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Mal formaciones del sistema nervioso", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Labio leporino - paladar hendido", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "Enfermedades raras y huerfanas", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_congenitas", "pregunta_opcion" => "¿Cuál?", "valor" => "0"]);
        //Opcion::create(["ref_campo" => "enfermedades_congenitas_cual", "pregunta_opcion" => "¿Cuál?", "valor" => "0"]);

    }
}
