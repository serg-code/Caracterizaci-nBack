<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;
use App\Models\Secciones\Hogar\CIUU;

class ValidarVivienda extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('vivienda', $seccion);
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

    protected function activiadadProductiva()
    {
        $actividadProductiva = $this->puntuacion('actividad_productiva');
        if ($actividadProductiva->id == 314)
        {
            $ciuuRespuesta = $this->seccion['ciuu'] ?? '000';
            $ciuu = CIUU::where('codigo', '=', $ciuuRespuesta);

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
