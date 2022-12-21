<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class mortalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Opcion::create(["id"=> "364", "ref_campo" => "fallecido_familiar", "descripcion" => "NO", "valor" => "1"]);
Opcion::create(["id"=> "365", "ref_campo" => "fallecido_familiar", "descripcion" => "SI", "valor" => "3"]);
Opcion::create(["id"=> "366", "ref_campo" => "sexo_fallecido", "descripcion" => "Femenino", "valor" => "0"]);
Opcion::create(["id"=> "367", "ref_campo" => "sexo_fallecido", "descripcion" => "Masculino", "valor" => "0"]);
Opcion::create(["id"=> "368", "ref_campo" => "edad_fallecido", "descripcion" => "numero", "valor" => "0"]);
Opcion::create(["id"=> "369", "ref_campo" => "causa_muerte", "descripcion" => "texto", "valor" => "0"]);
Opcion::create(["id"=> "370", "ref_campo" => "fecha_muerte", "descripcion" => "fecha", "valor" => "0"]);
    }
}
