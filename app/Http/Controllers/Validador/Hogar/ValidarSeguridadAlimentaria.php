<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;

class ValidarSeguridadAlimentaria extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('seguridad_alimentaria', $seccion);
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
}
