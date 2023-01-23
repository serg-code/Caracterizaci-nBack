<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarInfancia extends ValidacionIntegrante implements ValidacionEncuesta
{

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('infancia', $integrante, $seccion);
    }

    public function validar()
    {
        $edad = $this->edad;
        if ($edad < 6 || $edad > 11)
        {
            $this->seccion = [];
            return false;
        }

        $this->puntuacion('in_peso');
        $this->puntuacion('in_talla');
        $this->puntuacion('in_desarrollo_lenguaje');
        $this->puntuacion('in_desarrollo_motora');
        $this->puntuacion('in_desarrollo_conducta');
        $this->puntuacion('in_desarrollo_probelmas_visuales');
        $this->puntuacion('in_desarrollo_problemas_auditivos');
        $this->puntuacion('in_desparasitado');

        $this->validarVacunacion();
        $this->valoracionMedica();
    }

    protected function vacunacion()
    {
        $this->puntuacion('in_vacuna_dpt_r2');
        $this->puntuacion('in_vacuna_polio_r2');
        $this->puntuacion('in_vacuna_srp_r1');
        $this->puntuacion('in_vacuna_fiebre_amarilla');
        $this->vph();
    }

    protected function validarVacunacion()
    {
        $carnet = OpcionPregunta::opcionPregunta('in_carnet_vacunacion', $this->seccion['in_carnet_vacunacion']);
        $this->puntuacion('in_carnet_vacunacion');

        if ($carnet->id == 505 || $carnet->pregunta_opcion == 'SI')
        {
            $this->vacunacion();
        }
    }

    public function valoracionMedica()
    {
        $this->puntuacion('in_caries');
        $this->odontologia();
        $this->puntuacion('in_uso_seda_dental');
        $this->fluor();
        $this->profilaxis();
        $this->puntuacion('in_sellantes');
    }

    protected function valoracionIntegral()
    {
        $atencionMedica = $this->puntuacion('in_atencion_medica');
        if ($atencionMedica->id == 532)
        {
            $idInduccion = $this->matchAtencionMedica();
            $this->validarGenerarInduccion($idInduccion);
        }

        $atencionEnfermeria = $this->puntuacion('in_atencion_enfermeria');
        if ($atencionEnfermeria->id == 534)
        {
            $idInduccion = $this->matchAtencionEnfermeria();
            $this->validarGenerarInduccion($idInduccion);
        }
    }

    private function odontologia()
    {
        $odontologia = $this->puntuacion('in_consulta_odontologica');
        if ($odontologia->id == 522)
        {
            $this->generarInduccion(24);
        }
    }

    private function fluor()
    {
        $fluor = $this->puntuacion('in_fluor');
        if ($fluor->id == 526)
        {
            $this->generarInduccion(25);
        }
    }

    private function profilaxis()
    {
        $profilaxis = $this->puntuacion('in_profilaxis');
        if ($profilaxis->id == 528)
        {
            $this->generarInduccion(26);
        }
    }

    /**
     * ------------------------------------------------------------------------
     *      Inducciones     27  vph
     * ------------------------------------------------------------------------
     */

    private function matchAtencionMedica(): int
    {
        $meses = $this->mesesEdad;
        return match ($meses)
        {
            72 => 18,
            96 => 19,
            120 => 20,

            default => 0,
        };
    }

    private function matchAtencionEnfermeria(): int
    {
        $meses = $this->mesesEdad;
        return match ($meses)
        {
            84 => 21,
            108 => 22,
            132 => 23,

            default => 0,
        };
    }

    private function vph()
    {
        if ($this->integrante->sexo != 'Femenino')
        {
            return false;
        }

        $vph1 = $this->puntuacion('in_vacuna_vph_d1');
        $vph2 = $this->puntuacion('in_vacuna_vph_d2');
        $vph3 = $this->puntuacion('in_vacuna_vph_d3');

        if ($this->estadoVph($vph1, $vph2, $vph3))
        {
            $this->generarInduccion(27);
        }
    }

    private function estadoVph(Opcion $vph1, Opcion $vph2, Opcion $vph3): bool
    {
        return ($vph1->id == 514) || ($vph2->id == 516) || ($vph3->id == 518);
    }
}
