<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarJuventud extends ValidacionIntegrante implements ValidacionEncuesta
{

    /**
     * todo: Preguntar induccion 52 (por demanda)
     */

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('juventud', $integrante, $seccion);
    }

    public function validar()
    {
        $edad = $this->edad;
        if ($edad < 18 || $edad > 28)
        {
            $this->seccion = [];
            return false;
        }

        $this->deteccionTemprana();
        if ($this->integrante->sexo == 'Femenino')
        {
            $this->planificacionFemenino();
        }

        $this->seno();
        $this->puntuacion('juv_asesoria_anticoncepcion');
        $this->parejas();
        $this->valoracionIntegral();

        $this->inducciones();
    }

    protected function deteccionTemprana()
    {
        if ($this->integrante->sexo == 'Femenino')
        {
            $cuelloUterino = $this->puntuacion('juv_cancer_cuello_uterino');

            //citologia anormal
            if ($cuelloUterino->id == 592)
            {
                $colposcopia = $this->puntuacion('juv_colposcopia');

                //si asite a la colposcopia
                if ($colposcopia->id == 595)
                {
                    $this->puntuacion('juv_control_medico_examen_colposcopia');
                }

                $this->validacionSimple('juv_bioscopia_cervico', ($cuelloUterino->id == 592));
            }
        }
    }

    protected function seno()
    {
        if ($this->integrante->sexo == 'Femenino')
        {
            $examenSeno = $this->puntuacion('juv_examen_seno');
            if ($examenSeno->id == 601)
            {
                $this->puntuacion('juv_control_medico_examen_seno');
            }
        }
    }

    protected function planificacionFemenino()
    {
        $planifica = $this->puntuacion('juv_planifica');

        //no planifica
        if ($planifica->id == 602)
        {
            $this->puntuacion('juv_razones_no_planifica');
            return true;
        }

        // si planifica
        $this->puntuacion('juv_metodo_planifica');
        $tiempoMetodo = $this->seccion['juv_tiempo_metodo'];
        if ($tiempoMetodo < 0 || $tiempoMetodo > $this->mesesEdad)
        {
            $this->agregarErrror('juv_tiempo_metodo', "No puede tener $tiempoMetodo en planificacion");
            return false;
        }

        $this->puntuacion('juv_tiempo_metodo');
        return true;
    }

    protected function parejas()
    {
        $respuesta = $this->seccion['juv_parejas_sexuales_al_anio'] ?? null;
        if (empty($respuesta) && $respuesta != 0)
        {
            $this->agregarErrror(
                'juv_parejas_sexuales_al_anio',
                'No encontramos la pregunta juv_parejas_sexuales_al_anio'
            );
            return null;
        }

        if ($respuesta < 0)
        {
            $this->agregarErrror('juv_parejas_sexuales_al_anio', "No puede tener ($respuesta) de parejas sexuales");
            return null;
        }

        $this->puntaje += $respuesta > 1 ? 5 : $respuesta;
        return null;
    }

    protected function valoracionIntegral()
    {
        $this->puntuacion('juv_atencion_medica');
        $this->puntuacion('juv_salud_vocal');
        $this->validacionSimple('juv_atencion_enfermeria', ($this->edad > 20));
    }

    protected function proteccionEspecifica()
    {
        $sexo = $this->integrante->sexo;
        $this->validacionSimple('juv_vasectomia', ($sexo == 'Masculino'));
        $esterilizacionFemenina = $this->validacionSimple('juv_esterilizacion_femenina', ($sexo == 'Femenino'));
        $this->validacionSimple('juv_vias_esterilizacion', ($sexo == 'Femenino' && $esterilizacionFemenina->id == 641));
        $this->puntuacion('juv_vias_esterilizacion');
        $this->puntuacion('juv_profilaxis');
        $this->puntuacion('juv_detartraje_supragingival');
        $this->puntuacion('juv_prueba_vih');
        $this->puntuacion('juv_antecedentes_diabetes');
        $this->puntuacion('juv_antecedentes_hipertension');
        $this->puntuacion('juv_alteracion_colesterol');
        $this->puntuacion('juv_perimetro_abdominal');
    }


    /**
     * ------------------------------------------------------------------------
     *      Inducciones
     * ------------------------------------------------------------------------
     */

    private function inducciones()
    {
        $cuelloUterino = $this->getPreguntaValidada('juv_cancer_cuello_uterino');
        if ($cuelloUterino == 590)
        {
            $this->generarInduccion(51);
        }

        $colposcopia = $this->getPreguntaValidada('juv_colposcopia');
        if ($colposcopia == 594)
        {
            $this->generarInduccion(51);
        }

        $examenSeno = $this->getPreguntaValidada('juv_examen_seno');
        if ($examenSeno == 599)
        {
            $this->generarInduccion(58);
        }

        $atencionMedica = $this->getPreguntaValidada('juv_atencion_medica');
        if ($atencionMedica == 632)
        {
            $idInduccion = $this->induccionAtencionMedica();
            $this->validarGenerarInduccion($idInduccion);
        }

        $atencionEnfermeria = $this->getPreguntaValidada('juv_atencion_enfermeria');
        if ($atencionEnfermeria == 634)
        {
            $idInduccion = $this->induccionAtencionEnfermeria();
            $this->validarGenerarInduccion($idInduccion);
        }

        $atencionBucal = $this->getPreguntaValidada('juv_salud_vocal');
        if ($atencionBucal == 636)
        {
            $this->generarInduccion(50);
        }

        $profilaxis = $this->getPreguntaValidada('juv_profilaxis');
        if ($profilaxis == 644)
        {
            $this->validarGenerarInduccion(53);
        }
    }

    private function induccionAtencionMedica(): int
    {
        return match ($this->mesesEdad)
        {
            240 => 39,
            300 => 40,
            default => 0
        };
    }

    private function induccionAtencionEnfermeria(): int
    {
        return match ($this->mesesEdad)
        {
            216 => 41,
            228 => 42,
            252 => 43,
            264 => 44,
            276 => 45,
            288 => 46,
            312 => 47,
            324 => 48,
            336 => 49,
            default => 0
        };
    }
}
