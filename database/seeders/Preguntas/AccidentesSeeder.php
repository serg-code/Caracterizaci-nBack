<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccidentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["ref_campo" => "accidentes_transito", "ref_seccion" => "accidentes", "descripcion" => "¿Ha sufrido accidentes de transito?", "tipo" => "seleccion"]);
        Pregunta::create(["ref_campo" => "tipo_lesión", "ref_seccion" => "accidentes", "descripcion" => "Tipo de lesión", "tipo" => "seleccion multiple"]);
        Pregunta::create(["ref_campo" => "accidentes_laborales", "ref_seccion" => "accidentes", "descripcion" => "¿Ha sufrido accidentes laborales?", "tipo" => "seleccion"]);
    }
}
