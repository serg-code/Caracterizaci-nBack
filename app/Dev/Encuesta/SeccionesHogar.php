<?php

namespace App\Dev\Encuesta;

use App\Dev\Puntaje;
use App\Models\Hogar\Hogar;
use App\Models\Pregunta;

class SeccionesHogar
{

    public function __construct(
        protected Hogar $hogar,
        protected $secciones = [],
        public int $puntaje = 0,
        protected array $errores = [],
    )
    {
    }

    public function recorrer()
    {
        foreach ($this->secciones as $seccion)
        {

            if (empty($seccion['ref_seccion']) && empty($seccion['respuestas']))
            {
                return null;
            }


            $puntajeControl = new Puntaje($seccion['respuestas']);
            $this->puntaje += $puntajeControl->getPuntaje();
            $this->errores = array_merge($this->errores, $puntajeControl->getErrores());

            //agregar id del hogar
            $seccion['respuestas']['hogar_id'] = $this->hogar->id;
            $respuesta = Secciones::seleccionarSeccion(
                $seccion['ref_seccion'],
                $seccion['respuestas']
            );

            $this->guardarRespuesta($respuesta);
        }
    }

    protected function guardarRespuesta($respuesta)
    {
        $respuesta->eliminar();
        $respuesta->save();
    }

    public function obtenerPuntaje()
    {
        return $this->puntaje;
    }
}
