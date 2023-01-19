<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarAdultez implements ValidacionEncuesta
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
        if ($edad < 29 || $edad > 59)
        {
            return false;
        }

        $this->puntuacion('adul_valoracion_peso');
        $this->puntuacion('adul_valoracion_talla');
        $this->validarIMC();
        $this->puntuacion('adul_asesoria_anticoncepcion');
        $this->planificacion();
        $this->parejas();
        $this->examenMedico();
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
        return [
            'adul_valoracion_peso',
            'adul_valoracion_talla',
            'adul_imc',
            'adul_asesoria_anticoncepcion',
            'adul_planifica',
            'adul_metodo_planifica',
            'adul_desde_cuando_planifica',
            'adul_razones_no_planifica',
            'adul_parejas_sexuales_al_anio',
            'adul_control_adultos',
            'adul_antecedentes_diabetes',
            'adul_antecedentes_hipertension',
            'adul_antecedentes_colesterol',
            'adul_perimetro_abdominal',
            'adul_atencion_medica',
            'adul_salud_bucal',
            'adul_cancer_cuello_uterino_adn_vph',
            'adul_cancer_cuello_uterino_adn_vph_positivo',
            'adul_colposcopia_cervico_uterina',
            'adul_biopsia_cervico_uterina',
            'adul_cancer_mama_mamografia',
            'adul_cancer_mama_valoracion_clinica',
            'adul_cancer_prostata',
            'adul_vasectomia',
            'adul_esterilizacion_femenina',
            'adul_vias_esterilizacion',
            'adul_profilaxis',
            'adul_detartraje_supragingival',
            'adul_fiebre_amarilla',
            'adul_prueba_vih',
        ];
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

    protected function validacionSimple(string $refCampo, bool $validar): Opcion
    {
        if ($validar)
        {
            return $this->puntuacion($refCampo);
        }

        return new Opcion(['id' => 0, 'valor' => 0]);
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
        $this->puntuacion('adul_atencion_medica');
        $this->puntuacion('adul_salud_bucal');
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
            $this->puntuacion('adul_cancer_mama_mamografia');
            $this->puntuacion('adul_cancer_mama_valoracion_clinica');
        }

        if (($edad >= 30 && $edad <= 59) && $this->integrante->sexo == 'Masculino')
        {
            $this->puntuacion('adul_cancer_prostata');
        }

        $this->puntuacion('adul_asesoria_anticoncepcion');

        if ($this->integrante->sexo == 'Masculino')
        {
            $this->puntuacion('adul_vasectomia');
        }

        if ($this->integrante->sexo == 'Femenino')
        {
            $esterilizacionFemenina = $this->puntuacion('adul_esterilizacion_femenina');
            $this->validacionSimple('adul_vias_esterilizacion', ($esterilizacionFemenina->id == 729));
        }

        $this->puntuacion('adul_profilaxis');
        $this->puntuacion('adul_detartraje_supragingival');
        $this->puntuacion('adul_fiebre_amarilla');
        $this->puntuacion('adul_prueba_vih');
    }
}
