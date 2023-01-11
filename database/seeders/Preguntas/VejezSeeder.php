<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VejezSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "ve_valoracion_peso", "ref_seccion" => "vejez", "descripcion" => "Valoración nutricional: Peso (kgs)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ve_valoracion_talla", "ref_seccion" => "vejez", "descripcion" => "Valoración nutricional:  Talla (cm)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ve_imc", "ref_seccion" => "vejez", "descripcion" => "Indice de Masa Corporal", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ve_asesoria_anticoncepcion", "ref_seccion" => "vejez", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_planifica", "ref_seccion" => "vejez", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_metodo_planifica", "ref_seccion" => "vejez", "descripcion" => "Método", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_desde_cuando_planifica", "ref_seccion" => "vejez", "descripcion" => "¿Desde cuando planifica?", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ve_razones_no_planifica", "ref_seccion" => "vejez", "descripcion" => "No planifica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_parejas_sexuales_al_año", "ref_seccion" => "vejez", "descripcion" => "Número de parejas sexuales en el ultimo año", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_control_adultos", "ref_seccion" => "vejez", "descripcion" => "Asiste al programa de control de adultos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_antecedentes_diabetes", "ref_seccion" => "vejez", "descripcion" => "Antecedentes de diabetes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_antecedentes_hipertension", "ref_seccion" => "vejez", "descripcion" => "Antecedentes de hipertensión", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_alteracion_colesterol", "ref_seccion" => "vejez", "descripcion" => "Alteración del colesterol", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_perimetro_abdominal", "ref_seccion" => "vejez", "descripcion" => "Perímetro abdominal", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ve_salud_medica", "ref_seccion" => "vejez", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_salud_bucal", "ref_seccion" => "vejez", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_cancer_cuello_uterino_adn_vph", "ref_seccion" => "vejez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_cancer_cuello_uterino_adn_vph_positivo", "ref_seccion" => "vejez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH Positivo)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_colposcopia_uterina", "ref_seccion" => "vejez", "descripcion" => "Colposcopia cervico uterina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_bioscopia_uterina", "ref_seccion" => "vejez", "descripcion" => "Biopsia cervico uterina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_cancer_mama_mamografia", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de mama (mamografía)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_cancer_mama_valoracion_clinica", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de mama (valoración clínica de la mama)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_cancer_prostata_psa", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de prostata (PSA)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_cancer_prostata_rectal", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de prostata (Tacto rectal)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_vasectomia", "ref_seccion" => "vejez", "descripcion" => "Vasectomía SOD", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_esterilizacion_femenina", "ref_seccion" => "vejez", "descripcion" => "esterilizacion femenina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_vias_esterilizacion", "ref_seccion" => "vejez", "descripcion" => "Vía de esterilización", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_profilaxis", "ref_seccion" => "vejez", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_detartraje_supragingival", "ref_seccion" => "vejez", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_vacuna_fiebre_amarilla", "ref_seccion" => "vejez", "descripcion" => "Vacuna fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_vacuna_influenza", "ref_seccion" => "vejez", "descripcion" => "Vacuna contra influenza", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ve_prueba_vih", "ref_seccion" => "vejez", "descripcion" => "Prueba de VIH", "tipo" => "seleccion"]);

    }
}
