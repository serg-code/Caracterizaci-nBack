<?php

namespace Database\Seeders;

use App\Models\Opcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opcion::create(["id" => "1", "ref_campo" => "tipo_familia", "pregunta_opcion" => "Nuclear", "valor" => "1"]);
        Opcion::create(["id" => "2", "ref_campo" => "tipo_familia", "pregunta_opcion" => "Extensa - compuesta", "valor" => "3"]);
        Opcion::create(["id" => "3", "ref_campo" => "tipo_familia", "pregunta_opcion" => "Monoparental", "valor" => "5"]);
        Opcion::create(["id" => "4", "ref_campo" => "duermen_ninos_ninas_adultos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "5", "ref_campo" => "duermen_ninos_ninas_adultos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "6", "ref_campo" => "problemas_alcohol", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "7", "ref_campo" => "problemas_alcohol", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "8", "ref_campo" => "consume_tranquilizantes", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "9", "ref_campo" => "consume_tranquilizantes", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "10", "ref_campo" => "relaciones_cordiales_respetuosas", "pregunta_opcion" => "Malas", "valor" => "5"]);
        Opcion::create(["id" => "11", "ref_campo" => "relaciones_cordiales_respetuosas", "pregunta_opcion" => "Regulares", "valor" => "3"]);
        Opcion::create(["id" => "12", "ref_campo" => "relaciones_cordiales_respetuosas", "pregunta_opcion" => "Buenas", "valor" => "0"]);
        Opcion::create(["id" => "13", "ref_campo" => "lavar_manos_antes_comer", "pregunta_opcion" => "Nunca", "valor" => "5"]);
        Opcion::create(["id" => "14", "ref_campo" => "lavar_manos_antes_comer", "pregunta_opcion" => "A veces", "valor" => "3"]);
        Opcion::create(["id" => "15", "ref_campo" => "lavar_manos_antes_comer", "pregunta_opcion" => "Siempre", "valor" => "0"]);
        Opcion::create(["id" => "16", "ref_campo" => "lavar_manos_antes_preparar_alimentos", "pregunta_opcion" => "Nunca", "valor" => "5"]);
        Opcion::create(["id" => "17", "ref_campo" => "lavar_manos_antes_preparar_alimentos", "pregunta_opcion" => "A veces", "valor" => "3"]);
        Opcion::create(["id" => "18", "ref_campo" => "lavar_manos_antes_preparar_alimentos", "pregunta_opcion" => "Siempre", "valor" => "0"]);
        Opcion::create(["id" => "19", "ref_campo" => "fumigar_vivienda", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "20", "ref_campo" => "fumigar_vivienda", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "21", "ref_campo" => "secretaria_fumigado", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "22", "ref_campo" => "secretaria_fumigado", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "23", "ref_campo" => "acido_borico_cucarachas", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "24", "ref_campo" => "acido_borico_cucarachas", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "25", "ref_campo" => "consumo_huevos_crudos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "26", "ref_campo" => "consumo_huevos_crudos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "27", "ref_campo" => "alimentos_perecederos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "28", "ref_campo" => "alimentos_perecederos", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "29", "ref_campo" => "Hierve_leche", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "30", "ref_campo" => "Hierve_leche", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "31", "ref_campo" => "lavar_frutas_verduras", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "32", "ref_campo" => "lavar_frutas_verduras", "pregunta_opcion" => "SI", "valor" => "3"]);
        Opcion::create(["id" => "33", "ref_campo" => "alimentos_crudos_separados_cocidos", "pregunta_opcion" => "NO", "valor" => "1"]);
        Opcion::create(["id" => "34", "ref_campo" => "alimentos_crudos_separados_cocidos", "pregunta_opcion" => "SI", "valor" => "3"]);
    }
}
