<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Hogar\Hogar;
use App\Models\Opcion;
use App\Models\Secciones\Hogar\CIUU;
use Illuminate\Http\Request;

class ValidarVivienda implements ValidacionEncuesta
{

    protected array $errores;
    protected int $puntaje;
    protected array $seccionValidada;

    public function __construct(
        protected Hogar $hogar = new Hogar(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
        $this->seccionValidada = [];
    }

    public function validar()
    {
        $this->puntuacion('tipos_vivienda');
        $this->puntuacion('tipos_tenecia');
        $this->puntuacion('servicios_sanitarios');
        $this->puntuacion('tipos_alumbrado');
        $this->puntuacion('dormitorios');
        $this->puntuacion('humo_vivienda');
        $this->puntuacion('fuentes_agua');
        $this->puntuacion('tipos_tratamiento_agua');
        $this->puntuacion('tipos_disposicion_basura');
        $this->puntuacion('reciclan');
        $this->puntuacion('iluminacion_adecuada');
        $this->puntuacion('ventilacion_adecuada');
        $this->puntuacion('roedores');
        $this->puntuacion('reservorios_agua');
        $this->puntuacion('anjeos');
        $this->puntuacion('tipos_insectos_vectores');
        $this->puntuacion('conservacion_alimentos');
        $this->activiadadProductiva();
        $this->puntuacion('tipos_material_piso');
        $this->puntuacion('tipos_material_techo');
        $this->puntuacion('tipos_material_paredes');
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    public function obtenerPreguntas(): array
    {
        return [];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccionValidada;
    }

    protected function puntuacion(string $refCampo): Opcion
    {
        $respuestaEncuesta = $this->seccion[$refCampo] ?? null;
        if (empty($respuestaEncuesta))
        {
            array_push($this->errores, [$refCampo => 'No encontramos la pregunta ' . $refCampo]);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        if (empty($opcion))
        {
            array_push($this->errores, [
                $refCampo => $respuestaEncuesta . " no es un respuesta valida para $refCampo"
            ]);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        array_push($this->seccionValidada, [$refCampo => $this->seccion[$refCampo]]);
        $this->puntaje += $opcion->valor;
        return $opcion;
    }

    protected function validacionSimple(string $refCampo, bool $validar): ?Opcion
    {
        if ($validar)
        {
            return $this->puntuacion($refCampo);
        }

        return null;
    }

    protected function activiadadProductiva()
    {
        $actividadProductiva = $this->puntuacion('actividad_productiva');
        if ($actividadProductiva->id == 314)
        {
            $ciuuRespuesta = $this->seccion['ciuu'] ?? '000';
            $ciuu = CIUU::find($ciuuRespuesta);

            if (empty($ciuu))
            {
                array_push(
                    $this->errores,
                    ['ciuu' => 'No encontramos este codigo CIUU en la seccion de Vivienda']
                );
                return false;
            }

            array_push($this->seccionValidada, ['ciuu' => "$ciuuRespuesta"]);
        }
    }
}
