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
        Opcion::create(["ref_campo" => "cancer", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "cancer", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "artritis_remautidea", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "artritis_remautidea", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "vih_sida", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "vih_sida", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "hemofilia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "hemofilia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "insuficiencia_renal", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "insuficiencia_renal", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "fuma", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "fuma", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "actividad_fisica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "actividad_fisica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "enfermedades_cronicas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "enfermedades_cronicas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "diabetes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "diabetes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "hipertencion_trimestral", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "hipertencion_trimestral", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "diabetes_trimestral", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "diabetes_trimestral", "pregunta_opcion" => "SI", "valor" => "3"]);
        // Opcion::create([ "ref_campo" => "tension_sistolica", "pregunta_opcion" => "numero", "valor" => "0"]);
        // Opcion::create([ "ref_campo" => "tension_diastolica", "pregunta_opcion" => "numero", "valor" => "0"]);
        // Opcion::create([ "ref_campo" => "hemoglobina_glococilada", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Trauma mayor", "valor" => "20"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Enfermedad neurologica", "valor" => "20"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Transplantes ([riñon, corazón, médula, hígado)", "valor" => "20"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Reemplazos articulares ([rodilla, hombro, cadera)", "valor" => "20"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Enfermedad cardiovascular", "valor" => "20"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Patologia congenitas", "valor" => "20"]);
        Opcion::create(["ref_campo" => "enfermedades_costosas", "pregunta_opcion" => "Ninguna", "valor" => "0"]);
    }
}
