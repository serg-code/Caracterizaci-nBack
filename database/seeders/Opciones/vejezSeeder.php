<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vejezSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Opcion::create(["ref_campo" => "ve_valoracion_peso", "pregunta_opcion" => "Ingresar dato", "valor" => "0"]);
//Opcion::create(["ref_campo" => "ve_valoracion_talla", "pregunta_opcion" => "Ingresar dato", "valor" => "0"]);
//Opcion::create(["ref_campo" => "ve_imc", "pregunta_opcion" => "calcular con los datos de peso y talla", "valor" => "0"]);
Opcion::create(["ref_campo" => "ve_asesoria_anticoncepcion", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_asesoria_anticoncepcion", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_planifica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_planifica", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Hormonales", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Pildora", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Inyección", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Diu", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Ritmo", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Quirúrgico", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Óvulos", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Tabletas", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Crema vaginal", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Condon", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Implante", "valor" => "2"]);
Opcion::create(["ref_campo" => "ve_metodo_planifica", "pregunta_opcion" => "Otro", "valor" => "2"]);
//Opcion::create(["ref_campo" => "ve_desde_cuando_planifica", "pregunta_opcion" => "texto", "valor" => "0"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Gestación", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Sin compañero (a)", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Creencias religiosas y/o culturales", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Relaciones sexuales ocasionales", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Temor a efectos secundarios", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Oposición de familiares o compañero(a)", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Desconocimento", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Estéril o infértil", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Deja la responsabilidad a su pareja", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "No ha tomado la decisión", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Contraindicaciones", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "Otras razones", "valor" => "5"]);
//Opcion::create(["ref_campo" => "ve_razones_no_planifica", "pregunta_opcion" => "numero", "valor" => "0"]);
//Opcion::create(["ref_campo" => "ve_parejas_sexuales_al_año", "pregunta_opcion" => "numero", "valor" => "0"]);
Opcion::create(["ref_campo" => "ve_enfermedad_cronica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_enfermedad_cronica", "pregunta_opcion" => "SI", "valor" => "3"]);
//Opcion::create(["ref_campo" => "ve_cual_enfermedad_cronica", "pregunta_opcion" => "¿Cuál?", "valor" => "0"]);
Opcion::create(["ref_campo" => "ve_seguimiento_enfermedad_cronica", "pregunta_opcion" => "Enfermedad crónica tratada", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_seguimiento_enfermedad_cronica", "pregunta_opcion" => "Enfermedad crónica sin tratarmiento", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_seguimiento_enfermedad_cronica", "pregunta_opcion" => "Enfermedad crónica controlada", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_control_adultos", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_control_adultos", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_antecedentes_diabetes", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_antecedentes_diabetes", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_antecedentes_hipertension", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_antecedentes_hipertension", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_alteracion_colesterol", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_alteracion_colesterol", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_perimetro_abdominal", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_perimetro_abdominal", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_salud_medica", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_salud_medica", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_salud_bucal", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_salud_bucal", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph", "pregunta_opcion" => "NO", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph", "pregunta_opcion" => "Positivo", "valor" => "30"]);
Opcion::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph", "pregunta_opcion" => "Negativo", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph_positivo", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph_positivo", "pregunta_opcion" => "Positivo", "valor" => "30"]);
Opcion::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph_positivo", "pregunta_opcion" => "Negativo", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_colposcopia_uterina", "pregunta_opcion" => "NO", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_colposcopia_uterina", "pregunta_opcion" => "SI", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_bioscopia_uterina", "pregunta_opcion" => "NO", "valor" => "30"]);
Opcion::create(["ref_campo" => "ve_bioscopia_uterina", "pregunta_opcion" => "Positivo", "valor" => "50"]);
Opcion::create(["ref_campo" => "ve_bioscopia_uterina", "pregunta_opcion" => "Negativo", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_mama_mamografia", "pregunta_opcion" => "NO", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_cancer_mama_mamografia", "pregunta_opcion" => "Positivo", "valor" => "50"]);
Opcion::create(["ref_campo" => "ve_cancer_mama_mamografia", "pregunta_opcion" => "Negativo", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_mama_valoracion_clinica", "pregunta_opcion" => "NO", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_cancer_mama_valoracion_clinica", "pregunta_opcion" => "Positivo", "valor" => "30"]);
Opcion::create(["ref_campo" => "ve_cancer_mama_valoracion_clinica", "pregunta_opcion" => "Negativo", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_prostata_psa", "pregunta_opcion" => "NO", "valor" => "5"]);
Opcion::create(["ref_campo" => "ve_cancer_prostata_psa", "pregunta_opcion" => "Positivo", "valor" => "30"]);
Opcion::create(["ref_campo" => "ve_cancer_prostata_psa", "pregunta_opcion" => "Negativo", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_prostata_rectal", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_cancer_prostata_rectal", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_aseroria_anticoncepcion", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_aseroria_anticoncepcion", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_vasectomia", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_vasectomia", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_esterilizacion_femenina", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_esterilizacion_femenina", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_vias_esterilizacion", "pregunta_opcion" => "Sección de o ligadura de trompas de falopio (pomeroy) por minilaparotomía", "valor" => "0"]);
Opcion::create(["ref_campo" => "ve_vias_esterilizacion", "pregunta_opcion" => "Esterilización via abierta", "valor" => "0"]);
Opcion::create(["ref_campo" => "ve_profilaxis", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_profilaxis", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_detartraje_supragingival", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_detartraje_supragingival", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_vacuna_fiebre_amarilla", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_vacuna_fiebre_amarilla", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_vacuna_influenza", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_vacuna_influenza", "pregunta_opcion" => "SI", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_prueba_vih", "pregunta_opcion" => "NO", "valor" => "1"]);
Opcion::create(["ref_campo" => "ve_prueba_vih", "pregunta_opcion" => "Positivo", "valor" => "3"]);
Opcion::create(["ref_campo" => "ve_prueba_vih", "pregunta_opcion" => "Negativo", "valor" => "1"]);

    }
}
