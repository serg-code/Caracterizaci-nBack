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
        if (empty($this->seccion))
        {
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
        $this->gestacion();
        $this->puntuacion('ma_carnet');
        $this->puntuacion('ma_prenatal_mensual');
        $this->examen();
        //ma_tamizaje_genetico_recien_nacido
    }

    protected function gestacion()
    {
        $this->puntuacion('ma_gestacion');

        $this->puntuacion('ma_examen_serologia_1_trimestre');
        $this->puntuacion('ma_examen_serologia_2_trimestre');
        $this->puntuacion('ma_examen_serologia_3_trimestre');

        $this->puntuacion('ma_examen_vih_1_trimestre');
        $this->puntuacion('ma_examen_vih_2_trimestre');
        $this->puntuacion('ma_examen_vih_3_trimestre');
    }

    protected function examen()
    {

        $this->puntuacion('ma_odontologico');
        $this->puntuacion('ma_suplementacion');
        $this->puntuacion('ma_sedentarismo');
        $this->puntuacion('ma_bebidas_alcoholicas');

        $this->ultimoParto();

        $this->puntuacion('ma_depresion_postparto');
        $this->puntuacion('ma_atencion_institucional');

        $this->morbilidad();
        $this->valoracionIntegral();
        $this->deteccionTemprana();
        $this->proteccionEspecifica();
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

    protected function morbilidad()
    {
        $this->puntuacion('ma_aborto_no_especificado');
        $this->puntuacion('ma_hemorragia_precoz');
        $this->puntuacion('ma_hemorragia_anteparto');
        $this->puntuacion('ma_hipertension');
        $this->puntuacion('ma_vomitos');
        $this->puntuacion('ma_atencion_madre');
        $this->puntuacion('ma_diabetes_mellitus');
        $this->puntuacion('ma_hallazgo_anormal');
        $this->puntuacion('ma_parto_unico');
        $this->puntuacion('ma_parto_complicado');
        $this->puntuacion('ma_hemorragia_postparto');
        $this->puntuacion('ma_parto_cesarea');
        $this->puntuacion('ma_otras_complicaciones_parto');
        $this->puntuacion('ma_otras_complicaciones_purperio');
        $this->puntuacion('ma_hospitalizacion_sifilis');
        $this->edadGEstacion();
        $this->puntuacion('ma_plan_canguro');
        $this->puntuacion('ma_curso_maternidad_paternidad');
    }

    protected function edadGEstacion()
    {
        $edadGestacion = $this->seccion['ma_edad_gestacional'] ?? null;
        if (empty($edadGestacion))
        {
            return false;
        }

        if ($edadGestacion < 38)
        {
            $this->sumarPuntaje(5);
        }

        return true;
    }

    protected function valoracionIntegral()
    {
        # code...
    }

    protected function deteccionTemprana()
    {
        # code...
    }

    protected function proteccionEspecifica()
    {
        # code...
    }
}
