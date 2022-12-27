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
        //Opcion::create(["id"=> "542", "ref_campo" => "adol_peso", "opcion_pregunta" => "NO", "valor" => "1"]);
//Opcion::create(["id"=> "543", "ref_campo" => "adol_talla", "opcion_pregunta" => "SI", "valor" => "3"]);
//Opcion::create(["id"=> "544", "ref_campo" => "adol_imc", "opcion_pregunta" => "", "valor" => ""]);
Opcion::create(["id"=> "545", "ref_campo" => "adol_asesoria_anticonceptiva_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "546", "ref_campo" => "adol_asesoria_anticonceptiva_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "547", "ref_campo" => "adol_planifica", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "548", "ref_campo" => "adol_planifica", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "549", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Hormonales", "valor" => "2"]);
Opcion::create(["id"=> "550", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Pildora", "valor" => "2"]);
Opcion::create(["id"=> "551", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Inyección", "valor" => "2"]);
Opcion::create(["id"=> "552", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Diu", "valor" => "2"]);
Opcion::create(["id"=> "553", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Ritmo", "valor" => "2"]);
Opcion::create(["id"=> "554", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Quirúrgico", "valor" => "2"]);
Opcion::create(["id"=> "555", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Óvulos", "valor" => "2"]);
Opcion::create(["id"=> "556", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Tabletas", "valor" => "2"]);
Opcion::create(["id"=> "557", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Crema vaginal", "valor" => "2"]);
Opcion::create(["id"=> "558", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Condon", "valor" => "2"]);
Opcion::create(["id"=> "559", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Implante", "valor" => "2"]);
Opcion::create(["id"=> "560", "ref_campo" => "adol_metodo_planficica", "opcion_pregunta" => "Otro", "valor" => "2"]);
//Opcion::create(["id"=> "561", "ref_campo" => "adol_desde_cuando_planifica", "opcion_pregunta" => "", "valor" => ""]);
Opcion::create(["id"=> "562", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Gestación", "valor" => "5"]);
Opcion::create(["id"=> "563", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Sin compañero (a)", "valor" => "5"]);
Opcion::create(["id"=> "564", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Creencias religiosas y/o culturales", "valor" => "5"]);
Opcion::create(["id"=> "565", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Relaciones sexuales ocasionales", "valor" => "5"]);
Opcion::create(["id"=> "566", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Temor a efectos secundarios", "valor" => "5"]);
Opcion::create(["id"=> "567", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Oposición de familiares o compañero(a)", "valor" => "5"]);
Opcion::create(["id"=> "568", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Desconocimento", "valor" => "5"]);
Opcion::create(["id"=> "569", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Estéril o infértil", "valor" => "5"]);
Opcion::create(["id"=> "570", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Deja la responsabilidad a su pareja", "valor" => "5"]);
Opcion::create(["id"=> "571", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "No ha tomado la decisión", "valor" => "5"]);
Opcion::create(["id"=> "572", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Contraindicaciones", "valor" => "5"]);
Opcion::create(["id"=> "573", "ref_campo" => "adol_razon_no_planifica", "opcion_pregunta" => "Otras razones", "valor" => "5"]);
Opcion::create(["id"=> "574", "ref_campo" => "adol_atencion_medica_12_16_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "575", "ref_campo" => "adol_atencion_medica_12_16_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "576", "ref_campo" => "adol_atencion_enfermeria_13_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "577", "ref_campo" => "adol_atencion_enfermeria_13_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "578", "ref_campo" => "adol_salud_bucal_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "579", "ref_campo" => "adol_salud_bucal_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "580", "ref_campo" => "adol_fluor_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "581", "ref_campo" => "adol_fluor_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "582", "ref_campo" => "adol_profilaxis_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "583", "ref_campo" => "adol_profilaxis_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "584", "ref_campo" => "adol_sellantes_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "585", "ref_campo" => "adol_sellantes_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "586", "ref_campo" => "adol_supragingival_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "587", "ref_campo" => "adol_supragingival_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "588", "ref_campo" => "adol_vacunacion_12_a_17_anios", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "589", "ref_campo" => "adol_vacunacion_12_a_17_anios", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "590", "ref_campo" => "adol_vacuna_fiebre_amarilla", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "591", "ref_campo" => "adol_vacuna_fiebre_amarilla", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "592", "ref_campo" => "adol_vacuna_vph", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "593", "ref_campo" => "adol_vacuna_vph", "opcion_pregunta" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "594", "ref_campo" => "adol_vacuna_toxoide_tetanico", "opcion_pregunta" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "595", "ref_campo" => "adol_vacuna_toxoide_tetanico", "opcion_pregunta" => "SI", "valor" => "3"]);

    }
}
