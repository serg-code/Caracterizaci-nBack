<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarAdolescencia extends Controller implements ValidacionEncuesta
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
            'adol_peso' => null,
            'adol_talla' => null,
            'adol_imc' => null,
            'adol_asesoria_anticonceptiva' => null,
            'adol_planifica' => null,
            'adol_metodo_planficica' => null,
            'adol_desde_cuando_planifica' => null,
            'adol_razon_no_planifica' => null,
            'adol_atencion_medica' => null,
            'adol_atencion_enfermeria' => null,
            'adol_salud_bucal' => null,
            'adol_fluor' => null,
            'adol_profilaxis' => null,
            'adol_sellantes' => null,
            'adol_supragingival' => null,
            'adol_vacunacion' => null,
            'adol_vacuna_fiebre_amarilla' => null,
            'adol_vacuna_vph' => null,
            'adol_vacuna_toxoide_tetanico' => null,
        ];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
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
