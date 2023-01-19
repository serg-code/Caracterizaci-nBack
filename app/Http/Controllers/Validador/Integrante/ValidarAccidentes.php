<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarAccidentes extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('accidentes', $integrante, $seccion);
    }

    public function validar()
    {
        $accidente = $this->puntuacion('accidentes_transito');
        $this->validacionSimple('tipo_lesion', ($accidente->id == 36));
        $this->puntuacion('accidentes_laborales');
    }
}
