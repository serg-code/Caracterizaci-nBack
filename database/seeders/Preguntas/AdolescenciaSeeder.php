<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdolescenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo"=> "adol_peso", "ref_seccion" => "adolescencia", "descripcion" => "Valoración nutricional: Peso (kgs)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adol_talla", "ref_seccion" => "adolescencia", "descripcion" => "Valoración nutricional:  Talla (cm)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adol_imc", "ref_seccion" => "adolescencia", "descripcion" => "Indice de Masa Corporal", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "adol_asesoria_anticonceptiva_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Atención en salud para la asesoria en anticoncepción", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_planifica", "ref_seccion" => "adolescencia", "descripcion" => "Planifica: Método", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_metodo_planficica", "ref_seccion" => "adolescencia", "descripcion" => "Metodo", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_desde_cuando_planifica", "ref_seccion" => "adolescencia", "descripcion" => "¿Desde cuando planifica?", "tipo" => "fecha"]);
Pregunta::create(["ref_campo"=> "adol_razon_no_planifica", "ref_seccion" => "adolescencia", "descripcion" => "No planifica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_atencion_medica_12_16_anios", "ref_seccion" => "adolescencia", "descripcion" => "Atención en salud médica", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_atencion_enfermeria_13_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Atención en salud en enfermería", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_salud_bucal_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Atención salud bucal", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_fluor_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Aplicación de fluor", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_profilaxis_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Profilaxis y remoción de placa bacteriana", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_sellantes_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Aplicación de sellantes", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_supragingival_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Detartraje supragingival", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_vacunacion_12_a_17_anios", "ref_seccion" => "adolescencia", "descripcion" => "Vacunación", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_vacuna_fiebre_amarilla", "ref_seccion" => "adolescencia", "descripcion" => "Fiebre amarilla", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_vacuna_vph", "ref_seccion" => "adolescencia", "descripcion" => "VPH ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "adol_vacuna_toxoide_tetanico", "ref_seccion" => "adolescencia", "descripcion" => "Toxoide tetánico", "tipo" => "seleccion"]);

    }
}
