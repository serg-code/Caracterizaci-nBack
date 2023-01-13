<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use Illuminate\Http\Request;

class ValidarPrimeraInfancia extends Controller implements ValidacionEncuesta
{
    protected array $errores;
    protected int $puntaje;

    public function __construct(
        protected array $seccion = [],
        protected string $fechaNacimiento = '',
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
    }

    public function validar()
    {
        $edad = 1;

        if ($edad < 0 || $edad > 5)
        {
            array_push($this->errores, ['primera_infancia' => 'El integrante no cuenta con la edad para realizar esta encuesta, debe tener entre 0 y 5 años']);
            return false;
        }

        $this->PesoNacer();
        $this->PesoNacer();
        $this->TallaNacer();
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    protected function PesoNacer()
    {
        if ($this->seccion['pi_peso_al_nacer'] > 2800)
        {
            $this->puntaje += 1;
        }

        if ($this->seccion['pi_peso_al_nacer'] > 4000)
        {
            $this->puntaje += 5;
        }
    }

    protected function PesoActual()
    {
        //* Condicional con peso y talla
        //pi_peso_actual
    }

    protected function TallaNacer()
    {
        if ($this->seccion['pi_talla_al_nacer'] < 40)
        {
            $this->puntaje += 5;
        }

        if ($this->seccion['pi_talla_al_nacer'] > 55)
        {
            $this->puntaje += 5;
        }
    }
}
