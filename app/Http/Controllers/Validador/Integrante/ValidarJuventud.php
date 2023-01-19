<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ValidarJuventud implements ValidacionEncuesta
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
        if ($edad < 18 || $edad > 28)
        {
            $this->seccion = [];
            return false;
        }

        if ($this->integrante->sexo == 'Femenino')
        {
            $cuelloUterino = $this->puntuacion('juv_cancer_cuello_uterino');
            $this->colposcopia($cuelloUterino);
            $this->validacionSimple('juv_bioscopia_cervico', ($cuelloUterino->id == 592));
            $this->planificacionFemenino();
        }

        $this->seno();
        $this->puntuacion('juv_asesoria_anticoncepcion');
        $this->parejas();
        $this->valoracionIntegral();
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
            'juv_cancer_cuello_uterino',
            'juv_colposcopia',
            'juv_bioscopia_cervico',
            'juv_examen_seno',
            'juv_control_medico',
            'juv_planifica',
            'juv_metodo_planifica',
            'juv_tiempo_metodo',
            'juv_asesoria_anticoncepcion',
            'juv_razones_no_planifica',
            'juv_parejas_sexuales_al_anio',
            'juv_atencion_medica',
            'juv_atencion_enfermeria',
            'juv_salud_vocal',
            'juv_vasectomia',
            'juv_esterilizacion_femenina',
            'juv_vias_esterilizacion',
            'juv_profilaxis',
            'juv_detartraje_supragingival',
            'juv_prueba_vih',
            'juv_antecedentes_diabetes',
            'juv_antecedentes_hipertension',
            'juv_alteracion_colesterol',
            'juv_perimetro_abdominal',

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

    protected function colposcopia(Opcion $cuelloUterino)
    {
        $colposcopia = $this->validacionSimple('juv_colposcopia', ($cuelloUterino->id == 592));

        //si asite a la colposcopia
        if ($colposcopia->id == 595)
        {
            $this->puntuacion('juv_control_medico');
        }

        //no asiste a la colposcopia
        //? si $colposcopia->id == 594 ? (induccion: id ) : null
    }

    protected function seno()
    {
        $examenSeno = $this->puntuacion('juv_examen_seno');
        //? preguntar si asistió a control médico con el resultado, si NO inducir urgente a control medico

        if ($examenSeno->id == 601)
        {
            $this->puntuacion('juv_control_medico');
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
        if (empty($respuesta))
        {
            array_push($this->errores, [
                'juv_parejas_sexuales_al_anio' => 'No encontramos la pregunta juv_parejas_sexuales_al_anio'
            ]);
            return null;
        }

        if ($respuesta < 0)
        {
            array_push($this->errores, [
                'juv_parejas_sexuales_al_anio' => "No puede tener ($respuesta) de parejas sexuales"
            ]);
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
