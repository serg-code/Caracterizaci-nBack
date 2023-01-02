<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "in_peso", "ref_seccion" => "infancia", "descripcion" => "Valoración nutricional: Peso (kgs)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "in_talla", "ref_seccion" => "infancia", "descripcion" => "Valoración nutricional:  Talla (cm)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "in_desarrollo_lenguaje", "ref_seccion" => "infancia", "descripcion" => "Valoracion de desarrollo: Lenguaje", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_desarrollo_motora", "ref_seccion" => "infancia", "descripcion" => "Valoracion de desarrollo: Motora", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_desarrollo_conducta", "ref_seccion" => "infancia", "descripcion" => "Valoracion de desarrollo: Conducta", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_desarrollo_probelmas_visuales", "ref_seccion" => "infancia", "descripcion" => "Valoracion de desarrollo: problemas Visuales", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_desarrollo_problemas_auditivos", "ref_seccion" => "infancia", "descripcion" => "Valoracion de desarrollo: problemas Auditivos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_desparasitado", "ref_seccion" => "infancia", "descripcion" => "Desparasitado en el ultimo año los ultimos 6 meses", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_carnet_vacunacion", "ref_seccion" => "infancia", "descripcion" => "Carnet", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_dpt_r2", "ref_seccion" => "infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_polio_r2", "ref_seccion" => "infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_srp_r1", "ref_seccion" => "infancia", "descripcion" => "SRP", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_fiebre_amarilla", "ref_seccion" => "infancia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_vph_d1", "ref_seccion" => "infancia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_vph_d2", "ref_seccion" => "infancia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_vacuna_vph_d3", "ref_seccion" => "infancia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_caries", "ref_seccion" => "infancia", "descripcion" => "Caries", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_consulta_odontologica", "ref_seccion" => "infancia", "descripcion" => "Consulta odontologia (ultimos 6 meses)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_uso_seda_dental", "ref_seccion" => "infancia", "descripcion" => "Uso de seda dental", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_fluor", "ref_seccion" => "infancia", "descripcion" => "Aplicación de fluor", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_profilaxis", "ref_seccion" => "infancia", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_sellantes", "ref_seccion" => "infancia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_atencion_medica", "ref_seccion" => "infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "in_atencion_enfermeria", "ref_seccion" => "infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);

    }
}
