<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;

class ValidarAdultez extends ValidacionIntegrante implements ValidacionEncuesta
{

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('adultez', $integrante, $seccion);
    }

    public function validar()
    {
        $edad = $this->edad;
        if ($edad < 29 || $edad > 59)
        {
            return false;
        }

        $this->puntuacion('adul_valoracion_peso');
        $this->puntuacion('adul_valoracion_talla');
        $this->validarIMC();
        $this->anticoncepcion();
        $this->planificacion();
        $this->parejas();
        $this->examenMedico();
    }

    protected function validarIMC()
    {
        $imc = $this->seccion['adul_imc'];
        $puntaje = 0;

        if ($imc < 19 || $imc > 25)
        {
            $puntaje = 3;
        }

        if ($imc > 30 || $imc < 15)
        {
            $puntaje = 5;
        }

        if ($imc > 35)
        {
            $puntaje = 30;
        }

        array_push($this->seccionValidada, ['adul_imc' => $puntaje]);
        $this->puntaje += $puntaje;
    }

    protected function planificacion()
    {
        if ($this->integrante->sexo == 'Femenino')
        {
            $planifica = $this->puntuacion('adul_planifica');
            //si la persona planifica 
            $this->validacionSimple('adul_metodo_planifica', ($planifica->id == 664));
            $this->validacionSimple('adul_desde_cuando_planifica', ($planifica->id == 664));

            //si la persona no planifica
            $this->validacionSimple('adul_razones_no_planifica', ($planifica->id == 663));
        }
    }

    protected function parejas()
    {
        $respuesta = $this->seccion['adul_parejas_sexuales_al_anio'] ?? null;
        if (empty($respuesta))
        {
            array_push($this->errores, [
                'adul_parejas_sexuales_al_anio' => 'No encontramos la pregunta adul_parejas_sexuales_al_anio'
            ]);
            return null;
        }

        if ($respuesta < 0)
        {
            array_push($this->errores, [
                'adul_parejas_sexuales_al_anio' => "No puede tener ($respuesta) de parejas sexuales"
            ]);
            return null;
        }

        $this->puntaje += $respuesta > 1 ? 5 : $respuesta;
        return null;
    }

    public function examenMedico()
    {
        $this->puntuacion('adul_control_adultos');
        $this->puntuacion('adul_antecedentes_diabetes');
        $this->puntuacion('adul_antecedentes_hipertension');
        $this->puntuacion('adul_antecedentes_colesterol');
        $this->perimetroAbdominal();
        $this->puntuacion('adul_perimetro_abdominal');
    }

    protected function perimetroAbdominal()
    {
        $perimetroAbdominal = $this->seccion['adul_perimetro_abdominal'];
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
        array_push($this->seccionValidada, ['adul_perimetro_abdominal' => $perimetroAbdominal]);
    }

    protected function valoracionIntegral()
    {
        $atencionMedica = $this->puntuacion('adul_atencion_medica');

        if ($atencionMedica->id == 700)
        {
            $idInduccion = $this->induccionAtencionMedica();
            $this->validarGenerarInduccion($idInduccion);
        }
        $this->atencionBucal();
    }

    protected function deteccionTemprana()
    {
        $edad = $this->edad;

        if (($edad >= 30 && $edad <= 59) && $this->integrante->sexo == 'Femenino')
        {
            $vph = $this->puntuacion('adul_cancer_cuello_uterino_adn_vph');
            $this->validacionSimple('adul_cancer_cuello_uterino_adn_vph_positivo', ($vph->id == 705));

            $colposcopia = $this->puntuacion('adul_colposcopia_cervico_uterina');
            $this->validacionSimple('adul_biopsia_cervico_uterina', ($colposcopia->id == 711));
            $this->mamografia();
            $this->mamografiaClinica();
        }

        if (($edad >= 30 && $edad <= 59) && $this->integrante->sexo == 'Masculino')
        {
            $this->prostata();
        }

        $this->anticoncepcion();

        if ($this->integrante->sexo == 'Masculino')
        {
            $this->puntuacion('adul_vasectomia');
        }

        if ($this->integrante->sexo == 'Femenino')
        {
            $esterilizacionFemenina = $this->puntuacion('adul_esterilizacion_femenina');
            $this->validacionSimple('adul_vias_esterilizacion', ($esterilizacionFemenina->id == 729));
        }

        $this->profilaxis();
        $this->puntuacion('adul_detartraje_supragingival');
        $this->puntuacion('adul_fiebre_amarilla');
        $this->puntuacion('adul_prueba_vih');
    }

    private function profilaxis()
    {
        $profilaxis = $this->puntuacion('adul_profilaxis');
        if ($profilaxis->id == 732)
        {
            $this->validarGenerarInduccion(63);
        }
    }

    private function mamografia()
    {
        $mamografia = $this->puntuacion('adul_cancer_mama_mamografia');
        if ($mamografia->id == 715)
        {
            $this->validarGenerarInduccion(58);
        }
    }

    private function mamografiaClinica()
    {
        $mamografiaClinica = $this->puntuacion('adul_cancer_mama_valoracion_clinica');
        if ($mamografiaClinica->id == 718)
        {
            $this->validarGenerarInduccion(59);
        }
    }

    private function prostata()
    {
        $prostata = $this->puntuacion('adul_cancer_prostata');
        if ($prostata->id == 721)
        {
            $this->validarGenerarInduccion(60);
        }
    }

    private function anticoncepcion()
    {
        $anticoncepcion = $this->puntuacion('adul_asesoria_anticoncepcion');
        if ($anticoncepcion->id == 661)
        {
            $this->validarGenerarInduccion(62);
        }
    }

    public function atencionBucal()
    {
        $atencionBucal = $this->puntuacion('adul_salud_vocal');
        if ($atencionBucal->id == 702)
        {
            $this->generarInduccion(56);
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
            708 => 55,
            default => 0
         };
     }
 
}
