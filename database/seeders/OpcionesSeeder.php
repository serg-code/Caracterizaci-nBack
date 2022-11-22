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
        Opcion::guardarOpcion(["id" => "1", "ref_campo" => "tipo_familia", "pregunta_opcion" => "Nuclear", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "2", "ref_campo" => "tipo_familia", "pregunta_opcion" => "Extensa - compuesta", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "3", "ref_campo" => "tipo_familia", "pregunta_opcion" => "Monoparental", "valor" => "5"]);
        Opcion::guardarOpcion(["id" => "4", "ref_campo" => "duermen_niños_niñas_adultos", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "5", "ref_campo" => "duermen_niños_niñas_adultos", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "6", "ref_campo" => "problemas_alcohol", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "7", "ref_campo" => "problemas_alcohol", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "8", "ref_campo" => "consume_tranquilizantes", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "9", "ref_campo" => "consume_tranquilizantes", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "10", "ref_campo" => "relaciones_cordiales_respetuosasa", "pregunta_opcion" => "Malas", "valor" => "5"]);
        Opcion::guardarOpcion(["id" => "11", "ref_campo" => "relaciones_cordiales_respetuosasa", "pregunta_opcion" => "Regulares", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "12", "ref_campo" => "relaciones_cordiales_respetuosasa", "pregunta_opcion" => "Buenas", "valor" => "0"]);
        Opcion::guardarOpcion(["id" => "13", "ref_campo" => "lavar_manos_antes_comer", "pregunta_opcion" => "Nunca", "valor" => "5"]);
        Opcion::guardarOpcion(["id" => "14", "ref_campo" => "lavar_manos_antes_comer", "pregunta_opcion" => "A veces", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "15", "ref_campo" => "lavar_manos_antes_comer", "pregunta_opcion" => "Siempre", "valor" => "0"]);
        Opcion::guardarOpcion(["id" => "16", "ref_campo" => "lavar_manos_antes_preparar_alimentos", "pregunta_opcion" => "Nunca", "valor" => "5"]);
        Opcion::guardarOpcion(["id" => "17", "ref_campo" => "lavar_manos_antes_preparar_alimentos", "pregunta_opcion" => "A veces", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "18", "ref_campo" => "lavar_manos_antes_preparar_alimentos", "pregunta_opcion" => "Siempre", "valor" => "0"]);
        Opcion::guardarOpcion(["id" => "19", "ref_campo" => "fumigar_vivienda", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "20", "ref_campo" => "fumigar_vivienda", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "21", "ref_campo" => "secretaría_fumigado", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "22", "ref_campo" => "secretaría_fumigado", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "23", "ref_campo" => "acido_borico_cucarachas", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "24", "ref_campo" => "acido_borico_cucarachas", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "25", "ref_campo" => "consumo_huevos_crudos", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "26", "ref_campo" => "consumo_huevos_crudos", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "27", "ref_campo" => "alimentos_perecederos", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "28", "ref_campo" => "alimentos_perecederos", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "29", "ref_campo" => "Hierve_leche", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "30", "ref_campo" => "Hierve_leche", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "31", "ref_campo" => "lavar_frutas_verduras", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "32", "ref_campo" => "lavar_frutas_verduras", "pregunta_opcion" => "Sí", "valor" => "3"]);
        Opcion::guardarOpcion(["id" => "33", "ref_campo" => "alimentos_crudos_separados_cocidos", "pregunta_opcion" => "No", "valor" => "1"]);
        Opcion::guardarOpcion(["id" => "34", "ref_campo" => "alimentos_crudos_separados_cocidos", "pregunta_opcion" => "Sí", "valor" => "3"]);
    }
}
