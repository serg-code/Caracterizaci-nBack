<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use Illuminate\Http\Request;

class ValidarInfancia extends Controller implements ValidacionEncuesta
{
    protected int $puntaje;
    protected array $errores;

    public function __construct(
        protected array $seccion = [],
        protected int $edad = 0,
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
    }

    public function validar()
    {
        $edad = 7;
        if ($edad < 6 || $edad > 11)
        {
            array_push($this->errores, [
                'infancia' => 'El integrante no cuenta con la edad para realizar esta encuesta, debe tener entre 6 y 11 años'
            ]);
            return 0;
        }
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }
}
