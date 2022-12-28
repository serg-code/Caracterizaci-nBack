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
        Opcion::create(["id" => "389", "ref_campo" => "pi_valoracion_nutricional", "pregunta_opcion" => "verde", "valor" => "1"]);
        Opcion::create(["id" => "390", "ref_campo" => "pi_valoracion_nutricional", "pregunta_opcion" => "amarillo", "valor" => "3"]);
        Opcion::create(["id" => "391", "ref_campo" => "pi_valoracion_nutricional", "pregunta_opcion" => "rojo", "valor" => "5"]);
        Opcion::create(["id" => "392", "ref_campo" => "pi_desarrollo_lenguaje", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "393", "ref_campo" => "pi_desarrollo_lenguaje", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "394", "ref_campo" => "pi_desarrollo_motora", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "395", "ref_campo" => "pi_desarrollo_motora", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "396", "ref_campo" => "pi_desarrollo_conducta", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "397", "ref_campo" => "pi_desarrollo_conducta", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "398", "ref_campo" => "pi_desarrollo_probelmas_visuales", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "399", "ref_campo" => "pi_desarrollo_probelmas_visuales", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "400", "ref_campo" => "pi_desarrollo_problemas_auditivos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "401", "ref_campo" => "pi_desarrollo_problemas_auditivos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "402", "ref_campo" => "pi_desparasitado", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "403", "ref_campo" => "pi_desparasitado", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "404", "ref_campo" => "pi_hospitalizacion_nacer", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "405", "ref_campo" => "pi_hospitalizacion_nacer", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "406", "ref_campo" => "pi_carnet_vacunacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "407", "ref_campo" => "pi_carnet_vacunacion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "408", "ref_campo" => "pi_vacuna_bcg_rn", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "409", "ref_campo" => "pi_vacuna_bcg_rn", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "410", "ref_campo" => "pi_vacuna_polio_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "411", "ref_campo" => "pi_vacuna_polio_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "412", "ref_campo" => "pi_vacuna_polio_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "413", "ref_campo" => "pi_vacuna_polio_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "414", "ref_campo" => "pi_vacuna_polio_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "415", "ref_campo" => "pi_vacuna_polio_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "416", "ref_campo" => "pi_vacuna_polio_r1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "417", "ref_campo" => "pi_vacuna_polio_r1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "418", "ref_campo" => "pi_vacuna_polio_r2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "419", "ref_campo" => "pi_vacuna_polio_r2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "420", "ref_campo" => "pi_vacuna_hepatitis_a", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "421", "ref_campo" => "pi_vacuna_hepatitis_a", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "422", "ref_campo" => "pi_vacuna_hepatitis_b_rn", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "423", "ref_campo" => "pi_vacuna_hepatitis_b_rn", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "424", "ref_campo" => "pi_vacuna_influenza_estacional", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "425", "ref_campo" => "pi_vacuna_influenza_estacional", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "426", "ref_campo" => "pi_vacuna_neumococo_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "427", "ref_campo" => "pi_vacuna_neumococo_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "428", "ref_campo" => "pi_vacuna_neumococo_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "429", "ref_campo" => "pi_vacuna_neumococo_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "430", "ref_campo" => "pi_vacuna_neumococo_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "431", "ref_campo" => "pi_vacuna_neumococo_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "432", "ref_campo" => "pi_vacuna_rotavirus_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "433", "ref_campo" => "pi_vacuna_rotavirus_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "434", "ref_campo" => "pi_vacuna_rotavirus_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "435", "ref_campo" => "pi_vacuna_rotavirus_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "436", "ref_campo" => "pi_vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "437", "ref_campo" => "pi_vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "438", "ref_campo" => "pi_vacuna_dpt_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "439", "ref_campo" => "pi_vacuna_dpt_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "440", "ref_campo" => "pi_vacuna_dpt_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "441", "ref_campo" => "pi_vacuna_dpt_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "442", "ref_campo" => "pi_vacuna_pentavalente_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "443", "ref_campo" => "pi_vacuna_pentavalente_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "444", "ref_campo" => "pi_vacuna_pentavalente_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "445", "ref_campo" => "pi_vacuna_pentavalente_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "446", "ref_campo" => "pi_vacuna_pentavalente_d3", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "447", "ref_campo" => "pi_vacuna_pentavalente_d3", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "448", "ref_campo" => "pi_vacuna_srp_d1", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "449", "ref_campo" => "pi_vacuna_srp_d1", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "450", "ref_campo" => "pi_vacuna_srp_d2", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "451", "ref_campo" => "pi_vacuna_srp_d2", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "452", "ref_campo" => "pi__vacuna_varicela", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "453", "ref_campo" => "pi__vacuna_varicela", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "454", "ref_campo" => "pi_atencion_medica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "455", "ref_campo" => "pi_atencion_medica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "456", "ref_campo" => "pi_atencion_enfermeria", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "457", "ref_campo" => "pi_atencion_enfermeria", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "458", "ref_campo" => "pi_atencion_lactancia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "459", "ref_campo" => "pi_atencion_lactancia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "460", "ref_campo" => "pi_tsh", "pregunta_opcion" => "normal", "valor" => "0"]);
        Opcion::create(["id" => "461", "ref_campo" => "pi_tsh", "pregunta_opcion" => "anormal", "valor" => "5"]);
        Opcion::create(["id" => "462", "ref_campo" => "pi_tsh", "pregunta_opcion" => "sin resultados", "valor" => "5"]);
        Opcion::create(["id" => "463", "ref_campo" => "pi_tsh", "pregunta_opcion" => "no se lo tomo", "valor" => "5"]);
        Opcion::create(["id" => "464", "ref_campo" => "pi_fluor", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "465", "ref_campo" => "pi_fluor", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "466", "ref_campo" => "pi_profilaxis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "467", "ref_campo" => "pi_profilaxis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "468", "ref_campo" => "pi_sellantes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "469", "ref_campo" => "pi_sellantes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "470", "ref_campo" => "pi_higiene_bucal", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "471", "ref_campo" => "pi_higiene_bucal", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "472", "ref_campo" => "pi_caries", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "473", "ref_campo" => "pi_caries", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "474", "ref_campo" => "pi_consulta_odontologica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "475", "ref_campo" => "pi_consulta_odontologica", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
