<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuidadoEnfermedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        Pregunta::create(["ref_campo" => "ha_estado_embarazada", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Ha estado embarazada?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "cuantos_embarazos_ha_tenido", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuantos embarazos ha tenido?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "hijos_muertos_parto_natural", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijo nacidos muertos por parto natural?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "hijos_vivos_parto_natural", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijos nacidos vivos por parto natural?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "hijos_muertos_por_cesarea", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijos nacidos muertos por cesarea?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "hijos_vivos_por_cesarea", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos hijos nacidos vivos por cesarea?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "cuantos_abortos", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos abortos ha tenido?", "tipo" => "numero"]);
        Pregunta::create(["ref_campo" => "cuantos_gemelos_multiples", "ref_seccion" => "cuidado_enfermedades", "descripcion" => "¿Cuántos gemelos/multiples ha tenido?", "tipo" => "numero"]);
    }
}
