<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaludPublicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

Pregunta::create(["ref_campo"=> "tuberculosis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Enfermedad crónica", "tipo" => "selección"]); 
Pregunta::create(["ref_campo"=> "lepra", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Lepra", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "chagas", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Chagas", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "sifilis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Sifílis", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "dengue", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Dengue", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "malaria", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Malaria", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "leishmaniasis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Leishmaniasis", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "brucelosis", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Brucelosis", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "sika_chicungunya", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Sika- chicungunya", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "varicela", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Varicela", "tipo" => "selección"]);
Pregunta::create(["ref_campo"=> "intoxicacion", "ref_seccion" => "enfermedades_salud_publica", "descripcion" => "Intoxicación", "tipo" => "selección"]);


}

}
