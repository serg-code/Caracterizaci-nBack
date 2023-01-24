<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;

class ValidarVejez extends ValidacionIntegrante implements ValidacionEncuesta
{

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('vejez', $integrante, $seccion);
    }

    public function validar()
    {
        $edad = $this->edad;
        if ($edad < 60)
        {
            return false;
        }

        $this->puntuacion('ve_valoracion_peso');
        $this->puntuacion('ve_valoracion_talla');
        $this->validarIMC();
        $this->perimetroAbdominal();
        $this->planificacion();
        $this->parejas();
        $this->examenMedico();
        $this->perimetroAbdominal();
        $this->valoracionIntegral();
        $this->detencionTemprana();
        $this->vacunacion();
        $this->puntuacion('ve_prueba_vih');
    }

    protected function validarIMC()
    {
        $perimetroAbdominal = $this->seccion['ve_imc'] ?? null;

        if (empty($perimetroAbdominal))
        {
            array_push(
                $this->seccionValidada,
                ['ve_imc' => "No encontramos la pregunta ve_imc en la seccion Vejez"]
            );
            return false;
        }

        if ($perimetroAbdominal < 19 || $perimetroAbdominal > 25)
        {
            $this->puntaje += 3;
        }

        if ($perimetroAbdominal < 15 || $perimetroAbdominal > 30)
        {
            $this->puntaje += 5;
        }

        if ($perimetroAbdominal > 35)
        {
            $this->puntaje += 30;
        }
        return true;
    }

    protected function planificacion()
    {
        $this->puntuacion('ve_asesoria_anticoncepcion');
        $planifica = $this->puntuacion('ve_planifica');

        if ($planifica->id == 747 && $this->integrante->sexo == 'Femenino')
        {
            $this->puntuacion('ve_metodo_planifica');
            $this->puntuacion('ve_desde_cuando_planifica');
        }

        if ($planifica->id == 746)
        {
            $this->puntuacion('ve_razones_no_planifica');
        }
    }

    protected function parejas()
    {
        if (empty($this->seccion['ve_parejas_sexuales_al_año']))
        {
            array_push(
                $this->seccionValidada,
                ['ve_parejas_sexuales_al_año' => 'No encontramos la pregunta ve_parejas_sexuales_al_año en Vejez']
            );
            return false;
        }

        $cantidadParejas = $this->seccion['ve_parejas_sexuales_al_ano'];
        if ($cantidadParejas < 0)
        {
            array_push(
                $this->seccionValidada,
                ['ve_parejas_sexuales_al_año' => "($cantidadParejas) no es una respuesta valida para ve_parejas_sexuales_al_ano"]
            );
            return false;
        }

        $this->puntaje += $cantidadParejas > 1 ? 5 : $cantidadParejas;
    }

    protected function examenMedico()
    {
        $this->puntuacion('ve_control_adultos');
        $this->puntuacion('ve_antecedentes_diabetes');
        $this->puntuacion('ve_antecedentes_hipertension');
        $this->puntuacion('ve_alteracion_colesterol');
    }

    protected function perimetroAbdominal()
    {
        $perimetroAbdominal = $this->seccion['ve_perimetro_abdominal'];
        $puntaje = 0;

        if ($perimetroAbdominal > 70 && $this->integrante->sexo == 'Femenino')
        {
            $puntaje = 5;
        }

        if ($perimetroAbdominal > 90 && $this->integrante->sexo == 'Masculino')
        {
            $puntaje = 5;
        }

        $this->puntaje += $puntaje;
        array_push($this->seccionValidada, ['ve_perimetro_abdominal' => $perimetroAbdominal]);
    }

    protected function valoracionIntegral()
    {
        if ($this->edad >= 63)
        {
            $atencionMedica = $this->puntuacion('ve_atencion_medica');

            if ($atencionMedica->id == 784)
            {
                $idInduccion = $this->induccionAtencionMedica();
                $this->validarGenerarInduccion($idInduccion);
            }
            $this->atencionBucal();
        }
    }

    protected function detencionTemprana()
    {
        $sexo = $this->integrante->sexo;
        if ($sexo == 'Femenino')
        {

            $cuelloUterino = $this->puntuacion('ve_cancer_cuello_uterino_adn_vph');
            $this->validacionSimple('ve_cancer_cuello_uterino_adn_vph_positivo', ($cuelloUterino->id == 789));

            $colposcopia = $this->puntuacion('ve_colposcopia_uterina');
            $this->validacionSimple('ve_biopsia_cervico_uterina', ($colposcopia->id == 795));
            $this->mamografia('ve_cancer_mama_mamografia');
            $this->mamografiaClinica('ve_cancer_mama_valoracion_clinica');
            $esterilizacionFemenina = $this->puntuacion('ve_esterilizacion_femenina');
            $this->validacionSimple('ve_vias_esterilizacion', ($esterilizacionFemenina->id == 815));
        }

        if ($sexo == 'Masculino')
        {
            $this->prostataPSA();
            $this->prostataRectal();
            $this->puntuacion('ve_vasectomia');
        }

        $this->profilaxis();
        $this->puntuacion('ve_detartraje_supragingival');
    }

    protected function vacunacion()
    {
        $this->puntuacion('ve_vacuna_fiebre_amarilla');
        $this->puntuacion('ve_vacuna_influenza');
    }

    public function atencionBucal()
    {
        $atencionBucal = $this->puntuacion('ve_salud_vocal');
        if ($atencionBucal->id == 786)
        {
            $this->generarInduccion(67);
        }
    }

    private function profilaxis()
    {
        $profilaxis = $this->puntuacion('ve_profilaxis');
        if ($profilaxis->id == 818)
        {
            $this->validarGenerarInduccion(74);
        }
    }

    private function mamografia()
    {
        $mamografia = $this->puntuacion('adul_cancer_mama_mamografia');
        if ($mamografia->id == 799)
        {
            $this->validarGenerarInduccion(69);
        }
    }

    private function mamografiaClinica()
    {
        $mamografiaClinica = $this->puntuacion('adul_cancer_mama_valoracion_clinica');
        if ($mamografiaClinica->id == 802)
        {
            $this->validarGenerarInduccion(70);
        }
    }

    private function prostataPSA()
    {
        $prostataPSA = $this->puntuacion('adul_cancer_prostata_psa');
        if ($prostataPSA->id == 721)
        {
            $this->validarGenerarInduccion(805);
        }
    }

    private function prostataRectal()
    {
        $prostataRectal = $this->puntuacion('adul_cancer_prostata_rectal');
        if ($prostataRectal->id == 721)
        {
            $this->validarGenerarInduccion(808);
        }
    }


    /**
     * ------------------------------------------------------------------------
     *      Inducciones
     * ------------------------------------------------------------------------
     */

    private function induccionAtencionMedica(): int
    {
        return match ($this->mesesEdad)
        {
            720 => 67,
            default => 0
        };
    }
}
