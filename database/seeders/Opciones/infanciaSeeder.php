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
        //Opcion::create(["id"=> "476", "ref_campo" => "in_peso", "pregunta_opcion" => "numero", "valor" => "0"]);
        //Opcion::create(["id"=> "477", "ref_campo" => "in_talla", "pregunta_opcion" => "numero", "valor" => "0"]);
        Opcion::create(["ref_campo" => "in_desarrollo_lenguaje", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_desarrollo_lenguaje", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_desarrollo_motora", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_desarrollo_motora", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_desarrollo_conducta", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_desarrollo_conducta", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_desarrollo_probelmas_visuales", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_desarrollo_probelmas_visuales", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_desarrollo_problemas_auditivos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_desarrollo_problemas_auditivos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_desparasitado", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_desparasitado", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_carnet_vacunacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_carnet_vacunacion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_dpt_r2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_dpt_r2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_polio_r2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_polio_r2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_srp_r1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_srp_r1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_vph_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_vph_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_vph_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_vph_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_vacuna_vph_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_vacuna_vph_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_caries", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_caries", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_consulta_odontologica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_consulta_odontologica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_uso_seda_dental", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_uso_seda_dental", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_fluor", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_fluor", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_profilaxis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_profilaxis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_sellantes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_sellantes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_atencion_medica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_atencion_medica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "in_atencion_enfermeria", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "in_atencion_enfermeria", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
