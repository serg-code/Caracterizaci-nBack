<?php

namespace Database\Seeders;

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
        Pregunta::create(["ref_campo"=> "tipo_lesión", "ref_seccion" => "accidentes ", "descripcion" => "Tipo de lesión", "tipo" => "seleccion multiple"]);	
Pregunta::create(["ref_campo"=> "accidentes_laborales", "ref_seccion" => "accidentes ", "descripcion" => "¿Ha sufrido accidentes laborales?", "tipo" => "seleccion"]);	
Pregunta::create(["ref_campo"=> "cuidados_domiciliarios", "ref_seccion" => "cuidados_domiciliarios ", "descripcion" => "¿Recibe cuidados domiciliarios?", "tipo" => "seleccion"]);	

    }
}
