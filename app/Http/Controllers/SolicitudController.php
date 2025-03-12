<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SolicitudesExport;
use App\Exports\SeguimientoExport;

use App\Http\Requests\StoreSolicitudRequest;
//modelos
use App\Models\CatalogoAreas;
use App\Models\CatalogoExtensiones;
use App\Models\CatalogoPuestos;
use App\Models\Contacto;
use App\Models\Estatus;
use App\Models\Extension;
use App\Models\Llamada;
use App\Models\Prioridad;
use App\Models\Seguimiento;
use App\Models\Solicitud;
use App\Models\TipoSolicitud;
use App\Models\Ubicacion;
use App\Models\Folio;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //YA ESTA BIEN CON LA NUEVA BD
    {
        return view('solicitud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //YA ESTA BIEN CON LA NUEVA BD
    {
        $listaPrioridades = Prioridad::all();
        $listaTiposSolicitud = TipoSolicitud::all();
        $listaAreas = CatalogoAreas::all();
        $listaExtensiones = CatalogoExtensiones::all();
        $listaPuestos = CatalogoPuestos::all();
        $listaDirectorio = DB::table('directorio')->get();

        return view(
            'solicitud.nuevaSolicitud.create',
            [
                'listaPrioridades' => $listaPrioridades,
                'listaTiposSolicitud' => $listaTiposSolicitud,
                'listaAreas' => $listaAreas,
                'listaExtensiones' => $listaExtensiones,
                'listaPuestos' => $listaPuestos,
                'listaDirectorio' => $listaDirectorio,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSolicitudRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolicitudRequest $request) //YA ESTA BIEN CON LA NUEVA BD
    {

        $fechaActual = NOW();
        $fechaPartes = explode("-", $fechaActual->format('Y-m-d'));
        $anioActual = $fechaPartes[0];
        $mesActual = $fechaPartes[1];

        $ultimoFolio = Solicitud::orderBy('folio', 'desc')->first();

        $folioGenerado = 0;
        $mesUltimoRegistro = 0;
        $anioUltimoRegistro = 0;

        if ($ultimoFolio && isset($ultimoFolio->folio)) {
            $mesUltimoRegistro = Str::of($ultimoFolio->folio)->substr(4, 2);
        } else {
            $folioCompleto = $anioActual . $mesActual . '00001';
        }

        if ($anioUltimoRegistro == $anioActual) {

            $folioNumeroConsecutivo = Str::of($ultimoFolio->folio)->substr(6);
            $numeroConsecutivo = (int)$folioNumeroConsecutivo->__toString();
            $numeroConsecutivoFormateado = str_pad($numeroConsecutivo + 1, 5, '0', STR_PAD_LEFT);
            $folioCompleto = $anioActual . $mesActual . $numeroConsecutivoFormateado;

            $folioGenerado = (int)$folioCompleto;
        } else {

            $folioCompleto = $anioActual . $mesActual . '00001';
            $folioGenerado = (int)$folioCompleto;
        }

        if ($mesUltimoRegistro == $mesActual) {

            $folioNumeroConsecutivo = Str::of($ultimoFolio->folio)->substr(6);
            $numeroConsecutivo = (int)$folioNumeroConsecutivo->__toString();
            $numeroConsecutivoFormateado = str_pad($numeroConsecutivo + 1, 5, '0', STR_PAD_LEFT);
            $folioCompleto = $anioActual . $mesActual . $numeroConsecutivoFormateado;

            $folioGenerado = (int)$folioCompleto;
        } else {

            $folioCompleto = $anioActual . $mesActual . '00001';
            $folioGenerado = (int)$folioCompleto;
        }

        DB::beginTransaction();

        try {

            $idExtension = $request->idExtension;
            $idArea = $request->idArea;
            $idTipoSolicitud = $request->idTipoSolicitud;
            //$idPrioridad = $request->idPrioridad;

            //FOLIO
            $folio = new Folio();

            $folio->folio = $folioGenerado;
            $folio->save();

            $folioGuardado = $folio->folio;

            //CONTACTO
            $contacto = new Contacto();

            $contacto->folio = $folioGuardado;
            $contacto->correo = $request->correo;
            $contacto->telefonoCelular = $request->telefonoCelular;
            $contacto->telefonoFijo = $request->telefonoFijo;
            $contacto->save();

            $contactoGuardado = Contacto::where('folio', $folioGuardado)->first();

            //LLAMADA
            $llamada = new Llamada();

            $llamada->folio = $folioGuardado;
            $horaInicio = \Carbon\Carbon::parse($request->horaInicio);
            $llamada->horaInicio = $horaInicio;
            $llamada->horaTermino = now()->format('H:i:s');
            $horaTermino = now();
            $diferenciaMinutos = $horaTermino->diffInMinutes($horaInicio);
            $llamada->duracionMinutos = $diferenciaMinutos;
            $llamada->save();

            $llamadaGuardada = Llamada::where('folio', $folioGuardado)->first();


            //UBICACIÓN
            $ubicacion = new Ubicacion();

            $ubicacion->folio = $folioGuardado;

            if ($request->nombreCct == "") {
                $ubicacion->cct = "SIN ASIGNAR";
                $ubicacion->nivelCct = "SIN ASIGNAR";
                $ubicacion->nombrePlantel = "SIN ASIGNAR";
                $ubicacion->nombreDirector = "SIN ASIGNAR";
                $ubicacion->direccionCct = "SIN ASIGNAR";
            } else {
                $ubicacion->cct = $request->cct;
                $ubicacion->nivelCct = $request->nivelCct;
                $ubicacion->nombrePlantel = $request->nombreCct;
                $ubicacion->nombreDirector = $request->nombreDirector;
                $ubicacion->direccionCct = $request->direccionCct;
            }

            if ($request->nombreMunicipio == "") {
                $ubicacion->municipio = "SIN ASIGNAR";
            } else {
                $ubicacion->municipio = $request->nombreMunicipio;
            }

            if ($request->nombreLocalidad == "") {
                $ubicacion->localidad = "SIN ASIGNAR";
            } else {
                $ubicacion->localidad = $request->nombreLocalidad;
            }

            $ubicacion->save();

            $ubicacionGuardada = Ubicacion::where('folio', $folioGuardado)->first();

            //EXTENSIÓN
            $extension = new Extension();

            $extension->folio = $folioGuardado;
            $extension->idExtensionCatalogo = $idExtension;
            $extension->idArea = $idArea;
            $extension->save();

            $extensionGuardada = Extension::where('folio', $folioGuardado)->first();

            //SOLICITUD
            $solicitud = new Solicitud();

            $solicitud->folio = $folioGenerado;
            $solicitud->nombre = $request->nombre;
            $solicitud->apellidoPaterno = $request->apellidoPaterno;
            $solicitud->apellidoMaterno = $request->apellidoMaterno;
            $solicitud->idTipoSolicitud = $idTipoSolicitud;
            $solicitud->idPrioridad = 2;
            $solicitud->idEstatus = 1;
            $solicitud->descripcion = $request->descripcion;
            $solicitud->diasTranscurridos = "0";
            $solicitud->curp_usuario = $request->curpUsuario;
            $solicitud->nombre_usuario = $request->usuario;
            $solicitud->idExtensionSolicitud = $extensionGuardada->idExtensionSolicitud;
            $solicitud->idUbicacion = $ubicacionGuardada->idUbicacion;
            $solicitud->idContacto = $contactoGuardado->idContacto;
            $solicitud->idLlamada = $llamadaGuardada->idLlamada;
            $solicitud->save();

            DB::commit();

            return response()->json(['mensaje' => 'Solicitud guardada correctamente', 'folio' => $folioGuardado]);
        } catch (\Exception $e) {

            Log::error('Error al guardar la solicitud: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);

            /*Log::error('Error al guardar la solicitud: ' , [
                //'exception' => $e,
                //'trace' => $e->getTraceAsString()
                //$idPrioridad, $request->idNuevaPrioridad
                //$request->idExtension . $request->nuevaExtension
            ]);*/

            DB::rollBack();
            return response()->json(['mensaje' => 'Error al guardar la solicitud']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud  $solicitud)
    {
        //
    }


    public function listarSolicitudes() //YA ESTA BIEN CON LA NUEVA BD
    {
        Solicitud::actualizarDiasTranscurridos(); // Actualizo días

        $solicitud = new Solicitud();

        $solicitudes = $solicitud->listarSolicitudes();
        $listaTiposSolicitud = TipoSolicitud::all(); // Para los filtros
        $listaAreas = CatalogoAreas::all();
        $listaPrioridades = Prioridad::all();
        $listaEstatus = Estatus::all();

        return view(
            'solicitud.listarSolicitudes.listarSolicitudes',
            [
                'listaAreas' => $listaAreas,
                'listaTiposSolicitud' => $listaTiposSolicitud,
                'listaPrioridades' => $listaPrioridades,
                'listaEstatus' => $listaEstatus,
                'solicitudes' => $solicitudes,
            ]
        );
    }

    public function detalle($folio)
    {
        $solicitud = Solicitud::where('folio', $folio)->first();

        return response()->json($solicitud);
    }



    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //dd($solicitud);
        $soli = new Solicitud();

        $solicitudes = $soli->unaSolicitud($solicitud->folio);
        //dd($solicitudes);

        $listaTiposSolicitud = TipoSolicitud::all();
        $listaAreas = CatalogoAreas::all();
        $listaPrioridades = Prioridad::all();
        $listaEstatus = Estatus::all();
        $listaExtensiones = CatalogoExtensiones::all();

        return view('solicitud.listarSolicitudes.edit', [
            'solicitudes' => $solicitudes,
            'solicitud' => $solicitud,
            'listaTiposSolicitud' => $listaTiposSolicitud,
            'listaAreas' => $listaAreas,
            'listaPrioridades' => $listaPrioridades,
            'listaEstatus' => $listaEstatus,
            'listaExtensiones' => $listaExtensiones,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSolicitudRequest  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request)
    {
        //dd($folio);
        $folioSolicitud = $request->input('folio');

        DB::beginTransaction();

        try {

            //CONTACTO
            $contacto = Contacto::where('folio', $folioSolicitud)->first();

            $contacto->update([
                'correo' => $request->correo,
                'telefonoCelular' => $request->telefonoCelular,
                'telefonoFijo' => $request->telefonoFijo,
            ]);

            //LLAMADA
            /*$llamadaObject = Llamada::where('folio', $folioSolicitud)->first()->get();*/
            $llamada = Llamada::where('folio', $folioSolicitud)->first();

            $horaInicio = \Carbon\Carbon::parse($request->horaInicio);
            $horaTermino = \Carbon\Carbon::parse($request->horaTermino);

            $llamada->update([
                'horaInicio' => $horaInicio,
                'horaTermino' => $horaTermino,
                'duracionMinutos' => $request->duracionMinutos,
            ]);

            //UBICACIÓN
            $ubicacion = Ubicacion::where('folio', $folioSolicitud)->first();

            if ($request->nombreCct == "") {
                $cct = "SIN ASIGNAR";
                $nivelCct = "SIN ASIGNAR";
                $nombrePlantel = "SIN ASIGNAR";
                $nombreDirector = "SIN ASIGNAR";
                $direccionCct = "SIN ASIGNAR";
            } else {
                $cct = $request->cct;
                $nivelCct = $request->nivelCct;
                $nombrePlantel = $request->nombreCct;
                $nombreDirector = $request->nombreDirector;
                $direccionCct = $request->direccionCct;
            }

            if ($request->nombreMunicipio == "") {
                $municipio = "SIN ASIGNAR";
            } else {
                $municipio = $request->nombreMunicipio;
            }

            if ($request->nombreLocalidad == "") {
                $localidad = "SIN ASIGNAR";
            } else {
                $localidad = $request->nombreLocalidad;
            }

            $ubicacion->update([
                'cct' => $cct,
                'nivelCct' => $nivelCct,
                'nombrePlantel' => $nombrePlantel,
                'nombreDirector' => $nombreDirector,
                'direccionCct' => $direccionCct,
                'municipio' => $municipio,
                'localidad' => $localidad,
            ]);

            //EXTENSIÓN

            $extension = Extension::where('folio', $folioSolicitud)->first();

            $extension->update([
                'idExtensionCatalogo' => $request->idExtension,
                'idArea' => $request->idArea,
            ]);

            //SOLICITUD
            $solicitud = Solicitud::where('folio', $folioSolicitud)->first();

            if ($request->idEstatus == 3) {
                $diasTranscurridos = '--';
            } else {
                $diasTranscurridos = '--';
            }

            $solicitud->update([
                'nombre' => $request->nombre,
                'apellidoPaterno' => $request->apellidoPaterno,
                'apellidoMaterno' => $request->apellidoMaterno,
                'idTipoSolicitud' => $request->idTipoSolicitud,
                'idPrioridad' => $request->idPrioridad,
                'idEstatus' => $request->idEstatus,
                'descripcion' => $request->descripcion,
                'diasTranscurridos' => $diasTranscurridos,
                'curp_usuario' => $request->curpUsuario,
                'nombre_usuario' => $request->usuario,
                'idExtensionSolicitud' => $request->idExtensionSolicitud,
                'idUbicacion' => $ubicacion->idUbicacion,
                'idContacto' => $contacto->idContacto,
                'idLlamada' => $llamada->idLlamada,
            ]);

            if ($request->idEstatus != 3) {
                DB::statement("EXEC ActualizarDiasUnRegistro @registro=?", [$solicitud->folio]);
            }

            DB::commit();

            return response()->json(['mensaje' => 'Solicitud actualizada correctamente', 'folio' => $folioSolicitud]);
        } catch (\Exception $e) {

            Log::error('Error al guardar la solicitud: ' . $e->getMessage(), [
                //'exception' => $e,
                //'trace' => $e->getTraceAsString(),
                //$ubicacion->idUbicacion,
            ]);

            DB::rollBack();
            return response()->json(['mensaje' => 'Error al guardar la solicitud']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }

    public function apiPlantel(Request $request)
    {
        $validated = $request->validate([
            'param' => 'required|string'
        ]);

        $url = "https://ct-msvc.sev.gob.mx/api/plantel/{$validated['param']}";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener datos de la API'], 500);
        }
    }

    public function apiMunicipios(Request $request)
    {
        $url = "https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener datos de la API'], 500);
        }
    }
    public function apiLocalidades($idMunicipio)
    {
        $url = "https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/{$idMunicipio}/localidad";

        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener datos de la API de localidades'], 500);
        }
    }


    public function apiBusquedaCct(Request $request)
    {
        $nombreEscuela = $request->query('nombreEscuela');
        $municipioEscuela = $request->query('municipioEscuela');

        if ($nombreEscuela === null) {
            $nombreEscuela = "";
        }

        if ($municipioEscuela === null) {
            $municipioEscuela = "";
        }

        $response = Http::asJson()->post('https://ct-msvc.sev.gob.mx/api/search', [
            'Term' => $nombreEscuela,
            'LocalidadMunicipio' => $municipioEscuela,
            'Modo' => 'NAME',
            'Tipo' => '',
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener datos de la API'], 500);
        }
    }

    public function fetchExtensionAreas(Request $request)
    {
        $idExtension = $request->idExtension;

        //Log::info("idExtensionRecibido: " . $idExtension);

        if ($idExtension == "otro") {
            $data['extensionAreas'] = CatalogoAreas::all();
        } elseif ($idExtension == "") {
            $data['extensionAreas'] = CatalogoAreas::all();
        } else {
            $data['extensionAreas'] = CatalogoAreas::join('tbl_catalogoExtensiones', 'tbl_catalogoExtensiones.idArea', '=', 'tbl_catalogoAreas.idArea')
                ->where('tbl_catalogoExtensiones.idExtensionCatalogo', '=', $idExtension)
                ->get(['tbl_catalogoAreas.idArea', 'tbl_catalogoAreas.area', 'tbl_catalogoExtensiones.nombreTitular', 'tbl_catalogoExtensiones.idPuesto']);
        }

        return response()->json($data);
    }

    public function fetchTipoSolicitudPrioridad(Request $request)
    {
        $data['tipoSolicitudPrioridad'] = TipoSolicitud::join("tbl_prioridad", 'tbl_tipoSolicitud.idPrioridad', '=', 'tbl_prioridad.idPrioridad')
            ->where('tbl_tipoSolicitud.idPrioridad', '=', $request->idPrioridad)
            ->get('tbl_tipoSolicitud.idPrioridad');

        return response()->json($data);
    }


    public function coincidenciasSolicitud(Request $request)
    {
        $parametroBusqueda = $request->query('parametroBusqueda');
        $filtroBusqueda = $request->query('filtroBusqueda');

        if ($parametroBusqueda === null) {
            $parametroBusqueda = "";
        }

        if ($parametroBusqueda === "") {
            $data['coincidenciasSolicitud'] = [];
            return response()->json($data);
        } else {
            if ($filtroBusqueda === "folio") {
                $data['coincidenciasSolicitud'] = DB::table('listarSolicitudes')
                    ->where('folio', '=', $parametroBusqueda)
                    ->where('estatus', '!=', 'FINALIZADO')
                    ->get();
            } else {
                $data['coincidenciasSolicitud'] = DB::table('listarSolicitudes')
                    ->where('telefonoCelular', 'LIKE', '%' . $parametroBusqueda . '%')
                    ->orWhere('telefonoFijo', 'LIKE', '%' . $parametroBusqueda . '%')
                    ->where('estatus', '!=', 'FINALIZADO')
                    ->get();
            }

            return response()->json($data);
        }
    }

    public function coincidenciasSolicitudRegistro(Request $request)
    {
        $busquedaNombre = $request->query('busquedaNombre');
        $busquedaApellidoPaterno = $request->query('busquedaApellidoPaterno');
        $busquedaApellidoMaterno = $request->query('busquedaApellidoMaterno');

        Log::info("nombre: " . $busquedaNombre);
        Log::info("apellidoPaterno: " . $busquedaApellidoPaterno);
        Log::info("apellidoMaterno: " . $busquedaApellidoMaterno);

        if ($busquedaNombre == '' && $busquedaApellidoPaterno == '' && $busquedaApellidoMaterno == '') {

            $data['coincidenciasSolicitudRegistro'] = [];
        } else {
            $data['coincidenciasSolicitudRegistro'] = DB::table('listarSolicitudes')
                ->where('nombre', 'LIKE',  $busquedaNombre . '%')
                ->where('apellidoPaterno', 'LIKE',  $busquedaApellidoPaterno . '%')
                ->where(function ($query) use ($busquedaApellidoMaterno) {
                    $query->where('apellidoMaterno', 'LIKE', $busquedaApellidoMaterno . '%')
                        ->orWhereNull('apellidoMaterno');  // Agrega esta línea para incluir valores nulos
                })
                ->where('created_at', '>=', Carbon::now()->subDays(32))
                ->get();
        }

        return response()->json($data);
    }


    public function pdf_generator(Request $request)
    {
        $fechaGeneracionReporte = now()->format('d-m-Y');
        $solicitudes = DB::table('listarSolicitudes')->get();

        //QUERY'S REPORTE DIARIO
        $fechaGeneracionReporteQuery = now()->format('Y-m-d');

        $llamadasRecibidasPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporteQuery)
            ->count();

        $primeraLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporteQuery)
            ->value('created_at');

        $primeraLlamadaPorDiaFormateada = Carbon::parse($primeraLlamadaRecibidaPorDia)->format('H:i:s');

        $minutosEfectivosPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporteQuery)
            ->selectRaw('SUM(CAST( duracionMinutos AS INT)) as total_duracion')
            ->value('total_duracion');

        $ultimaLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporteQuery)
            ->orderBy('folio', 'desc')
            ->value('created_at');

        $ultimaLlamadaPorDiaFormateada = Carbon::parse($ultimaLlamadaRecibidaPorDia)->format('H:i:s');

        $llamadaMasMinutosPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporteQuery)
            ->selectRaw('MAX(duracionMinutos)')
            ->value('duracionMinutos');

        //SOLICITUDES POR HORA
        $fechaSeleccionada = now()->toDateString();
        // consulta :D
        $solicitudesPorHora = DB::table('listarSolicitudes')
            ->select(DB::raw("DATEPART(HOUR, horaInicio) as hora"), DB::raw("COUNT(*) as total"))
            ->whereDate('created_at', $fechaSeleccionada)
            ->whereRaw('DATEPART(HOUR, horaInicio) BETWEEN 8 AND 19')
            ->groupBy(DB::raw("DATEPART(HOUR, horaInicio)"))
            ->orderBy('hora')
            ->get();
        $labelsHora = [];
        $valuesHora = [];
        for ($i = 8; $i <= 19; $i++) {
            $labelsHora[] = sprintf('%02d:00', $i);
            $valuesHora[] = 0;
        }
        //lo cambio por lo que obtuve de la consulta
        foreach ($solicitudesPorHora as $solicitud) {
            $indice = array_search(sprintf('%02d:00', $solicitud->hora), $labelsHora);
            if ($indice !== false) {
                $valuesHora[$indice] = $solicitud->total;
            }
        }

        //dd($encodedLabels);

        $html = view('pdf_template', compact(
            'fechaGeneracionReporte',
            'solicitudes',
            'llamadasRecibidasPorDia',
            'primeraLlamadaPorDiaFormateada',
            'minutosEfectivosPorDia',
            'ultimaLlamadaPorDiaFormateada',
            'llamadaMasMinutosPorDia',
            'labelsHora',
            'valuesHora'
        ))->render();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $pdfFileName = 'ReporteAcumulado_' . now()->format('Ymd_His') . '.pdf';

        return $mpdf->Output($pdfFileName, 'I');
    }

    public function notificarSeguimiento(Request $request)
    {
        try {
            $folio = $request->input('folio');
            $comentario = $request->input('comentario');
            $nombre_usuario = $request->input('nombre_usuario');
            $curp_usuario = $request->input('curp_usuario');
            $idArea = $request->input('idArea');

            // Validar si los campos necesarios están presentes
            if (!$folio || !$nombre_usuario || !$curp_usuario || !$idArea || !$comentario) {
                return response()->json(['error' => 'Faltan parámetros necesarios.'], 400);
            }

            $notificacion = new Seguimiento();

            $notificacion->folio = $folio;
            $notificacion->comentario = $comentario;
            $notificacion->nombre_usuario = $nombre_usuario;
            $notificacion->curp_usuario = $curp_usuario;
            $notificacion->idArea = $idArea;

            $notificacion->save();

            return response()->json(['message' => 'Notificación enviada exitosamente', 'folio' => $folio]);
        } catch (\Exception $e) {
            // Si ocurre un error, devolver un mensaje de error
            return response()->json(['error' => 'Hubo un error al enviar la notificación ' . $e->getMessage(), 'folio' => $folio], 500);
        }
    }

    public function fetchDirectorioTipoSolicitud(Request $request)
    {
        $idArea = $request->idArea;
        Log::info("directorio: " . $idArea);

        $data['areaTipoSolicitud'] = DB::table('tbl_tipoSolicitud')
            ->where(function ($query) use ($idArea) {
                $query->where('tipoSolicitud', 'Información')
                    ->where('idArea', $idArea)
                    ->orWhere('tipoSolicitud', '!=', 'Información');
            })
            ->orderByRaw("CASE WHEN tipoSolicitud = 'Información' AND idArea = ? THEN 0 ELSE 1 END", [$idArea])
            ->orderBy('idPrioridad')
            ->get();

        return response()->json($data);
    }

    public function fetchAreaTipoSolicitudes(Request $request)
    {
        $idArea = $request->idArea;

        Log::info("area recibida: " . $idArea);

        /*$data['areaTipoSolicitud'] = DB::table('t')
            ->join('tbl_tipoSolicitud', 'directorio.idArea', '=', 'tbl_tipoSolicitud.idArea')
            ->where('tbl_tipoSolicitud.idArea', '=', $idArea)
            ->get(['tbl_tipoSolicitud.idTipoSolicitud', 'tbl_tipoSolicitud.tipoSolicitud']);*/

        $data['areaTipoSolicitud'] = TipoSolicitud::where('idArea', '=', $idArea)->get();

        return response()->json($data);
    }

    public function exportarExcel()
    {
        $nombre = 'Solicitudes_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new SolicitudesExport, $nombre);
    }

    public function exportarExcelSeguimiento()
    {
        $nombre = 'Seguimiento_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new SeguimientoExport, $nombre);
    }
}
