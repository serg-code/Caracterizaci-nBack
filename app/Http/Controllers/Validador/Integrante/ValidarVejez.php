<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarVejez implements ValidacionEncuesta
{

    protected array $errores;
    protected int $puntaje;
    protected int $edad;
    protected int $mesesEdad;
    protected array $seccionValidada;

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
        $this->seccionValidada = [];

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
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

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    public function obtenerPreguntas(): array
    {
        return [];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccionValidada;
    }

    protected function puntuacion(string $refCampo): Opcion
    {
        $respuestaEncuesta = $this->seccion[$refCampo] ?? null;
        if (empty($respuestaEncuesta))
        {
            array_push($this->errores, [$refCampo => 'No encontramos la pregunta ' . $refCampo]);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        if (empty($opcion))
        {
            array_push($this->errores, [
                $refCampo => $respuestaEncuesta . " no es un respuesta valida para $refCampo"
            ]);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        array_push($this->seccionValidada, [$refCampo => $this->seccion[$refCampo]]);
        $this->puntaje += $opcion->valor;
        return $opcion;
    }

    protected function validacionSimple(string $refCampo, bool $validar): ?Opcion
    {
        if ($validar)
        {
            return $this->puntuacion($refCampo);
        }

        return null;
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
        $anticoncepcion = $this->puntuacion('ve_asesoria_anticoncepcion');

        if ($anticoncepcion->id == 745 && $this->integrante->sexo == 'Femenino')
        {
            $planifica = $this->puntuacion('ve_planifica');
            $this->validacionSimple('ve_metodo_planifica', ($planifica->id == 747));
            $this->validacionSimple('ve_desde_cuando_planifica', ($planifica->id == 747));
        }

        if ($anticoncepcion->id == 744)
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
            $this->puntuacion('ve_salud_medica');
            $this->puntuacion('ve_salud_bucal');
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
            $this->puntuacion('ve_cancer_mama_mamografia');
            $this->puntuacion('ve_cancer_mama_valoracion_clinica');
            $esterilizacionFemenina = $this->puntuacion('ve_esterilizacion_femenina');
            $this->validacionSimple('ve_vias_esterilizacion', ($esterilizacionFemenina->id == 815));
        }

        if ($sexo == 'Masculino')
        {
            $this->puntuacion('ve_cancer_prostata_psa');
            $this->puntuacion('ve_cancer_prostata_rectal');
            $this->puntuacion('ve_vasectomia');
        }

        $this->puntuacion('ve_profilaxis');
        $this->puntuacion('ve_detartraje_supragingival');
    }

    protected function vacunacion()
    {
        $this->puntuacion('ve_vacuna_fiebre_amarilla');
        $this->puntuacion('ve_vacuna_influenza');
    }
}
