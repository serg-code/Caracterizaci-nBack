<?php

namespace Database\Seeders\Opciones;

use App\Models\model\cuidado_enfermedades;
use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cuidado_enfermedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id" => "35", "ref_campo" => "cancer", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "36", "ref_campo" => "cancer", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "37", "ref_campo" => "artritis_remautidea", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "38", "ref_campo" => "artritis_remautidea", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "39", "ref_campo" => "vih_sida", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "40", "ref_campo" => "vih_sida", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "41", "ref_campo" => "hemofilia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "42", "ref_campo" => "hemofilia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "43", "ref_campo" => "insuficiencia_renal", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "44", "ref_campo" => "insuficiencia_renal", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "45", "ref_campo" => "fuma", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "46", "ref_campo" => "fuma", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "47", "ref_campo" => "actividad_fisica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "48", "ref_campo" => "actividad_fisica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "49", "ref_campo" => "vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "50", "ref_campo" => "vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "51", "ref_campo" => "enfermedades_cronicas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "52", "ref_campo" => "enfermedades_cronicas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "53", "ref_campo" => "diabetes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "54", "ref_campo" => "diabetes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "55", "ref_campo" => "hipertencion_trimestral", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "56", "ref_campo" => "hipertencion_trimestral", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "57", "ref_campo" => "diabetes_trimestral", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "58", "ref_campo" => "diabetes_trimestral", "pregunta_opcion" => "SI", "valor" => "3"]);
        // Opcion::create(["id" => "59", "ref_campo" => "tension_sistolica", "pregunta_opcion" => "numero", "valor" => "0"]);
        // Opcion::create(["id" => "60", "ref_campo" => "tension_diastolica", "pregunta_opcion" => "numero", "valor" => "0"]);
        // Opcion::create(["id" => "61", "ref_campo" => "hemoglobina_glococilada", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id" => "62", "ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Trauma mayor", "valor" => "20"]);
        Opcion::create(["id" => "63", "ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Enfermedad neurologica", "valor" => "20"]);
        Opcion::create(["id" => "64", "ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Transplantes ([riñon, corazón, médula, hígado)", "valor" => "20"]);
        Opcion::create(["id" => "65", "ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Reemplazos articulares ([rodilla, hombro, cadera)", "valor" => "20"]);
        Opcion::create(["id" => "66", "ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Enfermedad cardiovascular", "valor" => "20"]);
        Opcion::create(["id" => "67", "ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Patologia congenitas", "valor" => "20"]);
    }
}
