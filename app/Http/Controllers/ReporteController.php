<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Exports\ReporteExport;
use App\Models\AccesoReporte;
use App\Models\Reportes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{

    private User $usuario;
    private Reportes $reporte;

    public function __construct()
    {
        // $this->middleware(['role:*',], ['only' => ['show',]]);
        $this->middleware(['permission:listar reporte'], ['only' => ['index']]);
        $this->middleware(['permission:editar reporte'], ['only' => ['update']]);
    }



    public function index()
    {
        $reportes = Reportes::select()->with(['variables'])->get();
        // $reportes = DB::table('reportes')->select()->get();

        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Listado de reportes',
            $reportes
        );
    }



    public function store(Request $request)
    {
        //
    }



    public function show(Request $request, $idReporte)
    {

        $acceso = $this->validarRolesAcceso($request->user(), $idReporte);
        if (!empty($acceso)) {
            return RespuestaHttp::respuestaObjeto($acceso);
        }

        $validador = Validator::make(
            [
                'idReporte' => $idReporte,
            ],
            [
                'idReporte' => 'required|exists:reportes,id',
            ],
            [
                'idReporte.required' => 'El id del reporte es necesario',
                'idReporte.exists' => 'No encontramos el reporte',
            ]
        );

        if ($validador->fails()) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos el reporte'
            );
        }

        $reporte = Reportes::find($idReporte);
        $reporte->acceso;
        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Reporte encontrado',
            $reporte
        );

    }

    public function descargar(Request $request, $idReporte)
    {
        $this->usuario = $request->user();
        $acceso = $this->validarRolesAcceso($this->usuario, $idReporte);
        if (!empty($acceso)) {
            return RespuestaHttp::respuestaObjeto($acceso);
        }

        $reporte = $this->getReporte($idReporte);
        if (empty($reporte)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'Reporte no encontrado',
                [
                    'reporte' => $reporte,
                ]
            );
        }

        $datosQuery = $this->datosReemplazar($reporte->variables, $_GET);
        if (!empty($datosQuery['error'])) {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No encontramos datos necesarios',
                $datosQuery['error']
            );
        }

        $query = str_replace($datosQuery['busqueda'], $datosQuery['remplazar'], $reporte->query);
        $consulta = DB::select($query);
        return Excel::download(new ReporteExport($consulta), $reporte->nombre . '.xlsx');
    }



    public function update(Request $request, $reporteId)
    {
        $accesoRoles = $this->validarRolesAcceso($request->user(), $reporteId);
        if (!empty($accesoRoles)) {
            return RespuestaHttp::respuestaObjeto($accesoRoles);
        }

        $validador = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|string',
                'descripcion' => 'required|string',
                'roles' => "required|array",
                'roles.*' => 'numeric|exists:roles,id',
                'estado' => 'string|in:ACTIVO,INACTIVO',
            ],
            [
                'nombre.required' => 'El nombre es necesario',
                'nombre.string' => 'El nombre debe ser texto',
                'descripcion.required' => 'La descripcion es necesaria',
                'descripcion.string' => 'La descripcion debe ser texto',
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
                'Bad request',
                'Encontramos un error en los datos',
                $validador->getMessageBag()
            );
        }

        $this->reporte = Reportes::find($reporteId);
        if (empty($this->reporte)) {
            return RespuestaHttp::respuesta(404, 'Not Found', 'Reporte no encontrado');
        }

        $datosActualizarReporte = $request->only(['nombre', 'descripcion', 'estado']);
        $this->reporte->update($datosActualizarReporte);
        $this->guardarAccesoReporte($request->input('roles'), $reporteId);

        $this->reporte->acceso;
        return RespuestaHttp::respuesta(
            200,
            'Updated',
            'Reporte actualizado con exito',
            [
                'reporte' => $this->reporte,
            ]
        );
    }


    public function destroy($id)
    {
        //
    }

    private function getReporte(int $idReporte): ?Reportes
    {
        $reporte = Reportes::find($idReporte);

        if (empty($reporte)) {
            return null;
        }

        return $reporte;
    }

    private function datosReemplazar($variables, array $parametrosUrl): array
    {
        $busqueda = [];
        $remplazar = [];
        $error = [];

        foreach ($variables as $variable) {
            $referencia = $variable->ref;
            if (empty($parametrosUrl[$referencia])) {
                $error[$referencia] = "No encontramos $referencia";
                continue;
            }

            $dato = $this->convertirDato($variable->tipo, $parametrosUrl[$referencia]);
            if (empty($dato)) {
                $error[$referencia] = "$referencia no es del tipo de dato necesario";
                continue;
            }

            array_push($busqueda, ":$referencia");
            array_push($remplazar, $dato);
        }


        return [
            'busqueda' => $busqueda,
            'remplazar' => $remplazar,
            'error' => $error,
        ];
    }

    private function convertirDato(string $tipoDato, $dato)
    {

        try {
            return match ($tipoDato) {
                'date' => $this->validacion($dato, 'date') ? "'" . Carbon::parse($dato) . "'" : null,
                'number' => is_numeric($dato) ? $dato : null,
                'text' => $this->validacion($dato, 'string') ? "'$dato'" : null,
            };
        } catch (\Throwable $th) {
            return null;
        }
    }

    private function validacion($dato, $reglaValidacion): bool
    {
        $validador = Validator::make(
            [
                'dato' => $dato
            ],
            [
                'dato' => $reglaValidacion
            ]
        );

        return !$validador->fails();
    }

    private function validarRolesAcceso(User $usuario, int $idPermiso): ?RespuestaHttp
    {
        $roles = $usuario->idRoles();
        $acceso = AccesoReporte::where('reporte_id', $idPermiso)->whereIn('role_id', $roles)->get();

        if (empty($acceso->toArray())) {
            return new RespuestaHttp(
                403,
                'Forbiden',
                'No puede acceder a este recurso'
            );
        }

        return null;
    }

    private function guardarAccesoReporte(array $listadoIds, int $reporteId): void
    {
        AccesoReporte::where('reporte_id', '=', $reporteId)->delete();
        $accesoReporte = array_map(function (int $id) {
            $fecha = now();
            return [
                'reporte_id' => $this->reporte->id,
                'role_id' => $id,
                'created_at' => $fecha,
                'updated_at' => $fecha,
            ];
        }, $listadoIds);

        AccesoReporte::insert($accesoReporte);
    }
}