<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Extension;
use App\Models\Llamada;
use App\Models\Solicitud;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function pdfReporteDia(Request $request)
    {
        $fechaR = now()->format('d-m-Y');
        //dd($fechaR);
        $fechaGeneracionReporte = now()->format('Y-m-d');
        $solicitudes = DB::table('listarSolicitudes')->get();

        //QUERY'S REPORTE DIARIO
        $fechaGeneracionReporteQuery = now()->format('Y-m-d');

        $llamadasRecibidasPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporte)
            ->count();

        $primeraLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporte)
            ->value('created_at');

        $primeraLlamadaPorDiaFormateada = Carbon::parse($primeraLlamadaRecibidaPorDia)->format('H:i:s');

        $minutosEfectivosPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporte)
            ->selectRaw('SUM(CAST( duracionMinutos AS INT)) as total_duracion')
            ->value('total_duracion');

        $ultimaLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporte)
            ->orderBy('folio', 'desc')
            ->value('created_at');

        $ultimaLlamadaPorDiaFormateada = Carbon::parse($ultimaLlamadaRecibidaPorDia)->format('H:i:s');

        $llamadaMasMinutosPorDia = DB::table('listarSolicitudes')
            ->whereDate('created_at', '=', $fechaGeneracionReporte)
            ->selectRaw('MAX(duracionMinutos)')
            ->value('duracionMinutos');

        //SOLICITUDES POR HORA
        $fechaSeleccionada = now()->toDateString();
        // consulta :D
        $solicitudesPorHora = DB::table('listarSolicitudes')
            ->select(DB::raw("DATEPART(HOUR, horaInicio) as hora"), DB::raw("COUNT(*) as total"))
            ->whereDate('created_at', '=', $fechaGeneracionReporte)
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
        //lo cambio por lo que obtuve de la consultas
        foreach ($solicitudesPorHora as $solicitud) {
            $indice = array_search(sprintf('%02d:00', $solicitud->hora), $labelsHora);
            if ($indice !== false) {
                $valuesHora[$indice] = $solicitud->total;
            }
        }

        //dd($encodedLabels);
        //PARRAFO DE AREAS Y TIPOS
        $parrafoAreas = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM [LineaEduC].[dbo].[listarSolicitudes]
        WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)), 
        TopAreas AS (
            SELECT TOP 5 area,
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM [LineaEduC].[dbo].[listarSolicitudes]
            WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)
            GROUP BY area
            ORDER BY cantidad DESC
        )
        SELECT 'area' AS categoria, area AS nombre, porcentaje FROM TopAreas");
        //dd($parrafoAreas);
        $parrafoTipos = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM [LineaEduC].[dbo].[listarSolicitudes]
        WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)), 
        TopTipos AS (
            SELECT TOP 5 tipoSolicitud, --top 3 de tipos de solicitud mas requeridos :D
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM [LineaEduC].[dbo].[listarSolicitudes]
            WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)
            GROUP BY tipoSolicitud
            ORDER BY cantidad DESC
        )
        SELECT 'tipoSolicitud' AS categoria, tipoSolicitud AS nombre, porcentaje FROM TopTipos");

        $html = view('pdf_dia', compact(
            'fechaGeneracionReporte',
            'solicitudes',
            'llamadasRecibidasPorDia',
            'primeraLlamadaPorDiaFormateada',
            'minutosEfectivosPorDia',
            'ultimaLlamadaPorDiaFormateada',
            'llamadaMasMinutosPorDia',
            'labelsHora',
            'valuesHora', 
            'parrafoAreas',
            'parrafoTipos',
            'fechaR'
        ))->render();

        $mpdf = New \Mpdf\Mpdf(['tempDir'=>storage_path('app/public/tempdir')]);
        //dd($mpdf);
        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html);
        $mpdf->defaultfooterline = 0;
        $mpdf->setFooter('|Página ' . '{PAGENO}' . '/' . '{nb}| {DATE j/m/Y h:i:s}');
        $pdfFileName = 'ReporteDiario_' . now()->format('Ymd_His') . '.pdf';
        return $mpdf->Output($pdfFileName, 'D');
    }

    public function pdfReporteAcum(Request $request)
    {
        $fechaGeneracionReporte = now()->format('d-m-Y');
        $solicitudes = DB::table('listarSolicitudes')->get();

        //QUERY'S REPORTE DIARIO
        $fechaGeneracionReporteQuery = now()->format('Y-m-d');

        $llamadasRecibidasPorDia = DB::table('listarSolicitudes')
            ->count();

        $primeraLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->value('created_at');

        $primeraLlamadaPorDiaFormateada = Carbon::parse($primeraLlamadaRecibidaPorDia)->format('H:i:s');

        $minutosEfectivosPorDia = DB::table('listarSolicitudes')
            ->selectRaw('SUM(CAST( duracionMinutos AS INT)) as total_duracion')
            ->value('total_duracion');

        $ultimaLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->orderBy('folio', 'desc')
            ->value('created_at');

        $ultimaLlamadaPorDiaFormateada = Carbon::parse($ultimaLlamadaRecibidaPorDia)->format('H:i:s');

        $llamadaMasMinutosPorDia = DB::table('listarSolicitudes')
            ->selectRaw('MAX(duracionMinutos)')
            ->value('duracionMinutos');

        //SOLICITUDES POR HORA
        $fechaSeleccionada = now()->toDateString();
        // consulta :D
        $solicitudesPorHora = DB::table('listarSolicitudes')
            ->select(DB::raw("DATEPART(HOUR, horaInicio) as hora"), DB::raw("COUNT(*) as total"))
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
        //PARRAFO DE AREAS Y TIPOS
        $parrafoAreas = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM [LineaEduC].[dbo].[listarSolicitudes]), 
        TopAreas AS (
            SELECT TOP 5 area,
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM [LineaEduC].[dbo].[listarSolicitudes]
            GROUP BY area
            ORDER BY cantidad DESC
        )
        SELECT 'area' AS categoria, area AS nombre, porcentaje FROM TopAreas");
        //dd($parrafoAreas);
        $parrafoTipos = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM [LineaEduC].[dbo].[listarSolicitudes]), 
        TopTipos AS (
            SELECT TOP 5 tipoSolicitud, --top 3 de tipos de solicitud mas requeridos :D
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM [LineaEduC].[dbo].[listarSolicitudes]
            GROUP BY tipoSolicitud
            ORDER BY cantidad DESC
        )
        SELECT 'tipoSolicitud' AS categoria, tipoSolicitud AS nombre, porcentaje FROM TopTipos");

        $html = view('pdf_template', compact(
            'fechaGeneracionReporte',
            'solicitudes',
            'llamadasRecibidasPorDia',
            'primeraLlamadaPorDiaFormateada',
            'minutosEfectivosPorDia',
            'ultimaLlamadaPorDiaFormateada',
            'llamadaMasMinutosPorDia',
            'labelsHora',
            'valuesHora', 
            'parrafoAreas',
            'parrafoTipos'
        ))->render();

        $mpdf = New \Mpdf\Mpdf(['tempDir'=>storage_path('app/public/tempdir')]);
        //dd($mpdf);
        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html);
        $mpdf->defaultfooterline = 0;
        $mpdf->setFooter('|Página ' . '{PAGENO}' . '/' . '{nb}| {DATE j/m/Y h:i:s}');
        $pdfFileName = 'ReporteAcumulado_' . now()->format('Ymd_His') . '.pdf';
        return $mpdf->Output($pdfFileName, 'D');
    }

    /*public function guardarGrafica(Request $request)
    {
        $imagenBase64 = $request->input('imagen');

        if ($imagenBase64) {
            $imagen = str_replace('data:image/png;base64,', '', $imagenBase64);
            $imagen = str_replace(' ', '+', $imagen);
            $imagenDecodificada = base64_decode($imagen);

            $rutaImagen = storage_path('app/public/tempdir/mpdf/ttfontdata/' . $request->input('nombre') . '.png');
            file_put_contents($rutaImagen, $imagenDecodificada);

            return response()->json(['mensaje' => 'Imagen guardada correctamente']);
        }

        return response()->json(['mensaje' => 'Error al guardar la imagen'], 400);
    }*/
    public function guardarGrafica(Request $request)
    {
        $imagenBase64 = $request->input('imagen');
        if ($imagenBase64) {
            $imagen = str_replace('data:image/png;base64,', '', $imagenBase64);
            $imagen = str_replace(' ', '+', $imagen);
            $imagenDecodificada = base64_decode($imagen);
    
            $directorio = storage_path('app/public/tempdir/mpdf/ttfontdata/');
            if (!file_exists($directorio)) {
                mkdir($directorio, 0775, true);
            }
    
            $rutaImagen = $directorio . $request->input('nombre') . '.png';
            file_put_contents($rutaImagen, $imagenDecodificada);
    
            return response()->json(['mensaje' => 'Imagen guardada correctamente']);
        }
        return response()->json(['mensaje' => 'Error al guardar la imagen'], 400);
    }


    public function reportesDia(Request $request)
    {

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



        $fechaSeleccionada = $request->input('fecha', now()->toDateString());
        //Solicitudes x prioridad
        $prioridades = Solicitud::select('tbl_prioridad.prioridad', DB::raw('count(tbl_solicitudesGeneral.idPrioridad) as total'))
            ->join('tbl_prioridad', 'tbl_solicitudesGeneral.idPrioridad', '=', 'tbl_prioridad.idPrioridad')
            ->whereDate('tbl_solicitudesGeneral.created_at', $fechaSeleccionada)
            ->groupBy('tbl_prioridad.prioridad')
            ->get();

        $labelsPrioridad = [];
        $valuesPrioridad = [];

        foreach ($prioridades as $prioridad) {
            $labelsPrioridad[] = $prioridad->prioridad;
            $valuesPrioridad[] = $prioridad->total;
        }
        //soluciones x Estatus
        $estatus = Solicitud::select('tbl_estatus.estatus', DB::raw('count(tbl_solicitudesGeneral.idEstatus) as total'))
            ->join('tbl_estatus', 'tbl_solicitudesGeneral.idEstatus', '=', 'tbl_estatus.idEstatus')
            ->whereDate('tbl_solicitudesGeneral.created_at', $fechaSeleccionada)
            ->groupBy('tbl_estatus.estatus')
            ->get();

        $labelsEstatus = [];
        $valuesEstatus = [];

        foreach ($estatus as $estado) {
            $labelsEstatus[] = $estado->estatus;
            $valuesEstatus[] = $estado->total;
        }
        //soluciones x Area
        $areas = Extension::select('tbl_catalogoAreas.area', DB::raw('count(tbl_extensionSolicitud.idArea) as total'))
            ->join('tbl_catalogoAreas', 'tbl_extensionSolicitud.idArea', '=', 'tbl_catalogoAreas.idArea')
            ->whereDate('tbl_extensionSolicitud.created_at', $fechaSeleccionada)
            ->groupBy('tbl_catalogoAreas.area')
            ->get();

        $labelsArea = [];
        $valuesArea = [];

        foreach ($areas as $area) {
            $labelsArea[] = $area->area;
            $valuesArea[] = $area->total;
        }

        //mapa
        $solicitudesPorMunicipio = Ubicacion::select('municipio', DB::raw('count(*) as total'))
            ->whereDate('created_at', $fechaSeleccionada)
            ->groupBy('municipio')
            ->get();

        //REPORTE DEL CORRE
        $solicitudesPorMinutoACUM = Llamada::select('duracionMinutos', DB::raw('count(*) as total'))
            ->whereDate('tbl_llamadaSolicitud.created_at', $fechaSeleccionada)
            ->groupBy('duracionMinutos')
            ->get();
        $labelsMinutoACUM = [];
        $valuesMinutoACUM = [];

        foreach ($solicitudesPorMinutoACUM as $ACUMm) {
            $labelsMinutoACUM[] = $ACUMm->duracionMinutos;
            $valuesMinutoACUM[] = $ACUMm->total;
        }

        //SOLICITUDES POR HORA

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
        // json pq es ajax para que no recargue la pagin
        if ($request->ajax()) {
            return response()->json([
                'labelsHora' => $labelsHora,
                'valuesHora' => $valuesHora
            ]);
        }
        //dd($labelsHora,$valuesHora);

        return view(
            'solicitud.reportes.reportesDia',
            compact(
                'labelsPrioridad',
                'valuesPrioridad',
                'labelsEstatus',
                'valuesEstatus',
                'labelsArea',
                'valuesArea',
                'solicitudesPorMunicipio',
                'labelsMinutoACUM',
                'valuesMinutoACUM',
                'labelsHora',
                'valuesHora',
                'llamadasRecibidasPorDia',
                'primeraLlamadaPorDiaFormateada',
                'minutosEfectivosPorDia',
                'ultimaLlamadaPorDiaFormateada',
                'llamadaMasMinutosPorDia',
            )
        );
    }

    public function reportesAcumulado(Request $request)
    {
        //LLAMADAS RECIBIDAS
        $llamadasRecibidas = DB::table('listarSolicitudes')
            ->count();
        //PRIMERA LLAMADA
        $primeraLlamada = DB::table('listarSolicitudes')
            ->value('created_at');
        $primeraLlamadaFormateada = Carbon::parse($primeraLlamada)->format('H:i:s');
        //dd($primeraLlamadaFormateada);
        //MINUTOS EFECTIVOS
        $minutosEfectivos = DB::table('listarSolicitudes')
            ->selectRaw('SUM(CAST( duracionMinutos AS INT)) as total_duracion')
            ->value('total_duracion');
        //ULTIMA LLAMADA FORMATEADA
        $ultimaLlamada = DB::table('listarSolicitudes')
            ->orderBy('folio', 'desc')
            ->value('created_at');

        $ultimaLlamadaFormateada = Carbon::parse($ultimaLlamada)->format('H:i:s');
        //Solicitudes x prioridad
        $prioridades = Solicitud::select('tbl_prioridad.prioridad', DB::raw('count(tbl_solicitudesGeneral.idPrioridad) as total'))
            ->join('tbl_prioridad', 'tbl_solicitudesGeneral.idPrioridad', '=', 'tbl_prioridad.idPrioridad')
            ->groupBy('tbl_prioridad.prioridad')
            ->get();

        $labelsPrioridad = [];
        $valuesPrioridad = [];

        foreach ($prioridades as $prioridad) {
            $labelsPrioridad[] = $prioridad->prioridad;
            $valuesPrioridad[] = $prioridad->total;
        }
        //soluciones x Estatus
        $estatus = Solicitud::select('tbl_estatus.estatus', DB::raw('count(tbl_solicitudesGeneral.idEstatus) as total'))
            ->join('tbl_estatus', 'tbl_solicitudesGeneral.idEstatus', '=', 'tbl_estatus.idEstatus')
            ->groupBy('tbl_estatus.estatus')
            ->get();

        $labelsEstatus = [];
        $valuesEstatus = [];

        foreach ($estatus as $estado) {
            $labelsEstatus[] = $estado->estatus;
            $valuesEstatus[] = $estado->total;
        }
        //soluciones x Area
        $areas = Extension::select('tbl_catalogoAreas.area', DB::raw('count(tbl_extensionSolicitud.idArea) as total'))
            ->join('tbl_catalogoAreas', 'tbl_extensionSolicitud.idArea', '=', 'tbl_catalogoAreas.idArea')
            ->groupBy('tbl_catalogoAreas.area')
            ->get();

        $labelsArea = [];
        $valuesArea = [];

        foreach ($areas as $area) {
            $labelsArea[] = $area->area;
            $valuesArea[] = $area->total;
        }

        //mapa
        $solicitudesPorMunicipio = Ubicacion::select('municipio', DB::raw('count(*) as total'))
            ->groupBy('municipio')
            ->get();

        //REPORTE DEL CORREO
        $solicitudesPorMinutoACUM = Llamada::select('duracionMinutos', DB::raw('count(*) as total'))
            ->groupBy('duracionMinutos')
            ->get();
        $labelsMinutoACUM = [];
        $valuesMinutoACUM = [];

        foreach ($solicitudesPorMinutoACUM as $ACUMm) {
            $labelsMinutoACUM[] = $ACUMm->duracionMinutos;
            $valuesMinutoACUM[] = $ACUMm->total;
        }

        //SOLICITUDES POR HORA
        $fechaSeleccionada = $request->input('fecha', now()->toDateString());
        // consulta :D
        $solicitudesPorHora = DB::table('listarSolicitudes')
            ->select(DB::raw("DATEPART(HOUR, horaInicio) as hora"), DB::raw("COUNT(*) as total"))
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
        // json pq es ajax para que no recargue la pagin
        if ($request->ajax()) {
            return response()->json([
                'labelsHora' => $labelsHora,
                'valuesHora' => $valuesHora
            ]);
        }
        //dd($labelsHora,$valuesHora);

        return view(
            'solicitud.reportes.reportesAcum',
            compact(
                'labelsPrioridad',
                'valuesPrioridad',
                'labelsEstatus',
                'valuesEstatus',
                'labelsArea',
                'valuesArea',
                'solicitudesPorMunicipio',
                'labelsMinutoACUM',
                'valuesMinutoACUM',
                'labelsHora',
                'valuesHora',
                'llamadasRecibidas',
                'primeraLlamadaFormateada',
                'minutosEfectivos',
                'ultimaLlamadaFormateada'
            )
        );
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
