<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuidadoEnfermedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "cancer", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Cancer", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "artritis_remautidea", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Artritis remautidea", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "vih_sida", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "VIH- Sida", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "hemofilia", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Hemofilia", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "isuficiencia_renal", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Insuficiencia renal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "fuma", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Fuma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "actividad_fisica", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Actividad física periodica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "vacuna_fiebre_amarilla", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Vacuna de fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "enfermedades_cronicas", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Enfermedades crónicas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "diabetes", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Diabetes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "hipertencion_trimestral", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Control de hipertención trimestral", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "diabetes_trimestral", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Control de diabetes trimestral", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tension_sistolica", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Tensión arterial sistolica", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "tension_diastolica", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Tensión arterial diastolica", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "hemoglobina_glococilada", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Valor de la hemoglobina glococilada", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "enfermedades_costosas", "ref_seccion" => "cuidados_enfermedades", "descripcion" => "Enfermedades costosas", "tipo" => "seleccion multiple"]); 
Pregunta::create(["ref_campo"=> "accidentes_transito", "ref_seccion" => "accidentes", "descripcion" => "¿Ha sufrido accidentes de transito?", "tipo" => "seleccion"]);

    }
}
