<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;

class ValidarPrimeraInfancia extends ValidacionIntegrante implements ValidacionEncuesta
{
    //pi_atencion_medica
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('primera_infancia', $integrante, $seccion);
    }

    public function validar()
    {

        // validar la edad del integrante 
        if ($this->edad < 0 || $this->edad > 5)
        {
            //Este integrante no es valido para serponser esta seccion
            $this->seccion = [];
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
        $this->TallaNacer();

        $this->puntuacion('pi_valoracion_nutricional');
        $this->puntuacion('pi_desarrollo_lenguaje');
        $this->puntuacion('pi_desarrollo_motora');
        $this->puntuacion('pi_desarrollo_conducta');
        $this->puntuacion('pi_desarrollo_probelmas_visuales');
        $this->puntuacion('pi_desarrollo_problemas_auditivos');
        $this->puntuacion('pi_desparasitado');
        $this->puntuacion('pi_hospitalizacion_nacer');

        //validar el carnet de vacunacion
        $this->puntuacion('pi_carnet_vacunacion');
        $carnet = OpcionPregunta::opcionPregunta('pi_carnet_vacunacion', $this->seccion['pi_carnet_vacunacion']);
        if ($carnet->id === 423 || $carnet->pregunta_opcion == 'SI')
        {
            $this->vacunacion();
        }

        $this->valoracionIntegral();
        $this->proteccionEspeficifica();
    }

    protected function PesoNacer()
    {
        $pesoNacer = $this->seccion['pi_peso_al_nacer'] ?? null;

        if (empty($pesoNacer))
        {
            $this->agregarErrror('pi_peso_al_nacer', "No encontramos la pregunta (pi_peso_al_nacer)");
        }

        if ($pesoNacer > 2.8)
        {
            $this->puntaje += 1;
        }

        if ($pesoNacer > 4)
        {
            $this->puntaje += 5;
        }
    }

    protected function TallaNacer()
    {
        $tallaNacer = $this->seccion['pi_talla_al_nacer'] ?? null;

        if (empty($tallaNacer))
        {
            $this->agregarErrror('pi_talla_al_nacer',  "No encontramos la pregunta (pi_talla_al_nacer)");
        }

        if ($tallaNacer < 40)
        {
            $this->puntaje += 5;
        }

        if ($tallaNacer > 55)
        {
            $this->puntaje += 5;
        }
    }

    protected function vacunacion()
    {
        $this->puntuacion('pi_vacuna_bcg_rn');
        $this->puntuacion('pi_vacuna_hepatitis_b_rn');

        if ($this->mesesEdad <= 3)
        {
            $this->puntuacion('pi_vacuna_polio_d1');
        }

        if ($this->mesesEdad >= 4 && $this->mesesEdad <= 5)
        {
            $this->puntuacion('pi_vacuna_polio_d2');
        }

        if ($this->mesesEdad >= 6 && $this->mesesEdad <= 17)
        {
            $this->puntuacion('pi_vacuna_polio_d3');
        }

        if ($this->mesesEdad >= 18 && $this->edad < 5)
        {
            $this->puntuacion('pi_vacuna_polio_r1');
        }

        if ($this->mesesEdad >= 2)
        {
            $this->puntuacion('pi_vacuna_neumococo_d1');
            $this->puntuacion('pi_vacuna_rotavirus_d1');
            $this->puntuacion('pi_vacuna_pentavalente_d1');
        }

        if ($this->mesesEdad >= 4)
        {
            $this->puntuacion('pi_vacuna_neumococo_d2');
            $this->puntuacion('pi_vacuna_rotavirus_d2');
            $this->puntuacion('pi_vacuna_pentavalente_d2');
        }

        if ($this->mesesEdad >= 6)
        {
            $this->puntuacion('pi_vacuna_influenza_estacional');
            $this->puntuacion('pi_vacuna_pentavalente_d3');
        }

        if ($this->mesesEdad == 12 | $this->edad == 1)
        {
            $this->puntuacion('pi_vacuna_hepatitis_a');
            $this->puntuacion('pi_vacuna_neumococo_d3');
            $this->puntuacion('pi_vacuna_srp_d1');
            $this->puntuacion('pi_vacuna_varicela');
        }

        if ($this->mesesEdad >= 18)
        {
            $this->puntuacion('pi_vacuna_fiebre_amarilla');
            $this->puntuacion('pi_vacuna_dpt_d1');
        }

        if ($this->edad == 5)
        {
            $this->puntuacion('pi_vacuna_polio_r2');
            $this->puntuacion('pi_vacuna_srp_d2');
            $this->puntuacion('pi_vacuna_dpt_d2');
        }
    }

    protected function valoracionIntegral()
    {
        $atencionMedica = $this->validacionSimple('pi_atencion_medica', $this->rangosAtencionMedica());

        if ($atencionMedica->id == 470)
        {
            $idInduccion = $this->matchAtencionMedica();
            $this->validarGenerarInduccion($idInduccion);
        }

        $atencionEnfermeria = $this->validacionSimple('pi_atencion_enfermeria', $this->rangosAtencionEnfermeria());

        if ($atencionEnfermeria->id == 472)
        {
            $idInduccion = $this->matchAtencionEnfermeria();
            $this->validarGenerarInduccion($idInduccion);
        }

        $this->validacionSimple('pi_atencion_lactancia', ($this->mesesEdad >= 1 && $this->mesesEdad <= 6));
        $this->puntuacion('pi_tsh');
    }

    protected function rangosAtencionMedica(): bool
    {
        $mesesEdad = $this->mesesEdad;
        $edad = $this->edad;

        return ($mesesEdad == 1) || ($mesesEdad >= 4 && $mesesEdad <= 5) ||
            ($mesesEdad >= 12 && $mesesEdad <= 18) || ($mesesEdad >= 24 && $mesesEdad >= 29) ||
            ($edad == 3) || ($edad == 4);
    }

    protected function rangosAtencionEnfermeria(): bool
    {
        $mesesEdad = $this->mesesEdad;
        $edad = $this->edad;

        return ($mesesEdad >= 2 && $mesesEdad <= 3) || ($mesesEdad >= 6 && $mesesEdad <= 8) ||
            ($mesesEdad >= 9 && $mesesEdad <= 11) || ($mesesEdad >= 19 && $mesesEdad <= 23) ||
            ($mesesEdad >= 30 && $mesesEdad <= 35) || ($edad == 4);
    }

    protected function proteccionEspeficifica()
    {
        $meses = $this->mesesEdad;
        $edad = $this->edad;

        if ($edad >= 1 && $edad <= 5)
        {
            $this->fluor();
            $this->profilaxis();
        }

        if ($meses > 6)
        {
            $this->odontologia();
        }
    }

    private function fluor()
    {
        $fluor = $this->puntuacion('pi_fluor');
        if ($fluor->id == 478)
        {
            $this->generarInduccion(15);
        }
    }

    private function profilaxis()
    {
        $profilaxis = $this->puntuacion('pi_profilaxis');
        if ($profilaxis->id == 480)
        {
            $this->generarInduccion(16);
        }
    }

    private function odontologia()
    {
        $odontologia = $this->puntuacion('pi_consulta_odontologica');
        if ($odontologia->id == 488)
        {
            $this->generarInduccion(13);
        }
    }

    /**
     * ------------------------------------------------------------------------
     *      Inducciones
     * ------------------------------------------------------------------------
     */

    private function matchAtencionMedica(): int
    {
        $meses = $this->mesesEdad;
        return match ($meses)
        {
            ($meses >= 0 & $meses <= 1) => 1,
            ($meses >= 4 & $meses <= 5) => 2,
            ($meses >= 12 & $meses <= 18) => 3,
            ($meses >= 24 & $meses <= 29) => 4,
            ($meses == 36) => 5,
            ($meses == 60) => 6,

            default =>  0,
        };
    }

    private function matchAtencionEnfermeria(): int
    {
        $meses = $this->mesesEdad;
        return match ($meses)
        {
            ($meses >= 2 & $meses <= 3) => 7,
            ($meses >= 6 & $meses <= 8) => 8,
            ($meses >= 9 & $meses <= 11) => 9,
            ($meses >= 19 & $meses <= 23) => 10,
            ($meses >= 30 & $meses <= 35) => 11,
            ($meses == 48) => 12,

            default => 0,
        };
    }
}
