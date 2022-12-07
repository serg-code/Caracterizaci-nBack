<?php

namespace App\Dev;

use App\Dev\Encuesta\OpcionPregunta;
use App\Models\Pregunta;

class Puntaje
{
    protected array $errores;
    protected int $puntaje;

    public function __construct(
        protected array $respuestas
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
        $this->calcularPuntaje();
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public function getPuntaje(): int
    {
        return $this->puntaje;
    }

    public function calcularPuntaje()
    {
        unset($this->respuestas['hogar_id']);
        foreach ($this->respuestas as $refCampo => $respuesta)
        {
            $pregunta = Pregunta::ObtenerPregunta($refCampo);
            if (empty($pregunta))
            {
                array_push($this->errores, "$pregunta no es una pregunta valida");
                return null;
            }

            $resultado = OpcionPregunta::buscarRespuestaOpcion($pregunta, $respuesta);
            if ($resultado->estado === 'error')
            {
                array_push(
                    $this->errores,
                    "$respuesta no es una respuesta valida para $pregunta"
                );
            }

            if ($resultado->estado === 'encontrado')
            {
                $this->puntaje += $resultado->datos['puntaje'] ?? 0;
            }
        }
    }
}
