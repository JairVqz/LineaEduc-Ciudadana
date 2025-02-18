<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://cdn.plot.ly/plotly-3.0.0.min.js" charset="utf-8"></script>
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <script src="/js/solicitud/general.js"></script>
    <link rel="stylesheet" href="/css/solicitud/reportes.css">
</head>
@include('menuNavigation')

<body>
    <div class="content">
        <div class="card" style="padding: 30px;">
            <h1 class="mt-5" style="text-align: center; font-weight: bold; color: #7A1737;">Reporte del día
            </h1>

            <!--REPORTE DEL DÍA-->
            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-3" style="padding: 5px;">
                    <div class="card justify-content-center align-items-center" style="padding: 10px;">
                        <canvas id="solicitudesPChart"></canvas>
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('SolicitudPrioridad', 'solicitudesPChart')"
                                onmouseover="this.style.transform='scale(1.2)'"
                                onmouseout="this.style.transform='scale(1)'">
                                <i class="bi bi-download" style="font-size: 1.5rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center" style="padding: 10px;">
                        <canvas id="solicitudesEChart"></canvas>
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('SolicitudEstatus', 'solicitudesEChart')"
                                onmouseover="this.style.transform='scale(1.2)'"
                                onmouseout="this.style.transform='scale(1)'">
                                <i class="bi bi-download" style="font-size: 1.5rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px;">
                    <div class="card justify-content-center align-items-center" style="padding: 10px;">
                        <canvas id="solicitudesAChart"></canvas>
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('SolicitudArea', 'solicitudesAChart')"
                                onmouseover="this.style.transform='scale(1.2)'"
                                onmouseout="this.style.transform='scale(1)'">
                                <i class="bi bi-download" style="font-size: 1.5rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center" style="padding: 10px;">
                        <canvas id="solicitudesMinutoACUMChart"></canvas>
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('SolicitudMinutoACUM', 'solicitudesMinutoACUMChart')"
                                onmouseover="this.style.transform='scale(1.2)'"
                                onmouseout="this.style.transform='scale(1)'">
                                <i class="bi bi-download" style="font-size: 1.5rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-8" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px; padding-top: 20px;">

                        <canvas id="solicitudesPorHoraChart"></canvas>
                        <!--<form id="formFiltro" class="flex-row d-flex align-items-center justify-content-center">
                                <label for="fecha" class="me-2">Selecciona una fecha:</label>
                                <input type="date" class="form-control me-2" id="fecha" name="fecha"
                                    value="{{ request('fecha', now()->toDateString()) }}" style="width: 150px;">
                                <button type="submit" id="btnFiltrar" class="btn btn-primary">Filtrar</button>
                            </form>-->
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('SolicitudesPorHora', 'solicitudesPorHoraChart')"
                                onmouseover="this.style.transform='scale(1.2)'"
                                onmouseout="this.style.transform='scale(1)'">
                                <i class="bi bi-download" style="font-size: 1.5rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-8">
                    <div class="card" style="padding: 20px; position: relative;">
                    <div class="card" style="padding: 20px; position: relative;">
                        <div id="mapToggle">
                            <select id="mapSelect">
                                <option value="Delegaciones">Delegaciones</option>
                                <option value="Municipios">Municipios</option>
                            </select>
                        </div>
                        <div id="map" style="height: 550px;"></div>
                    </div>
                    </div>
                </div>
            </div>
            <a href="{{ url('solicitud/pdf_generator') }}" class="btn btn-primary">Descargar</a>
        </div>





    </div>
    </div>
</body>

<!--DEL DIA-->

@include('solicitud.reportes.dia.sHoraDia')
@include('solicitud.reportes.dia.mapasDia')
@include('solicitud.reportes.dia.sPrioridadDia')
@include('solicitud.reportes.dia.sEstatusDia')
@include('solicitud.reportes.dia.sAreaDia')
@include('solicitud.reportes.dia.sDuracionMinutosDia')
</html>