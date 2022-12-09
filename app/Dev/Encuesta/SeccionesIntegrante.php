<?php

namespace App\Dev\Encuesta;

use App\Dev\Puntaje;
use App\Models\Integrantes;

class SeccionesIntegrante
{

    public function __construct(
        protected Integrantes $integrante,
        protected array $secciones = [],
        public int $puntaje = 0,
        protected array $errores = [],
    )
    {
    }

    public function recorrerSecciones()
    {
        foreach ($this->secciones as $seccion)
        {
            $seccion['respuestas']['id_integrante'] = $this->integrante->id;
            if (empty($seccion['ref_seccion']) && empty($seccion['respuestas']))
            {
                return null;
            }

            $respuesta = Secciones::seleccionarSeccion(
                $seccion['ref_seccion'],
                $seccion['respuestas']
            );

            $puntajeControl = new Puntaje($seccion['respuestas']);
            $this->puntaje += $puntajeControl->getPuntaje();
            $this->errores = array_merge($this->errores, $puntajeControl->getErrores());

            $this->guardarRespuesta($respuesta);
        }
    }

    protected function guardarRespuesta($respuesta)
    {
        $respuesta->eliminar();
        $respuesta->save();
    }
}
