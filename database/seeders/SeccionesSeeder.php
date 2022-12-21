<?php

namespace Database\Seeders;

use App\Models\Seccion;
use Illuminate\Database\Seeder;

class SeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seccion::create(['ref_seccion' => '']);

        //* Secciones del hogar
        Seccion::create(['ref_seccion' => 'factores_protectores']);
        Seccion::create(['ref_seccion' => 'habitos_consumo']);
        Seccion::create(['ref_seccion' => 'vivienda']);
        Seccion::create(['ref_seccion' => 'animales']);

        //* secciones del integrante
        Seccion::create(['ref_seccion' => 'accidentes']);
        Seccion::create(['ref_seccion' => 'cuidados_domiciliarios']);
        Seccion::create(['ref_seccion' => 'cuidado_enfermedades']);
        Seccion::create(['ref_seccion' => 'salud_mental']);
        Seccion::create(['ref_seccion' => 'enfermedades_salud_publica']);
        Seccion::create(['ref_seccion' => 'morbilidad']);
        Seccion::create(['ref_seccion' => 'identificacion_ciudadana']);
    }
}
