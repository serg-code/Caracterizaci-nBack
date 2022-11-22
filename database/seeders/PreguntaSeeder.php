<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::guardarPregunta(["ref_campo" => "tipo_familia", "ref_seccion" => "factore_protectores", "descripcion" => "Tipo de familia", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "duermen_niños_niñas_adultos", "ref_seccion" => "factore_protectores", "descripcion" => "¿Duermen los niños y niñas separados de los adultos?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "problemas_alcohol", "ref_seccion" => "factore_protectores ", "descripcion" => "¿Alguien de la familia tiene problemas con el consumo de bebidas alcoholicas?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "consume_tranquilizantes", "ref_seccion" => "factore_protectores ", "descripcion" => "¿Alguien de la familia consume tranquilizantes?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "relaciones_cordiales_respetuosasa", "ref_seccion" => "factore_protectores ", "descripcion" => "Relaciones cordiales y respetuosas", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "lavar_manos_antes_comer", "ref_seccion" => "factore_protectores ", "descripcion" => "¿Acostumbra la familia a lavarse las manos antes de comer?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "lavar_manos_antes_preparar_alimentos", "ref_seccion" => "factore_protectores ", "descripcion" => "¿Acostumbra la familia a lavarse las manos antes de preparar los alimentos?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "fumigar_vivienda", "ref_seccion" => "factore_protectores ", "descripcion" => "¿Fumiga su vivienda?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "secretaría_fumigado", "ref_seccion" => "factore_protectores ", "descripcion" => "¿En el último año la secretarìa ha fumigado?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "acido_borico_cucarachas", "ref_seccion" => "factore_protectores ", "descripcion" => "¿Utiliza acído boríco para las cucarachas?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "consumo_huevos_crudos", "ref_seccion" => "habitos_consumo ", "descripcion" => "¿Alguien de la familia acostumbra a consumir huevos crudos?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "alimentos_perecederos", "ref_seccion" => "habitos_consumo ", "descripcion" => "¿Los alimentos perecederos se almacenan protegídos y refrígerados?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "Hierve_leche", "ref_seccion" => "habitos_consumo ", "descripcion" => "¿Habitualmente hierve la leche?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "lavar_frutas_verduras", "ref_seccion" => "habitos_consumo ", "descripcion" => "¿Lava las frutas y verduras antes de consumirlas?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "alimentos_crudos_separados_cocidos", "ref_seccion" => "habitos_consumo ", "descripcion" => "¿Los alimentso crudos se almacenan separados de los cocidos? (verificar)", "tipo" => "selección"]);
    }
}
