<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SolicitudesExport;
use App\Exports\SolicitudDiaExport;
use App\Exports\SolicitudPeriodoExport;

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
        $parrafoAreas = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes
        WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)), 
            TopAreas AS (
                SELECT TOP 5 
                    area ,
                    COUNT(*) AS cantidad, 
                    CAST(COALESCE(NULLIF((COUNT(*) * 100.0),0) / NULLIF((SELECT total FROM Totales),0),0) AS DECIMAL(5,2)) AS porcentaje,
                    SUM(CASE WHEN idEstatus = 1 THEN 1 ELSE 0 END) AS soliPendientes,
                    SUM(CASE WHEN idEstatus = 2 THEN 1 ELSE 0 END) AS soliProceso,
                    SUM(CASE WHEN idEstatus = 3 THEN 1 ELSE 0 END) AS soliTerminado
                FROM listarSolicitudes
				WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)
                GROUP BY area
                ORDER BY cantidad DESC
            )
            SELECT 
                area AS nombre, 
                porcentaje, 
                cantidad, 
                soliPendientes, 
                soliProceso, 
                soliTerminado
            FROM TopAreas;");
        //dd($parrafoAreas);
        $parrafoTipos = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes
        WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)), 
        TopTipos AS (
            SELECT TOP 5 tipoSolicitud, --top 3 de tipos de solicitud mas requeridos :D
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM listarSolicitudes
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

        if (env('APP_ENV') !== 'local') {
            $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('app/public/tempdir')]);
        } else {
            $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('app/public/tempdir')]);
        }
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
        $parrafoAreas = DB::select("WITH Totales AS (
            SELECT COUNT(*) AS total FROM listarSolicitudes
            ), 
            TopAreas AS (
                SELECT TOP 5 
                    area,
                    COUNT(*) AS cantidad, 
                    CAST(COALESCE(NULLIF((COUNT(*) * 100.0),0) / NULLIF((SELECT total FROM Totales),0),0) AS DECIMAL(5,2)) AS porcentaje,
                    SUM(CASE WHEN idEstatus = 1 THEN 1 ELSE 0 END) AS soliPendientes,
                    SUM(CASE WHEN idEstatus = 2 THEN 1 ELSE 0 END) AS soliProceso,
                    SUM(CASE WHEN idEstatus = 3 THEN 1 ELSE 0 END) AS soliTerminado
                FROM listarSolicitudes
                GROUP BY area
                ORDER BY cantidad DESC
            )
            SELECT 
                area AS nombre, 
                porcentaje, 
                cantidad, 
                soliPendientes, 
                soliProceso, 
                soliTerminado
            FROM TopAreas;");
        //dd($parrafoAreas);
        $parrafoTipos = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes), 
        TopTipos AS (
            SELECT TOP 5 tipoSolicitud, --top 5 de tipos de solicitud mas requeridos :D
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM listarSolicitudes
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

        if (env('APP_ENV') !== 'local') {
            $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('app/public/tempdir')]);
        } else {
            $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('app/public/tempdir')]);
        }

        //dd($mpdf);
        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html);
        $mpdf->defaultfooterline = 0;
        $mpdf->setFooter('|Página ' . '{PAGENO}' . '/' . '{nb}| {DATE j/m/Y h:i:s}');
        $pdfFileName = 'ReporteAcumulado_' . now()->format('Ymd_His') . '.pdf';
        return $mpdf->Output($pdfFileName, 'D');
    }

    public function pdfReportePeriodo(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        //dd($start_date,$end_date);
        $solicitudes = DB::table('listarSolicitudes')->get();

        //SELECT * FROM tbl_solicitudesGeneral WHERE CAST(created_at AS DATE) BETWEEN '2025-02-28' AND '2025-03-03'
        //->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
        // Si no hay fechas en la petición, usamos el rango predeterminado (últimos 30 días)
        if (!$start_date || !$end_date) {
            $start_date = now()->startOfMonth()->format('Y-m-d');
            $end_date = now()->endOfMonth()->format('Y-m-d');
        }
        //dd($start_date, $end_date);

        //RECUADROS
        $llamadasRecibidasPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->count();

        $primeraLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->value('created_at');

        $primeraLlamadaPorDiaFormateada = Carbon::parse($primeraLlamadaRecibidaPorDia)->format('H:i:s');

        $minutosEfectivosPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->selectRaw('SUM(CAST( duracionMinutos AS INT)) as total_duracion')
            ->value('total_duracion');

        $ultimaLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->orderBy('folio', 'desc')
            ->value('created_at');

        $ultimaLlamadaPorDiaFormateada = Carbon::parse($ultimaLlamadaRecibidaPorDia)->format('H:i:s');

        $llamadaMasMinutosPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->selectRaw('MAX(duracionMinutos)')
            ->value('duracionMinutos');

        //BARRAS SOLICITUDES POR HORA
        $solicitudesPorHora = DB::table('listarSolicitudes')
            ->select(DB::raw("DATEPART(HOUR, horaInicio) as hora"), DB::raw("COUNT(*) as total"))
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
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

        foreach ($solicitudesPorHora as $solicitud) {
            $indice = array_search(sprintf('%02d:00', $solicitud->hora), $labelsHora);
            if ($indice !== false) {
                $valuesHora[$indice] = $solicitud->total;
            }
        }


        //soluciones x Area
        $areas = Extension::select('tbl_catalogoAreas.area', DB::raw('count(tbl_extensionSolicitud.idArea) as total'))
            ->join('tbl_catalogoAreas', 'tbl_extensionSolicitud.idArea', '=', 'tbl_catalogoAreas.idArea')
            ->whereRaw("CAST(tbl_extensionSolicitud.created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->groupBy('tbl_catalogoAreas.area')
            ->get();

        $labelsArea = [];
        $valuesArea = [];

        foreach ($areas as $area) {
            $labelsArea[] = $area->area;
            $valuesArea[] = $area->total;
        }

        //PARRAFO DE AREAS Y TIPOS
        $parrafoAreas = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes
        WHERE CAST(created_at AS DATE) BETWEEN '$start_date' AND '$end_date'), 
            TopAreas AS (
                SELECT TOP 5 
                    area ,
                    COUNT(*) AS cantidad, 
                    CAST(COALESCE(NULLIF((COUNT(*) * 100.0),0) / NULLIF((SELECT total FROM Totales),0),0) AS DECIMAL(5,2)) AS porcentaje,
                    SUM(CASE WHEN idEstatus = 1 THEN 1 ELSE 0 END) AS soliPendientes,
                    SUM(CASE WHEN idEstatus = 2 THEN 1 ELSE 0 END) AS soliProceso,
                    SUM(CASE WHEN idEstatus = 3 THEN 1 ELSE 0 END) AS soliTerminado
                FROM listarSolicitudes
				WHERE CAST(created_at AS DATE) BETWEEN '$start_date' AND '$end_date'
                GROUP BY area
                ORDER BY cantidad DESC
            )
            SELECT 
                area AS nombre, 
                porcentaje, 
                cantidad, 
                soliPendientes, 
                soliProceso, 
                soliTerminado
            FROM TopAreas;");
        //dd($parrafoAreas);

        $parrafoTipos = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes
        WHERE CAST(created_at AS DATE) BETWEEN '$start_date' AND '$end_date'),
        TopTipos AS (
            SELECT TOP 5 tipoSolicitud, --top 3 de tipos de solicitud mas requeridos :D
                COUNT(*) AS cantidad, 
                CAST(COUNT(*) * 100.0 / (SELECT total FROM Totales) AS DECIMAL(5,2)) AS porcentaje
            FROM listarSolicitudes
            WHERE CAST(created_at AS DATE) BETWEEN '$start_date' AND '$end_date'
            GROUP BY tipoSolicitud
            ORDER BY cantidad DESC
        )
        SELECT 'tipoSolicitud' AS categoria, tipoSolicitud AS nombre, porcentaje FROM TopTipos");

        $html = view('pdf_periodo', compact(
            'end_date',
            'start_date',
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
        ))->render();

        if (env('APP_ENV') !== 'local') {
            $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('app/public/tempdir')]);
        } else {
            $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('app/public/tempdir')]);
        }
        //dd($mpdf);
        $mpdf->showImageErrors = true;
        $mpdf->WriteHTML($html);
        $mpdf->defaultfooterline = 0;
        $mpdf->setFooter('|Página ' . '{PAGENO}' . '/' . '{nb}| {DATE j/m/Y h:i:s}');
        $pdfFileName = 'ReportePeriodo_' . now()->format('Ymd_His') . '.pdf';
        return $mpdf->Output($pdfFileName, 'D');
    }

    public function reportesPeriodo(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        //SELECT * FROM tbl_solicitudesGeneral WHERE CAST(created_at AS DATE) BETWEEN '2025-02-28' AND '2025-03-03'
        //->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
        // Si no hay fechas en la petición, usamos el rango predeterminado (últimos 30 días)
        if (!$start_date || !$end_date) {
            $start_date = now()->startOfMonth()->format('Y-m-d');
            $end_date = now()->endOfMonth()->format('Y-m-d');
        }
        //dd($start_date, $end_date);

        //RECUADROS
        $llamadasRecibidasPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->count();

        $primeraLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->value('created_at');

        $primeraLlamadaPorDiaFormateada = Carbon::parse($primeraLlamadaRecibidaPorDia)->format('H:i:s');

        $minutosEfectivosPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->selectRaw('SUM(CAST( duracionMinutos AS INT)) as total_duracion')
            ->value('total_duracion');

        $ultimaLlamadaRecibidaPorDia = DB::table('listarSolicitudes')
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->orderBy('folio', 'desc')
            ->value('created_at');

        $ultimaLlamadaPorDiaFormateada = Carbon::parse($ultimaLlamadaRecibidaPorDia)->format('H:i:s');

        //BARRAS SOLICITUDES POR HORA
        $solicitudesPorHora = DB::table('listarSolicitudes')
            ->select(DB::raw("DATEPART(HOUR, horaInicio) as hora"), DB::raw("COUNT(*) as total"))
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
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

        foreach ($solicitudesPorHora as $solicitud) {
            $indice = array_search(sprintf('%02d:00', $solicitud->hora), $labelsHora);
            if ($indice !== false) {
                $valuesHora[$indice] = $solicitud->total;
            }
        }


        //PASTEL
        //Solicitudes x prioridad
        $prioridades = Solicitud::select('tbl_prioridad.prioridad', DB::raw('count(tbl_solicitudesGeneral.idPrioridad) as total'))
            ->join('tbl_prioridad', 'tbl_solicitudesGeneral.idPrioridad', '=', 'tbl_prioridad.idPrioridad')
            ->whereRaw("CAST(tbl_solicitudesGeneral.created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
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
            ->whereRaw("CAST(tbl_solicitudesGeneral.created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
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
            ->whereRaw("CAST(tbl_extensionSolicitud.created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->groupBy('tbl_catalogoAreas.area')
            ->get();

        $labelsArea = [];
        $valuesArea = [];

        foreach ($areas as $area) {
            $labelsArea[] = $area->area;
            $valuesArea[] = $area->total;
        }

        //solicitudes por minuto
        $solicitudesPorMinutoACUM = Llamada::select('duracionMinutos', DB::raw('count(*) as total'))
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->groupBy('duracionMinutos')
            ->get();
        $labelsMinutoACUM = [];
        $valuesMinutoACUM = [];

        foreach ($solicitudesPorMinutoACUM as $ACUMm) {
            $labelsMinutoACUM[] = $ACUMm->duracionMinutos;
            $valuesMinutoACUM[] = $ACUMm->total;
        }

        $parrafoAreas = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes
        WHERE CAST(created_at AS DATE) BETWEEN '$start_date' AND '$end_date'), 
            TopAreas AS (
                SELECT TOP 5 
                    area ,
                    COUNT(*) AS cantidad, 
                    CAST(COALESCE(NULLIF((COUNT(*) * 100.0),0) / NULLIF((SELECT total FROM Totales),0),0) AS DECIMAL(5,2)) AS porcentaje,
                    SUM(CASE WHEN idEstatus = 1 THEN 1 ELSE 0 END) AS soliPendientes,
                    SUM(CASE WHEN idEstatus = 2 THEN 1 ELSE 0 END) AS soliProceso,
                    SUM(CASE WHEN idEstatus = 3 THEN 1 ELSE 0 END) AS soliTerminado
                FROM listarSolicitudes
				WHERE CAST(created_at AS DATE) BETWEEN '$start_date' AND '$end_date'
                GROUP BY area
                ORDER BY cantidad DESC
            )
            SELECT 
                area AS nombre, 
                porcentaje, 
                cantidad, 
                soliPendientes, 
                soliProceso, 
                soliTerminado
            FROM TopAreas;");

        //mapa
        $solicitudesPorMunicipio = Ubicacion::select('municipio', DB::raw('count(*) as total'))
            ->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
            ->groupBy('municipio')
            ->get();

        //AJAX
        if ($request->ajax()) {
            return response()->json([
                'llamadasRecibidasPorDia' => $llamadasRecibidasPorDia,
                'primeraLlamadaPorDiaFormateada' => $primeraLlamadaPorDiaFormateada,
                'minutosEfectivosPorDia' => $minutosEfectivosPorDia,
                'ultimaLlamadaPorDiaFormateada' => $ultimaLlamadaPorDiaFormateada,
                'labelsHora' => $labelsHora,
                'valuesHora' => $valuesHora,
                'labelsPrioridad' => $labelsPrioridad,
                'valuesPrioridad' => $valuesPrioridad,
                'labelsEstatus' => $labelsEstatus,
                'valuesEstatus' => $valuesEstatus,
                'labelsArea' => $labelsArea,
                'valuesArea' => $valuesArea,
                'labelsMinutoACUM' => $labelsMinutoACUM,
                'valuesMinutoACUM' => $valuesMinutoACUM,
                'solicitudesPorMunicipio' => $solicitudesPorMunicipio,
                'parrafoAreas'=>$parrafoAreas,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
            ]);
        }
        return view(
            'solicitud.reportes.reportesPeriodo',
            compact(
                'llamadasRecibidasPorDia',
                'primeraLlamadaPorDiaFormateada',
                'minutosEfectivosPorDia',
                'ultimaLlamadaPorDiaFormateada',
                'labelsHora',
                'valuesHora',
                'labelsPrioridad',
                'valuesPrioridad',
                'labelsEstatus',
                'valuesEstatus',
                'labelsArea',
                'valuesArea',
                'labelsMinutoACUM',
                'valuesMinutoACUM',
                'solicitudesPorMunicipio',
                'parrafoAreas',

            )
        );

    }

    public function guardarGrafica(Request $request)
    {
        $imagenBase64 = $request->input('imagen');
        if ($imagenBase64) {
            $imagen = str_replace('data:image/png;base64,', '', $imagenBase64);
            $imagen = str_replace(' ', '+', $imagen);
            $imagenDecodificada = base64_decode($imagen);

            if (env('APP_ENV') !== 'local') {
                $directorio = storage_path('app/public/tempdir/mpdf/ttfontdata/');
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0775, true);
                }
            } else {
                $directorio = storage_path('app/public/tempdir/mpdf/ttfontdata/');
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0775, true);
                }
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


        $parrafoAreas = DB::select("WITH Totales AS (SELECT COUNT(*) AS total FROM listarSolicitudes
        WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)), 
            TopAreas AS (
                SELECT TOP 5 
                    area ,
                    COUNT(*) AS cantidad, 
                    CAST(COALESCE(NULLIF((COUNT(*) * 100.0),0) / NULLIF((SELECT total FROM Totales),0),0) AS DECIMAL(5,2)) AS porcentaje,
                    SUM(CASE WHEN idEstatus = 1 THEN 1 ELSE 0 END) AS soliPendientes,
                    SUM(CASE WHEN idEstatus = 2 THEN 1 ELSE 0 END) AS soliProceso,
                    SUM(CASE WHEN idEstatus = 3 THEN 1 ELSE 0 END) AS soliTerminado
                FROM listarSolicitudes
				WHERE CAST(created_at AS DATE) = CAST(GETDATE() AS DATE)
                GROUP BY area
                ORDER BY cantidad DESC
            )
            SELECT 
                area AS nombre, 
                porcentaje, 
                cantidad, 
                soliPendientes, 
                soliProceso, 
                soliTerminado
            FROM TopAreas;");

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
                'parrafoAreas',
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

        //PARRAFO DE AREAS Y TIPOS
        $parrafoAreas = DB::select("WITH Totales AS (
            SELECT COUNT(*) AS total FROM listarSolicitudes
            ), 
            TopAreas AS (
                SELECT TOP 5 
                    area,
                    COUNT(*) AS cantidad, 
                    CAST(COALESCE(NULLIF((COUNT(*) * 100.0),0) / NULLIF((SELECT total FROM Totales),0),0) AS DECIMAL(5,2)) AS porcentaje,
                    SUM(CASE WHEN idEstatus = 1 THEN 1 ELSE 0 END) AS soliPendientes,
                    SUM(CASE WHEN idEstatus = 2 THEN 1 ELSE 0 END) AS soliProceso,
                    SUM(CASE WHEN idEstatus = 3 THEN 1 ELSE 0 END) AS soliTerminado
                FROM listarSolicitudes
                GROUP BY area
                ORDER BY cantidad DESC
            )
            SELECT 
                area AS nombre, 
                porcentaje, 
                cantidad, 
                soliPendientes, 
                soliProceso, 
                soliTerminado
            FROM TopAreas;");
        //dd($parrafoAreas);



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
                'ultimaLlamadaFormateada',
                'parrafoAreas',
            )
        );
    }

    public function exportarExcelAcumulado()
    {
        $nombre = 'SolicitudesAcum_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new SolicitudesExport, $nombre);
    }

    public function exportarExcelDia()
    {
        $nombre = 'SolicitudesDia_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new SolicitudDiaExport, $nombre);
    }

    public function exportarExcelPeriodo(Request $request)
{
    // Recibir las fechas desde la petición
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    //SELECT * FROM tbl_solicitudesGeneral WHERE CAST(created_at AS DATE) BETWEEN '2025-02-28' AND '2025-03-03'
    //->whereRaw("CAST(created_at AS DATE) BETWEEN ? AND ?", [$start_date, $end_date])
    // Si no hay fechas en la petición, usamos el rango predeterminado (últimos 30 días)
    if (!$start_date || !$end_date) {
        $start_date = now()->startOfMonth()->format('Y-m-d');
        $end_date = now()->endOfMonth()->format('Y-m-d');
    }
    //dd($start_date, $end_date); 

    // Generar el nombre del archivo con fecha y hora
    $nombre = 'SolicitudesPeriodo_' . now()->format('Ymd_His') . '.xlsx';

    // **PASAR LAS FECHAS AL EXPORT**
    return Excel::download(new SolicitudPeriodoExport($start_date, $end_date), $nombre);
}




}
