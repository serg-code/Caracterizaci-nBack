<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarEnfermedadesSaludPublica extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('enfermedades_salud_publica', $integrante, $seccion);
    }

    public function validar()
    {
        $this->puntuacion('malaria');
        $this->puntuacion('intoxicacion');
        $this->puntuacion('brucelosis');
        $this->puntuacion('sika_chicungunya');
        $this->puntuacion('sifilis');
        $this->puntuacion('leishmaniasis');
        $this->puntuacion('lepra');
        $this->puntuacion('chagas');
        $this->puntuacion('tuberculosis');
        $this->puntuacion('dengue');
        $this->puntuacion('varicela');
    }
}