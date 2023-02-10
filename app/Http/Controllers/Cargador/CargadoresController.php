<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Models\Cargadores;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CargadoresController extends Controller
{
    private ?Cargadores $cargador;

    public function __construct()
    {
        $this->cargador = new Cargadores();
    }

    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? 10;

        //filtro de usuarios
        $hogares = QueryBuilder::for (Cargadores::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::scope('search'),
            ])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de cargadores',
            $hogares
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show($idCargador)
    {
        $cargador = Cargadores::find($idCargador);

        if (empty($cargador)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'Cargador no encontrado'
            );
        }

        $this->cargador = Cargadores::find($idCargador)->with(['usuarioCrea', 'intentos.usuario'])->first();
        $this->cargador->cantidad_intentos = $this->cargador->intentosRealizados();
        return RespuestaHttp::respuesta(200, 'succes', 'Cargador', [$this->cargador]);
    }

    public function update(Request $request, $idCargador)
    {
        $validador = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|string',
                'roles' => "array",
            ],
            [
                'nombre.required' => 'El nombre es necesario',
                'nombre.string' => 'El nombre debe ser texto',
                'roles.required' => 'El listado de roles es obligatorio',
                'roles.array' => 'Los roles debe ser un listado'
            ]
        );

        if ($validador->fails()) {
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Se presentaron errores en la validacion de los datos',
                $validador->getMessageBag()
            );
        }

        $this->cargador = Cargadores::find($idCargador);
        if (empty($this->cargador)) {
            return RespuestaHttp::respuesta(
                404,
                'Not foind',
                'No encontramos el cargador'
            );
        }

        $this->cargador->nombre = $request->input('nombre');
        $this->cargador->save();

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Cargador actualizado con exito',
            [
                'cargador' => $this->cargador,
            ]
        );
    }


    public function destroy($id)
    {
        //
    }
}