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
        Opcion::create(["ref_campo" => "grupo_etnia", "pregunta_opcion" => "Indigena", "valor" => "5"]);
        Opcion::create(["ref_campo" => "grupo_etnia", "pregunta_opcion" => "ROM (gitano)", "valor" => "1"]);
        Opcion::create(["ref_campo" => "grupo_etnia", "pregunta_opcion" => "Raizal (archipielago de San Andres y Providencia)", "valor" => "1"]);
        Opcion::create(["ref_campo" => "grupo_etnia", "pregunta_opcion" => "Palanquero de San Basilio", "valor" => "1"]);
        Opcion::create(["ref_campo" => "grupo_etnia", "pregunta_opcion" => "Negro(a), Mulato(a), Afrocolombiano(a) o Afro descendiente", "valor" => "1"]);
        Opcion::create(["ref_campo" => "grupo_etnia", "pregunta_opcion" => "Otras Etnias", "valor" => "1"]);
        Opcion::create(["ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Ninguno", "valor" => "0"]);
        Opcion::create(["ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Desplazado", "valor" => "5"]);
        Opcion::create(["ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Situación especial", "valor" => "5"]);
        Opcion::create(["ref_campo" => "grupo_atencion_especial", "pregunta_opcion" => "Comunidad LGBTI", "valor" => "5"]);
        Opcion::create(["ref_campo" => "programas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "programas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Red unidos", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Familias en acción", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Jovenes en acción", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Colombia mayor ($)", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Adulto mayor (mercado)", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "RESA", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Vivienda", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Integración productiva", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Restitución de derechos", "valor" => "0"]);
        Opcion::create(["ref_campo" => "cual_programa", "pregunta_opcion" => "Esta en el censo nacional de victimas", "valor" => "0"]);
        Opcion::create(["ref_campo" => "seguridad_social", "pregunta_opcion" => "Contributivo", "valor" => "0"]);
        Opcion::create(["ref_campo" => "seguridad_social", "pregunta_opcion" => "Subsidiado", "valor" => "0"]);
        Opcion::create(["ref_campo" => "seguridad_social", "pregunta_opcion" => "Pobre no asegurado", "valor" => "0"]);
        Opcion::create(["ref_campo" => "seguridad_social", "pregunta_opcion" => "Particular", "valor" => "0"]);
        Opcion::create(["ref_campo" => "seguridad_social", "pregunta_opcion" => "Otro (Régimen especial)", "valor" => "0"]);
        Opcion::create(["ref_campo" => "esta_estudiando", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "esta_estudiando", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "por_que", "pregunta_opcion" => "Discapacidad", "valor" => "0"]);
        Opcion::create(["ref_campo" => "por_que", "pregunta_opcion" => "No recuerda el grado", "valor" => "0"]);
        Opcion::create(["ref_campo" => "por_que", "pregunta_opcion" => "No aplica por edad", "valor" => "0"]);
        Opcion::create(["ref_campo" => "por_que", "pregunta_opcion" => "Enfermedad", "valor" => "0"]);
        Opcion::create(["ref_campo" => "por_que", "pregunta_opcion" => "No ha estudiado", "valor" => "5"]);
        Opcion::create(["ref_campo" => "por_que", "pregunta_opcion" => "Ubicación geografica", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Buscado trabajo", "valor" => "3"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Estudiando", "valor" => "1"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Oficios del hogar", "valor" => "1"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Rentista", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Jubilado, Pensionado", "valor" => "3"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "No aplica, por edad", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ocupacion_ingreso", "pregunta_opcion" => "Sin ocupación/ingreso", "valor" => "5"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Ninguna", "valor" => "0"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Auditiva: sorda", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Multisensoríal: sorda-ciega", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Visual: ciega total", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Visual: baja visión", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Física: parálisis total o parcial", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Física: Amputación", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Física: secuelas permanentes o transitorias", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Física: paraplejia", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Física: cuadraplejia", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Discapacidad mental", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:sensorial-física", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:sensorial-mental", "valor" => "50"]);
        Opcion::create(["ref_campo" => "discapacidad", "pregunta_opcion" => "Multidiscapacidad:física-mental", "valor" => "50"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Protesis de extremidades", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Ortesis ", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Silla de ruedas manual", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "silla de ruedas autopropulsada (electrica)", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Bastón para invidente", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Audifonos", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Implante coclear", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Muletas, caminador, baston ", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Cama hospitalaria, colchon antiescaras", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Protesis ocular", "valor" => "0"]);
        Opcion::create(["ref_campo" => "ayudas_tenicas", "pregunta_opcion" => "Gafas", "valor" => "0"]);
    }
}
