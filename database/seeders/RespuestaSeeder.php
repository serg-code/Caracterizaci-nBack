<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Aps = new Pregunta(["id"=> "1", "ref_Pregunta" => "factore_protectores", "ref_campo" => "Tipo de familia", "descripcion" => "Nuclear", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "2", "ref_Pregunta" => "factore_protectores", "ref_campo" => "Tipo de familia", "descripcion" => "Extensa - compuesta", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "3", "ref_Pregunta" => "factore_protectores", "ref_campo" => "Tipo de familia", "descripcion" => "Monoparental", "puntaje" => "5"]);
        $Aps = new Pregunta(["id"=> "4", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Duermen los niños y niñas separados de los adultos?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "5", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Duermen los niños y niñas separados de los adultos?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "6", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Alguien de la familia tiene problemas con el consumo de bebidas alcoholicas?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "7", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Alguien de la familia tiene problemas con el consumo de bebidas alcoholicas?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "8", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Alguien de la familia consume tranquilizantes?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "9", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Alguien de la familia consume tranquilizantes?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "10", "ref_Pregunta" => "factore_protectores", "ref_campo" => "Relaciones cordiales y respetuosas", "descripcion" => "Malas", "puntaje" => "5"]);
        $Aps = new Pregunta(["id"=> "11", "ref_Pregunta" => "factore_protectores", "ref_campo" => "Relaciones cordiales y respetuosas", "descripcion" => "Regulares", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "12", "ref_Pregunta" => "factore_protectores", "ref_campo" => "Relaciones cordiales y respetuosas", "descripcion" => "Buenas", "puntaje" => "0"]);
        $Aps = new Pregunta(["id"=> "13", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Acostumbra la familia a lavarse las manos antes de comer?", "descripcion" => "Nunca", "puntaje" => "5"]);
        $Aps = new Pregunta(["id"=> "14", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Acostumbra la familia a lavarse las manos antes de comer?", "descripcion" => "A veces", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "15", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Acostumbra la familia a lavarse las manos antes de comer?", "descripcion" => "Siempre", "puntaje" => "0"]);
        $Aps = new Pregunta(["id"=> "16", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Acostumbra la familia a lavarse las manos antes de preparar los alimentos?", "descripcion" => "Nunca", "puntaje" => "5"]);
        $Aps = new Pregunta(["id"=> "17", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Acostumbra la familia a lavarse las manos antes de preparar los alimentos?", "descripcion" => "A veces", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "18", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Acostumbra la familia a lavarse las manos antes de preparar los alimentos?", "descripcion" => "Siempre", "puntaje" => "0"]);
        $Aps = new Pregunta(["id"=> "19", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Fumiga su vivienda?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "20", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Fumiga su vivienda?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "21", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿En el último año la secretarìa ha fumigado?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "22", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿En el último año la secretarìa ha fumigado?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "23", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Utiliza acído boríco para las cucarachas?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "24", "ref_Pregunta" => "factore_protectores", "ref_campo" => "¿Utiliza acído boríco para las cucarachas?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "25", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Alguien de la familia acostumbra a consumir huevos crudos?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "26", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Alguien de la familia acostumbra a consumir huevos crudos?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "27", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Los alimentos perecederos se almacenan protegídos y refrígerados?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "28", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Los alimentos perecederos se almacenan protegídos y refrígerados?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "29", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Habitualmente hierve la leche?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "30", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Habitualmente hierve la leche?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "31", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Lava las frutas y verduras antes de consumirlas?", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "32", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Lava las frutas y verduras antes de consumirlas?", "descripcion" => "Sí", "puntaje" => "3"]);
        $Aps = new Pregunta(["id"=> "33", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Los alimentso crudos se almacenan separados de los cocidos? (verificar)", "descripcion" => "No", "puntaje" => "1"]);
        $Aps = new Pregunta(["id"=> "34", "ref_Pregunta" => "habitos_consumo", "ref_campo" => "¿Los alimentso crudos se almacenan separados de los cocidos? (verificar)", "descripcion" => "Sí", "puntaje" => "3"]);
    }
}
