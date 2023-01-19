<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarMorbilidad extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('morbilidad', $integrante, $seccion);
    }

    public function validar()
    {
        $this->EnfermedadesCronicas();
        $this->puntuacion('propiedades_respiratorio');
        $this->puntuacion('propiedades_piel');
        $this->EnfermedadesCongenitas();

    }

    protected function EnfermedadesCronicas()
    {
        
            $cronica = $this->puntuacion('enfermedad_cronica');
            //si la persona tiene alguna enfermedad cronica
            $this->validacionSimple('enfermedad_cronica_cual', ($cronica->id == 150));
            $this->validacionSimple('controlada', ($cronica->id == 150));
        
    }

    protected function EnfermedadesCongenitas()
    {
        
            $congenita = $this->puntuacion('enfermedades_congenitas');
            //si la persona tiene alguna enfermedad congenita
            $this->validacionSimple('enfermedades_conjenitas_cual', ($congenita->id == 173));
        
    }
}
