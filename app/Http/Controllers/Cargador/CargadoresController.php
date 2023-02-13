<?php

namespace App\Http\Controllers\Cargador;

use App\Dev\RespuestaHttp;
use App\Models\AccesoCargadores;
use App\Models\Cargadores;
use App\Models\User;
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
        $this->middleware('permission:listar cargador', ['only' => ['index']]);
        // $this->middleware('permission:editar cargador', ['only' => ['update']]);
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

    public function show(Request $request, $idCargador)
    {
        $accesoValido = $this->validarRolesAcceso($request->user(), $idCargador);
        if (!empty($accesoValido)) {
            return RespuestaHttp::respuestaObjeto($accesoValido);
        }

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
        $accesoValido = $this->validarRolesAcceso($request->user(), $idCargador);
        if (!empty($accesoValido)) {
            return RespuestaHttp::respuestaObjeto($accesoValido);
        }


        $validador = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|string',
                'descripcion' => 'string',
                'roles' => "array",
                'roles.*' => 'numeric|exists:roles,id',
                'estado' => 'string|in:ACTIVO,INACTIVO',
            ],
            [
                'nombre.required' => 'El nombre es necesario',
                'descripcion' => 'La descripcion debe ser de tipo texto',
                'nombre.string' => 'El nombre debe ser texto',
                'roles.required' => 'El listado de roles es obligatorio',
                'roles.array' => 'Los roles debe ser un listado',
                'roles.*' => 'En el listado de los roles un valor no es valido',
                'estado.strig' => 'El estado debe se de tipo texto',
                'estado.in' => 'El valor del estado no es una opcioens valida',
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
                'Not found',
                'No encontramos el cargador'
            );
        }

        $this->cargador->update($request->only(['nombre', 'descripcion', 'estado']));
        $this->cargador->save();
        $this->guardarAccesoCargadores($request->input('roles'));

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

    private function validarRolesAcceso(User $usuario, $idCargador): ?RespuestaHttp
    {
        $roles = $usuario->idRoles();
        $acceso = AccesoCargadores::where('id_cargador', $idCargador)->whereIn('role_id', $roles)->get();

        if (empty($acceso)) {
            return new RespuestaHttp(
                403,
                'Forbiden',
                'No puede acceder al recurso solicitado'
            );
        }

        return null;
    }

    /**
     * @param array<int> $idRoles
     */
    private function guardarAccesoCargadores(array $idRoles): void
    {
        AccesoCargadores::where('id_cargador', '=', $this->cargador->id)->delete();
        $accesoCargadores = array_map(function ($id) {
            $fecha = now();
            return [
                'id_cargador' => $this->cargador->id,
                'role_id' => $id,
                'created_at' => $fecha,
                'updated_at' => $fecha,
            ];
        }, $idRoles);

        AccesoCargadores::insert($accesoCargadores);
    }
}