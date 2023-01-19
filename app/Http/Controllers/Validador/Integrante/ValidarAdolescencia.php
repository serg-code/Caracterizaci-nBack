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
        $this->puntuacion('adol_asesoria_anticonceptiva');

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
            unset(
                $this->seccion['adol_planifica'],
                $this->seccion['adol_metodo_planficica'],
            );
            $this->puntuacion('adol_razon_no_planifica');
        }
    }

    protected function valoracionIntegral()
    {
        $edad = $this->edad;

        $this->validacionSimple('adol_atencion_medica', ($edad != 12 || $edad != 14 || $edad != 16));
        $this->validacionSimple('adol_atencion_enfermeria', ($edad != 13 || $edad != 15 || $edad != 17));
    }

    protected function proteccionEspecifica()
    {
        $this->puntuacion('adol_salud_bucal');
        $this->puntuacion('adol_fluor');
        $this->puntuacion('adol_profilaxis');
        $this->puntuacion('adol_sellantes');
        $this->puntuacion('adol_supragingival');
        $this->puntuacion('adol_vacunacion');
        $this->puntuacion('adol_vacuna_fiebre_amarilla');
        $this->puntuacion('adol_vacuna_vph');
        $this->puntuacion('adol_vacuna_toxoide_tetanico');
    }
}
