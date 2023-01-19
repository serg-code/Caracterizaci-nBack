<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\PreguntaEncuesta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;

class ValidarIdentificacionCiudadana extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('identificacion_ciudadana', $integrante, $seccion);
    }

    public function validar()
    {
        $this->puntuacion('grupo_etnia');
        $this->puntuacion('grupo_atencion_especial');
        $this->programas();
        $this->puntuacion('seguridad_social');
        $this->educacion();
        $this->puntuacion('ocupacion_ingreso');
        $this->discapacidad();
    }

    protected function programas()
    {
        $programa = $this->puntuacion('programas');
        //si la persona pertenece a algun programa 
        $this->validacionSimple('cual_programa', ($programa->id == 186));
    }

    protected function educacion()
    {
        $estudia = $this->puntuacion('esta_estudiando');
        $this->validacionSimple('tipo_educacion', ($estudia->id == 203));
        $this->validacionSimple('por_que', ($estudia->id == 202));
    }

    protected function discapacidad()
    {
        $discapacidad = $this->puntuacion('discapacidad');
        //si la persona si la persona tiene una discapacidad 
        $this->validacionSimple('ayudas_tecnicas', ($discapacidad->id != 223));
    }
}
