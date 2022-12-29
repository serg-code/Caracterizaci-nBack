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
        Opcion::create(["ref_campo" =>  "depresion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "depresion", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "intento_suicidio", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "intento_suicidio", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "esquizofrenia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "esquizofrenia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "trastorno_afectivo", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "trastorno_afectivo", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "bulimia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "bulimia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "anorexia", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "anorexia", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "tratamiento", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "tratamiento", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create([ "ref_campo" =>  "diagnóstico", "pregunta_opcion" => "diagnostico", "valor" => "0"]);
        Opcion::create(["ref_campo" =>  "violencia_fisica", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "violencia_fisica", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "violencia_psicologíca", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "violencia_psicologíca", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "violencia_sexual", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "violencia_sexual", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "violencia_institucional", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "violencia_institucional", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "violencia_social", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "violencia_social", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" =>  "violencia_gestacion", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" =>  "violencia_gestacion", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
