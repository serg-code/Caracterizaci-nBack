<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;

class ValidarAnimales extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('animales', $seccion);
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

    
}
