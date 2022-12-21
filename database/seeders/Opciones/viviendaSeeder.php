<?php

namespace Database\Seeders\Opciones;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class viviendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id" => "232", "ref_campo" => "encuesta_sisben", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "233", "ref_campo" => "encuesta_sisben", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "234", "ref_campo" => "ficha_sisben", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["id" => "235", "ref_campo" => "puntaje_sisben", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["id" => "236", "ref_campo" => "nivel_sisben", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["id" => "237", "ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Casa", "valor" => "0"]);
        Opcion::create(["id" => "238", "ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Apartamento", "valor" => "0"]);
        Opcion::create(["id" => "239", "ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Cuarto(s)", "valor" => "2"]);
        Opcion::create(["id" => "240", "ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Improvisadas", "valor" => "5"]);
        Opcion::create(["id" => "241", "ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Rancho", "valor" => "5"]);
        Opcion::create(["id" => "242", "ref_campo" => "tipos_tenecia", "pregunta_opcion" => "Propia", "valor" => "0"]);
        Opcion::create(["id" => "243", "ref_campo" => "tipos_tenecia", "pregunta_opcion" => "En arriendo", "valor" => "2"]);
        Opcion::create(["id" => "244", "ref_campo" => "tipos_tenecia", "pregunta_opcion" => "Otra", "valor" => "3"]);
        Opcion::create(["id" => "245", "ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "No tiene servicio sanitario", "valor" => "5"]);
        Opcion::create(["id" => "246", "ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Letrina", "valor" => "3"]);
        Opcion::create(["id" => "247", "ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro sin conexión a alcantarillado", "valor" => "3"]);
        Opcion::create(["id" => "248", "ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro sin conexión a pozo séptico", "valor" => "3"]);
        Opcion::create(["id" => "249", "ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro conectado a pozo séptico", "valor" => "1"]);
        Opcion::create(["id" => "250", "ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro conectado a alcantarillado", "valor" => "0"]);
        Opcion::create(["id" => "251", "ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Vela u otro", "valor" => "5"]);
        Opcion::create(["id" => "252", "ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Petróleo", "valor" => "5"]);
        Opcion::create(["id" => "253", "ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Gasolina", "valor" => "5"]);
        Opcion::create(["id" => "254", "ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Eléctrico ", "valor" => "0"]);
        Opcion::create(["id" => "255", "ref_campo" => "dormitorios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "256", "ref_campo" => "dormitorios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "257", "ref_campo" => "humo_vivienda", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "258", "ref_campo" => "humo_vivienda", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "259", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Acueducto", "valor" => "1"]);
        Opcion::create(["id" => "260", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Pozo", "valor" => "2"]);
        Opcion::create(["id" => "261", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Lluvía", "valor" => "3"]);
        Opcion::create(["id" => "262", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Río", "valor" => "5"]);
        Opcion::create(["id" => "263", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Pila", "valor" => "5"]);
        Opcion::create(["id" => "264", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Laguna", "valor" => "5"]);
        Opcion::create(["id" => "265", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Manantial", "valor" => "5"]);
        Opcion::create(["id" => "266", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Tanques", "valor" => "5"]);
        Opcion::create(["id" => "267", "ref_campo" => "fuentes_agua", "pregunta_opcion" => "Otra", "valor" => "5"]);
        // Opcion::create(["id"=> "268", "ref_campo" => "tipo_tratamiento_agua", "pregunta_opcion" => "Sin tratamiento", "valor" => "5"]);
        // Opcion::create(["id"=> "269", "ref_campo" => "tipo_tratamiento_agua", "pregunta_opcion" => "Clorada", "valor" => "2"]);
        // Opcion::create(["id"=> "270", "ref_campo" => "tipo_tratamiento_agua", "pregunta_opcion" => "Filtrada", "valor" => "2"]);
        // Opcion::create(["id"=> "271", "ref_campo" => "tipo_tratamiento_agua", "pregunta_opcion" => "Hervida", "valor" => "2"]);
        Opcion::create(["id" => "272", "ref_campo" => "tratamiento_agua", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "273", "ref_campo" => "tratamiento_agua", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "274", "ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Recogida", "valor" => "1"]);
        Opcion::create(["id" => "275", "ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Contenedor", "valor" => "1"]);
        Opcion::create(["id" => "276", "ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Quemada", "valor" => "3"]);
        Opcion::create(["id" => "277", "ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Tirada", "valor" => "5"]);
        Opcion::create(["id" => "278", "ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Enterrada", "valor" => "5"]);
        Opcion::create(["id" => "279", "ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Otros", "valor" => "5"]);
        Opcion::create(["id" => "280", "ref_campo" => "reciclan", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "281", "ref_campo" => "reciclan", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "282", "ref_campo" => "iluminacion_adecuada", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "283", "ref_campo" => "iluminacion_adecuada", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "284", "ref_campo" => "ventilacion_adecuada", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "285", "ref_campo" => "ventilacion_adecuada", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "286", "ref_campo" => "roedores", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "287", "ref_campo" => "roedores", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "288", "ref_campo" => "reservorios_agua", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "289", "ref_campo" => "reservorios_agua", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "290", "ref_campo" => "anjenos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "291", "ref_campo" => "anjenos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "292", "ref_campo" => "tipos_insectos_vectores", "pregunta_opcion" => "Ningun", "valor" => "0"]);
        Opcion::create(["id" => "293", "ref_campo" => "tipos_insectos_vectores", "pregunta_opcion" => "Zancudos", "valor" => "5"]);
        Opcion::create(["id" => "294", "ref_campo" => "tipos_insectos_vectores", "pregunta_opcion" => "Pitos", "valor" => "5"]);
        Opcion::create(["id" => "295", "ref_campo" => "conservacion_alimentos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "296", "ref_campo" => "conservacion_alimentos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "297", "ref_campo" => "actividad_productiva", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "298", "ref_campo" => "actividad_productiva", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "299", "ref_campo" => "actividad_productiva", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["id" => "300", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tierra", "valor" => "5"]);
        Opcion::create(["id" => "301", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Madera burda", "valor" => "5"]);
        Opcion::create(["id" => "302", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tabla", "valor" => "5"]);
        Opcion::create(["id" => "303", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tablón", "valor" => "5"]);
        Opcion::create(["id" => "304", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Cemento", "valor" => "1"]);
        Opcion::create(["id" => "305", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Baldosa", "valor" => "1"]);
        Opcion::create(["id" => "306", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Vinilo", "valor" => "1"]);
        Opcion::create(["id" => "307", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tableta", "valor" => "1"]);
        Opcion::create(["id" => "308", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Ladrillo", "valor" => "2"]);
        Opcion::create(["id" => "309", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Alfombra ", "valor" => "1"]);
        Opcion::create(["id" => "310", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tapete de pared a pared", "valor" => "1"]);
        Opcion::create(["id" => "311", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Marmol", "valor" => "1"]);
        Opcion::create(["id" => "312", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Parqué", "valor" => "1"]);
        Opcion::create(["id" => "313", "ref_campo" => "tipos_material_piso", "pregunta_opcion" => " Madera pulida", "valor" => "1"]);
        Opcion::create(["id" => "314", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Desechos: cartón", "valor" => "5"]);
        Opcion::create(["id" => "315", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Desechos: lata", "valor" => "5"]);
        Opcion::create(["id" => "316", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Desechos: sacos", "valor" => "5"]);
        Opcion::create(["id" => "317", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Paja", "valor" => "5"]);
        Opcion::create(["id" => "318", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Palma", "valor" => "5"]);
        Opcion::create(["id" => "319", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Teja de barro", "valor" => "3"]);
        Opcion::create(["id" => "320", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Zinc", "valor" => "2"]);
        Opcion::create(["id" => "321", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Cemento sin cielo raso", "valor" => "2"]);
        Opcion::create(["id" => "322", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Cemento con cielo raso", "valor" => "1"]);
        Opcion::create(["id" => "323", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Losa", "valor" => "1"]);
        Opcion::create(["id" => "324", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Plancha", "valor" => "1"]);
        Opcion::create(["id" => "325", "ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Teja de eterit", "valor" => "1"]);
        Opcion::create(["id" => "326", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Vivienda sin paredes", "valor" => "5"]);
        Opcion::create(["id" => "327", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Zinc", "valor" => "5"]);
        Opcion::create(["id" => "328", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Tela", "valor" => "5"]);
        Opcion::create(["id" => "329", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Cartón", "valor" => "5"]);
        Opcion::create(["id" => "330", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Latas", "valor" => "5"]);
        Opcion::create(["id" => "331", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Desechos", "valor" => "5"]);
        Opcion::create(["id" => "332", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Guadua", "valor" => "5"]);
        Opcion::create(["id" => "333", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Caña", "valor" => "5"]);
        Opcion::create(["id" => "334", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Esterilla", "valor" => "5"]);
        Opcion::create(["id" => "335", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Madera burda", "valor" => "5"]);
        Opcion::create(["id" => "336", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Bahareque", "valor" => "5"]);
        Opcion::create(["id" => "337", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Tapia pisada", "valor" => "5"]);
        Opcion::create(["id" => "338", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Tapia adobe", "valor" => "5"]);
        Opcion::create(["id" => "339", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Bloque ", "valor" => "3"]);
        Opcion::create(["id" => "340", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Ladrillo", "valor" => "3"]);
        Opcion::create(["id" => "341", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Piedra", "valor" => "3"]);
        Opcion::create(["id" => "342", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Material prefabricado", "valor" => "2"]);
        Opcion::create(["id" => "343", "ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Madera pulida", "valor" => "1"]);
    }
}
