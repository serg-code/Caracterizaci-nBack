<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeguridadAlimentariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "falto_dinero", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿En el último mes faltó el dinero en el hogar para comprar alimentos?", "tipo" => "seleccion"]);        
Pregunta::create(["ref_campo"=> "animales_silvestres", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Consumen animales silvestres?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "consume_cerdo_res_pollo", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen carne de cerdo, res, pollo u otra?", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_huevos", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen huevos", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_frijol_lentejas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen frijol, lentejas, arvejas, garbanzos …", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_lacteos", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Lacteos y derivados", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_harinas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Harinas fortificadas", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_verduras", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen verduras", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_frutas_frescas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Frutas (frescas o en jugos)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_enlatados", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Enlatados (atun, sardinas)", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_platano_yuca", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Platano, yuca, arroz, papa", "tipo" => "numero"]);
Pregunta::create(["ref_campo"=> "consume_gaseosas", "ref_seccion" => "seguridad_alimentaria", "descripcion" => "¿Cuántas veces a la semana consumen Gaseosas", "tipo" => "numero"]);

    }
}
