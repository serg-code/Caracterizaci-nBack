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
        //Opcion::create(["ref_campo" => "adol_peso", "pregunta_opcion" => "NO", "valor" => "1"]);
        //Opcion::create(["ref_campo" => "adol_talla", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "adol_imc", "pregunta_opcion" => "", "valor" => ""]);
        Opcion::create(["ref_campo" => "adol_asesoria_anticonceptiva", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_asesoria_anticonceptiva", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_planifica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_planifica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Hormonales", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Pildora", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Inyección", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Diu", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Ritmo", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Quirúrgico", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Óvulos", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Tabletas", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Crema vaginal", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Condon", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Implante", "valor" => "2"]);
        Opcion::create(["ref_campo" => "adol_metodo_planficica", "pregunta_opcion" => "Otro", "valor" => "2"]);
        //Opcion::create(["id"=> 541", "ref_campo" => "adol_desde_cuando_planifica", "pregunta_opcion" => "", "valor" => ""]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Gestación", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Sin compañero (a)", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Creencias religiosas y/o culturales", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Relaciones sexuales ocasionales", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Temor a efectos secundarios", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Oposición de familiares o compañero(a)", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Desconocimento", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Estéril o infértil", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Deja la responsabilidad a su pareja", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "No ha tomado la decisión", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Contraindicaciones", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_razon_no_planifica", "pregunta_opcion" => "Otras razones", "valor" => "5"]);
        Opcion::create(["ref_campo" => "adol_atencion_medica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_atencion_medica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_atencion_enfermeria", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_atencion_enfermeria", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_salud_bucal", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_salud_bucal", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_fluor", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_fluor", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_profilaxis", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_profilaxis", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_sellantes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_sellantes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_supragingival", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_supragingival", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_vacunacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_vacunacion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_vacuna_vph", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_vacuna_vph", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "adol_vacuna_toxoide_tetanico", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "adol_vacuna_toxoide_tetanico", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
