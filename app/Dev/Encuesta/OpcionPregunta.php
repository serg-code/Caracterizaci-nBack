<?php

namespace App\Dev\Encuesta;

use App\Dev\Notificacion;
use App\Models\Opcion;
use App\Models\Pregunta;

class OpcionPregunta
{

    public static function buscarRespuestaOpcion(Pregunta $pregunta, $respuesta): Notificacion
    {
        $opcion = Opcion::find($respuesta);
        return new Notificacion(
            'encontrado',
            [
                'pregunta' => $opcion->ref_campo ?? 'nada',
                'puntaje' => $opcion->valor ?? 0,
                'respuesta' => $opcion->pregunta_opcion ?? $respuesta,
            ]
        );
    }

    public static function opcionPregunta(string $refCampo, int $idRespuesta): ?Opcion
    {
        $opcion = Opcion::where('id', '=', $idRespuesta)->where('ref_campo', '=', $refCampo)->first() ?? null;
        return $opcion;
    }

    public static function puntajeOpcion(string $refCampo, int $idRespuesta): int
    {
        $opcion = Opcion::where('id', '=', $idRespuesta)->where('ref_campo', '=', $refCampo)->first();
        return $opcion->valor == 0;
    }
}
