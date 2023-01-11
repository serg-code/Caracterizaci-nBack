<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntasJuventudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "juv_cancer_cuello_uterino", "ref_seccion" => "juventud", "descripcion" => "Tamizaje de cancer de cuello uterino (citología)", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_colposcopia", "ref_seccion" => "juventud", "descripcion" => "Colposcopia (30 dias desde la citología)", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_bioscopia_cervico", "ref_seccion" => "juventud", "descripcion" => "Bioscopia cervico uterina", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_examen_seno", "ref_seccion" => "juventud", "descripcion" => "Examen físico de seno (último año)", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_control_medico", "ref_seccion" => "juventud", "descripcion" => "¿Asistió al control médico con el resultado?", "tipo" => "seleccion"]);        
        Pregunta::create(["ref_campo"=> "juv_planifica", "ref_seccion" => "juventud", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_metodo_planifica", "ref_seccion" => "juventud", "descripcion" => "Metodo", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_tiempo_metodo", "ref_seccion" => "juventud", "descripcion" => "Tiempo con el método (meses)", "tipo" => "numero"]);
        Pregunta::create(["ref_campo"=> "juv_asesoria_anticoncepcion", "ref_seccion" => "juventud", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_razones_no_planifica", "ref_seccion" => "juventud", "descripcion" => "No planifica", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_parejas_sexuales_al_anio", "ref_seccion" => "juventud", "descripcion" => "Número de parejas sexuales en el último año", "tipo" => "numero"]);
        Pregunta::create(["ref_campo"=> "juv_atencion_medica", "ref_seccion" => "juventud", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_atencion_enfermeria", "ref_seccion" => "juventud", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_salud_vocal", "ref_seccion" => "juventud", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_vasectomia", "ref_seccion" => "juventud", "descripcion" => "Vasectomía", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_esterilizacion_femenina", "ref_seccion" => "juventud", "descripcion" => "esterilizacion femenina", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_vias_esterilizacion", "ref_seccion" => "juventud", "descripcion" => "Vía de esterilización", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_profilaxis", "ref_seccion" => "juventud", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_detartraje_supragingival", "ref_seccion" => "juventud", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_prueba_vih", "ref_seccion" => "juventud", "descripcion" => "Prueba de VIH", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_antecedentes_diabetes", "ref_seccion" => "juventud", "descripcion" => "Antecedentes de diabetes", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_antecedentes_hipertension", "ref_seccion" => "juventud", "descripcion" => "Antecedentes de hipertensión", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_alteracion_colesterol", "ref_seccion" => "juventud", "descripcion" => "Alteración del colesterol", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo"=> "juv_perimetro_abdominal", "ref_seccion" => "juventud", "descripcion" => "Perímetro abdominal", "tipo" => "numero"]);
        

    }
}
