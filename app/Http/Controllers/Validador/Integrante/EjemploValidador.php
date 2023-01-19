<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class EjemploValidador extends ValidacionIntegrante implements ValidacionEncuesta
{

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('adolescencia', $integrante, $seccion);
    }

    public function validar()
    {
    }
}
