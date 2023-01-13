<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
                //* Factores protectores
                Pregunta::guardarPregunta(["ref_campo" => "tipo_familia", "ref_seccion" => "factores_protectores", "descripcion" => "Tipo de familia", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "duermen_ninos_ninas_adultos", "ref_seccion" => "factores_protectores", "descripcion" => "¿Duermen los ninos y ninas separados de los adultos?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "problemas_alcohol", "ref_seccion" => "factores_protectores", "descripcion" => "¿Alguien de la familia tiene problemas con el consumo de bebidas alcoholicas?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "consume_tranquilizantes", "ref_seccion" => "factores_protectores", "descripcion" => "¿Alguien de la familia consume tranquilizantes?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "relaciones_cordiales_respetuosas", "ref_seccion" => "factores_protectores", "descripcion" => "Relaciones cordiales y respetuosas", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "lavar_manos_antes_comer", "ref_seccion" => "factores_protectores", "descripcion" => "¿Acostumbra la familia a lavarse las manos antes de comer?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "lavar_manos_antes_preparar_alimentos", "ref_seccion" => "factores_protectores", "descripcion" => "¿Acostumbra la familia a lavarse las manos antes de preparar los alimentos?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "fumigar_vivienda", "ref_seccion" => "factores_protectores", "descripcion" => "¿Fumiga su vivienda?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "secretaria_fumigado", "ref_seccion" => "factores_protectores", "descripcion" => "¿En el último ano la secretarìa ha fumigado?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "acido_borico_cucarachas", "ref_seccion" => "factores_protectores", "descripcion" => "¿Utiliza acído boríco para las cucarachas?", "tipo" => "seleccion"]);

                //* habitos_consumo
                Pregunta::guardarPregunta(["ref_campo" => "consumo_huevos_crudos", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Alguien de la familia acostumbra a consumir huevos crudos?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "alimentos_perecederos", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Los alimentos perecederos se almacenan protegídos y refrígerados?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "hierve_leche", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Habitualmente hierve la leche?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "lavar_frutas_verduras", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Lava las frutas y verduras antes de consumirlas?", "tipo" => "seleccion"]);
                Pregunta::guardarPregunta(["ref_campo" => "alimentos_crudos_separados_cocidos", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Los alimentso crudos se almacenan separados de los cocidos? (verificar)", "tipo" => "seleccion"]);

                //* accidentes
                Pregunta::create(["ref_campo" => "accidentes_transito", "ref_seccion" => "accidentes", "descripcion" => "¿Ha sufrido accidentes de transito?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "tipo_lesion", "ref_seccion" => "accidentes", "descripcion" => "Tipo de lesión", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "accidentes_laborales", "ref_seccion" => "accidentes", "descripcion" => "¿Ha sufrido accidentes laborales?", "tipo" => "seleccion"]);

                //* cuidados_domiciliarios
                Pregunta::create(["ref_campo" => "cuidados_domiciliarios", "ref_seccion" => "cuidados_domiciliarios", "descripcion" => "¿Recibe cuidados domiciliarios?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "diagnostico_principal", "ref_seccion" => "cuidados_domiciliarios", "descripcion" => "Diagnostico principal ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "causa", "ref_seccion" => "cuidados_domiciliarios", "descripcion" => "Causa", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "fecha_inicio_domiciliario", "ref_seccion" => "cuidados_domiciliarios", "descripcion" => "Fecha de inicio del cuidado domiciliario", "tipo" => "fecha"]);
                Pregunta::create(["ref_campo" => "oxigeno_domiciliario", "ref_seccion" => "cuidados_domiciliarios", "descripcion" => "¿Recibe oxigeno domiciliario?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "plan_aprobado", "ref_seccion" => "cuidados_domiciliarios", "descripcion" => "Plan aprobado", "tipo" => "seleccion"]);

                //* cuidados_enfermedades
                Pregunta::create(["ref_campo" => "cancer", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Cancer", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "artritis_remautidea", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Artritis remautidea", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "vih_sida", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "VIH- Sida", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "hemofilia", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Hemofilia", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "insuficiencia_renal", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Insuficiencia renal", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "fuma", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Fuma", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "actividad_fisica", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Actividad física periodica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "vacuna_fiebre_amarilla", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Vacuna de fiebre amarilla", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "diabetes", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Diabetes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "hipertencion_trimestral", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Control de hipertención trimestral", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "diabetes_trimestral", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Control de diabetes trimestral", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "tension_sistolica", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Tensión arterial sistolica", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "tension_diastolica", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Tensión arterial diastolica", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "hemoglobina_glococilada", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Valor de la hemoglobina glococilada", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "enfermedades_costosas", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "Enfermedades costosas", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ha_estado_embarazada", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Ha estado embarazada?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "cuantos_embarazos_ha_tenido", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuantos embarazos ha tenido?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "hijos_muertos_parto_natural", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijo nacidos muertos por parto natural?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "hijos_vivos_parto_natural", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijos nacidos vivos por parto natural?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "hijos_muertos_por_cesarea", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijos nacidos muertos por cesarea?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "hijos_vivos_por_cesarea", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijos nacidos vivos por cesarea?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "cuantos_abortos", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos abortos ha tenido?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "cuantos_gemelos_multiples", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos gemelos/multiples ha tenido?", "tipo" => "numero"]);

                //* salud_mental
                Pregunta::create(["ref_campo" => "depresion", "ref_seccion" => "salud_mental", "descripcion" => "Depresión", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "intento_suicidio", "ref_seccion" => "salud_mental", "descripcion" => "Intento de suicidio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "trastorno_afectivo", "ref_seccion" => "salud_mental", "descripcion" => "Trastorno afectivo", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "esquizofrenia", "ref_seccion" => "salud_mental", "descripcion" => "Esquizofrenia", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "bulimia", "ref_seccion" => "salud_mental", "descripcion" => "Bulímia", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "anorexia", "ref_seccion" => "salud_mental", "descripcion" => "Anorexía", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "tratamiento", "ref_seccion" => "salud_mental", "descripcion" => "¿Esta en tratamiento?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "diagnostico", "ref_seccion" => "salud_mental", "descripcion" => "Diagnóstico de salud mental", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "violencia_fisica", "ref_seccion" => "salud_mental", "descripcion" => "Violencia física", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "violencia_psicologica", "ref_seccion" => "salud_mental", "descripcion" => "Violencia Psicologíca", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "violencia_sexual", "ref_seccion" => "salud_mental", "descripcion" => "Violencia sexual", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "violencia_institucional", "ref_seccion" => "salud_mental", "descripcion" => "Violencia institucional", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "violencia_social", "ref_seccion" => "salud_mental", "descripcion" => "Violencia social", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "violencia_gestacion", "ref_seccion" => "salud_mental", "descripcion" => "Violencia en la gestacion", "tipo" => "seleccion"]);

                //* salud_publica
                Pregunta::create(["ref_campo" => "tuberculosis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Enfermedad crónica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "lepra", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Lepra", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "chagas", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Chagas", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "sifilis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Sifílis", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "dengue", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Dengue", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "malaria", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Malaria", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "leishmaniasis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Leishmaniasis", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "brucelosis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Brucelosis", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "sika_chicungunya", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Sika- chicungunya", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "varicela", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Varicela", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "intoxicacion", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Intoxicación", "tipo" => "seleccion"]);

                //* morbilidad
                Pregunta::create(["ref_campo" => "enfermedad_cronica", "ref_seccion" => "morbilidad", "descripcion" => "Enfermedad crónica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "enfermedad_cronica_cual", "ref_seccion" => "morbilidad", "descripcion" => "¿Cuál enfermedad crónica?", "tipo" => "texto"]);
                Pregunta::create(["ref_campo" => "controlada", "ref_seccion" => "morbilidad", "descripcion" => "¿Controlada?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "propiedades_respiratorio", "ref_seccion" => "morbilidad", "descripcion" => "Propiedades sintomaticos respiratorio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "propiedades_piel", "ref_seccion" => "morbilidad", "descripcion" => "Propiedades sintomaticos de la piel", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "enfermedades_congenitas", "ref_seccion" => "morbilidad", "descripcion" => "Enfermedades congenitas", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "enfermedades_congenitas_cual", "ref_seccion" => "morbilidad", "descripcion" => "¿Cuál enfermedad congenita?", "tipo" => "texto"]);

                //* identificacion_ciudadana
                Pregunta::create(["ref_campo" => "grupo_etnia", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Grupo de atención- Etnia", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "grupo_atencion_especial", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Grupo de atención- Grupos de atención especial (G.A.E)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "programas", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Programas", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "cual_programa", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "¿Cual programa?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "seguridad_social", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Segurídad socual- tipo de afiliación", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "esta_estudiando", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "¿Está estudiando?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "tipo_educacion", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Tipo educacion", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "por_que", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "¿Por qué no estudia?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ocupacion_ingreso", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Ocupación/ ingreso", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "discapacidad", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Discapacidad", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ayudas_tenicas", "ref_seccion" => "identificacion_ciudadana", "descripcion" => "Ayudas ténicas", "tipo" => "seleccion"]);

        //* vivienda
        Pregunta::create(["ref_campo"=> "encuesta_sisben", "ref_seccion" => "vivienda", "descripcion" => "¿Realizó encuesta SISBEN?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ficha_sisben", "ref_seccion" => "vivienda", "descripcion" => "No. ficha SISBEN", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "puntaje_sisben", "ref_seccion" => "vivienda", "descripcion" => "Puntaje SISBEN", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "nivel_sisben", "ref_seccion" => "vivienda", "descripcion" => "Nivel SISBEN", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "tipos_vivienda", "ref_seccion" => "vivienda", "descripcion" => "Tipo de vivienda", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_tenecia", "ref_seccion" => "vivienda", "descripcion" => "Tenencia", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "servicios_sanitarios", "ref_seccion" => "vivienda", "descripcion" => "Servicio sanitario", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_alumbrado", "ref_seccion" => "vivienda", "descripcion" => "Tipo de alumbrado utilizado principalmente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "dormitorios", "ref_seccion" => "vivienda", "descripcion" => "¿ En alguno de los dormitorios de la vivienda duerme tres o más personas?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "humo_vivienda", "ref_seccion" => "vivienda", "descripcion" => "¿Hay humo dentro de la vivienda?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "fuentes_agua", "ref_seccion" => "vivienda", "descripcion" => "¿De dónde se toma el agua para consumo humano?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_tratamiento_agua", "ref_seccion" => "vivienda", "descripcion" => "Tipo de tratamiento casero al agua", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tratamiento_agua", "ref_seccion" => "vivienda", "descripcion" => "Tratamiento del agua en la fuente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_disposicion_basura", "ref_seccion" => "vivienda", "descripcion" => "La basura es", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "reciclan", "ref_seccion" => "vivienda", "descripcion" => "¿Se reciclan (reclasifican) las basuras?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "iluminacion_adecuada", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Iluminación adecuada", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ventilacion_adecuada", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Ventilación adecuada", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "roedores", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Roedores", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "reservorios_agua", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Reservorios de agua (criadero de zancudos)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "anjeos", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Anjeos en puertas y ventanas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_insectos_vectores", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Presencia de insectos vectores", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "conservacion_alimentos", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Manejo de conservación adecuada de alimentos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "actividad_productiva", "ref_seccion" => "vivienda", "descripcion" => "¿Hay actividad productiva en la vivienda?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ciuu", "ref_seccion" => "vivienda", "descripcion" => "CIUU", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "tipos_material_piso", "ref_seccion" => "vivienda", "descripcion" => "El material predominante en el piso es", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_material_techo", "ref_seccion" => "vivienda", "descripcion" => "El material predominante en el techo es", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_material_paredes", "ref_seccion" => "vivienda", "descripcion" => "El material predominante en las paredes es", "tipo" => "seleccion"]);

                //* animales
                Pregunta::create(["ref_campo" => "gatos", "ref_seccion" => "animales", "descripcion" => "Gatos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "gatos_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos gatos?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "gatos_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos gatos vacuandos?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "perros", "ref_seccion" => "animales", "descripcion" => "Perros", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "perros_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos perros?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "perros_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos perros vacuandos?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "equinos", "ref_seccion" => "animales", "descripcion" => "Equinos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "equinos_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos equinos?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "equinos_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos equinos vacunados?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "aves", "ref_seccion" => "animales", "descripcion" => "Aves", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "porcinos", "ref_seccion" => "animales", "descripcion" => "Porcinos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "porcinos_cuantos", "ref_seccion" => "animales", "descripcion" => "¿Cuántos porcinos?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "porcinos_vacunados", "ref_seccion" => "animales", "descripcion" => "¿Cuántos porcinos vacunados?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "animales_no_rabia", "ref_seccion" => "animales", "descripcion" => "Animales silvestres que no trasmiten rabia", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "animales_si_rabia", "ref_seccion" => "animales", "descripcion" => "Otros animales silvestres que si trasmiten rabia", "tipo" => "numero"]);

                //* mortalidad
                Pregunta::create(["ref_campo" => "fallecido_familiar", "ref_seccion" => "mortalidad", "descripcion" => "¿Ha fallecido algun miembro del grupo familiar recientemente?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "sexo_fallecido", "ref_seccion" => "mortalidad", "descripcion" => "Sexo del fallecido", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "edad_fallecido", "ref_seccion" => "mortalidad", "descripcion" => "Edad del fallecido", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "causa_muerte", "ref_seccion" => "mortalidad", "descripcion" => "Causa de muerte", "tipo" => "texto"]);
                Pregunta::create(["ref_campo" => "fecha_muerte", "ref_seccion" => "mortalidad", "descripcion" => "Fecha de muerte", "tipo" => "fecha"]);

                //* seguridad_alimentaria
                Pregunta::create(["ref_campo" => "falto_dinero", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿En el último mes faltó el dinero en el hogar para comprar alimentos?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "animales_silvestres", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Consumen animales silvestres?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "consume_cerdo_res_pollo", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen carne de cerdo, res, pollo u otra?", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_huevos", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen huevos", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_frijol_lentejas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen frijol, lentejas, arvejas, garbanzos …", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_lacteos", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Lacteos y derivados", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_harinas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Harinas fortificadas", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_verduras", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen verduras", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_frutas_frescas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Frutas (frescas o en jugos)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_enlatados", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Enlatados (atun, sardinas)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_platano_yuca", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Platano, yuca, arroz, papa", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "consume_gaseosas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Gaseosas", "tipo" => "numero"]);

                //* primera_infancia
                Pregunta::create(["ref_campo" => "pi_peso_al_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Peso al nacer (kg)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "pi_peso_actual", "ref_seccion" => "primera_infancia", "descripcion" => "Peso (kg)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "pi_talla_al_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Talla al nacer (cm)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "pi_talla_actual", "ref_seccion" => "primera_infancia", "descripcion" => "Talla (cm)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "pi_valoracion_nutricional", "ref_seccion" => "primera_infancia", "descripcion" => "Cinta", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_desarrollo_lenguaje", "ref_seccion" => "primera_infancia", "descripcion" => "Lenguaje", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_desarrollo_motora", "ref_seccion" => "primera_infancia", "descripcion" => "Motora", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_desarrollo_conducta", "ref_seccion" => "primera_infancia", "descripcion" => "Conducta", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_desarrollo_probelmas_visuales", "ref_seccion" => "primera_infancia", "descripcion" => "problemas Visuales", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_desarrollo_problemas_auditivos", "ref_seccion" => "primera_infancia", "descripcion" => "problemas Auditivos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_desparasitado", "ref_seccion" => "primera_infancia", "descripcion" => "Desparasitado en el ultimo año", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_hospitalizacion_nacer", "ref_seccion" => "primera_infancia", "descripcion" => "Hospitalización al nacer", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_carnet_vacunacion", "ref_seccion" => "primera_infancia", "descripcion" => "Carnet", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_bcg_rn", "ref_seccion" => "primera_infancia", "descripcion" => "BCG", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_polio_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_polio_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_polio_d3", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_polio_r1", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_polio_r2", "ref_seccion" => "primera_infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_hepatitis_a", "ref_seccion" => "primera_infancia", "descripcion" => "Hepatitis A", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_hepatitis_b_rn", "ref_seccion" => "primera_infancia", "descripcion" => "Hepatitis B", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_influenza_estacional", "ref_seccion" => "primera_infancia", "descripcion" => "Influenza estacional", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_neumococo_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_neumococo_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_neumococo_d3", "ref_seccion" => "primera_infancia", "descripcion" => "Neumococo", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_rotavirus_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Rotavirus", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_rotavirus_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Rotavirus", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_fiebre_amarilla", "ref_seccion" => "primera_infancia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_dpt_d1", "ref_seccion" => "primera_infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_dpt_d2", "ref_seccion" => "primera_infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_pentavalente_d1", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_pentavalente_d2", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_pentavalente_d3", "ref_seccion" => "primera_infancia", "descripcion" => "Pentavalente", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_srp_d1", "ref_seccion" => "primera_infancia", "descripcion" => "SRP ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_srp_d2", "ref_seccion" => "primera_infancia", "descripcion" => "SRP", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_vacuna_varicela", "ref_seccion" => "primera_infancia", "descripcion" => "Varicela", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_atencion_medica", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_atencion_enfermeria", "ref_seccion" => "primera_infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_atencion_lactancia", "ref_seccion" => "primera_infancia", "descripcion" => "Atención prevención y apoyo de lactancia materna", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_tsh", "ref_seccion" => "primera_infancia", "descripcion" => "TSH", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_fluor", "ref_seccion" => "primera_infancia", "descripcion" => "Aplicación de fluor ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_profilaxis", "ref_seccion" => "primera_infancia", "descripcion" => "Profilaxis y remoción placa bacteriana", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_sellantes", "ref_seccion" => "primera_infancia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_higiene_bucal", "ref_seccion" => "primera_infancia", "descripcion" => "Higiene bucal", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_caries", "ref_seccion" => "primera_infancia", "descripcion" => "Caries", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "pi_consulta_odontologica", "ref_seccion" => "primera_infancia", "descripcion" => "Consulta odontologia", "tipo" => "seleccion"]);

                //* infancia
                Pregunta::create(["ref_campo" => "in_peso", "ref_seccion" => "infancia", "descripcion" => "Peso (kg)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "in_talla", "ref_seccion" => "infancia", "descripcion" => "Talla (cm)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "in_desarrollo_lenguaje", "ref_seccion" => "infancia", "descripcion" => "Lenguaje", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_desarrollo_motora", "ref_seccion" => "infancia", "descripcion" => "Motora", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_desarrollo_conducta", "ref_seccion" => "infancia", "descripcion" => "Conducta", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_desarrollo_probelmas_visuales", "ref_seccion" => "infancia", "descripcion" => "problemas Visuales", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_desarrollo_problemas_auditivos", "ref_seccion" => "infancia", "descripcion" => "problemas Auditivos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_desparasitado", "ref_seccion" => "infancia", "descripcion" => "Desparasitado en el ultimo año los ultimos 6 meses", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_carnet_vacunacion", "ref_seccion" => "infancia", "descripcion" => "Carnet", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_dpt_r2", "ref_seccion" => "infancia", "descripcion" => "DPT", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_polio_r2", "ref_seccion" => "infancia", "descripcion" => "Polio", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_srp_r1", "ref_seccion" => "infancia", "descripcion" => "SRP", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_fiebre_amarilla", "ref_seccion" => "infancia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_vph_d1", "ref_seccion" => "infancia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_vph_d2", "ref_seccion" => "infancia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_vacuna_vph_d3", "ref_seccion" => "infancia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_caries", "ref_seccion" => "infancia", "descripcion" => "Caries", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_consulta_odontologica", "ref_seccion" => "infancia", "descripcion" => "Consulta odontologia (ultimos 6 meses)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_uso_seda_dental", "ref_seccion" => "infancia", "descripcion" => "Uso de seda dental", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_fluor", "ref_seccion" => "infancia", "descripcion" => "Aplicación de fluor", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_profilaxis", "ref_seccion" => "infancia", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_sellantes", "ref_seccion" => "infancia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_atencion_medica", "ref_seccion" => "infancia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "in_atencion_enfermeria", "ref_seccion" => "infancia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);

                //* adolescencia
                Pregunta::create(["ref_campo" => "adol_peso", "ref_seccion" => "adolescencia", "descripcion" => "Peso (kg)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adol_talla", "ref_seccion" => "adolescencia", "descripcion" => "Talla (cm)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adol_imc", "ref_seccion" => "adolescencia", "descripcion" => "Indice de Masa Corporal", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adol_asesoria_anticonceptiva", "ref_seccion" => "adolescencia", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_planifica", "ref_seccion" => "adolescencia", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_metodo_planficica", "ref_seccion" => "adolescencia", "descripcion" => "Metodo", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_desde_cuando_planifica", "ref_seccion" => "adolescencia", "descripcion" => "¿Desde cuando planifica?", "tipo" => "fecha"]);
                Pregunta::create(["ref_campo" => "adol_razon_no_planifica", "ref_seccion" => "adolescencia", "descripcion" => "No planifica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_atencion_medica", "ref_seccion" => "adolescencia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_atencion_enfermeria", "ref_seccion" => "adolescencia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_salud_bucal", "ref_seccion" => "adolescencia", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_fluor", "ref_seccion" => "adolescencia", "descripcion" => "Aplicación de fluor", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_profilaxis", "ref_seccion" => "adolescencia", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_sellantes", "ref_seccion" => "adolescencia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_supragingival", "ref_seccion" => "adolescencia", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_vacunacion", "ref_seccion" => "adolescencia", "descripcion" => "Vacunación", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_vacuna_fiebre_amarilla", "ref_seccion" => "adolescencia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_vacuna_vph", "ref_seccion" => "adolescencia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adol_vacuna_toxoide_tetanico", "ref_seccion" => "adolescencia", "descripcion" => "Toxoide tetánico", "tipo" => "seleccion"]);

                //* juventud
                Pregunta::create(["ref_campo" => "juv_cancer_cuello_uterino", "ref_seccion" => "juventud", "descripcion" => "Tamizaje de cancer de cuello uterino (citología)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_colposcopia", "ref_seccion" => "juventud", "descripcion" => "Colposcopia (30 dias desde la citología)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_bioscopia_cervico", "ref_seccion" => "juventud", "descripcion" => "Bioscopia cervico uterina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_examen_seno", "ref_seccion" => "juventud", "descripcion" => "Examen físico de seno (último año)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_control_medico", "ref_seccion" => "juventud", "descripcion" => "¿Asistió al control médico con el resultado?", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_planifica", "ref_seccion" => "juventud", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_metodo_planifica", "ref_seccion" => "juventud", "descripcion" => "Metodo", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_tiempo_metodo", "ref_seccion" => "juventud", "descripcion" => "Tiempo con el método (meses)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "juv_asesoria_anticoncepcion", "ref_seccion" => "juventud", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_razones_no_planifica", "ref_seccion" => "juventud", "descripcion" => "No planifica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_parejas_sexuales_al_anio", "ref_seccion" => "juventud", "descripcion" => "Número de parejas sexuales en el último año", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "juv_atencion_medica", "ref_seccion" => "juventud", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_atencion_enfermeria", "ref_seccion" => "juventud", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_salud_vocal", "ref_seccion" => "juventud", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_vasectomia", "ref_seccion" => "juventud", "descripcion" => "Vasectomía", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_esterilizacion_femenina", "ref_seccion" => "juventud", "descripcion" => "esterilizacion femenina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_vias_esterilizacion", "ref_seccion" => "juventud", "descripcion" => "Vía de esterilización", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_profilaxis", "ref_seccion" => "juventud", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_detartraje_supragingival", "ref_seccion" => "juventud", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_prueba_vih", "ref_seccion" => "juventud", "descripcion" => "Prueba de VIH", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_antecedentes_diabetes", "ref_seccion" => "juventud", "descripcion" => "Antecedentes de diabetes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_antecedentes_hipertension", "ref_seccion" => "juventud", "descripcion" => "Antecedentes de hipertensión", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_alteracion_colesterol", "ref_seccion" => "juventud", "descripcion" => "Alteración del colesterol", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "juv_perimetro_abdominal", "ref_seccion" => "juventud", "descripcion" => "Perímetro abdominal", "tipo" => "numero"]);

                //* adultez
                Pregunta::create(["ref_campo" => "adul_valoracion_peso", "ref_seccion" => "adultez", "descripcion" => "Peso (kg)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adul_valoracion_talla", "ref_seccion" => "adultez", "descripcion" => "Talla (cm)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adul_imc", "ref_seccion" => "adultez", "descripcion" => "Indice de Masa Corporal", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adul_asesoria_anticoncepcion", "ref_seccion" => "adultez", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_planifica", "ref_seccion" => "adultez", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_metodo_planifica", "ref_seccion" => "adultez", "descripcion" => "Método", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_desde_cuando_planifica", "ref_seccion" => "adultez", "descripcion" => "¿Desde cuando planifica?", "tipo" => "fecha"]);
                Pregunta::create(["ref_campo" => "adul_razones_no_planifica", "ref_seccion" => "adultez", "descripcion" => "No planifica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_parejas_sexuales_al_anio", "ref_seccion" => "adultez", "descripcion" => "Número de parejas sexuales en el ultimo año", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adul_control_adultos", "ref_seccion" => "adultez", "descripcion" => "Asiste al programa de control de adultos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_antecedentes_diabetes", "ref_seccion" => "adultez", "descripcion" => "Antecedentes de diabetes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_antecedentes_hipertension", "ref_seccion" => "adultez", "descripcion" => "Antecedentes de hipertensión", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_antecedentes_colesterol", "ref_seccion" => "adultez", "descripcion" => "Alteración del colesterol", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_perimetro_abdominal", "ref_seccion" => "adultez", "descripcion" => "Perímetro abdominal", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "adul_atencion_medica", "ref_seccion" => "adultez", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_salud_bucal", "ref_seccion" => "adultez", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_cancer_cuello_uterino_adn_vph", "ref_seccion" => "adultez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_cancer_cuello_uterino_adn_vph_positivo", "ref_seccion" => "adultez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH Positivo)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_colposcopia_cervico_uterina", "ref_seccion" => "adultez", "descripcion" => "Colposcopia cervico uterina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_biopsia_cervico_uterina", "ref_seccion" => "adultez", "descripcion" => "Biopsia cervico uterina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_cancer_mama_mamografia", "ref_seccion" => "adultez", "descripcion" => "Tamizaje para cancer de mama (mamografía)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_cancer_mama_valoracion_clinica", "ref_seccion" => "adultez", "descripcion" => "Tamizaje para cancer de mama (valoración clínica de la mama)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_cancer_prostata", "ref_seccion" => "adultez", "descripcion" => "Tamizaje para cancer de prostata (PSA)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_vasectomia", "ref_seccion" => "adultez", "descripcion" => "Vasectomía SOD", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_esterilizacion_femenina", "ref_seccion" => "adultez", "descripcion" => "esterilizacion femenina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_vias_esterilizacion", "ref_seccion" => "adultez", "descripcion" => "Vía de esterilización", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_profilaxis", "ref_seccion" => "adultez", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_detartraje_supragingival", "ref_seccion" => "adultez", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_fiebre_amarilla", "ref_seccion" => "adultez", "descripcion" => "Vacuna fiebre amarilla", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "adul_prueba_vih", "ref_seccion" => "adultez", "descripcion" => "Prueba de VIH", "tipo" => "seleccion"]);

                //* vejez
                Pregunta::create(["ref_campo" => "ve_valoracion_peso", "ref_seccion" => "vejez", "descripcion" => "Peso (kg)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "ve_valoracion_talla", "ref_seccion" => "vejez", "descripcion" => "Talla (cm)", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "ve_imc", "ref_seccion" => "vejez", "descripcion" => "Indice de Masa Corporal", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "ve_asesoria_anticoncepcion", "ref_seccion" => "vejez", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_planifica", "ref_seccion" => "vejez", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_metodo_planifica", "ref_seccion" => "vejez", "descripcion" => "Método", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_desde_cuando_planifica", "ref_seccion" => "vejez", "descripcion" => "¿Desde cuando planifica?", "tipo" => "fecha"]);
                Pregunta::create(["ref_campo" => "ve_razones_no_planifica", "ref_seccion" => "vejez", "descripcion" => "No planifica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_parejas_sexuales_al_año", "ref_seccion" => "vejez", "descripcion" => "Número de parejas sexuales en el ultimo año", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_control_adultos", "ref_seccion" => "vejez", "descripcion" => "Asiste al programa de control de adultos", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_antecedentes_diabetes", "ref_seccion" => "vejez", "descripcion" => "Antecedentes de diabetes", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_antecedentes_hipertension", "ref_seccion" => "vejez", "descripcion" => "Antecedentes de hipertensión", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_alteracion_colesterol", "ref_seccion" => "vejez", "descripcion" => "Alteración del colesterol", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_perimetro_abdominal", "ref_seccion" => "vejez", "descripcion" => "Perímetro abdominal", "tipo" => "numero"]);
                Pregunta::create(["ref_campo" => "ve_salud_medica", "ref_seccion" => "vejez", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_salud_bucal", "ref_seccion" => "vejez", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph", "ref_seccion" => "vejez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_cancer_cuello_uterino_adn_vph_positivo", "ref_seccion" => "vejez", "descripcion" => "Tamizaje de cancer de cuello uterino (ADN VPH Positivo)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_colposcopia_uterina", "ref_seccion" => "vejez", "descripcion" => "Colposcopia cervico uterina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_bioscopia_uterina", "ref_seccion" => "vejez", "descripcion" => "Biopsia cervico uterina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_cancer_mama_mamografia", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de mama (mamografía)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_cancer_mama_valoracion_clinica", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de mama (valoración clínica de la mama)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_cancer_prostata_psa", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de prostata (PSA)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_cancer_prostata_rectal", "ref_seccion" => "vejez", "descripcion" => "Tamizaje para cancer de prostata (Tacto rectal)", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_vasectomia", "ref_seccion" => "vejez", "descripcion" => "Vasectomía SOD", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_esterilizacion_femenina", "ref_seccion" => "vejez", "descripcion" => "esterilizacion femenina", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_vias_esterilizacion", "ref_seccion" => "vejez", "descripcion" => "Vía de esterilización", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_profilaxis", "ref_seccion" => "vejez", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_detartraje_supragingival", "ref_seccion" => "vejez", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_vacuna_fiebre_amarilla", "ref_seccion" => "vejez", "descripcion" => "Vacuna fiebre amarilla", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_vacuna_influenza", "ref_seccion" => "vejez", "descripcion" => "Vacuna contra influenza", "tipo" => "seleccion"]);
                Pregunta::create(["ref_campo" => "ve_prueba_vih", "ref_seccion" => "vejez", "descripcion" => "Prueba de VIH", "tipo" => "seleccion"]);

        //* materno_perinatal
        Pregunta::create(["ref_campo"=> "ma_aceptacion_embarazo", "ref_seccion" => "materno_perinatal", "descripcion" => "Aceptacion del embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_fecha_control_prenatal", "ref_seccion" => "materno_perinatal", "descripcion" => "fecha de control prenatal", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_fecha_ultima_regla", "ref_seccion" => "materno_perinatal", "descripcion" => "Fecha de la ultima regla", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_fecha_parto", "ref_seccion" => "materno_perinatal", "descripcion" => "Fecha probable del parto", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_ganancia_peso", "ref_seccion" => "materno_perinatal", "descripcion" => "Ganancia de peso", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ma_gestacion", "ref_seccion" => "materno_perinatal", "descripcion" => "semanas de gestación", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ma_carnet", "ref_seccion" => "materno_perinatal", "descripcion" => "Carnet  de control prenatal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_prenatal_mensual", "ref_seccion" => "materno_perinatal", "descripcion" => "Control prenantal mensual", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_serologia_1_trimestre", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen Serología (V.D.R.L) primer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_serologia_2_trimestre", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen Serología (V.D.R.L) segundo trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_serologia_3_trimestre", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen Serología (V.D.R.L) tercer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_vih_1_trimestre", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen VIH primer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_vih_2_trimestre", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen VIH segundo trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_examen_vih_3_trimestre", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen VIH tercer trimestre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_odontologico", "ref_seccion" => "materno_perinatal", "descripcion" => "Examen odontologíco", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_suplementacion", "ref_seccion" => "materno_perinatal", "descripcion" => "Suplemtacion con acido folico, hierro y calcio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_sedentarismo", "ref_seccion" => "materno_perinatal", "descripcion" => "Sedentarismo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_bebidas_alcoholicas", "ref_seccion" => "materno_perinatal", "descripcion" => "Consume bebidas alcoholicas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_fecha_ultimo_parto", "ref_seccion" => "materno_perinatal", "descripcion" => "Fecha del último parto", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "ma_depresion_postparto", "ref_seccion" => "materno_perinatal", "descripcion" => "Depresión postparto", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_institucional", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención institucional", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_aborto_no_especificado", "ref_seccion" => "materno_perinatal", "descripcion" => "Aborto no especificado", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemorragia_precoz", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemorragía precoz del embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemorragia_anteparto", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemorragía anteparto no especificada en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hipertension", "ref_seccion" => "materno_perinatal", "descripcion" => "Hipertensión materna no especifícada ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vomitos", "ref_seccion" => "materno_perinatal", "descripcion" => "Vomitos excesivos en el embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_madre", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención de la madre por otras complicaciones principalmente relacionads con el embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_diabetes_mellitus", "ref_seccion" => "materno_perinatal", "descripcion" => "Díabetes mellítus en el embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hallazgo_anormal", "ref_seccion" => "materno_perinatal", "descripcion" => "Hallazgo anormal en el examen prenatal de la madre", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_parto_unico", "ref_seccion" => "materno_perinatal", "descripcion" => "Parto único espontáneo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_parto_complicado", "ref_seccion" => "materno_perinatal", "descripcion" => "Trabajo de parto y parto complicados por hemorragía intraparto, no clasificada en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemorragia_postparto", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemorragía postparto", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_parto_cesarea", "ref_seccion" => "materno_perinatal", "descripcion" => "Parto único por cesárea", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_otras_complicaciones_parto", "ref_seccion" => "materno_perinatal", "descripcion" => "Otras complicaciones del trabajo del parto y partos no clasificadas en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_otras_complicaciones_purperio", "ref_seccion" => "materno_perinatal", "descripcion" => "Otras complicaciones del puerperio, no clasificadas en otra parte", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hospitalizacion_sifilis", "ref_seccion" => "materno_perinatal", "descripcion" => "Hospitalización del recien nacido por sífilis", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_edad_gestacional", "ref_seccion" => "materno_perinatal", "descripcion" => "Edad gestacional al nacer (semanas)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "ma_plan_canguro", "ref_seccion" => "materno_perinatal", "descripcion" => "Plan canguro", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_curso_maternidad_paternidad", "ref_seccion" => "materno_perinatal", "descripcion" => "Curso de preparación de maternidad y paternidad", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_medica", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_enfermeria", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención en salud por enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_odontologica", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención en salud odontologíca", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_antigeno_hepatitis_b", "ref_seccion" => "materno_perinatal", "descripcion" => "Antigeno de superficie de hepatitis B", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_cancer_cuello_uterino", "ref_seccion" => "materno_perinatal", "descripcion" => "Tamizaje para detección temprana de cancer de cuello uterino", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_glicemia_ayuna", "ref_seccion" => "materno_perinatal", "descripcion" => "Glicemia en ayunas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemoclasificacion", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemoclasificación", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemograma", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemográma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemoparasitos_chagas", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemoparásitos (chagas)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_toxoplasma", "ref_seccion" => "materno_perinatal", "descripcion" => "IgG G toxoplasma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_rubeola", "ref_seccion" => "materno_perinatal", "descripcion" => "IgG G rubeola", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_varicela", "ref_seccion" => "materno_perinatal", "descripcion" => "IgG G varicela", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_prueba_treponemica_sifilis", "ref_seccion" => "materno_perinatal", "descripcion" => "Prueba treponemica rapida para sífilis", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_urocultivo", "ref_seccion" => "materno_perinatal", "descripcion" => "Urocultivo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_prueba_vih", "ref_seccion" => "materno_perinatal", "descripcion" => "VIH prueba rapida con asesoria y pre y postest", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_espermograma", "ref_seccion" => "materno_perinatal", "descripcion" => "Espermograma", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_citologia", "ref_seccion" => "materno_perinatal", "descripcion" => "Citología", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_elisa", "ref_seccion" => "materno_perinatal", "descripcion" => "Elisa", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_micronutrientes", "ref_seccion" => "materno_perinatal", "descripcion" => "Suplementación con micronutrientes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_medica_general", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención para el cuidado prenatal consulta médica general", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_enfermeria", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención para el cuidado prenatal consulta enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_medica_obstetra", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención para el cuidado prenatal consulta médica especializada obstetra", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_prenatal_consulta_nutricion", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención para el cuidado prenatal consulta nutrición ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_toxoide", "ref_seccion" => "materno_perinatal", "descripcion" => "Vacunación toxoide tetánico", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_difteria", "ref_seccion" => "materno_perinatal", "descripcion" => "Vacunación diftería ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_tosferina", "ref_seccion" => "materno_perinatal", "descripcion" => "Vacunación tosferina", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vacunacion_influenza", "ref_seccion" => "materno_perinatal", "descripcion" => "Vacunación Influenza", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_ecografia_obstetrica", "ref_seccion" => "materno_perinatal", "descripcion" => "Ecografía obstétrica transabdominal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_ecografia_anatomico", "ref_seccion" => "materno_perinatal", "descripcion" => "Ecografía de detalle anatómico", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_interrupcion_voluntaria_embarazo", "ref_seccion" => "materno_perinatal", "descripcion" => "Interrupción voluntaria del embarazo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_asesoria_anticonceptiva_ive", "ref_seccion" => "materno_perinatal", "descripcion" => "Asesoría y provisión anticonceptiva post IVE", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_purperio", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención del puerperio", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_pediatria", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención para el cuidado del recién nacido (pediatría)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_atencion_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Atención para el tamizaje del recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemograma_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemográma en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_hemoclasificacion_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Hemoclasificación en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_sifilis_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Prueba rápida para sífilis en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_vih_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Prueba rápida para el VIH en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_chagas_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Tamizaje para chagas en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_tsh_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "TSH en el recien nacido", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ma_tamizaje_genetico_recien_nacido", "ref_seccion" => "materno_perinatal", "descripcion" => "Tamizaje genético en el recien nacido", "tipo" => "seleccion"]);

        
    }
}
