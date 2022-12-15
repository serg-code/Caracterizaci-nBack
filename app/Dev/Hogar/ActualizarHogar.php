<?php

namespace App\Dev\Hogar;

use App\Dev\Encuesta\SeccionesHogar;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;

class ActualizarHogar
{
    protected Hogar $hogar;
    protected RespuestaHttp $respuesta;
    protected array $errores;

    public function __construct(
        protected array $datosActualizarHogar,
        protected array $secciones,
    )
    {
        $this->respuesta = new RespuestaHttp(
            500,
            'Internal Server Error',
            'Algo ha salido mal al momento de actualizar los datos del hogar'
        );
        $this->errores = [];
        $this->actualizar();
    }

    protected function actualizar()
    {
        $hogar = Hogar::actualizarHogar($this->datosActualizarHogar);

        if (!empty($this->secciones))
        {
            $hogar = $this->recorrecSecciones($hogar, $this->secciones);
            $hogar->integrantes;
            $this->hogar = $hogar;
            $this->respuesta = new RespuestaHttp(
                200,
                'succes',
                'hogar actualizado',
                [
                    'hogar' => $hogar,
                ]
            );
        }
    }

    protected function recorrecSecciones(Hogar $hogar, array $secciones = []): Hogar
    {
        if (empty($secciones))
        {
            return $hogar;
        }

        $seccionesHogar = new SeccionesHogar($hogar, $secciones);
        $seccionesHogar->recorrer();
        $hogar->puntaje_obtenido = $seccionesHogar->puntaje;
        $this->errores = $seccionesHogar->getErrores();
        $hogar->update($hogar->attributesToArray());

        return $hogar;
    }

    public function getHogar(): ?Hogar
    {
        return $this->hogar;
    }

    public function getRespuesta(): RespuestaHttp
    {
        return $this->respuesta;
    }

    public function getErrores(): array
    {
        return $this->errores;
    }
}
