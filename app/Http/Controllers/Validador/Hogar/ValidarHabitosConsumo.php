<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;

class ValidarHabitosConsumo extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('habitos_consumo', $seccion);
    }

    public function validar()
    {
        $this->puntuacion('consumo_huevos_crudos');
        $this->puntuacion('alimentos_perecederos');
        $this->puntuacion('hierve_leche');
        $this->puntuacion('lavar_frutas_verduras');
        $this->puntuacion('alimentos_crudos_separados_cocidos');
    }
}
