<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ValidadarMorbilidad extends Controller implements ValidacionEncuesta
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

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
    }

    public function validar()
    {
        $edad = $this->edad;
        if ($edad < 10 || $edad > 70)
        {
            $this->seccion = [];
            return false;
        }

        //validaciones del excel
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
            'propiedades_piel' => null,
            'propiedades_respiratorio' => null,
            'enfermedades_congenitas' => null,
            'enfermedad_cronica' => null,
            'enfermedad_cronica_cual' => null,
            'controlada' => null,
            'propiedades_respiratorio' => null,
            'propiedades_piel' => null,
            'enfermedades_congenitas' => null,
            'enfermedades_congenitas_cual' => null,
        ];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
    }

    protected function puntuacion(string $refCampo)
    {
        $respuestaEncuesta = $this->seccion[$refCampo] ?? null;
        if (empty($respuestaEncuesta))
        {
            array_push($this->errores, [$refCampo => 'No encontramos la pregunta ' . $refCampo]);
            return false;
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        if (empty($opcion))
        {
            array_push($this->errores, [
                $refCampo => $respuestaEncuesta . " no es un respuesta valida para $refCampo"
            ]);
            return false;
        }

        array_push($this->seccionValidada, [$refCampo => $this->seccion[$refCampo]]);
        $this->puntaje += $opcion->valor;
        return true;
    }

    protected function validacionSimple(string $refCampo, bool $validar)
    {
        if ($validar)
        {
            $this->puntuacion($refCampo);
        }
    }
}