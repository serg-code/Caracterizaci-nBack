<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Models\Inducciones;
use App\Models\Integrantes;
use App\Models\Opcion;
use App\Models\Pregunta;
use Carbon\Carbon;

class ValidacionIntegrante
{

    protected array $errores;
    protected int $puntaje;
    protected int $edad;
    protected int $mesesEdad;
    protected array $seccionValidada;

    public function __construct(
        protected string $refSeccion,
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
            $this->agregarErrror($refCampo, "No encontramos la pregunta $refCampo en la seccion " . $this->refSeccion);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        $pregunta = Pregunta::where('ref_campo', '=', $refCampo)->first();
        $esEscribir = $this->esEscribir($pregunta->tipo);

        if ($esEscribir)
        {
            $this->agregarRespuestaSeccion($refCampo, $respuestaEncuesta);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        $opcionVacio = empty($opcion);
        if ($opcionVacio)
        {
            $this->agregarErrror(
                $refCampo,
                "($respuestaEncuesta) no es un respuesta valida para $refCampo en la seccion " .
                    $this->refSeccion
            );
        }

        $this->seccionValidada[$refCampo] = $respuestaEncuesta;
        $this->agregarRespuestaSeccion($refCampo, $respuestaEncuesta);
        $this->puntaje += $opcion->valor ?? 0;
        return $opcionVacio ? new Opcion(['id' => 0, 'valor' => 0]) : $opcion;
    }

    protected function validacionSimple(string $refCampo, bool $validar): Opcion
    {
        if ($validar)
        {
            return $this->puntuacion($refCampo);
        }

        return new Opcion(['id' => 0, 'valor' => 0]);
    }

    protected function esEscribir(string $tipoPregunta)
    {
        return $tipoPregunta == 'numero' || $tipoPregunta == 'texto' || $tipoPregunta == 'texto_largo'
            || $tipoPregunta == 'fecha';
    }

    protected  function agregarRespuestaSeccion(string $refCampo, $respuestaEncuesta): void
    {
        $this->seccionValidada[$refCampo] = $respuestaEncuesta;
    }

    protected function agregarErrror(string $refCampo, string $textoError)
    {
        $this->errores[$refCampo] = $textoError;
    }

    protected function sumarPuntaje(int $puntaje)
    {
        $this->puntaje += $puntaje;
    }

    protected function generarInduccion(int $idInduccion)
    {
        Inducciones::create([
            'id_integrante' => $this->integrante->id,
            'tipo_id' => $idInduccion
        ]);
    }
}
