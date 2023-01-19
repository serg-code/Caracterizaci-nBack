<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Hogar\Hogar;
use App\Models\Opcion;
use Illuminate\Http\Request;

class ValidarSeguridadAlimentaria implements ValidacionEncuesta
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
        $this->puntuacion('falto_dinero');
        $this->puntuacion('animales_silvestres');
        $this->puntuacion('consume_cerdo_res_pollo');
        $this->puntuacion('consume_huevos');
        $this->puntuacion('consume_frijol_lentejas');
        $this->puntuacion('consume_lacteos');
        $this->puntuacion('consume_harinas');
        $this->puntuacion('consume_verduras');
        $this->puntuacion('consume_frutas_frescas');
        $this->puntuacion('consume_enlatados');
        $this->puntuacion('consume_platano_yuca');
        $this->puntuacion('consume_gaseosas');
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