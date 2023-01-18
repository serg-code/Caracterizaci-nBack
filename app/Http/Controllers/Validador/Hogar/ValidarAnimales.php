<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Hogar\Hogar;
use App\Models\Opcion;
use Illuminate\Http\Request;

class ValidarAnimales implements ValidacionEncuesta
{

    protected array $errores;
    protected int $puntaje;
    protected array $seccionValidada;

    public function __construct(
        protected Hogar $hogar = new Hogar(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
        $this->seccionValidada = [];
    }

    public function validar()
    {
        $this->puntuacion('gatos');
        $this->puntuacion('gatos_cuantos');
        $this->puntuacion('gatos_vacunados');
        $this->puntuacion('perro');
        $this->puntuacion('perro_cuantos');
        $this->puntuacion('perros_vacunados');
        $this->puntuacion('equinos');
        $this->puntuacion('equinos_cuantos');
        $this->puntuacion('equinos_vacunados');
        $this->puntuacion('aves');
        $this->puntuacion('porcinos');
        $this->puntuacion('porcinos_cuantos');
        $this->puntuacion('porcinos_vacunados');
        $this->puntuacion('animales_no_rabia');
        $this->puntuacion('animales_si_rabia');
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
}
