<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class juventudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["ref_campo" => "juv_cancer_cuello_uterino", "pregunta_opcion" => "NO", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_cancer_cuello_uterino", "pregunta_opcion" => "Normal", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_cancer_cuello_uterino", "pregunta_opcion" => "Anormal", "valor" => "50"]);
Opcion::create(["ref_campo" => "juv_cancer_cuello_uterino", "pregunta_opcion" => "No sabe resultado", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_colposcopia", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_colposcopia", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_bioscopia_cervico", "pregunta_opcion" => "NO", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_bioscopia_cervico", "pregunta_opcion" => "Positivo", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_bioscopia_cervico", "pregunta_opcion" => "Negativo", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_examen_seno", "pregunta_opcion" => "NO", "valor" => "30"]);
Opcion::create(["ref_campo" => "juv_examen_seno", "pregunta_opcion" => "Normal", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_examen_seno", "pregunta_opcion" => "Anormal", "valor" => "50"]);
Opcion::create(["ref_campo" => "juv_planifica", "pregunta_opcion" => "NO", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_planifica", "pregunta_opcion" => "SI", "valor" => ""]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Hormonales", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Pildora", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Inyección", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Diu", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Ritmo", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Quirúrgico", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Óvulos", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Tabletas", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Crema vaginal", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Condon", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Implante", "valor" => "2"]);
Opcion::create(["ref_campo" => "juv_metodo_planifica", "pregunta_opcion" => "Otro", "valor" => "2"]);
//Opcion::create(["ref_campo" => "juv_tiempo_metodo", "pregunta_opcion" => "numero", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_asesoria_anticoncepcion", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_asesoria_anticoncepcion", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Gestación", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Sin compañero (a)", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Creencias religiosas y/o culturales", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Relaciones sexuales ocasionales", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Temor a efectos secundarios", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Oposición de familiares o compañero(a)", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Desconocimento", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Estéril o infértil", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Deja la responsabilidad a su pareja", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "No ha tomado la decisión", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Contraindicaciones", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_razones_no_planifica", "pregunta_opcion" => "Otras razones", "valor" => "5"]);
//Opcion::create(["ref_campo" => "juv_parejas_sexuales_al_año", "pregunta_opcion" => "numero", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_atencion_medica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_atencion_medica", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_atencion_enfermeria", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_atencion_enfermeria", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_salud_vocal", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_salud_vocal", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_vasectomia", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_vasectomia", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_esterilizacion_femenina", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_esterilizacion_femenina", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_vias_esterilizacion", "pregunta_opcion" => "Sección de o ligadura de trompas de falopio (pomeroy) por minilaparotomía", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_vias_esterilizacion", "pregunta_opcion" => "Esterilización via abierta", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_profilaxis", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_profilaxis", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_detartraje_supragingival", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_detartraje_supragingival", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_prueba_vih", "pregunta_opcion" => "NO", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_prueba_vih", "pregunta_opcion" => "Positivo", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_prueba_vih", "pregunta_opcion" => "Negativo", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_antecedentes_diabetes", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_antecedentes_diabetes", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_antecedentes_hipertension", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_antecedentes_hipertension", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_alteracion_colesterol", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_alteracion_colesterol", "pregunta_opcion" => "SI", "valor" => "3"]);
//Opcion::create(["ref_campo" => "juv_presion_sistolica", "pregunta_opcion" => "Ingresar dato", "valor" => "0"]);
//Opcion::create(["ref_campo" => "juv_presion_diastolica", "pregunta_opcion" => "Ingresar dato", "valor" => "0"]);
//Opcion::create(["ref_campo" => "juv_perimetro_abdominal", "pregunta_opcion" => "Ingresar dato", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_enfermedad_cronica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "juv_enfermedad_cronica", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "juv_cual_enfermedad_cronica", "pregunta_opcion" => "¿Cuál?", "valor" => "0"]);
Opcion::create(["ref_campo" => "juv_seguimiento_enfermedad_cronica", "pregunta_opcion" => "Enfermedad crónica tratada", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_seguimiento_enfermedad_cronica", "pregunta_opcion" => "Enfermedad crónica sin tratarmiento", "valor" => "5"]);
Opcion::create(["ref_campo" => "juv_seguimiento_enfermedad_cronica", "pregunta_opcion" => "Enfermedad crónica controlada", "valor" => "5"]);

    }
}
