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
        Opcion::create(["id" => "165", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Indigena", "valor" => "5"]);
        Opcion::create(["id" => "166", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "ROM (gitano)", "valor" => "1"]);
        Opcion::create(["id" => "167", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Raizal (archipielago de San Andres y Providencia)", "valor" => "1"]);
        Opcion::create(["id" => "168", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Palanquero de San Basilio", "valor" => "1"]);
        Opcion::create(["id" => "169", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Negro(a), Mulato(a), Afrocolombiano(a) o Afro descendiente", "valor" => "1"]);
        Opcion::create(["id" => "170", "ref_campo" => "grupo_etnia", "pregunta_opcion" => "Otras Etnias", "valor" => "1"]);
        Opcion::create(["id" => "171", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Ninguno", "valor" => "0"]);
        Opcion::create(["id" => "172", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Desplazado", "valor" => "5"]);
        Opcion::create(["id" => "173", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Situación especial", "valor" => "5"]);
        Opcion::create(["id" => "174", "ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Comunidad LGBTI", "valor" => "5"]);
        Opcion::create(["id" => "175", "ref_campo" => "programas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "176", "ref_campo" => "programas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "177", "ref_campo" => "cual_programa", "pregunta_opcion" => "Red unidos", "valor" => "0"]);
        Opcion::create(["id" => "178", "ref_campo" => "cual_programa", "pregunta_opcion" => "Familias en acción", "valor" => "0"]);
        Opcion::create(["id" => "179", "ref_campo" => "cual_programa", "pregunta_opcion" => "Jovenes en acción", "valor" => "0"]);
        Opcion::create(["id" => "180", "ref_campo" => "cual_programa", "pregunta_opcion" => "Colombia mayor ($)", "valor" => "0"]);
        Opcion::create(["id" => "181", "ref_campo" => "cual_programa", "pregunta_opcion" => "Adulto mayor (mercado)", "valor" => "0"]);
        Opcion::create(["id" => "182", "ref_campo" => "cual_programa", "pregunta_opcion" => "RESA", "valor" => "0"]);
        Opcion::create(["id" => "183", "ref_campo" => "cual_programa", "pregunta_opcion" => "Vivienda", "valor" => "0"]);
        Opcion::create(["id" => "184", "ref_campo" => "cual_programa", "pregunta_opcion" => "Integración productiva", "valor" => "0"]);
        Opcion::create(["id" => "185", "ref_campo" => "cual_programa", "pregunta_opcion" => "Restitución de derechos", "valor" => "0"]);
        Opcion::create(["id" => "186", "ref_campo" => "cual_programa", "pregunta_opcion" => "Esta en el censo nacional de victimas", "valor" => "0"]);
        Opcion::create(["id" => "187", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Contributivo", "valor" => "0"]);
        Opcion::create(["id" => "188", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Subsidiado", "valor" => "0"]);
        Opcion::create(["id" => "189", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Pobre no asegurado", "valor" => "0"]);
        Opcion::create(["id" => "190", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Particular", "valor" => "0"]);
        Opcion::create(["id" => "191", "ref_campo" => "seguridad_social", "pregunta_opcion" => "Otro (Régimen especial)", "valor" => "0"]);
        Opcion::create(["id" => "192", "ref_campo" => "esta_estudiando", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "193", "ref_campo" => "esta_estudiando", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "194", "ref_campo" => "por_que", "pregunta_opcion" => "Discapacidad", "valor" => "0"]);
        Opcion::create(["id" => "195", "ref_campo" => "por_que", "pregunta_opcion" => "No recuerda el grado", "valor" => "0"]);
        Opcion::create(["id" => "196", "ref_campo" => "por_que", "pregunta_opcion" => "No aplica por edad", "valor" => "0"]);
        Opcion::create(["id" => "197", "ref_campo" => "por_que", "pregunta_opcion" => "Enfermedad", "valor" => "0"]);
        Opcion::create(["id" => "198", "ref_campo" => "por_que", "pregunta_opcion" => "No ha estudiado", "valor" => "5"]);
        Opcion::create(["id" => "199", "ref_campo" => "por_que", "pregunta_opcion" => "Ubicación geografica", "valor" => "0"]);
        Opcion::create(["id" => "200", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Buscado trabajo", "valor" => "3"]);
        Opcion::create(["id" => "201", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Estudiando", "valor" => "1"]);
        Opcion::create(["id" => "202", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Oficios del hogar", "valor" => "1"]);
        Opcion::create(["id" => "203", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Rentista", "valor" => "0"]);
        Opcion::create(["id" => "204", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Jubilado, Pensionado", "valor" => "3"]);
        Opcion::create(["id" => "205", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "No aplica, por edad", "valor" => "0"]);
        Opcion::create(["id" => "206", "ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Sin ocupación/ingreso", "valor" => "5"]);
        Opcion::create(["id" => "207", "ref_campo" => "discapacidad", "pregunta_opcion" => "Ninguna", "valor" => "0"]);
        Opcion::create(["id" => "208", "ref_campo" => "discapacidad", "pregunta_opcion" => "Auditiva: sorda", "valor" => "50"]);
        Opcion::create(["id" => "209", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multisensoríal: sorda-ciega", "valor" => "50"]);
        Opcion::create(["id" => "210", "ref_campo" => "discapacidad", "pregunta_opcion" => "Visual: ciega total", "valor" => "50"]);
        Opcion::create(["id" => "211", "ref_campo" => "discapacidad", "pregunta_opcion" => "Visual: baja visión", "valor" => "50"]);
        Opcion::create(["id" => "212", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: parálisis total o parcial", "valor" => "50"]);
        Opcion::create(["id" => "213", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: Amputación", "valor" => "50"]);
        Opcion::create(["id" => "214", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: secuelas permanentes o transitorias", "valor" => "50"]);
        Opcion::create(["id" => "215", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: paraplejia", "valor" => "50"]);
        Opcion::create(["id" => "216", "ref_campo" => "discapacidad", "pregunta_opcion" => "Física: cuadraplejia", "valor" => "50"]);
        Opcion::create(["id" => "217", "ref_campo" => "discapacidad", "pregunta_opcion" => "Discapacidad mental", "valor" => "50"]);
        Opcion::create(["id" => "218", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:sensorial-física", "valor" => "50"]);
        Opcion::create(["id" => "219", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:sensorial-mental", "valor" => "50"]);
        Opcion::create(["id" => "220", "ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:física-mental", "valor" => "50"]);
        Opcion::create(["id" => "221", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Protesis de extremidades", "valor" => "0"]);
        Opcion::create(["id" => "222", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Ortesis ", "valor" => "0"]);
        Opcion::create(["id" => "223", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Silla de ruedas manual", "valor" => "0"]);
        Opcion::create(["id" => "224", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "silla de ruedas autopropulsada (electrica)", "valor" => "0"]);
        Opcion::create(["id" => "225", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Bastón para invidente", "valor" => "0"]);
        Opcion::create(["id" => "226", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Audifonos", "valor" => "0"]);
        Opcion::create(["id" => "227", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Implante coclear", "valor" => "0"]);
        Opcion::create(["id" => "228", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Muletas, caminador, baston ", "valor" => "0"]);
        Opcion::create(["id" => "229", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Cama hospitalaria, colchon antiescaras", "valor" => "0"]);
        Opcion::create(["id" => "230", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Protesis ocular", "valor" => "0"]);
        Opcion::create(["id" => "231", "ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Gafas", "valor" => "0"]);
    }
}
