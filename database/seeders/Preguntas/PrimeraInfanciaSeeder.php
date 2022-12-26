<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrimeraInfanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "pi_peso_al_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Peso (kgs)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_peso_actual", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Peso (kgs)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_talla_al_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Talla (cm)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_talla_actual", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Talla (cm)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_valoracion_nutricional", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Cinta (6 o más meses)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_lenguaje", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: Lenguaje", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_motora", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: Motora", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_conducta", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: Conducta", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_probelmas_visuales", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: problemas Visuales", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_problemas_auditivos", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: problemas Auditivos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desparasitado", "ref_seccion" => "primera_infancia", "descripcion" => "Desparasitado en el ultimo año los ultimos 6 meses", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_hospitalizacion_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Hospitalización al nacer", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_carnet_vacunacion", "ref_seccion" => "primera_infancia", "descripcion" => "Carnet", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_bcg_rn", "ref_seccion" => "primera_infancia", "descripcion" => "BCG", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_d1_2_a_3_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_d2_4_a_5_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_d3_6_a_17_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_r1_18_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_r2_5_años", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_hepatitis_a_12_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Hepatitis A", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_hepatitis_b_rn", "ref_seccion" => "primera_infancia", "descripcion" => "Hepatitis B", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_influenza_estacional_6_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Influenza estacional", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_neumococo_d1_2_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_neumococo_d2_4_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_neumococo_d3_12_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_rotavirus_d1_2_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Rotavirus", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_rotavirus_d2_4_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Rotavirus", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_fiebre_amarilla_18_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_dpt_d1_18_mes", "ref_seccion" => "primera_infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_dpt_d2_5_anios", "ref_seccion" => "primera_infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_pentavalente_d1_2_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_pentavalente_d2_4_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_pentavalente_d3_6_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_srp_d1_12_mes", "ref_seccion" => "primera_infancia", "descripcion" => "SRP ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_srp_d2_5_anios", "ref_seccion" => "primera_infancia", "descripcion" => "SRP", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi__vacuna_varicela_12_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Varicela", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica_1_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica_4_a_5_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica_12_a_18_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica_24_a_29_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica_3_años", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica_4_anios", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria_2_a_3_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria_6_a_8_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria_9_a_11_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria_19_a_23_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria_30_a_35_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria_4_anios", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_lactancia_1_a_6_mes", "ref_seccion" => "primera_infancia", "descripcion" => "Atención para la prevención y apoyo de la lactancia materna", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_tsh", "ref_seccion" => "primera_infancia", "descripcion" => "TSH", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_fluor_1_a_5_anios", "ref_seccion" => "primera_infancia", "descripcion" => "Aplicación de fluor ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_profilaxis_1_a_5_anios", "ref_seccion" => "primera_infancia", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_sellantes_3_anios", "ref_seccion" => "primera_infancia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_higiene_bucal", "ref_seccion" => "primera_infancia", "descripcion" => "Higiene bucal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_caries", "ref_seccion" => "primera_infancia", "descripcion" => "Caries", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_consulta_odontologica_6_mes_a_5_anios", "ref_seccion" => "primera_infancia", "descripcion" => "Consulta odontologia (ultimos 6 meses)", "tipo" => "seleccion"]);
    }
}
