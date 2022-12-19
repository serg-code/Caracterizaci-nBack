<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentificacionCiudadanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "grupo_etnia", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Grupo de atención- Etnia", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "grupo_atencion_especial", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Grupo de atención- Grupos de atención especial (G.A.E)", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "programas", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Programas", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "cual_programa", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "¿Cual programa?", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "seguridad_social", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Segurídad socual- tipo de afiliación", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "esta_estudiando", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "¿Esta estudiando?", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "por_que", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "¿Por qué?", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "ocupacion_ingreso", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Ocupación/ ingreso", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "discapacidad", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Discapacidad", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "ayudas_tenicas", "ref_seccion" => "identificacion_ciudadana ", "descripcion" => "Ayudas ténicas", "tipo" => "selección"]);

    }
}
