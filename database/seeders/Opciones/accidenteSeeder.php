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
        Opcion::create(["id" => "68", "ref_campo" => "¿Ha sufrido accidentes de transito?", "pregunta_opcion" => "no", "valor" => "0"]);
        Opcion::create(["id" => "69", "ref_campo" => "¿Ha sufrido accidentes de transito?", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "70", "ref_campo" => "Tipo de lesión", "pregunta_opcion" => "Sin lesión", "valor" => "0"]);
        Opcion::create(["id" => "71", "ref_campo" => "Tipo de lesión", "pregunta_opcion" => "Fractura", "valor" => "3"]);
        Opcion::create(["id" => "72", "ref_campo" => "Tipo de lesión", "pregunta_opcion" => "Trauma de tejido blando", "valor" => "3"]);
        Opcion::create(["id" => "73", "ref_campo" => "Tipo de lesión", "pregunta_opcion" => "Daño neurologíco", "valor" => "5"]);
        Opcion::create(["id" => "74", "ref_campo" => "Tipo de lesión", "pregunta_opcion" => "Discapacidad", "valor" => "10"]);
        Opcion::create(["id" => "75", "ref_campo" => "¿Ha sufrido accidentes laborales?", "pregunta_opcion" => "no", "valor" => "0"]);
        Opcion::create(["id" => "76", "ref_campo" => "¿Ha sufrido accidentes laborales?", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "77", "ref_campo" => "¿Recibe cuidados domiciliarios?", "pregunta_opcion" => "no", "valor" => "0"]);
        Opcion::create(["id" => "78", "ref_campo" => "¿Recibe cuidados domiciliarios?", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "79", "ref_campo" => "Diagnostico principal", "pregunta_opcion" => "texto", "valor" => "0"]);
    }
}
