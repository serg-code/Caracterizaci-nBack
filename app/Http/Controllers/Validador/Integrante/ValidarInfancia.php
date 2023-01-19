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
        $this->puntuacion('in_vacuna_vph_d1');
        $this->puntuacion('in_vacuna_vph_d2');
        $this->puntuacion('in_vacuna_vph_d3');
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
        $this->puntuacion('in_consulta_odontologica');
        $this->puntuacion('in_uso_seda_dental');
        $this->puntuacion('in_fluor');
        $this->puntuacion('in_profilaxis');
        $this->puntuacion('in_sellantes');
    }

    protected function valoracionIntegral()
    {
        $this->puntuacion('in_atencion_medica');
        $this->puntuacion('in_atencion_enfermeria');
    }
}
