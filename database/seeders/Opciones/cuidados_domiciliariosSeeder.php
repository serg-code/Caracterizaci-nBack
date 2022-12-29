<?php

namespace Database\Seeders\Opciones;

use App\Models\model\cuidados_domiciliarios;
use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cuidados_domiciliariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["ref_campo" => "cuidados_domiciliarios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "cuidados_domiciliarios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "diagnostico_principal", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "Causa", "pregunta_opcion" => "Domiciliarío cronico", "valor" => "0"]);
        Opcion::create(["ref_campo" => "Causa", "pregunta_opcion" => "Domiciliarío agudo", "valor" => "0"]);
        Opcion::create(["ref_campo" => "Causa", "pregunta_opcion" => "Domiciliarío ventilado", "valor" => "0"]);
        // Opcion::create(["ref_campo" => "fecha_inicio_domiciliario", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "oxigeno_domiciliario", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "oxigeno_domiciliario", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "plan_aprobado", "pregunta_opcion" => "Estándar", "valor" => "0"]);
        Opcion::create(["ref_campo" => "plan_aprobado", "pregunta_opcion" => "Alto flujo", "valor" => "0"]);
        Opcion::create(["ref_campo" => "plan_aprobado", "pregunta_opcion" => "Bajo flujo", "valor" => "0"]);
        Opcion::create(["ref_campo" => "plan_aprobado", "pregunta_opcion" => "Concentrador", "valor" => "0"]);
        Opcion::create(["ref_campo" => "plan_aprobado", "pregunta_opcion" => "Mixto", "valor" => "0"]);
    }
}
