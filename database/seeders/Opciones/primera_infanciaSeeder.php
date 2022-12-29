<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class primera_infanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Opcion::create(["id"=> "385", "ref_campo" => "pi_peso_al_nacer", "pregunta_opcion" => "mayor 2800 1 si es menor 5 y si es mayor 4000 es 5", "valor" => "0"]);
        //Opcion::create(["id"=> "386", "ref_campo" => "pi_peso_actual", "pregunta_opcion" => "Hacer condicional con peso y talla", "valor" => "0"]);
        //Opcion::create(["id"=> "387", "ref_campo" => "pi_talla_al_nacer", "pregunta_opcion" => "menor 40cm 5 mayor de 55cm 5", "valor" => "0"]);
        //Opcion::create(["id"=> "388", "ref_campo" => "pi_talla_actual", "pregunta_opcion" => "", "valor" => "0"]);
        Opcion::create(["ref_campo" => "pi_valoracion_nutricional", "pregunta_opcion" => "verde", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_valoracion_nutricional", "pregunta_opcion" => "amarillo", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_valoracion_nutricional", "pregunta_opcion" => "rojo", "valor" => "5"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_lenguaje", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_lenguaje", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_motora", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_motora", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_conducta", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_conducta", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_probelmas_visuales", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_probelmas_visuales", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_problemas_auditivos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_desarrollo_problemas_auditivos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_desparasitado", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_desparasitado", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_hospitalizacion_nacer", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_hospitalizacion_nacer", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_carnet_vacunacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_carnet_vacunacion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_bcg_rn", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_bcg_rn", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_r1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_r1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_r2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_polio_r2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_hepatitis_a", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_hepatitis_a", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_hepatitis_b_rn", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_hepatitis_b_rn", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_influenza_estacional", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_influenza_estacional", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_neumococo_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_neumococo_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_neumococo_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_neumococo_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_neumococo_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_neumococo_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_rotavirus_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_rotavirus_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_rotavirus_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_rotavirus_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_dpt_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_dpt_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_dpt_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_dpt_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_pentavalente_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_pentavalente_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_pentavalente_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_pentavalente_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_pentavalente_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_pentavalente_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_srp_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_srp_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_srp_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_srp_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_vacuna_varicela", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_vacuna_varicela", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_atencion_medica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_atencion_medica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_atencion_enfermeria", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_atencion_enfermeria", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_atencion_lactancia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_atencion_lactancia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_tsh", "pregunta_opcion" => "normal", "valor" => "0"]);
        Opcion::create(["ref_campo" => "pi_tsh", "pregunta_opcion" => "anormal", "valor" => "5"]);
        Opcion::create(["ref_campo" => "pi_tsh", "pregunta_opcion" => "sin resultados", "valor" => "5"]);
        Opcion::create(["ref_campo" => "pi_tsh", "pregunta_opcion" => "no se lo tomo", "valor" => "5"]);
        Opcion::create(["ref_campo" => "pi_fluor", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_fluor", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_profilaxis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_profilaxis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_sellantes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_sellantes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_higiene_bucal", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_higiene_bucal", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_caries", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_caries", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "pi_consulta_odontologica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "pi_consulta_odontologica", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
