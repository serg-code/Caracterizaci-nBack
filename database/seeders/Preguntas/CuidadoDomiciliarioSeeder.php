<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuidadoDomiciliarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "diagnostico_principal", "ref_seccion" => "cuidados_domiciliarios ", "descripcion" => "Diagnostico principal ", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "causa", "ref_seccion" => "cuidados_domiciliarios ", "descripcion" => "Causa", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "fecha_inicio_domiciliario", "ref_seccion" => "cuidados_domiciliarios ", "descripcion" => "Fecha de inicio del cuidado domiciliario", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "oxigeno_domiciliario", "ref_seccion" => "cuidados_domiciliarios ", "descripcion" => "¿Recibe oxigeno domiciliario?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "plan_aprobado", "ref_seccion" => "cuidados_domiciliarios ", "descripcion" => "Plan aprobado", "tipo" => "seleccion multiple"]);
Pregunta::create(["ref_campo"=> "", "ref_seccion" => " ", "descripcion" => "", "tipo" => ""]);

    }
}
