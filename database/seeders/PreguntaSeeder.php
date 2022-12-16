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
        //* Factores protectores
        Pregunta::guardarPregunta(["ref_campo" => "tipo_familia", "ref_seccion" => "factores_protectores", "descripcion" => "Tipo de familia", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "duermen_ninos_ninas_adultos", "ref_seccion" => "factores_protectores", "descripcion" => "¿Duermen los ninos y ninas separados de los adultos?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "problemas_alcohol", "ref_seccion" => "factores_protectores", "descripcion" => "¿Alguien de la familia tiene problemas con el consumo de bebidas alcoholicas?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "consume_tranquilizantes", "ref_seccion" => "factores_protectores", "descripcion" => "¿Alguien de la familia consume tranquilizantes?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "relaciones_cordiales_respetuosas", "ref_seccion" => "factores_protectores", "descripcion" => "Relaciones cordiales y respetuosas", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "lavar_manos_antes_comer", "ref_seccion" => "factores_protectores", "descripcion" => "¿Acostumbra la familia a lavarse las manos antes de comer?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "lavar_manos_antes_preparar_alimentos", "ref_seccion" => "factores_protectores", "descripcion" => "¿Acostumbra la familia a lavarse las manos antes de preparar los alimentos?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "fumigar_vivienda", "ref_seccion" => "factores_protectores", "descripcion" => "¿Fumiga su vivienda?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "secretaria_fumigado", "ref_seccion" => "factores_protectores", "descripcion" => "¿En el último ano la secretarìa ha fumigado?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "acido_borico_cucarachas", "ref_seccion" => "factores_protectores", "descripcion" => "¿Utiliza acído boríco para las cucarachas?", "tipo" => "selección"]);

        //* habitos_consumo
        Pregunta::guardarPregunta(["ref_campo" => "consumo_huevos_crudos", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Alguien de la familia acostumbra a consumir huevos crudos?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "alimentos_perecederos", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Los alimentos perecederos se almacenan protegídos y refrígerados?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "hierve_leche", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Habitualmente hierve la leche?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "lavar_frutas_verduras", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Lava las frutas y verduras antes de consumirlas?", "tipo" => "selección"]);
        Pregunta::guardarPregunta(["ref_campo" => "alimentos_crudos_separados_cocidos", "ref_seccion" => "habitos_consumo", "descripcion" => "¿Los alimentso crudos se almacenan separados de los cocidos? (verificar)", "tipo" => "selección"]);
    }
}
