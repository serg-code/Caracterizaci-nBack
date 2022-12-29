<?php

namespace Database\Seeders\Opciones;

use App\Models\model\accidentes;
use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class accidenteseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["ref_campo" => "accidentes_transito", "pregunta_opcion" => "NO", "valor" => "0"]);
        Opcion::create(["ref_campo" => "accidentes_transito", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipo_lesion", "pregunta_opcion" => "Sin lesión", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipo_lesion", "pregunta_opcion" => "Fractura", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipo_lesion", "pregunta_opcion" => "Trauma de tejido blando", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipo_lesion", "pregunta_opcion" => "Daño neurologíco", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipo_lesion", "pregunta_opcion" => "Discapacidad", "valor" => "10"]);
        Opcion::create(["ref_campo" => "accidentes_laborales", "pregunta_opcion" => "NO", "valor" => "0"]);
        Opcion::create(["ref_campo" => "accidentes_laborales", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
