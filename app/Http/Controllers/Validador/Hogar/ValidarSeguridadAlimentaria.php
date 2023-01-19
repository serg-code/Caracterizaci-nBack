<?php

namespace App\Http\Controllers\Validador\Hogar;

use App\Interfaces\ValidacionEncuesta;

class ValidarSeguridadAlimentaria extends ValidacionHogar implements ValidacionEncuesta
{

    public function __construct(array $seccion)
    {
        parent::__construct('seguridad_alimentaria', $seccion);
    }

    public function validar()
    {
        $this->puntuacion('falto_dinero');
        $this->puntuacion('animales_silvestres');
        $this->consumoCarne();
        $this->puntuacion('consume_huevos');
        $this->puntuacion('consume_frijol_lentejas');
        $this->puntuacion('consume_lacteos');
        $this->puntuacion('consume_harinas');
        $this->puntuacion('consume_verduras');
        $this->puntuacion('consume_frutas_frescas');
        $this->puntuacion('consume_enlatados');
        $this->puntuacion('consume_platano_yuca');
        $this->puntuacion('consume_gaseosas');
    }

    protected function consumoCarne()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }


    protected function consumoHuevos()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoFrijolLentejas()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoLacteos()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoHarinas()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne > 4)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoVerduras()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoFrutasFrescas()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoEnlatados()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoPlatanoYuca()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 3)
        {
            $this->sumarPuntaje(5);
        }
    }

    protected function consumoGaseosa()
    {
        $vecesComeCarne = $this->seccion['consume_cerdo_res_pollo'];
        if ($vecesComeCarne < 0)
        {
            $this->agregarErrror('consume_cerdo_res_pollo', "($vecesComeCarne) no es valido como respuesta");
        }

        if ($vecesComeCarne >= 0 && $vecesComeCarne < 2)
        {
            $this->sumarPuntaje(5);
        }
    }
}
