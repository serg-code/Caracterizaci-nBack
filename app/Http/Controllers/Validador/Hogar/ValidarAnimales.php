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
        $this->gatos();
        $this->perros();
        $this->equinos();
        $this->procinos();
        $this->puntuacion('aves');
        $this->rabia();
    }

    protected function gatos()
    {
        $gatos = $this->puntuacion('gatos');

        if ($gatos->id == 361)
        {
            $this->puntuacion('gatos_cuantos');
            $this->puntuacion('gatos_vacunados');
        }
    }

    protected function perros()
    {
        $perro = $this->puntuacion('perros');

        if ($perro->id == 365)
        {
            $this->puntuacion('perros_cuantos');
            $this->puntuacion('perros_vacunados');
        }
    }

    protected function equinos()
    {
        $equinos = $this->puntuacion('equinos');

        if ($equinos->id == 369)
        {
            $this->puntuacion('equinos_cuantos');
            $this->puntuacion('equinos_vacunados');
        }
    }

    protected function procinos()
    {
        $porcinos = $this->puntuacion('porcinos');
        if ($porcinos->id == 375)
        {
            $this->puntuacion('porcinos_cuantos');
            $this->puntuacion('porcinos_vacunados');
        }
    }

    protected function rabia()
    {
        $animalesNoRabia = $this->seccion['animales_no_rabia'];
        $this->agregarRespuestaSeccion('animales_no_rabia', $animalesNoRabia);
        $animalesRabia = $this->seccion['animales_si_rabia'];
        $this->agregarRespuestaSeccion('animales_si_rabia', $animalesRabia);


        // $noRabia = $this->puntuacion('animales_no_rabia');
        // $this->puntuacion('animales_si_rabia');
    }
}
