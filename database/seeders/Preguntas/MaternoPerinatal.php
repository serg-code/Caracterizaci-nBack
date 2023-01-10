<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaternoPerinatal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "ma_aceptacion_embarazo", "ref_seccion" => "materno_perinatal ", "descripcion" => "Aceptacion del embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_fecha_control_prenatal", "ref_seccion" => "materno_perinatal ", "descripcion" => "fecha de control prenatal", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_fecha_ultima_regla", "ref_seccion" => "materno_perinatal ", "descripcion" => "Fecha de la ultima regla", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_fecha_parto", "ref_seccion" => "materno_perinatal ", "descripcion" => "Fecha probable del parto", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_ganancia_peso", "ref_seccion" => "materno_perinatal ", "descripcion" => "Ganancia de peso (kgs)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ma_gestacion", "ref_seccion" => "materno_perinatal ", "descripcion" => "Gestación", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ma_carnet", "ref_seccion" => "materno_perinatal ", "descripcion" => "Carnet  de control prenatal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_prenatal_mensual", "ref_seccion" => "materno_perinatal ", "descripcion" => "Control prenantal mensual", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_serologia_1_trimestre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen Serología (V.D.R.L) primer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_serologia_2_trimestre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen Serología (V.D.R.L) segundo trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_serologia_3_trimestre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen Serología (V.D.R.L) tercer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_vih_1_trimestre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen VIH primer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_vih_2_trimestre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen VIH segundo trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_vih_3_trimestre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen VIH tercer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_odontologico", "ref_seccion" => "materno_perinatal ", "descripcion" => "Examen odontologíco", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_suplementacion", "ref_seccion" => "materno_perinatal ", "descripcion" => "Suplemtacion con acido folico, hierro y calcio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_sedentarismo", "ref_seccion" => "materno_perinatal ", "descripcion" => "Sedentarismo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_bebidas_alcoholicas", "ref_seccion" => "materno_perinatal ", "descripcion" => "Consume bebidas alcoholicas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_fecha_ultimo_parto", "ref_seccion" => "materno_perinatal ", "descripcion" => "Fecha del último parto", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_depresion_postparto", "ref_seccion" => "materno_perinatal ", "descripcion" => "Depresión postparto", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_institucional", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención institucional", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_aborto_no_especificado", "ref_seccion" => "materno_perinatal ", "descripcion" => "Aborto no especificado", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemorragia_precoz", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemorragía precoz del embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemorragia_anteparto", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemorragía anteparto no especificada en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hipertension", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hipertensión materna no especifícada ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vomitos", "ref_seccion" => "materno_perinatal ", "descripcion" => "Vomitos excesivos en el embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_madre", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención de la madre por otras complicaciones principalmente relacionads con el embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_diabetes_mellitus", "ref_seccion" => "materno_perinatal ", "descripcion" => "Díabetes mellítus en el embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hallazgo_anormal", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hallazgo anormal en el examen prenatal de la madre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_parto_unico", "ref_seccion" => "materno_perinatal ", "descripcion" => "Parto único espontáneo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_parto_complicado", "ref_seccion" => "materno_perinatal ", "descripcion" => "Trabajo de parto y parto complicados por hemorragía intraparto, no clasificada en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemorragia_postparto", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemorragía postparto", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_parto_cesarea", "ref_seccion" => "materno_perinatal ", "descripcion" => "Parto único por cesárea", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_otras_complicaciones_parto", "ref_seccion" => "materno_perinatal ", "descripcion" => "Otras complicaciones del trabajo del parto y partos no clasificadas en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_otras_complicaciones_purperio", "ref_seccion" => "materno_perinatal ", "descripcion" => "Otras complicaciones del puerperio, no clasificadas en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hospitalizacion_sifilis", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hospitalización del recien nacido por sífilis", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_edad_gestacional", "ref_seccion" => "materno_perinatal ", "descripcion" => "Edad gestacional al nacer", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ma_plan_canguro", "ref_seccion" => "materno_perinatal ", "descripcion" => "Plan canguro", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_curso_maternidad_paternidad", "ref_seccion" => "materno_perinatal ", "descripcion" => "Curso de preparación de maternidad y paternidad", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_medica", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_enfermeria", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención en salud por enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_odontologica", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención en salud odontologíca", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_antigeno_hepatitis_b", "ref_seccion" => "materno_perinatal ", "descripcion" => "Antigeno de superficie de hepatitis B", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_cancer_cuello_uterino", "ref_seccion" => "materno_perinatal ", "descripcion" => "Tamizaje para detección temprana de cancer de cuello uterino", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_glicemia_ayuna", "ref_seccion" => "materno_perinatal ", "descripcion" => "Glicemia en ayunas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemoclasificacion", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemoclasificación", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemograma", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemográma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemoparasitos_chagas", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemoparásitos (chagas)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_toxoplasma", "ref_seccion" => "materno_perinatal ", "descripcion" => "IgG G toxoplasma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_rubeola", "ref_seccion" => "materno_perinatal ", "descripcion" => "IgG G rubeola", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_varicela", "ref_seccion" => "materno_perinatal ", "descripcion" => "IgG G varicela", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_prueba_treponemica_sifilis", "ref_seccion" => "materno_perinatal ", "descripcion" => "Prueba treponemica rapida para sífilis", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_urocultivo", "ref_seccion" => "materno_perinatal ", "descripcion" => "Urocultivo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_prueba_vih", "ref_seccion" => "materno_perinatal ", "descripcion" => "VIH prueba rapida con asesoria y pre y postest", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_espermograma", "ref_seccion" => "materno_perinatal ", "descripcion" => "Espermograma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_citologia", "ref_seccion" => "materno_perinatal ", "descripcion" => "Citología", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_elisa", "ref_seccion" => "materno_perinatal ", "descripcion" => "Elisa", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_micronutrientes", "ref_seccion" => "materno_perinatal ", "descripcion" => "Suplementación con micronutrientes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_medica_general", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención para el cuidado prenatal consulta médica general", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_enfermeria", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención para el cuidado prenatal consulta enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_medica_obstetra", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención para el cuidado prenatal consulta médica especializada obstetra", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_consulta_nutricion", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención para el cuidado prenatal consulta nutrición ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_toxoide", "ref_seccion" => "materno_perinatal ", "descripcion" => "Vacunación toxoide tetánico", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_difteria", "ref_seccion" => "materno_perinatal ", "descripcion" => "Vacunación diftería ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_tosferina", "ref_seccion" => "materno_perinatal ", "descripcion" => "Vacunación tosferina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_influenza", "ref_seccion" => "materno_perinatal ", "descripcion" => "Vacunación Influenza", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_ecografia_obstetrica", "ref_seccion" => "materno_perinatal ", "descripcion" => "Ecografía obstétrica transabdominal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_ecografia_anatomico", "ref_seccion" => "materno_perinatal ", "descripcion" => "Ecografía de detalle anatómico", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_interrupcion_voluntaria_embarazo", "ref_seccion" => "materno_perinatal ", "descripcion" => "Interrupción voluntaria del embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_asesoria_anticonceptiva_ive", "ref_seccion" => "materno_perinatal ", "descripcion" => "Asesoría y provisión anticonceptiva post IVE", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_purperio", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención del puerperio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_pediatria", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención para el cuidado del recién nacido (pediatría)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Atención para el tamizaje del recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemograma_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemográma en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemoclasificacion_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Hemoclasificación en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_sifilis_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Prueba rápida para sífilis en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vih_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Prueba rápida para el VIH en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_chagas_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Tamizaje para chagas en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_tsh_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "TSH en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_tamizaje_genetico_recien_nacido", "ref_seccion" => "materno_perinatal ", "descripcion" => "Tamizaje genético en el recien nacido", "tipo" => "seleccion"]);

    }
}
