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
        Opcion::create(["ref_campo" => "encuesta_sisben", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "encuesta_sisben", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "ficha_sisben", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "puntaje_sisben", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "nivel_sisben", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Casa", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Apartamento", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Cuarto(s)", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Improvisadas", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_vivienda", "pregunta_opcion" => "Rancho", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_tenecia", "pregunta_opcion" => "Propia", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_tenecia", "pregunta_opcion" => "En arriendo", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_tenecia", "pregunta_opcion" => "Otra", "valor" => "3"]);
        Opcion::create(["ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "No tiene servicio sanitario", "valor" => "5"]);
        Opcion::create(["ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Letrina", "valor" => "3"]);
        Opcion::create(["ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro sin conexión a alcantarillado", "valor" => "3"]);
        Opcion::create(["ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro sin conexión a pozo séptico", "valor" => "3"]);
        Opcion::create(["ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro conectado a pozo séptico", "valor" => "1"]);
        Opcion::create(["ref_campo" => "servicios_sanitarios", "pregunta_opcion" => "Inodoro conectado a alcantarillado", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Vela u otro", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Petróleo", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Gasolina", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_alumbrado", "pregunta_opcion" => "Eléctrico ", "valor" => "0"]);
        Opcion::create(["ref_campo" => "dormitorios", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "dormitorios", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "humo_vivienda", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "humo_vivienda", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Acueducto", "valor" => "1"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Pozo", "valor" => "2"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Lluvía", "valor" => "3"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Río", "valor" => "5"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Pila", "valor" => "5"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Laguna", "valor" => "5"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Manantial", "valor" => "5"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Tanques", "valor" => "5"]);
        Opcion::create(["ref_campo" => "fuentes_agua", "pregunta_opcion" => "Otra", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_tratamiento_agua", "pregunta_opcion" => "Sin tratamiento", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_tratamiento_agua", "pregunta_opcion" => "Clorada", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_tratamiento_agua", "pregunta_opcion" => "Filtrada", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_tratamiento_agua", "pregunta_opcion" => "Hervida", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tratamiento_agua", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tratamiento_agua", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Recogida", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Contenedor", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Quemada", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Tirada", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Enterrada", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_disposicion_basura", "pregunta_opcion" => "Otros", "valor" => "5"]);
        Opcion::create(["ref_campo" => "reciclan", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "reciclan", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "iluminacion_adecuada", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "iluminacion_adecuada", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "ventilacion_adecuada", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "ventilacion_adecuada", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "roedores", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "roedores", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "reservorios_agua", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "reservorios_agua", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "anjeos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "anjeos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_insectos_vectores", "pregunta_opcion" => "Ningun", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_insectos_vectores", "pregunta_opcion" => "Zancudos", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_insectos_vectores", "pregunta_opcion" => "Pitos", "valor" => "5"]);
        Opcion::create(["ref_campo" => "conservacion_alimentos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "conservacion_alimentos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["ref_campo" => "actividad_productiva", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["ref_campo" => "actividad_productiva", "pregunta_opcion" => "SI", "valor" => "3"]);
        //Opcion::create(["ref_campo" => "actividad_productiva", "pregunta_opcion" => "texto", "valor" => "0"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tierra", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Madera burda", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tabla", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tablón", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Cemento", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Baldosa", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Vinilo", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tableta", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Ladrillo", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Alfombra ", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Tapete de pared a pared", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Marmol", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => "Parqué", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_piso", "pregunta_opcion" => " Madera pulida", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Desechos: cartón", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Desechos: lata", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Desechos: sacos", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Paja", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Palma", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Teja de barro", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Zinc", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Cemento sin cielo raso", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Cemento con cielo raso", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Losa", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Plancha", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_techo", "pregunta_opcion" => "Teja de eterit", "valor" => "1"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Vivienda sin paredes", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Zinc", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Tela", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Cartón", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Latas", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Desechos", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Guadua", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Caña", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Esterilla", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Madera burda", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Bahareque", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Tapia pisada", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Tapia adobe", "valor" => "5"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Bloque ", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Ladrillo", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Piedra", "valor" => "3"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Material prefabricado", "valor" => "2"]);
        Opcion::create(["ref_campo" => "tipos_material_paredes", "pregunta_opcion" => "Madera pulida", "valor" => "1"]);
    }
}
