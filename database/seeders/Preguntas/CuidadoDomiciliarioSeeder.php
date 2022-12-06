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
        Pregunta::create(["ref_campo" => "cuidados_domiciliarios", "ref_seccion" => "cuidados_domiciliario", "descripcion" => "¿Recibe cuidados domiciliarios?", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo" => "diagnostico_principal", "ref_seccion" => "cuidados_domiciliario", "descripcion" => "Diagnostico principal ", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo" => "causa", "ref_seccion" => "cuidados_domiciliario", "descripcion" => "Causa", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo" => "fecha_inicio_domiciliario", "ref_seccion" => "cuidados_domiciliario", "descripcion" => "Fecha de inicio del cuidado domiciliario", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo" => "oxigeno_domiciliario", "ref_seccion" => "cuidados_domiciliario", "descripcion" => "¿Recibe oxigeno domiciliario?", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo" => "plan_aprobado", "ref_seccion" => "cuidados_domiciliario", "descripcion" => "Plan aprobado", "tipo" => "seleccion"]);
    }
}
