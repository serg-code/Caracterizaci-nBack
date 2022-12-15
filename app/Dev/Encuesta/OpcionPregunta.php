<?php

namespace App\Dev\Encuesta;

use App\Dev\Notificacion;
use App\Models\Opcion;
use App\Models\Pregunta;

class OpcionPregunta
{

    public static function buscarRespuestaOpcion(Pregunta $pregunta, $respuesta): Notificacion
    {
        $estado = new Notificacion();
        $opcionesPregunta = Opcion::where('ref_campo', '=', $pregunta->ref_campo)->get();

        if (sizeof($opcionesPregunta) === 0)
        {
            return new Notificacion('encontrado', ['respuesta' => $opcionesPregunta]);
        }

        foreach ($opcionesPregunta as $opcion)
        {
            if ($opcion->id == $respuesta)
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
