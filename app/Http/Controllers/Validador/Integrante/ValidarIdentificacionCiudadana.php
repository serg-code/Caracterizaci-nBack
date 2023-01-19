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
        $this->puntuacion('programas');
        $this->puntuacion('cual_programa');
        $this->puntuacion('seguridad_social');
        $this->puntuacion('esta_estudiando');
        $this->puntuacion('tipo_educacion');
        $this->puntuacion('por_que');
        $this->puntuacion('ocupacion_ingreso');
        $this->puntuacion('discapacidad');
        $this->puntuacion('ayudas_tenicas');
    }

    protected function programas()
    {
        {
            $programa = $this->puntuacion('programas');
            //si la persona pertenece a algun programa 
            $this->validacionSimple('cual_programa', ($programa->id == 186));
        }
    }

    protected function TiposEducacion()
    {
        {
            $tipo = $this->puntuacion('esta_estudiando');
            //si la persona si estudia 
            $this->validacionSimple('tipo_educacion', ($tipo->id == 203));

            $tipo = $this->puntuacion('esta_estudiando');
            //si la persona no estudia
            $this->validacionSimple('por_que', ($tipo->id == 202));
        }
    }

    protected function discapacidades()
    {
        {
            $discapacidad = $this->puntuacion('discapacidad');
            //si la persona si la persona tiene una discapacidad 
            $this->validacionSimple('ayudas_tecnicas', ($discapacidad->id != 223));
        }
    }
}
