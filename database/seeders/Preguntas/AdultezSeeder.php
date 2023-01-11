<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdultezSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "adul_valoracion_peso", "ref_seccion" => "adultez", "descripcion" => "Valoración nutricional: Peso (kgs)", "tipo" => "numero"]);
        Pregunta::create(["ref_campo"=> "adul_valoracion_talla", "ref_seccion" => "adultez", "descripcion" => "Valoración nutricional: Talla (cm)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adul_imc", "ref_seccion" => "adultez", "descripcion" => "Indice de Masa Corporal", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adul_asesoria_anticoncepcion", "ref_seccion" => "adultez", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_planifica", "ref_seccion" => "adultez", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_metodo_planifica", "ref_seccion" => "adultez", "descripcion" => "Método", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_desde_cuando_planifica", "ref_seccion" => "adultez", "descripcion" => "¿Desde cuando planifica?", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "adul_razones_no_planifica", "ref_seccion" => "adultez", "descripcion" => "No planifica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_parejas_sexuales_al_anio", "ref_seccion" => "adultez", "descripcion" => "Número de parejas sexuales en el ultimo año", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adul_control_adultos", "ref_seccion" => "adultez", "descripcion" => "Asiste al programa de control de adultos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_antecedentes_diabetes", "ref_seccion" => "adultez", "descripcion" => "Antecedentes de diabetes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_antecedentes_hipertension", "ref_seccion" => "adultez", "descripcion" => "Antecedentes de hipertensión", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_antecedentes_colesterol", "ref_seccion" => "adultez", "descripcion" => "Alteración del colesterol", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_perimetro_abdominal", "ref_seccion" => "adultez", "descripcion" => "Perímetro abdominal", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adul_atencion_medica", "ref_seccion" => "adultez", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_salud_bucal", "ref_seccion" => "adultez", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_cancer_cuello_uterino_adn_vph", "ref_seccion" => "adultez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_cancer_cuello_uterino_adn_vph_positivo", "ref_seccion" => "adultez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH Positivo)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_colposcopia_cervico_uterina", "ref_seccion" => "adultez", "descripcion" => "Colposcopia cervico uterina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_biopsia_cervico_uterina", "ref_seccion" => "adultez", "descripcion" => "Biopsia cervico uterina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_cancer_mama_mamografia", "ref_seccion" => "adultez", "descripcion" => "Tamizaje para cancer de mama (mamografía)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_cancer_mama_valoracion_clinica", "ref_seccion" => "adultez", "descripcion" => "Tamizaje para cancer de mama (valoración clínica de la mama)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_cancer_prostata", "ref_seccion" => "adultez", "descripcion" => "Tamizaje para cancer de prostata (PSA)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_vasectomia", "ref_seccion" => "adultez", "descripcion" => "Vasectomía SOD", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_esterilizacion_femenina", "ref_seccion" => "adultez", "descripcion" => "esterilizacion femenina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_vias_esterilizacion", "ref_seccion" => "adultez", "descripcion" => "Vía de esterilización", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_profilaxis", "ref_seccion" => "adultez", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_detartraje_supragingival", "ref_seccion" => "adultez", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_fiebre_amarilla", "ref_seccion" => "adultez", "descripcion" => "Vacuna fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adul_prueba_vih", "ref_seccion" => "adultez", "descripcion" => "Prueba de VIH", "tipo" => "seleccion"]);


    }
}
