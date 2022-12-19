<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class identificacion_ciudadanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id"=> "165", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Indigena", "puntaje" => "5"]);
        Opcion::create(["id"=> "166", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "ROM (gitano)", "puntaje" => "1"]);
        Opcion::create(["id"=> "167", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Raizal (archipielago de San Andres y Providencia)", "puntaje" => "1"]);
        Opcion::create(["id"=> "168", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Palanquero de San Basilio", "puntaje" => "1"]);
        Opcion::create(["id"=> "169", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Negro(a), Mulato(a), Afrocolombiano(a) o Afro descendiente", "puntaje" => "1"]);
        Opcion::create(["id"=> "170", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Otras Etnias", "puntaje" => "1"]);
        Opcion::create(["id"=> "171", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Ninguno", "puntaje" => "0"]);
        Opcion::create(["id"=> "172", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Desplazado", "puntaje" => "5"]);
        Opcion::create(["id"=> "173", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Situación especial", "puntaje" => "5"]);
        Opcion::create(["id"=> "174", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Comunidad LGBTI", "puntaje" => "5"]);
        Opcion::create(["id"=> "175", "ref_campo" => "programas", "pregunta_opcion" => "NO", "puntaje" => "1"]);
        Opcion::create(["id"=> "176", "ref_campo" => "programas", "pregunta_opcion" => "SI", "puntaje" => "3"]);
        Opcion::create(["id"=> "177", "ref_campo" => "cual_programa", "pregunta_opcion" => "Red unidos", "puntaje" => "0"]);
        Opcion::create(["id"=> "178", "ref_campo" => "cual_programa", "pregunta_opcion" => "Familias en acción", "puntaje" => "0"]);
        Opcion::create(["id"=> "179", "ref_campo" => "cual_programa", "pregunta_opcion" => "Jovenes en acción", "puntaje" => "0"]);
        Opcion::create(["id"=> "180", "ref_campo" => "cual_programa", "pregunta_opcion" => "Colombia mayor ($)", "puntaje" => "0"]);
        Opcion::create(["id"=> "181", "ref_campo" => "cual_programa", "pregunta_opcion" => "Adulto mayor (mercado)", "puntaje" => "0"]);
        Opcion::create(["id"=> "182", "ref_campo" => "cual_programa", "pregunta_opcion" => "RESA", "puntaje" => "0"]);
        Opcion::create(["id"=> "183", "ref_campo" => "cual_programa", "pregunta_opcion" => "Vivienda", "puntaje" => "0"]);
        Opcion::create(["id"=> "184", "ref_campo" => "cual_programa", "pregunta_opcion" => "Integración productiva", "puntaje" => "0"]);
        Opcion::create(["id"=> "185", "ref_campo" => "cual_programa", "pregunta_opcion" => "Restitución de derechos", "puntaje" => "0"]);
        Opcion::create(["id"=> "186", "ref_campo" => "cual_programa", "pregunta_opcion" => "Esta en el censo nacional de victimas", "puntaje" => "0"]);
        Opcion::create(["id"=> "187", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Contributivo", "puntaje" => "0"]);
        Opcion::create(["id"=> "188", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Subsidiado", "puntaje" => "0"]);
        Opcion::create(["id"=> "189", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Pobre no asegurado", "puntaje" => "0"]);
        Opcion::create(["id"=> "190", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Particular", "puntaje" => "0"]);
        Opcion::create(["id"=> "191", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Otro (Régimen especial)", "puntaje" => "0"]);
        Opcion::create(["id"=> "192", "ref_campo" => "esta_estudiando", "pregunta_opcion" => "NO", "puntaje" => "1"]);
        Opcion::create(["id"=> "193", "ref_campo" => "esta_estudiando", "pregunta_opcion" => "SI", "puntaje" => "3"]);
        Opcion::create(["id"=> "194", "ref_campo" => "por_que", "pregunta_opcion" => "Discapacidad", "puntaje" => "0"]);
        Opcion::create(["id"=> "195", "ref_campo" => "por_que", "pregunta_opcion" => "No recuerda el grado", "puntaje" => "0"]);
        Opcion::create(["id"=> "196", "ref_campo" => "por_que", "pregunta_opcion" => "No aplica por edad", "puntaje" => "0"]);
        Opcion::create(["id"=> "197", "ref_campo" => "por_que", "pregunta_opcion" => "Enfermedad", "puntaje" => "0"]);
        Opcion::create(["id"=> "198", "ref_campo" => "por_que", "pregunta_opcion" => "No ha estudiado", "puntaje" => "5"]);
        Opcion::create(["id"=> "199", "ref_campo" => "por_que", "pregunta_opcion" => "Ubicación geografica", "puntaje" => "0"]);
        Opcion::create(["id"=> "200", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Buscado trabajo", "puntaje" => "3"]);
        Opcion::create(["id"=> "201", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Estudiando", "puntaje" => "1"]);
        Opcion::create(["id"=> "202", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Oficios del hogar", "puntaje" => "1"]);
        Opcion::create(["id"=> "203", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Rentista", "puntaje" => "0"]);
        Opcion::create(["id"=> "204", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Jubilado, Pensionado", "puntaje" => "3"]);
        Opcion::create(["id"=> "205", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "No aplica, por edad", "puntaje" => "0"]);
        Opcion::create(["id"=> "206", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Sin ocupación/ingreso", "puntaje" => "5"]);
        Opcion::create(["id"=> "207", "ref_campo" => "discapacidad", "pregunta_opcion" => "Ninguna", "puntaje" => "0"]);
        Opcion::create(["id"=> "208", "ref_campo" => "discapacidad", "pregunta_opcion" => "Auditiva: sorda", "puntaje" => "50"]);
        Opcion::create(["id"=> "209", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multisensoríal: sorda-ciega", "puntaje" => "50"]);
        Opcion::create(["id"=> "210", "ref_campo" => "discapacidad", "pregunta_opcion" => "Visual: ciega total", "puntaje" => "50"]);
        Opcion::create(["id"=> "211", "ref_campo" => "discapacidad", "pregunta_opcion" => "Visual: baja visión", "puntaje" => "50"]);
        Opcion::create(["id"=> "212", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: parálisis total o parcial", "puntaje" => "50"]);
        Opcion::create(["id"=> "213", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: Amputación", "puntaje" => "50"]);
        Opcion::create(["id"=> "214", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: secuelas permanentes o transitorias", "puntaje" => "50"]);
        Opcion::create(["id"=> "215", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: paraplejia", "puntaje" => "50"]);
        Opcion::create(["id"=> "216", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: cuadraplejia", "puntaje" => "50"]);
        Opcion::create(["id"=> "217", "ref_campo" => "discapacidad", "pregunta_opcion" => "Discapacidad mental", "puntaje" => "50"]);
        Opcion::create(["id"=> "218", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:sensorial-física", "puntaje" => "50"]);
        Opcion::create(["id"=> "219", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:sensorial-mental", "puntaje" => "50"]);
        Opcion::create(["id"=> "220", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:física-mental", "puntaje" => "50"]);
        Opcion::create(["id"=> "221", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Protesis de extremidades", "puntaje" => "0"]);
        Opcion::create(["id"=> "222", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Ortesis ", "puntaje" => "0"]);
        Opcion::create(["id"=> "223", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Silla de ruedas manual", "puntaje" => "0"]);
        Opcion::create(["id"=> "224", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "silla de ruedas autopropulsada (electrica)", "puntaje" => "0"]);
        Opcion::create(["id"=> "225", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Bastón para invidente", "puntaje" => "0"]);
        Opcion::create(["id"=> "226", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Audifonos", "puntaje" => "0"]);
        Opcion::create(["id"=> "227", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Implante coclear", "puntaje" => "0"]);
        Opcion::create(["id"=> "228", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Muletas, caminador, baston ", "puntaje" => "0"]);
        Opcion::create(["id"=> "229", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Cama hospitalaria, colchon antiescaras", "puntaje" => "0"]);
        Opcion::create(["id"=> "230", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Protesis ocular", "puntaje" => "0"]);
        Opcion::create(["id"=> "231", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Gafas", "puntaje" => "0"]);
        
    }
}
