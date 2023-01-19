<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarMaternoPerinatal extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('materno_perinatal', $integrante, $seccion);
    }

    public function validar()
    {
        if ($this->integrante->sexo != 'Femenino')
        {
            array_push($this->seccionValidada, ['materno_perinatal' => 'No puede responder a esta seccion']);
            return false;
        }

        $aceptarEmbarazo = $this->puntuacion('ma_aceptacion_embarazo');
        if ($aceptarEmbarazo->id == 829)
        {
            return false;
        }

        $this->puntuacion('ma_fecha_control_prenatal');
        $this->puntuacion('ma_fecha_ultima_regla');
        $this->puntuacion('ma_fecha_parto');
        $this->puntuacion('ma_ganancia_peso');
        $this->puntuacion('ma_gestacion');
        $this->puntuacion('ma_carnet');
        $this->puntuacion('ma_prenatal_mensual');
        $this->examen();
    }

    protected function examen()
    {
        $this->puntuacion('ma_examen_serologia_1_trimestre');
        $this->puntuacion('ma_examen_serologia_2_trimestre');
        $this->puntuacion('ma_examen_serologia_3_trimestre');
        $this->puntuacion('ma_examen_vih_1_trimestre');
        $this->puntuacion('ma_examen_vih_2_trimestre');
        $this->puntuacion('ma_examen_vih_3_trimestre');
        $this->puntuacion('ma_odontologico');
        $this->puntuacion('ma_suplementacion');
        $this->puntuacion('ma_sedentarismo');
        $this->puntuacion('ma_bebidas_alcoholicas');

        $this->ultimoParto();

        $this->puntuacion('ma_depresion_postparto');
        $this->puntuacion('ma_atencion_institucional');
    }

    protected function ultimoParto()
    {
        $ultimoParto = $this->seccion['ma_fecha_ultimo_parto'] ?? null;

        if (!empty($fechaUltimoParto))
        {
            $fechaUltimoParto = Carbon::createFromFormat('Y-m-d', $fechaUltimoParto);
            $fechaActual = Carbon::now();
            $diferenciaFechas = $fechaActual->diff($fechaUltimoParto);
            $mesesParto = $diferenciaFechas->format("%m");

            if ($mesesParto < 12)
            {
                $this->puntaje += 5;
            }
        }
    }
}
