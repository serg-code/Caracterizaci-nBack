<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;

class ValidarFactoresProtectores extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('factores_protectores', $seccion);
    }

    public function validar()
    {
        $this->puntuacion('tipo_familia');
        $this->puntuacion('duermen_ninos_ninas_adultos');
        $this->puntuacion('problemas_alcohol');
        $this->puntuacion('consume_tranquilizantes');
        $this->puntuacion('relaciones_cordiales_respetuosas');
        $this->puntuacion('lavar_manos_antes_comer');
        $this->puntuacion('lavar_manos_antes_preparar_alimentos');
        $this->puntuacion('fumigar_vivienda');
        $this->puntuacion('secretaria_fumigado');
        $this->puntuacion('acido_borico_cucarachas');
    }
}
