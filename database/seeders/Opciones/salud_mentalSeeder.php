<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


/**
 * !ref_campo = esquizofrenia
 */
class salud_mentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id" => "91", "ref_campo" =>  "depresion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "92", "ref_campo" =>  "depresion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "93", "ref_campo" =>  "intento_suicidio", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "94", "ref_campo" =>  "intento_suicidio", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "95", "ref_campo" =>  "esquizofrenia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "96", "ref_campo" =>  "esquizofrenia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "97", "ref_campo" =>  "trastorno_afectivo", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "98", "ref_campo" =>  "trastorno_afectivo", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "99", "ref_campo" =>  "bulimia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "100", "ref_campo" =>  "bulimia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "101", "ref_campo" =>  "anorexia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "102", "ref_campo" =>  "anorexia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "103", "ref_campo" =>  "tratamiento", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "104", "ref_campo" =>  "tratamiento", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "105", "ref_campo" =>  "diagnóstico", "pregunta_opcion" => "diagnostico", "valor" => "0"]);
        Opcion::create(["id" => "106", "ref_campo" =>  "violencia_fisica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "107", "ref_campo" =>  "violencia_fisica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "108", "ref_campo" =>  "violencia_psicologíca", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "109", "ref_campo" =>  "violencia_psicologíca", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "110", "ref_campo" =>  "violencia_sexual", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "111", "ref_campo" =>  "violencia_sexual", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "112", "ref_campo" =>  "violencia_institucional", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "113", "ref_campo" =>  "violencia_institucional", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "114", "ref_campo" =>  "violencia_social", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "115", "ref_campo" =>  "violencia_social", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "116", "ref_campo" =>  "violencia_gestacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "117", "ref_campo" =>  "violencia_gestacion", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
