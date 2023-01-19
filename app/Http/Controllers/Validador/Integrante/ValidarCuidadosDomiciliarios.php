<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarCuidadosDomiciliarios extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('cuidados_domiciliarios', $integrante, $seccion);
    }

    public function validar()
    {
        $domiciliario = $this->puntuacion('cuidados_domiciliarios');
        if ($domiciliario->id == 45)
        {
            $this->domiciliarios();
            $this->OxigenoDomiciliario();
        }
    }

    protected function domiciliarios()
    {

        $this->puntuacion('diagnostico_principal');
        $this->puntuacion('causa');
        $this->puntuacion('fecha_inicio_domiciliario');
    }

    protected function OxigenoDomiciliario()
    {
        $oxigeno = $this->puntuacion('oxigeno_domiciliario');
        //si la persona recibe oxigeno domiciliario 
        $this->validacionSimple('plan_aprobado', ($oxigeno->id == 52));
    }
}
