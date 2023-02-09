<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Exports\ReporteExport;
use App\Models\AccesoReporte;
use App\Models\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Super Administrador',], ['only' => ['show',]]);
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



    public function show($reporteId)
    {
        $reporte = $this->getReporte($reporteId);

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
        $validador = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|string',
                'descripcion' => 'required|string',
                'roles' => "required|array",
            ],
            [
                'nombre.required' => 'El nombre es necesario',
                'nombre.string' => 'El nombre debe ser texto',
                'descripcion.required' => 'La descripcion es necesaria',
                'descripcion.string' => 'La descripcion debe ser texto',
                'roles.required' => 'El listado de roles es obligatorio',
                'roles.array' => 'Los roles debe ser un listado'
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

        $reporte = Reportes::find($reporteId);
        if (empty($reporte)) {
            return RespuestaHttp::respuesta(404, 'Not Found', 'Reporte no encontrado');
        }

        $datosActualizarReporte = $request->only(['nombre', 'descripcion']);
        $reporte->update($datosActualizarReporte);

        AccesoReporte::where('reporte_id', '=', $reporteId)->delete();
        $listadoId = $request->input('roles');
        $accesoReporte = [];
        $fecha = now();
        foreach ($listadoId as $id) {
            array_push($accesoReporte, [
                'reporte_id' => $reporteId,
                'role_id' => $id,
                'created_at' => $fecha,
                'updated_at' => $fecha,
            ]);
        }

        DB::table('acceso_reporte')->insertOrIgnore($accesoReporte);
        return RespuestaHttp::respuesta(
            200,
            'Updated',
            'Reporte actualizado con exito',
            [
                'reporte' => $reporte,
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
}