<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarInfancia extends Controller implements ValidacionEncuesta
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
        $this->seccionValidada = [];

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
    }

    public function validar()
    {
        $edad = $this->edad;
        if ($edad < 6 || $edad > 11)
        {
            $this->seccion = [];
            return false;
        }

        $this->puntuacion('in_peso');
        $this->puntuacion('in_talla');
        $this->puntuacion('in_desarrollo_lenguaje');
        $this->puntuacion('in_desarrollo_motora');
        $this->puntuacion('in_desarrollo_conducta');
        $this->puntuacion('in_desarrollo_probelmas_visuales');
        $this->puntuacion('in_desarrollo_problemas_auditivos');
        $this->puntuacion('in_desparasitado');

        $this->validarVacunacion();
        $this->valoracionMedica();
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
        return  [
            'in_peso' => null,
            'in_talla' => null,
            'in_desarrollo_lenguaje' => null,
            'in_desarrollo_motora' => null,
            'in_desarrollo_conducta' => null,
            'in_desarrollo_probelmas_visuales' => null,
            'in_desarrollo_problemas_auditivos' => null,
            'in_desparasitado' => null,
            'in_carnet_vacunacion' => null,
            'in_vacuna_dpt_r2' => null,
            'in_vacuna_polio_r2' => null,
            'in_vacuna_srp_r1' => null,
            'in_vacuna_fiebre_amarilla' => null,
            'in_vacuna_vph_d1' => null,
            'in_vacuna_vph_d2' => null,
            'in_vacuna_vph_d3' => null,
            'in_caries' => null,
            'in_consulta_odontologica' => null,
            'in_uso_seda_dental' => null,
            'in_fluor' => null,
            'in_profilaxis' => null,
            'in_sellantes' => null,
            'in_atencion_medica' => null,
            'in_atencion_enfermeria' => null,
        ];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
    }

    protected function vacunacion()
    {
        $this->puntuacion('in_vacuna_dpt_r2');
        $this->puntuacion('in_vacuna_polio_r2');
        $this->puntuacion('in_vacuna_srp_r1');
        $this->puntuacion('in_vacuna_fiebre_amarilla');
        $this->puntuacion('in_vacuna_vph_d1');
        $this->puntuacion('in_vacuna_vph_d2');
        $this->puntuacion('in_vacuna_vph_d3');
    }

    protected function validarVacunacion()
    {
        $carnet = OpcionPregunta::opcionPregunta('in_carnet_vacunacion', $this->seccion['in_carnet_vacunacion']);
        $this->puntuacion('in_carnet_vacunacion');

        if ($carnet->id == 505 || $carnet->pregunta_opcion == 'SI')
        {
            $this->vacunacion();
        }
    }

    public function valoracionMedica()
    {
        $this->puntuacion('in_caries');
        $this->puntuacion('in_consulta_odontologica');
        $this->puntuacion('in_uso_seda_dental');
        $this->puntuacion('in_fluor');
        $this->puntuacion('in_profilaxis');
        $this->puntuacion('in_sellantes');
    }

    protected function valoracionIntegral()
    {
        $this->puntuacion('in_atencion_medica');
        $this->puntuacion('in_atencion_enfermeria');
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

    protected function validacionSimple(string $refCampo, bool $validar): Opcion
    {
        if ($validar)
        {
            return $this->puntuacion($refCampo);
        }

        return new Opcion(['id' => 0, 'valor' => 0]);
    }
}
