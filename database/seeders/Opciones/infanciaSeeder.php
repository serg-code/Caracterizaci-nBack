<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class infanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Opcion::create(["id"=> "496", "ref_campo" => "in_peso", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["id"=> "497", "ref_campo" => "in_talla", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["id" => "498", "ref_campo" => "in_desarrollo_lenguaje", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "499", "ref_campo" => "in_desarrollo_lenguaje", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "500", "ref_campo" => "in_desarrollo_motora", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "501", "ref_campo" => "in_desarrollo_motora", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "502", "ref_campo" => "in_desarrollo_conducta", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "503", "ref_campo" => "in_desarrollo_conducta", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "504", "ref_campo" => "in_desarrollo_probelmas_visuales", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "505", "ref_campo" => "in_desarrollo_probelmas_visuales", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "506", "ref_campo" => "in_desarrollo_problemas_auditivos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "507", "ref_campo" => "in_desarrollo_problemas_auditivos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "508", "ref_campo" => "in_desparasitado", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "509", "ref_campo" => "in_desparasitado", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "510", "ref_campo" => "in_carnet_vacunacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "511", "ref_campo" => "in_carnet_vacunacion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "512", "ref_campo" => "in_vacuna_dpt_r2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "513", "ref_campo" => "in_vacuna_dpt_r2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "514", "ref_campo" => "in_vacuna_polio_r2", "pregunta_opcion" => "NO", "valor" => "1"]);
        // !Opcion::create(["id"=> "515", "ref_campo" => "in_vacuna_polio_r3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "516", "ref_campo" => "in_vacuna_srp_r1", "pregunta_opcion" => "NO", "valor" => "1"]);
        // !Opcion::create(["id" => "517", "ref_campo" => "in_vacuna_srp_r2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "518", "ref_campo" => "in_vacuna_fiebre_amarilla_9_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "519", "ref_campo" => "in_vacuna_fiebre_amarilla_9_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "520", "ref_campo" => "in_vacuna_vph_d1_9_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "521", "ref_campo" => "in_vacuna_vph_d1_9_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "522", "ref_campo" => "in_vacuna_vph_d2_9_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "523", "ref_campo" => "in_vacuna_vph_d2_9_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "524", "ref_campo" => "in_vacuna_vph_d3_9_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "525", "ref_campo" => "in_vacuna_vph_d3_9_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "526", "ref_campo" => "in_caries", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "527", "ref_campo" => "in_caries", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "528", "ref_campo" => "in_consulta_odontologica_6_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "529", "ref_campo" => "in_consulta_odontologica_6_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "530", "ref_campo" => "in_uso_seda_dental", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "531", "ref_campo" => "in_uso_seda_dental", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "532", "ref_campo" => "in_fluor_6_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "533", "ref_campo" => "in_fluor_6_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "534", "ref_campo" => "in_profilaxis_6_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "535", "ref_campo" => "in_profilaxis_6_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "536", "ref_campo" => "in_sellantes_6_a_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "537", "ref_campo" => "in_sellantes_6_a_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "538", "ref_campo" => "in_atencion_medica_6_10_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "539", "ref_campo" => "in_atencion_medica_6_10_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "540", "ref_campo" => "in_atencion_enfermeria_7_11_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "541", "ref_campo" => "in_atencion_enfermeria_7_11_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
