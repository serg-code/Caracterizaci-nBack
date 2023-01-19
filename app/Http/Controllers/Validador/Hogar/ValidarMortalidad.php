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
        $this->puntuacion('fallecido_familiar');
        $this->puntuacion('sexo_fallecido');
        $this->puntuacion('edad_fallecido');
        $this->puntuacion('causa_muerte');
        $this->puntuacion('fecha_muerte');
    }

    protected function fallecidos()
    {
        {
            $fallecido = $this->puntuacion('fallecido_familiar');
            //si la persona si tiene un familiar fallecido recientemente
            $this->validacionSimple('sexo_fallecido', ($fallecido->id == 381));
            $this->validacionSimple('edad_fallecido', ($fallecido->id == 381));
            $this->validacionSimple('cusa_muerte', ($fallecido->id == 381));
            $this->validacionSimple('fecha_muerte', ($fallecido->id == 381));
          
        }
    }
}
