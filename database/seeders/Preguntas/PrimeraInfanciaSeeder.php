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
Pregunta::create(["ref_campo"=> "pi_peso_al_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Peso", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_peso_actual", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Peso", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_talla_al_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Talla", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_talla_actual", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Talla", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "pi_valoracion_nutricional", "ref_seccion" => "primera_infancia", "descripcion" => "Valoración nutricional: Cinta", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_lenguaje", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: Lenguaje", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_motora", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: Motora", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_conducta", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: Conducta", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_probelmas_visuales", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: problemas Visuales", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desarrollo_problemas_auditivos", "ref_seccion" => "primera_infancia", "descripcion" => "Valoracion de desarrollo: problemas Auditivos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_desparasitado", "ref_seccion" => "primera_infancia", "descripcion" => "Desparasitado en el ultimo año", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_hospitalizacion_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Hospitalización al nacer", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_carnet_vacunacion", "ref_seccion" => "primera_infancia", "descripcion" => "Carnet", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_bcg_rn", "ref_seccion" => "primera_infancia", "descripcion" => "BCG", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_d3", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_r1", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_polio_r2", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_hepatitis_a", "ref_seccion" => "primera_infancia", "descripcion" => "Hepatitis A", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_hepatitis_b_rn", "ref_seccion" => "primera_infancia", "descripcion" => "Hepatitis B", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_influenza_estacional", "ref_seccion" => "primera_infancia", "descripcion" => "Influenza estacional", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_neumococo_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_neumococo_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_neumococo_d3", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_rotavirus_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Rotavirus", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_rotavirus_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Rotavirus", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_fiebre_amarilla", "ref_seccion" => "primera_infancia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_dpt_d1", "ref_seccion" => "primera_infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_dpt_d2", "ref_seccion" => "primera_infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_pentavalente_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_pentavalente_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_pentavalente_d3", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_srp_d1", "ref_seccion" => "primera_infancia", "descripcion" => "SRP ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_srp_d2", "ref_seccion" => "primera_infancia", "descripcion" => "SRP", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_vacuna_varicela", "ref_seccion" => "primera_infancia", "descripcion" => "Varicela", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_medica", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_enfermeria", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_atencion_lactancia", "ref_seccion" => "primera_infancia", "descripcion" => "Atención prevención y apoyo de lactancia materna", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_tsh", "ref_seccion" => "primera_infancia", "descripcion" => "TSH", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_fluor", "ref_seccion" => "primera_infancia", "descripcion" => "Aplicación de fluor ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_profilaxis", "ref_seccion" => "primera_infancia", "descripcion" => "Profilaxis y remoción placa bacteriana", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_sellantes", "ref_seccion" => "primera_infancia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_higiene_bucal", "ref_seccion" => "primera_infancia", "descripcion" => "Higiene bucal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_caries", "ref_seccion" => "primera_infancia", "descripcion" => "Caries", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "pi_consulta_odontologica", "ref_seccion" => "primera_infancia", "descripcion" => "Consulta odontologia", "tipo" => "seleccion"]);
    }
}
