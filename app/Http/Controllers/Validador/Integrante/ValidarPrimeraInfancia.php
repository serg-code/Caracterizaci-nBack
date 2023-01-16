<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarPrimeraInfancia extends Controller implements ValidacionEncuesta
{
    protected array $errores;
    protected int $puntaje;
    protected int $edad;
    protected int $mesesEdad;

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
    }

    public function validar()
    {

        // validar la edad del integrante 
        if ($this->edad < 0 || $this->edad > 5)
        {
            //Este integrante no es valido para serponser esta seccion
            return false;
        }

        if (empty($this->seccion))
        {
            $this->errores = [
                'primera_infancia' => 'No encontramos la sección de Primera infancia, este integrante es válido para responder esta encuesta'
            ];
            return false;
        }

        $this->PesoNacer();
        $this->PesoNacer();
        $this->TallaNacer();

        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_valoracion_nutricional', $this->seccion['pi_valoracion_nutricional']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_desarrollo_lenguaje', $this->seccion['pi_desarrollo_lenguaje']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_desarrollo_motora', $this->seccion['pi_desarrollo_motora']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_desarrollo_conducta', $this->seccion['pi_desarrollo_conducta']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_desarrollo_probelmas_visuales', $this->seccion['pi_desarrollo_probelmas_visuales']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_desarrollo_problemas_auditivos', $this->seccion['pi_desarrollo_problemas_auditivos']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_desparasitado', $this->seccion['pi_desparasitado']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_hospitalizacion_nacer', $this->seccion['pi_hospitalizacion_nacer']);

        $this->vacunacion();
        $this->valoracionIntegral();
        $this->proteccionEspeficifica();
    }

    public function obtenerPreguntas(): array
    {
        return [
            'pi_peso_al_nacer',
            'pi_peso_actual',
            'pi_talla_al_nacer',
            'pi_talla_actual',
            'pi_valoracion_nutricional',
            'pi_desarrollo_lenguaje',
            'pi_desarrollo_motora',
            'pi_desarrollo_conducta',
            'pi_desarrollo_probelmas_visuales',
            'pi_desarrollo_problemas_auditivos',
            'pi_desparasitado',
            'pi_hospitalizacion_nacer',
            'pi_carnet_vacunacion',
            'pi_vacuna_bcg_rn',
            'pi_vacuna_polio_d1',
            'pi_vacuna_polio_d2',
            'pi_vacuna_polio_d3',
            'pi_vacuna_polio_r1',
            'pi_vacuna_polio_r2',
            'pi_vacuna_hepatitis',
            'pi_vacuna_hepatitis_b_rn',
            'pi_vacuna_influenza_estacional',
            'pi_vacuna_neumococo_d1',
            'pi_vacuna_neumococo_d2',
            'pi_vacuna_neumococo_d3',
            'pi_vacuna_rotavirus_d1',
            'pi_vacuna_rotavirus_d2',
            'pi_vacuna_fiebre_amarilla',
            'pi_vacuna_dpt_d1',
            'pi_vacuna_dpt_d2',
            'pi_vacuna_pentavalente_d1',
            'pi_vacuna_pentavalente_d2',
            'pi_vacuna_pentavalente_d3',
            'pi_vacuna_srp_d1',
            'pi_vacuna_srp_d2',
            'pi_vacuna_varicela',
            'pi_atencion_medica',
            'pi_atencion_enfermeria',
            'pi_atencion_lactancia',
            'pi_tsh',
            'pi_fluor',
            'pi_profilaxis',
            'pi_sellantes',
            'pi_higiene_bucal',
            'pi_caries',
            'pi_consulta_odontologica',
        ];
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
    }

    protected function PesoNacer()
    {
        if ($this->seccion['pi_peso_al_nacer'] > 2.8)
        {
            $this->puntaje += 1;
        }

        if ($this->seccion['pi_peso_al_nacer'] > 4)
        {
            $this->puntaje += 5;
        }
    }

    protected function TallaNacer()
    {
        if ($this->seccion['pi_talla_al_nacer'] < 40)
        {
            $this->puntaje += 5;
        }

        if ($this->seccion['pi_talla_al_nacer'] > 55)
        {
            $this->puntaje += 5;
        }
    }

    protected function vacunacion()
    {
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_carnet_vacunacion', $this->seccion['pi_carnet_vacunacion']);
        $this->puntaje += OpcionPregunta::puntajeOpcion('pi_vacuna_bcg_rn', $this->seccion['pi_vacuna_bcg_rn']);

        if ($this->mesesEdad <= 3)
        {
            $this->puntaje += OpcionPregunta::puntajeOpcion('pi_vacuna_polio_d1', $this->seccion['pi_vacuna_polio_d1']);
        }

        if ($this->mesesEdad >= 4 && $this->mesesEdad <= 5)
        {
            $this->puntaje += OpcionPregunta::puntajeOpcion('pi_vacuna_polio_d2', $this->seccion['pi_vacuna_polio_d2']);
        }

        if ($this->mesesEdad >= 6 && $this->mesesEdad <= 17)
        {
            $this->puntaje += OpcionPregunta::puntajeOpcion('pi_vacuna_polio_d3', $this->seccion['pi_vacuna_polio_d3']);
        }

        if ($this->mesesEdad >= 18 && $this->edad < 5)
        {
            $this->puntaje += OpcionPregunta::puntajeOpcion('pi_vacuna_polio_r1', $this->seccion['pi_vacuna_polio_r1']);
        }
    }

    protected function valoracionIntegral()
    {
        # code...
    }

    protected function proteccionEspeficifica()
    {
        # code...
    }
}
