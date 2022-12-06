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
        Opcion::create(["id" => "77", "ref_campo" => "cuidados_domiciliarios", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "78", "ref_campo" => "cuidados_domiciliarios", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "79", "ref_campo" => "diagnostico_principal", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["id" => "80", "ref_campo" => "Causa", "pregunta_opcion" => "Domiciliarío cronico", "valor" => "0"]);
        Opcion::create(["id" => "81", "ref_campo" => "Causa", "pregunta_opcion" => "Domiciliarío agudo", "valor" => "0"]);
        Opcion::create(["id" => "82", "ref_campo" => "Causa", "pregunta_opcion" => "Domiciliarío ventilado", "valor" => "0"]);
        Opcion::create(["id" => "83", "ref_campo" => "Fecha de inicio del cuidado domiciliario", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["id" => "84", "ref_campo" => "¿Recibe oxigeno domiciliario?", "pregunta_opcion" => "no", "valor" => "1"]);
        Opcion::create(["id" => "85", "ref_campo" => "¿Recibe oxigeno domiciliario?", "pregunta_opcion" => "si", "valor" => "3"]);
        Opcion::create(["id" => "86", "ref_campo" => "Plan aprobado", "pregunta_opcion" => "Estándar", "valor" => "0"]);
        Opcion::create(["id" => "87", "ref_campo" => "Plan aprobado", "pregunta_opcion" => "Alto flujo", "valor" => "0"]);
        Opcion::create(["id" => "88", "ref_campo" => "Plan aprobado", "pregunta_opcion" => "Bajo flujo", "valor" => "0"]);
        Opcion::create(["id" => "89", "ref_campo" => "Plan aprobado", "pregunta_opcion" => "Concentrador", "valor" => "0"]);
        Opcion::create(["id" => "90", "ref_campo" => "Plan aprobado", "pregunta_opcion" => "Mixto", "valor" => "0"]);
    }
}
