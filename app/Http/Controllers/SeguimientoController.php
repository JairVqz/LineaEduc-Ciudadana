<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CatalogoAreas;
use App\Models\Estatus;
use App\Models\Prioridad;
use App\Models\Seguimiento;
use App\Models\Solicitud;
use App\Models\TipoSolicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SeguimientoController extends Controller
{

    public function seguimiento()
    {
        Solicitud::actualizarDiasTranscurridos(); 

        if (Auth::user()->rol === "Revisor") {
            $solicitudes = DB::select('SELECT * FROM listarSolicitudes where idArea = ? order by idestatus ASC, idprioridad desc ', [Auth::user()->idArea]);
            $listaTiposSolicitud = TipoSolicitud::all()->where('idArea',"=",Auth::user()->idArea);
            $listaAreas = CatalogoAreas::all();

        } else {
            $solicitud = new Solicitud();
            $solicitudes = $solicitud->listarSolicitudesSeguimiento();
            $listaTiposSolicitud = TipoSolicitud::all();
            $listaAreas = CatalogoAreas::all();
        }
        //dd($solicitudes);
        $listaPrioridades = Prioridad::all();
        $listaEstatus = Estatus::all();

        return view(
            'solicitud.seguimiento.seguimiento',
            [
                'listaAreas' => $listaAreas,
                'listaTiposSolicitud' => $listaTiposSolicitud,
                'listaPrioridades' => $listaPrioridades,
                'listaEstatus' => $listaEstatus,
                'solicitudes' => $solicitudes,
            ]
        );
    }

    public function obtenerTipos(Request $request)
    {
        $idArea = $request->idArea;
        $tiposSolicitud = TipoSolicitud::where('idArea', $idArea)->get();

        return response()->json($tiposSolicitud);
    }

public function solicitudSeguimiento($folio)
{
    $solicitudes = DB::select("SELECT * FROM listarSolicitudes WHERE folio = ?", [$folio]);
    $soli = Solicitud::where('folio', $folio)->first();
    $seguimientos = Seguimiento::where('folio', $folio)->orderBy('created_at', 'asc')->get();
    $curpSesion = Auth::user()->curp;
    //dd($curpSesion);

    $listaTiposSolicitud = TipoSolicitud::all();
    $listaAreas = CatalogoAreas::all();
    $listaPrioridades = Prioridad::all();
    $listaEstatus = Estatus::all();

    return view('solicitud.seguimiento.solicitudSeguimiento', [
        'listaAreas' => $listaAreas,
        'listaTiposSolicitud' => $listaTiposSolicitud,
        'listaPrioridades' => $listaPrioridades,
        'listaEstatus' => $listaEstatus,
        'solicitudes' => $solicitudes,
        'soli' => $soli,
        'seguimientos' => $seguimientos,
        'curpSesion' => $curpSesion
    ]);
}

    public function coincidenciasSeguimiento(Request $request)
    {
        $folio = $request->folio;
        if ($folio === null) {
            $folio = "";
        }

        if ($folio === "") {
            $data['coincidenciasSeguimiento'] = [];
            return response()->json($data);
        } else {
            $data['coincidenciasSeguimiento'] = Seguimiento::where('folio', '=', $folio)
                ->get();
            return response()->json($data);
        }
    }
    public function guardarSolicitud(Request $request, $folio)
    {
        //recupero
        $soli = Solicitud::where('folio', $folio)->first();
        DB::beginTransaction();
        try {
            //agrego a seguimiento
            $seguimiento = new Seguimiento();
            $seguimiento->folio = $folio;
            $seguimiento->comentario = $request->comentarios;
            //NOMBRE Y USUARIO
            $seguimiento->nombre_usuario = Auth::user()->name;
            $seguimiento->curp_usuario = Auth::user()->curp;
            $seguimiento->idArea = Auth::user()->idArea;
            $seguimiento->save();
            // cambio el estatus de la solicitud
            $soli->idEstatus = $request->idEstatus;
            if ($request->idEstatus == 3) {
                $soli->diasTranscurridos = '--';
            } else {
                DB::statement("EXEC ActualizarDiasUnRegistro @registro=?", [$folio]);
            }
            $soli->save();

            DB::commit();
            return redirect()->route('seguimiento.seguimiento')->with('success', 'Seguimiento registrado correctamente');
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->route('solicitud.index')->with('error', 'Seguimiento NO registrado');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
