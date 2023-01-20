<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Inducciones;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;

class ValidarJuventud extends ValidacionIntegrante implements ValidacionEncuesta
{
    //juv_parejas_sexuales_al_anio
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

                //no asiste a la colposcopia
                //? si $colposcopia->id == 594 ? (induccion: id ) : null
                if ($colposcopia->id == 594)
                {
                    $this->generarInduccion(51);
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
            //? preguntar si asistió a control médico con el resultado, si NO inducir urgente a control medico

            if ($examenSeno->id == 599)
            {
                $this->generarInduccion(58);
            }

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
            array_push($this->errores, [
                'juv_tiempo_metodo' => "No puede tener $tiempoMetodo en planificacion"
            ]);
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
            $this->agregarErrror('juv_parejas_sexuales_al_anio', 'No encontramos la pregunta juv_parejas_sexuales_al_anio');
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
}
