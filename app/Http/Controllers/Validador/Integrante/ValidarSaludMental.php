<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Cie10;
use App\Models\Integrantes;

class ValidarSaludMental extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('salud_mental', $integrante, $seccion);
    }

    public function validar()
    {
        $this->puntuacion('depresion');
        $this->puntuacion('intento_suicidio');
        $this->puntuacion('trastorno_afectivo');
        $this->puntuacion('bulimia');
        $this->puntuacion('anorexia');
        $tratamiento = $this->puntuacion('tratamiento');
        if ($tratamiento->id == 113)
        {
            $this->diagnostico();
        }
        $this->puntuacion('violencia_fisica');
        $this->puntuacion('violencia_psicologica');
        $this->puntuacion('violencia_sexual');
        $this->puntuacion('violencia_institucional');
        $this->puntuacion('violencia_social');
        $this->puntuacion('violencia_gestacion');
    }

    protected function diagnostico()
    {
        $diagnostico = $this->puntuacion('diagnostico');
        if ($diagnostico->id == 113)
        {
            $cie10Respuesta = $this->seccion['cie10'] ?? '000';
            $cie10 = Cie10::where('codigo', '=', $cie10Respuesta);

            if (empty($cie10))
            {
                array_push(
                    $this->errores,
                    ['cie10' => 'No encontramos este codigo CIE10 en la seccion de salud mental']
                );
                return false;
            }

            array_push($this->seccionValidada, ['cie10' => "$cie10Respuesta"]);
        }
    }
}
