<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarCuidadoEnfermedades extends Controller implements ValidacionEncuesta
{

    protected array $errores;
    protected int $puntaje;
    protected int $edad;
    protected int $mesesEdad;
    protected array $seccionValidada;

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
    }

    public function validar()
    {
        
        //validaciones del excel
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
        return [
            'actividad_fisica' => null,
            'artritis_remautidea' => null,
            'cancer' => null,
            'diabetes' => null,
            'diabetes_trimestral' => null,
            'fuma' => null,
            'hemofilia' => null,
            'hemoglobina_glococilada' => null,
            'hipertencion_trimestral' => null,
            'insuficiencia_renal' => null,
            'tension_diastolica' => null,
            'tension_sistolica' => null,
            'vacuna_fiebre_amarilla' => null,
            'vih_sida' => null,
            'ha_estado_embarazada' => null,
            'cuantos_embarazos_ha_tenido' => null,
            'hijos_muertos_parto_natural' => null,
            'hijos_vivos_parto_natural' => null,
            'hijos_muertos_por_cesarea' => null,
            'hijos_vivos_por_cesarea' => null,
            'cuantos_abortos' => null,
            'cuantos_gemelos_multiples' => null,
        ];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
    }

    protected function puntuacion(string $refCampo)
    {
        $respuestaEncuesta = $this->seccion[$refCampo] ?? null;
        if (empty($respuestaEncuesta))
        {
            array_push($this->errores, [$refCampo => 'No encontramos la pregunta ' . $refCampo]);
            return false;
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        if (empty($opcion))
        {
            array_push($this->errores, [
                $refCampo => $respuestaEncuesta . " no es un respuesta valida para $refCampo"
            ]);
            return false;
        }

        array_push($this->seccionValidada, [$refCampo => $this->seccion[$refCampo]]);
        $this->puntaje += $opcion->valor;
        return true;
    }

    protected function validacionSimple(string $refCampo, bool $validar)
    {
        if ($validar)
        {
            $this->puntuacion($refCampo);
        }
    }
}
