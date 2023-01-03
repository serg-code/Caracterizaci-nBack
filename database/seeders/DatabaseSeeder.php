<?php

namespace Database\Seeders;

use App\Models\Preguntas\JuventudSeeder as PreguntasJuventudSeeder;
use App\Models\Secciones\Hogar\SeguridadAlimentaria;
use App\Models\Secciones\Integrantes\Infancia;
use Database\Seeders\Opciones\accidenteseeder;
use Database\Seeders\Opciones\adolescenciaSeeder;
use Database\Seeders\Opciones\adultezSeeder;
use Database\Seeders\Opciones\animalesSeeder as OpcionesAnimalesSeeder;
use Database\Seeders\Opciones\cuidado_enfermedadesSeeder;
use Database\Seeders\Opciones\cuidados_domiciliariosSeeder;
use Database\Seeders\Opciones\identificacion_ciudadanaSeeder;
use Database\Seeders\Opciones\infanciaSeeder as OpcionesInfanciaSeeder;
use Database\Seeders\Opciones\juventudSeeder;
use Database\Seeders\Opciones\morbilidadOpcionesSeeder;
use Database\Seeders\Opciones\mortalidadSeeder as OpcionesMortalidadSeeder;
use Database\Seeders\Opciones\primera_infanciaSeeder;
use Database\Seeders\Opciones\salud_mentalSeeder;
use Database\Seeders\Opciones\salud_publicaSeeder;
use Database\Seeders\Opciones\seguridad_alimentariaSeeder;
use Database\Seeders\Opciones\vejezSeeder as OpcionesVejezSeeder;
use Database\Seeders\Opciones\viviendaSeeder as OpcionesViviendaSeeder;
use Database\Seeders\Preguntas\AccidentesSeeder;
use Database\Seeders\Preguntas\AdolescenciaSeeder as PreguntasAdolescenciaSeeder;
use Database\Seeders\Preguntas\AdultezSeeder as PreguntasAdultezSeeder;
use Database\Seeders\Preguntas\AnimalesSeeder;
use Database\Seeders\Preguntas\CuidadoDomiciliarioSeeder;
use Database\Seeders\Preguntas\CuidadoEnfermedadesSeeder;
use Database\Seeders\Preguntas\InfanciaSeeder;
use Database\Seeders\Preguntas\JuventudSeeder as SeedersPreguntasJuventudSeeder;
use Database\Seeders\Preguntas\MorbilidadSeeder;
use Database\Seeders\Preguntas\MortalidadSeeder;
use Database\Seeders\Preguntas\PreguntasIdentificacionCiudadanaSeeder;
use Database\Seeders\Preguntas\PreguntasJuventudSeeder as PreguntasPreguntasJuventudSeeder;
use Database\Seeders\Preguntas\PrimeraInfanciaSeeder;
use Database\Seeders\Preguntas\SaludMentalSeeder;
use Database\Seeders\Preguntas\SaludPublicaSeeder;
use Database\Seeders\Preguntas\SeguridadAlimentariaSeeder;
use Database\Seeders\Preguntas\VejezSeeder;
use Database\Seeders\Preguntas\ViviendaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $listadoSeeders = [
            //autentificacion
            new RolesSeeder(),

            //tablas tipo
            new IdentificacionSeeder(),
            new ParentescoSeeder(),
            new InduccionesSeeder(),

            new SeccionesSeeder(),

            //preguntas
            new PreguntaSeeder(),
            new AccidentesSeeder(),
            new CuidadoDomiciliarioSeeder(),
            new CuidadoEnfermedadesSeeder(),
            new SaludMentalSeeder(),
            new SaludPublicaSeeder(),
            new MorbilidadSeeder(),
            new PreguntasIdentificacionCiudadanaSeeder(),
            new ViviendaSeeder(),
            new AnimalesSeeder(),
            new MortalidadSeeder(),
            new SeguridadAlimentariaSeeder(),
            new PrimeraInfanciaSeeder(),
            new InfanciaSeeder(),
            new PreguntasAdolescenciaSeeder(),
            new PreguntasPreguntasJuventudSeeder(),
            new PreguntasAdultezSeeder(),
            new VejezSeeder(),

            //opciones
            new OpcionesSeeder(),
            new accidenteseeder(),
            new cuidados_domiciliariosSeeder(),
            new cuidado_enfermedadesSeeder(),
            new salud_mentalSeeder(),
            new salud_publicaSeeder(),
            new morbilidadOpcionesSeeder(),
            new identificacion_ciudadanaSeeder(),
            new OpcionesViviendaSeeder(),
            new OpcionesAnimalesSeeder(),
            new OpcionesMortalidadSeeder(),
            new seguridad_alimentariaSeeder(),
            new primera_infanciaSeeder(),
            new OpcionesInfanciaSeeder(),
            new adolescenciaSeeder(),
            new juventudSeeder(),
            new adultezSeeder(),
            new OpcionesVejezSeeder(),

            //departamentos y municipios
            new DepartamentosSeeder(),
            new MunicipiosSeeder(),
            new BarrioVeredaSeeder(),

            //usuarios
            new UsuariosSeeder(),

            new cie10Seeder(),

            new CiuuSeeder(),

        ];

        $this->correrSeeders($listadoSeeders);
    }

    public function correrSeeders(array $listadoSeeders)
    {
        foreach ($listadoSeeders as $seeder)
        {
            $seeder->run();
        }
    }
}
