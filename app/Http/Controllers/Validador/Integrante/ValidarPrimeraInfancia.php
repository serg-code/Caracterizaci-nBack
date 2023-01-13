<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidarPrimeraInfancia extends Controller
{
    //
    public function __construct(
        protected array $seccion = [],
        protected int $puntaje = 0,
        protected int $edad = 0,
    )
    {
    }

    public function validar()
    {
        $this->PesoNacer();
        $this->PesoNacer();
        $this->TallaNacer();
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
