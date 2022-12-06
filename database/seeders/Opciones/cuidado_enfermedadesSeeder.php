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
        Opcion::create(["id" => "35", "ref_campo" => "Cancer", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "36", "ref_campo" => "Cancer", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "37", "ref_campo" => "Artritis remautidea", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "38", "ref_campo" => "Artritis remautidea", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "39", "ref_campo" => "vih_sida", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "40", "ref_campo" => "vih_sida", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "41", "ref_campo" => "Hemofilia", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "42", "ref_campo" => "Hemofilia", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "43", "ref_campo" => "Insuficiencia renal", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "44", "ref_campo" => "Insuficiencia renal", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "45", "ref_campo" => "Fuma", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "46", "ref_campo" => "Fuma", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "47", "ref_campo" => "Actividad física periodica", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "48", "ref_campo" => "Actividad física periodica", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "49", "ref_campo" => "Vacuna de fiebre amarilla", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "50", "ref_campo" => "Vacuna de fiebre amarilla", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "51", "ref_campo" => "Enfermedades crónicas", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "52", "ref_campo" => "Enfermedades crónicas", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "53", "ref_campo" => "Diabetes", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "54", "ref_campo" => "Diabetes", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "55", "ref_campo" => "Control de hipertención trimestral", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "56", "ref_campo" => "Control de hipertención trimestral", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "57", "ref_campo" => "Control de diabetes trimestral", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "58", "ref_campo" => "Control de diabetes trimestral", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "59", "ref_campo" => "Tensión arterial sistolica", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id" => "60", "ref_campo" => "Tensión arterial diastolica", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id" => "61", "ref_campo" => "Valor de la hemoglobina glococilada", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id" => "62", "ref_campo" => "Enfermedades costosas", "pregunta_opcion" => "Trauma mayor", "valor" => "20"]);
        Opcion::create(["id" => "63", "ref_campo" => "Enfermedades costosas", "pregunta_opcion" => "Enfermedad neurologica", "valor" => "20"]);
        Opcion::create(["id" => "64", "ref_campo" => "Enfermedades costosas", "pregunta_opcion" => "Transplantes ([riñon, corazón, médula, hígado)", "valor" => "20"]);
        Opcion::create(["id" => "65", "ref_campo" => "Enfermedades costosas", "pregunta_opcion" => "Reemplazos articulares ([rodilla, hombro, cadera)", "valor" => "20"]);
        Opcion::create(["id" => "66", "ref_campo" => "Enfermedades costosas", "pregunta_opcion" => "Enfermedad cardiovascular", "valor" => "20"]);
        Opcion::create(["id" => "67", "ref_campo" => "Enfermedades costosas", "pregunta_opcion" => "Patologia congenitas", "valor" => "20"]);
    }
}
