<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarCuidadoEnfermedades extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('cuidado_enfermedades', $integrante, $seccion);
    }

    public function validar()
    {
        $this->puntuacion('actividad_fisica');
        $this->puntuacion('artritis_remautidea');
        $this->puntuacion('cancer');
        $this->puntuacion('diabetes');
        $this->puntuacion('diabetes_trimestral');
        $this->puntuacion('fuma');
        $this->puntuacion('hemofilia');
        $this->puntuacion('hemoglobina_glococilada');
        $this->puntuacion('hipertencion_trimestral');
        $this->puntuacion('insuficiencia_renal');
        $this->puntuacion('tension_diastolica');
        $this->puntuacion('tension_sistolica');
        $this->puntuacion('vacuna_fiebre_amarilla');
        $this->puntuacion('vih_sida');
        $this->puntuacion('ha_estado_embarazada');
        $this->puntuacion('cuantos_embarazos_ha_tenido');
        $this->puntuacion('hijos_muertos_parto_natural');
        $this->puntuacion('hijos_vivos_parto_natural');
        $this->puntuacion('hijos_muertos_por_cesarea');
        $this->puntuacion('hijos_vivos_por_cesarea');
        $this->puntuacion('cuantos_abortos');
        $this->puntuacion('cuantos_gemelos_multiples');
    }
}
