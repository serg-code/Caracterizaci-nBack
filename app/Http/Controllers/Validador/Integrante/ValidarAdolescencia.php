<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;

class ValidarAdolescencia extends ValidacionIntegrante implements ValidacionEncuesta
{

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('adolescencia', $integrante, $seccion);
    }

    public function validar()
    {
        if ($this->edad < 12 || $this->edad > 17)
        {
            $this->seccion = [];
            return false;
        }

        $this->puntuacion('adol_peso');
        $this->puntuacion('adol_talla');
        $this->puntuacion('adol_imc');
        $asesoria = $this->puntuacion('adol_asesoria_anticoncepcion');
        if ($asesoria->id == 539)
        {
            $this->generarInduccion(35);
        }

        $this->planificacion();
        $this->proteccionEspecifica();
    }

    protected function planificacion()
    {
        if ($this->integrante->sexo == 'Femenino')
        {
            $planifica = OpcionPregunta::opcionPregunta('adol_planifica', $this->seccion['adol_planifica']);
            $this->puntuacion('adol_planifica');

            if ($planifica->id != 542 || $planifica->pregunta_opcion != 'SI')
            {
                unset(
                    $this->seccion['adol_metodo_planficica'],
                );
                return false;
            }

            $this->puntuacion('adol_metodo_planficica');
            $this->puntuacion('adol_desde_cuando_planifica');
        }

        if ($this->integrante->sexo != 'Femenino')
        {
            $this->puntuacion('adol_razon_no_planifica');
        }
    }

    protected function valoracionIntegral()
    {
        $edad = $this->edad;
        $atencionMedica = $this->validacionSimple('adol_atencion_medica', ($edad != 12 || $edad != 14 || $edad != 16));
        if ($atencionMedica->id == 568)
        {
            $idInduccion = $this->matchAtencionMedica();
            $this->validarGenerarInduccion($idInduccion);
        }

        $atencionEnfermeria = $this->validacionSimple('adol_atencion_enfermeria', ($edad != 13 || $edad != 15 || $edad != 17));
        if ($atencionEnfermeria->id == 570)
        {
            $idInduccion = $this->matchAtencionEnfermeria();
            $this->validarGenerarInduccion($idInduccion);
        }
    }

    protected function proteccionEspecifica()
    {
        $this->boca();
        $this->puntuacion('adol_sellantes');
        $this->puntuacion('adol_supragingival');
        $this->puntuacion('adol_vacunacion');
        $this->puntuacion('adol_vacuna_fiebre_amarilla');
        $this->puntuacion('adol_vacuna_vph');
        $this->puntuacion('adol_vacuna_toxoide_tetanico');
    }

    private function boca()
    {
        $saludBucal = $this->puntuacion('adol_salud_bucal');
        $fluor = $this->puntuacion('adol_fluor');
        $profilaxis = $this->puntuacion('adol_profilaxis');

        if ($saludBucal->id == 572)
        {
            $this->generarInduccion(34);
        }

        if ($fluor->id == 574)
        {
            $this->generarInduccion(36);
        }

        if ($profilaxis->id == 576)
        {
            $this->generarInduccion(37);
        }
    }

    /**
     * ------------------------------------------------------------------------
     *      Inducciones
     * ------------------------------------------------------------------------
     */

    private function matchAtencionMedica(): int
    {
        return match ($this->mesesEdad)
        {
            144 => 28,
            168 => 29,
            192 => 30,

            default => 0,
        };
    }

    private function matchAtencionEnfermeria(): int
    {
        return match ($this->mesesEdad)
        {
            156 => 31,
            180 => 32,
            204 => 33,

            default => 0,
        };
    }
}
