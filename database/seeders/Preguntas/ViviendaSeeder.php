<?php

namespace Database\Seeders\Preguntas;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViviendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Pregunta::create(["ref_campo"=> "encuesta_sisben", "ref_seccion" => "vivienda", "descripcion" => "¿Realizó encuesta SISBEN?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ficha_sisben", "ref_seccion" => "vivienda", "descripcion" => "No. ficha SISBEN", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "puntaje_sisben", "ref_seccion" => "vivienda", "descripcion" => "Puntaje SISBEN", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "nivel_sisben", "ref_seccion" => "vivienda", "descripcion" => "Nivel SISBEN", "tipo" => "texto"]);
Pregunta::create(["ref_campo"=> "tipos_vivienda", "ref_seccion" => "vivienda", "descripcion" => "Tipo de vivienda", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_tenecia", "ref_seccion" => "vivienda", "descripcion" => "Tenencia", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "servicios_sanitarios", "ref_seccion" => "vivienda", "descripcion" => "Servicio sanitario", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_alumbrado", "ref_seccion" => "vivienda", "descripcion" => "Tipo de alumbrado utilizado principalmente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "dormitorios", "ref_seccion" => "vivienda", "descripcion" => "¿ En alguno de los dormitorios de la vivienda duerme tres o más personas?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "humo_vivienda", "ref_seccion" => "vivienda", "descripcion" => "¿Hay humo dentro de la vivienda?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "fuentes_agua", "ref_seccion" => "vivienda", "descripcion" => "¿De dónde se toma el agua para consumo humano?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipo_tratamiento_agua", "ref_seccion" => "vivienda", "descripcion" => "Tipo de tratamiento casero al agua", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tratamiento_agua", "ref_seccion" => "vivienda", "descripcion" => "Tratamiento del agua en la fuente", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_disposicion_basura", "ref_seccion" => "vivienda", "descripcion" => "La basura es", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "reciclan", "ref_seccion" => "vivienda", "descripcion" => "¿Se reciclan (reclasifican) las basuras?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "iluminacion_adecuada", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Iluminación adecuada", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ventilacion_adecuada", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Ventilación adecuada", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "roedores", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Roedores", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "reservorios_agua", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Reservorios de agua (criadero de zancudos)", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "anjeos", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Anjeos en puertas y ventanas", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_insectos_vectores", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Presencia de insectos vectores", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "conservacion_alimentos", "ref_seccion" => "vivienda", "descripcion" => "Observe si hay: Manejo de conservación adecuada de alimentos", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "actividad_productiva", "ref_seccion" => "vivienda", "descripcion" => "¿Hay actividad productiva en la vivienda?", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "ciuu", "ref_seccion" => "vivienda", "descripcion" => "CIUU", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_material_piso", "ref_seccion" => "vivienda", "descripcion" => "El material predominante en el piso es", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_material_techo", "ref_seccion" => "vivienda", "descripcion" => "El material predominante en el techo es", "tipo" => "seleccion"]);
Pregunta::create(["ref_campo"=> "tipos_material_paredes", "ref_seccion" => "vivienda", "descripcion" => "El material predominante en las paredes es", "tipo" => "seleccion"]);

    }
}
