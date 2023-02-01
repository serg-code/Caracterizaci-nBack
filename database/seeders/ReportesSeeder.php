<?php

namespace Database\Seeders;

use App\Models\Reportes;
use App\Models\Variable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reportes::create([
            'id' => 1,
            'nombre' => 'Listar',
            'descripcion' => 'Listar todos los hogares a partir de una fecha',
            'id_usuario' => 1,
            'query' => "SELECT 
            id, id_usuario, cod_dpto, cod_mun, direccion, puntaje_max, puntaje_obtenido, estado_registro, porcentaje
            FROM hogar 
            WHERE hogar.created_at >= :fecha_mostrar;",
        ]);

        Variable::create([
            'id' => 1,
            'reporte_id' => 1,
            'ref' => 'fecha_mostrar',
            'tipo' => 'date',
            'label' => 'Fecha creacion de encuesta',
        ]);
    }
}
