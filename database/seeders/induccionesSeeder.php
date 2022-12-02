<?php

namespace Database\Seeders;

use App\Models\TipoInduccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InduccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoInduccion::create([
            'id' => 1,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 0,
            'edad_maxima' => 1,
            'grupo_etario' => '1 mes',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 2,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 4,
            'edad_maxima' => 5,
            'grupo_etario' => '4 a 5 meses',
            'frecuencia' => '1 vez vl año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 3,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 12,
            'edad_maxima' => 18,
            'grupo_etario' => '12 a 18 meses',
            'frecuencia' => '1 vez alvaño',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 4,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 24,
            'edad_maxima' => 29,
            'grupo_etario' => '24 a 29 meses',
            'frecuencia' => '1 vez alvaño',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 5,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 36,
            'edad_maxima' => 36,
            'grupo_etario' => '3 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 6,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 60,
            'edad_maxima' => 60,
            'grupo_etario' => '5 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 7,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 2,
            'edad_maxima' => 3,
            'grupo_etario' => '2 a 3 meses',
            'frecuencia' => '1 vez vl año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 8,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 6,
            'edad_maxima' => 8,
            'grupo_etario' => '6 a 8 meses',
            'frecuencia' => '1 vez vl año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 9,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 9,
            'edad_maxima' => 11,
            'grupo_etario' => '9 a 11 meses',
            'frecuencia' => '1 vez av año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 10,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 19,
            'edad_maxima' => 23,
            'grupo_etario' => '19 a 23 meses',
            'frecuencia' => '1 vez alvaño',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 11,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 30,
            'edad_maxima' => 35,
            'grupo_etario' => '30 a 35 meses',
            'frecuencia' => '1 vez alvaño',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 12,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 48,
            'edad_maxima' => 48,
            'grupo_etario' => '4 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 13,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion en salud bucal',
            'genero' => '',
            'edad_minima' => 6,
            'edad_maxima' => 60,
            'grupo_etario' => 'de 6 meses a 5 años',
            'frecuencia' => '2 Vecvs al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 14,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'atencion para la promocion',
            'genero' => '',
            'edad_minima' => 1,
            'edad_maxima' => 6,
            'grupo_etario' => 'de 1 a 6 meses',
            'frecuencia' => 'segun criverio medico',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 15,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'aplicacion de fluor',
            'genero' => '',
            'edad_minima' => 12,
            'edad_maxima' => 60,
            'grupo_etario' => 'de 1 Año a 5 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 16,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'profilaxis y remocion de placa',
            'genero' => '',
            'edad_minima' => 12,
            'edad_maxima' => 60,
            'grupo_etario' => 'de 1 Año a 5 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 17,
            'curso_vida' => 'primera infancia',
            'tipo_atencion' => 'vacunacion',
            'genero' => '',
            'edad_minima' => 0,
            'edad_maxima' => 60,
            'grupo_etario' => 'de 0 a 5 años',
            'frecuencia' => 'segun esquema nacional-BCG',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 18,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 72,
            'edad_maxima' => 72,
            'grupo_etario' => '6 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 19,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 96,
            'edad_maxima' => 96,
            'grupo_etario' => '8 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 20,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 120,
            'edad_maxima' => 120,
            'grupo_etario' => '10 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 21,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 84,
            'edad_maxima' => 84,
            'grupo_etario' => '7 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 22,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 108,
            'edad_maxima' => 108,
            'grupo_etario' => '9 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 23,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 132,
            'edad_maxima' => 132,
            'grupo_etario' => '11 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 24,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'atencion en salud bucal',
            'genero' => '',
            'edad_minima' => 72,
            'edad_maxima' => 132,
            'grupo_etario' => 'de 6 a 11 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 25,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'aplicación de fluor',
            'genero' => '',
            'edad_minima' => 72,
            'edad_maxima' => 132,
            'grupo_etario' => 'de 6 a 11 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 26,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'profilaxis y remocion de placa',
            'genero' => '',
            'edad_minima' => 72,
            'edad_maxima' => 132,
            'grupo_etario' => 'de 6 a 11 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 27,
            'curso_vida' => 'infancia',
            'tipo_atencion' => 'vacunacion VPH',
            'genero' => '',
            'edad_minima' => 108,
            'edad_maxima' => 132,
            'grupo_etario' => 'de 9 a 11 años',
            'frecuencia' => 'segun esquema nacional',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 28,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 144,
            'grupo_etario' => '12 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 29,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 168,
            'edad_maxima' => 168,
            'grupo_etario' => '14 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 30,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 192,
            'edad_maxima' => 192,
            'grupo_etario' => '16 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 31,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 156,
            'edad_maxima' => 156,
            'grupo_etario' => '13 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 32,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 180,
            'edad_maxima' => 180,
            'grupo_etario' => '15 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 33,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 204,
            'edad_maxima' => 204,
            'grupo_etario' => '17 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 34,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud bucal',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 204,
            'grupo_etario' => 'de 12 a 17 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 35,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'atencion en salud para la asesoria',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 840,
            'grupo_etario' => 'mujeres y hombres en edad fertil',
            'frecuencia' => 'por demanda',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 36,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'aplicacion de fluor',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 204,
            'grupo_etario' => 'de 12 a 17 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 37,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'profilaxis y remocion de placa',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 204,
            'grupo_etario' => 'de 12 a 17 años',
            'frecuencia' => '2 veces al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 38,
            'curso_vida' => 'adolescencia',
            'tipo_atencion' => 'vacunacion',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 204,
            'grupo_etario' => 'de 12 a 17 años',
            'frecuencia' => 'segun esquema nacional',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 39,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 240,
            'edad_maxima' => 240,
            'grupo_etario' => '20 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 40,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 300,
            'edad_maxima' => 300,
            'grupo_etario' => '25 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 41,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 216,
            'edad_maxima' => 216,
            'grupo_etario' => '18 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 42,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 228,
            'edad_maxima' => 228,
            'grupo_etario' => '19 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 43,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 252,
            'edad_maxima' => 252,
            'grupo_etario' => '21 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 44,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 264,
            'edad_maxima' => 264,
            'grupo_etario' => '22 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 45,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 276,
            'edad_maxima' => 276,
            'grupo_etario' => '23 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 46,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 288,
            'edad_maxima' => 288,
            'grupo_etario' => '24 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 47,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 312,
            'edad_maxima' => 312,
            'grupo_etario' => '26 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 48,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 324,
            'edad_maxima' => 324,
            'grupo_etario' => '27 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 49,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud enefermeria',
            'genero' => '',
            'edad_minima' => 336,
            'edad_maxima' => 336,
            'grupo_etario' => '28 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 50,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud bucal',
            'genero' => '',
            'edad_minima' => 216,
            'edad_maxima' => 336,
            'grupo_etario' => 'de 18 a 28 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 51,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'tamizaje de cancer de cuello uterino (citologia)',
            'genero' => 'F',
            'edad_minima' => 300,
            'edad_maxima' => 336,
            'grupo_etario' => 'mujeres de 25 a 28 años',
            'frecuencia' => 'segun esquema 1-1-3',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 52,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'atencion en salud para la asesoria',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 840,
            'grupo_etario' => 'mujeres y hombres en edad fertil',
            'frecuencia' => 'por demanda',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 53,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'profilaxis y remocion de placa',
            'genero' => '',
            'edad_minima' => 216,
            'edad_maxima' => 336,
            'grupo_etario' => 'de 18 a 28 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 54,
            'curso_vida' => 'juventud',
            'tipo_atencion' => 'vacunacion',
            'genero' => '',
            'edad_minima' => 216,
            'edad_maxima' => 336,
            'grupo_etario' => 'de 18 a 28 años',
            'frecuencia' => 'segun esquema nacional',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 55,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 348,
            'edad_maxima' => 708,
            'grupo_etario' => '29-59 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 56,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'atencion en salud bucal',
            'genero' => '',
            'edad_minima' => 348,
            'edad_maxima' => 708,
            'grupo_etario' => '29-59 años',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 57,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'tamizaje de cancer de cuello uterino (citologia)',
            'genero' => 'F',
            'edad_minima' => 348,
            'edad_maxima' => 708,
            'grupo_etario' => 'mujeres de 29-59 años',
            'frecuencia' => 'segun esquema -1-1-3',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 58,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'tamizaje de cancer de mama (mamografia)',
            'genero' => 'F',
            'edad_minima' => 600,
            'edad_maxima' => 708,
            'grupo_etario' => 'mujeres de 50 a 59 años',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 59,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'tamizaje para cancer de mama (valoracion clinica de la mama)',
            'genero' => 'F',
            'edad_minima' => 480,
            'edad_maxima' => 719,
            'grupo_etario' => 'mujeres a partir de los 40 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 60,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'tamizaje para cancer de prostata (PSA)',
            'genero' => 'M',
            'edad_minima' => 600,
            'edad_maxima' => 719,
            'grupo_etario' => 'hombres a partir de los 50 años',
            'frecuencia' => '1 vez cada 5 años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 61,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'tamizaje para cancer de prostata (tacto rectal)',
            'genero' => 'M',
            'edad_minima' => 600,
            'edad_maxima' => 719,
            'grupo_etario' => 'hombres a partir de los 50 años',
            'frecuencia' => '1 vez cada 5 años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 62,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'atencion en salud para la asesoria en anticoncepcion',
            'genero' => '',
            'edad_minima' => 144,
            'edad_maxima' => 840,
            'grupo_etario' => 'mujeres y hombres en edad fertil',
            'frecuencia' => 'por demanda',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 63,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'profilaxis y remocion de placa',
            'genero' => '',
            'edad_minima' => 348,
            'edad_maxima' => 708,
            'grupo_etario' => 'de 29 a 59 años',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 64,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'vacunacion',
            'genero' => '',
            'edad_minima' => 348,
            'edad_maxima' => 708,
            'grupo_etario' => 'de 29 a 59 años',
            'frecuencia' => 'segun esquema nacional',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 65,
            'curso_vida' => 'adultez',
            'tipo_atencion' => 'tamizaje para cancer de colon (sangre oculta en materia fecal por inmunoquímica)',
            'genero' => '',
            'edad_minima' => 600,
            'edad_maxima' => 708,
            'grupo_etario' => 'de 50 a 59 años',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 66,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'atencion en salud medica',
            'genero' => '',
            'edad_minima' => 720,
            'edad_maxima' => 2400,
            'grupo_etario' => 'de 60 años y mas',
            'frecuencia' => '1 vez cada tres años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 67,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'atencion en salud bucal',
            'genero' => '',
            'edad_minima' => 720,
            'edad_maxima' => 2400,
            'grupo_etario' => 'de 60 años y mas',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 68,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'tamizaje de cancer de cuello uterino (citologia)',
            'genero' => 'F',
            'edad_minima' => 720,
            'edad_maxima' => 828,
            'grupo_etario' => 'mujeres de 60 a 69 años',
            'frecuencia' => 'segun esquema -1-1-3',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 69,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'tamizaje para cancer de mama (mamografia)',
            'genero' => 'F',
            'edad_minima' => 720,
            'edad_maxima' => 828,
            'grupo_etario' => 'mujeres de 60 a 69 años',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 70,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'tamizaje para cancer de mama (valoracion clinica de la mama)',
            'genero' => 'F',
            'edad_minima' => 720,
            'edad_maxima' => 828,
            'grupo_etario' => 'mujeres de 60 a 69 años',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 71,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'tamizaje para cancer de prostata (PSA)',
            'genero' => 'M',
            'edad_minima' => 720,
            'edad_maxima' => 900,
            'grupo_etario' => 'hombres de 60 a 75 años',
            'frecuencia' => '1 vez cada 5 años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 72,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'tamizaje para cancer de prostata (tacto rectal)',
            'genero' => 'M',
            'edad_minima' => 720,
            'edad_maxima' => 900,
            'grupo_etario' => 'hombres de 60 a 75 años',
            'frecuencia' => '1 vez cada 5 años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 73,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'atencion en salud para la asesoria en anticoncepcion',
            'genero' => 'M',
            'edad_minima' => 144,
            'edad_maxima' => 660,
            'grupo_etario' => 'hombres sexualmente activos',
            'frecuencia' => 'por demanda',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 74,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'profilaxis y remocion de placa',
            'genero' => '',
            'edad_minima' => 720,
            'edad_maxima' => 2400,
            'grupo_etario' => 'de 60 años y mas',
            'frecuencia' => '1 vez cada 2 años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 75,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'vacunacion',
            'genero' => '',
            'edad_minima' => 720,
            'edad_maxima' => 2400,
            'grupo_etario' => 'de 60 años y mas',
            'frecuencia' => 'segun esquema nacional',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 76,
            'curso_vida' => 'vejez',
            'tipo_atencion' => 'tamizaje para cancer de colon (sangre oculta en materia fecal por inmunoquímica)',
            'genero' => '',
            'edad_minima' => 720,
            'edad_maxima' => 900,
            'grupo_etario' => 'de 60 años a 75 años',
            'frecuencia' => '1 vez cada dos años',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 77,
            'curso_vida' => 'preconcepcional',
            'tipo_atencion' => 'atencion en salud medica o Enfermeria',
            'genero' => 'F',
            'edad_minima' => 216,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil (preconcepcional)',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 78,
            'curso_vida' => 'preconcepcional',
            'tipo_atencion' => 'laboratorio clinico para cuidado preconcepcional: antigeno de superficie de hepatitis B; tamizaje pa',
            'genero' => 'F',
            'edad_minima' => 216,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil (preconcepcional)',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 79,
            'curso_vida' => 'preconcepcional',
            'tipo_atencion' => 'asesoría y provisión anticonceptiva post IVE',
            'genero' => 'F',
            'edad_minima' => 216,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 80,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion para el cuidado prenatal consulta medicina general',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 81,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion para el cuidado prenatal consulta enfermeria',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 82,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion en salud por odontologia',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => '1 vez al año',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 83,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion para el cuidado prenatal consulta medicina especializada obstetra',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'evaluacion semana 36',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 84,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion para el cuidado prenatal consulta nutricion',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 85,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'consulta por Psicologia',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 86,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'suplementacion con micronutrientes',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 87,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'laboratorio clinico control prenatal: urocultivo; hemograma; hemoclasificacion; glicemia; vih prueba',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 88,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'vacunacion: toxoide tetánico; difteria tosferina influenza',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'segun esquema nacional',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 89,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'ecografía obstétrica transabdominal',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 90,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'ecografía de detalle anatómico',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 91,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'interrupcion voluntaria del embarazo ',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 92,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'asesoría y provisión anticonceptiva post IVE',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 93,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'curso preparación para la maternidad y paternidad',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => 'de acuerdo riesgo',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 94,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion del parto',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres en edad fertil',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 95,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion del puerperio',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'mujeres puerperas',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 96,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion para el cuidado del recién nacido pediatría',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'recien nacido',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 97,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'atencion para el seguimiento del recién nacido laboratorios tsh neonatal hemograma; serología hemocl',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'recien nacido',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 98,
            'curso_vida' => 'sin curso vida',
            'tipo_atencion' => 'consulta medica TBC',
            'genero' => '',
            'edad_minima' => 0,
            'edad_maxima' => 2400,
            'grupo_etario' => 'todas las edades',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 99,
            'curso_vida' => 'sin curso vida',
            'tipo_atencion' => 'consulta medica enfermedad de hansen',
            'genero' => '',
            'edad_minima' => 0,
            'edad_maxima' => 2400,
            'grupo_etario' => 'todas las edades',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);

        TipoInduccion::create([
            'id' => 100,
            'curso_vida' => 'maternoperinatal',
            'tipo_atencion' => 'consulta medica por sifilis',
            'genero' => 'F',
            'edad_minima' => 120,
            'edad_maxima' => 660,
            'grupo_etario' => 'muejeres en edad fertil',
            'frecuencia' => '',
            'deleted_at' => NULL
        ]);
    }
}
