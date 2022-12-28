<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adolescenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//Opcion::create(["id"=> "542", "ref_campo" => "adol_peso", "pregunta_opcion" => "NO", "valor" => "1"]);
//Opcion::create(["id"=> "543", "ref_campo" => "adol_talla", "pregunta_opcion" => "SI", "valor" => "3"]);
//Opcion::create(["id"=> "544", "ref_campo" => "adol_imc", "pregunta_opcion" => "", "valor" => ""]);
Opcion::create(["id"=> "545", "ref_campo" => "adol_asesoria_anticonceptiva_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "546", "ref_campo" => "adol_asesoria_anticonceptiva_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "547", "ref_campo" => "adol_planifica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "548", "ref_campo" => "adol_planifica", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "549", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Hormonales", "valor" => "2"]);
Opcion::create(["id"=> "550", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Pildora", "valor" => "2"]);
Opcion::create(["id"=> "551", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Inyección", "valor" => "2"]);
Opcion::create(["id"=> "552", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Diu", "valor" => "2"]);
Opcion::create(["id"=> "553", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Ritmo", "valor" => "2"]);
Opcion::create(["id"=> "554", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Quirúrgico", "valor" => "2"]);
Opcion::create(["id"=> "555", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Óvulos", "valor" => "2"]);
Opcion::create(["id"=> "556", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Tabletas", "valor" => "2"]);
Opcion::create(["id"=> "557", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Crema vaginal", "valor" => "2"]);
Opcion::create(["id"=> "558", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Condon", "valor" => "2"]);
Opcion::create(["id"=> "559", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Implante", "valor" => "2"]);
Opcion::create(["id"=> "560", "ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Otro", "valor" => "2"]);
//Opcion::create(["id"=> "561", "ref_campo" => "adol_desde_cuando_planifica", "pregunta_opcion" => "", "valor" => ""]);
Opcion::create(["id"=> "562", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Gestación", "valor" => "5"]);
Opcion::create(["id"=> "563", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Sin compañero (a)", "valor" => "5"]);
Opcion::create(["id"=> "564", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Creencias religiosas y/o culturales", "valor" => "5"]);
Opcion::create(["id"=> "565", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Relaciones sexuales ocasionales", "valor" => "5"]);
Opcion::create(["id"=> "566", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Temor a efectos secundarios", "valor" => "5"]);
Opcion::create(["id"=> "567", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Oposición de familiares o compañero(a)", "valor" => "5"]);
Opcion::create(["id"=> "568", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Desconocimento", "valor" => "5"]);
Opcion::create(["id"=> "569", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Estéril o infértil", "valor" => "5"]);
Opcion::create(["id"=> "570", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Deja la responsabilidad a su pareja", "valor" => "5"]);
Opcion::create(["id"=> "571", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "No ha tomado la decisión", "valor" => "5"]);
Opcion::create(["id"=> "572", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Contraindicaciones", "valor" => "5"]);
Opcion::create(["id"=> "573", "ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Otras razones", "valor" => "5"]);
Opcion::create(["id"=> "574", "ref_campo" => "adol_atencion_medica_12_16_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "575", "ref_campo" => "adol_atencion_medica_12_16_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "576", "ref_campo" => "adol_atencion_enfermeria_13_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "577", "ref_campo" => "adol_atencion_enfermeria_13_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "578", "ref_campo" => "adol_salud_bucal_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "579", "ref_campo" => "adol_salud_bucal_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "580", "ref_campo" => "adol_fluor_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "581", "ref_campo" => "adol_fluor_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "582", "ref_campo" => "adol_profilaxis_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "583", "ref_campo" => "adol_profilaxis_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "584", "ref_campo" => "adol_sellantes_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "585", "ref_campo" => "adol_sellantes_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "586", "ref_campo" => "adol_supragingival_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "587", "ref_campo" => "adol_supragingival_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "588", "ref_campo" => "adol_vacunacion_12_a_17_anios", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "589", "ref_campo" => "adol_vacunacion_12_a_17_anios", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "590", "ref_campo" => "adol_vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "591", "ref_campo" => "adol_vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "592", "ref_campo" => "adol_vacuna_vph", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "593", "ref_campo" => "adol_vacuna_vph", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "594", "ref_campo" => "adol_vacuna_toxoide_tetanico", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "595", "ref_campo" => "adol_vacuna_toxoide_tetanico", "pregunta_opcion" => "SI", "valor" => "3"]);

    }
}
