<?php

namespace App\Http\Controllers\IntentosCargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Intentos;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IntentosController extends Controller
{
    private Intentos $intento;
    private string $apiUrl;

    public function __construct(
    )
    {
        $this->apiUrl = env('APP_URL', 'http://localhost');
        $this->intento = new Intentos();
    }

    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? env('LIMITEPAGINA_USUARIO', 10);
        $select = [
            'intentos.id',
            'intentos.id_cargador',
            'intentos.id_usuario',
            'intentos.cantidad_errores',
            'intentos.created_at',
        ];

        $intentos = QueryBuilder::for (Intentos::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::scope('fechas')
            ])
            ->with([
                'cargador:id,nombre,estado,created_at'
            ])
            ->select($select)
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Listado de intentos de carga',
            $intentos
        );
    }


    public function store(Request $request)
    {
        //
    }


    public function show($idIntento)
    {
        $this->intento = Intentos::find($idIntento);

        if (empty($this->intento)) {
            return RespuestaHttp::respuesta(
                404,
                'Not Found',
                'No encontramos el intento buscado'
            );
        }

        $this->intento->cargador;
        $urlArchivoOriginal = $this->apiUrl . '/api/cargador/archivo/' . $this->intento->id;
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Intento encontrado',
            [
                'intento' => $this->intento,
                'urlArchivoOriginal' => $urlArchivoOriginal,
            ]
        );
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}