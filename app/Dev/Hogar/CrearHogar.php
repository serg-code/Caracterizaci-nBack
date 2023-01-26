<?php

namespace App\Dev\Hogar;

use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use Illuminate\Support\Facades\Validator;

class crearHogar
{
    protected Hogar $hogar;
    protected RespuestaHttp $respuesta;

    public function __construct(
        protected array $datosCrearHogar,
        protected string $idUsuario,
    )
    {
        $this->respuesta = new RespuestaHttp();
        $this->crearHogar();
    }

    protected function crearHogar()
    {
        $validador = Validator::make(
            $this->datosCrearHogar,
            [
                // 'zona' => 'required',
                'cod_dpto' => 'required|exists:departamentos,codigo_dane',
                'cod_mun' => 'required|exists:municipios,codigo_dane',
                // 'barrio' => 'required',
                'direccion' => 'required',
            ],
            [
                'zona.required' => 'La zona es necesaria',
                'cod_dpto.required' => 'Departamento necesario',
                'cod_dpto.exists' => 'El codigo del departamento no es valido',
                'cod_mun.required' => 'Municion necesario',
                'cod_mun.exists' => 'El codigo del municipio no es valido',
                'barrio.required' => 'El barrio es necesario',
                'direccion.required' => 'La direccion es necesaria',
            ]
        );

        if ($validador->fails())
        {
            $this->respuesta = new RespuestaHttp(
                400,
                'bad request',
                'Valide la informaicon',
                $validador->getMessageBag()
            );
        }

        // unset($this->datosCrearHogar['encuesta']);
        $this->datosCrearHogar['id_usuario'] = $this->idUsuario;
        $hogar = new Hogar($this->datosCrearHogar);
        $hogar->save();

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar,
        ];
        $this->hogar = $hogar;
        $this->respuesta = $respuesta;
    }

    public function getHogar(): ?Hogar
    {
        return $this->hogar;
    }

    public function getRespuesta(): RespuestaHttp
    {
        return $this->respuesta;
    }
}
