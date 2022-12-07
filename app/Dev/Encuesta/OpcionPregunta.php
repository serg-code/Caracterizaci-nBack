<?php

namespace App\Dev\Encuesta;

use App\Dev\Notificacion;

class OpcionPregunta
{

    public static function buscarRespuestaOpcion($respuesta, $opcionesPregunta = []): Notificacion
    {
        $estado = new Notificacion();

        if (empty($opcionesPregunta))
        {
            return new Notificacion('encontrado', ['respuesta' => $opcionesPregunta]);
        }

        foreach ($opcionesPregunta as $opcion)
        {
            if ($opcion->valor == $respuesta)
            {
                return new Notificacion(
                    'encontrado',
                    [
                        'puntaje' => $opcion->valor,
                        'respuesta' => $opcion->pregunta_opcion
                    ]
                );
            }
        }

        return $estado;
    }
}
