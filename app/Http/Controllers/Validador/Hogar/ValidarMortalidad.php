<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;

class ValidarMortalidad extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('mortalidad', $seccion);
    }

    public function validar()
    {
        $this->fallecidos();
    }

    protected function fallecidos()
    {
        {
            $fallecido = $this->puntuacion('fallecido_familiar');
            if ($fallecido->id == 381)
            {
                $this->puntuacion('sexo_fallecido');
                $this->puntuacion('edad_fallecido');
                $this->puntuacion('cusa_muerte');
                $this->puntuacion('fecha_muerte');
            }
        }
    }
}
