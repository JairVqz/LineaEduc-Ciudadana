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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
            <div class="d-flex justify-content-between align-items-center mt-5">
                <h1 class="flex-grow-1 text-center" style="font-weight: bold; color: #7A1737;">Reporte por periodo</h1>
                <a href="{{ route('reportes.pdfReporteDia') }}">
                    <img src="{{ asset('images/pdf.png') }}" alt="Logo SEV"
                        style="height: 50px; object-fit: contain; margin: 5px; font-size:12px;">
                </a>
            </div>

            <!--REPORTE ACUMULADO-->
            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-4" style="padding: 5px; "></div>
                <div class="col-md-5" style="padding: 5px; ">
                    <div class="input-group">
                        <h5 class="mt-2" style="margin-right: 5px;">Fecha del reporte: </h5>
                        <div style="padding: 5px; ">
                            <div id="reportrange"
                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; border-radius: 5px;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down" style="margin-left: 5px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--REPORTE ACUMULADO-->
            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #7A1737 ; color: white;">
                        <h1 id="llamadasRecibidasPorDia">{{ $llamadasRecibidasPorDia }}</h1>
                        <h5>Llamadas recibidas </h5>
                    </div>
                </div>
                <div class="col-md-3 " style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #B28854 ; color: white;">
                        <h1 id="primeraLlamadaPorDiaFormateada">{{ $primeraLlamadaPorDiaFormateada }}</h1>
                        <h5>Primera llamada recibida</h5>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #DAC195; ">
                        <h1 id="minutosEfectivosPorDia">{{ $minutosEfectivosPorDia }}</h1>
                        <h5>Minutos efectivos</h5>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: rgb(192,192,192) ;">
                        <h1 id="ultimaLlamadaPorDiaFormateada">{{ $ultimaLlamadaPorDiaFormateada }}</h1>
                        <h5>Úlitma llamada recibida</h5>
                    </div>
                </div>
            </div>


            <div class="row g-3 flex-row d-flex mt-2 ">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="padding: 5px; justify-content-center align-items-center">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px; padding-top: 20px; border: none;">
                        <canvas id="solicitudesPorHoraChart"></canvas>
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('solicitudesPorHoraChart', 'solicitudesPorHoraChart')"
                                onmouseover="this.style.transform='scale(1.2)'"
                                onmouseout="this.style.transform='scale(1)'">
                                <i class="bi bi-download" style="font-size: 1.5rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>


            <div class="row g-3 flex-row d-flex mt-2">
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
                <div class="col-md-8">
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



                <div class="col-md-4">
                    <div class="card" style="padding: 20px; max-height: 592px; min-height: 592px; overflow: hidden;">
                        <h4 style="text-align: center;" id="tituloTabla">Solicitudes por Municipio</h4><br>
                        <div class="input-group">
                            <input type="text" class="form-control" id="filtroTabla" placeholder="Buscar...">
                            <button type="button" id='botonFiltro' class="btn btn-color">Limpiar</button>
                        </div><br>
                        <div style="height: 100%; width: 100%;">
                            <table id="tablaDelegaciones" class="table table-striped table-bordered "
                                style="display: none;">
                                <thead>
                                    <tr>
                                        <th>Delegación</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="tablaMunicipios" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Municipio</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudesPorMunicipio as $solicitud)
                                        <tr>
                                            <td>{{ $solicitud->municipio }}</td>
                                            <td>{{ $solicitud->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('solicitud.reportes.periodo.sHoraPeriodo')
@include('solicitud.reportes.periodo.sPrioridadPeriodo')
@include('solicitud.reportes.periodo.sEstatusPeriodo')
@include('solicitud.reportes.periodo.sAreaPeriodo')
@include('solicitud.reportes.periodo.sDuracionMinutosPeriodo')
@include('solicitud.reportes.periodo.mapasPeriodo')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    $(function () {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html('Desde ' + start.format('DD-MM-YYYY') + ' hasta ' + end.format('DD-MM-YYYY'));

            $.ajax({
                url: '/solicitud/reportesPeriodo',
                type: 'GET',
                data: {
                    start_date: start.format('YYYY-MM-DD'),
                    end_date: end.format('YYYY-MM-DD')
                },
                success: function (response) {

                    actualizarGraficas(response);
                },
                error: function () {
                    console.error('Error al obtener los datos.');
                }
            });
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            opens: "rigth",
            showDropdowns: true,
            showWeekNumbers: true,
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                format: "DD-MM-YYYY",
                separator: " hasta ",
                applyLabel: "Aplicar",
                cancelLabel: "Cancelar",
                fromLabel: "Desde",
                toLabel: "Hasta",
                customRangeLabel: "Personalizar",
                weekLabel: "S",
                daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                firstDay: 1
            }
        }, cb);
        cb(start, end);
    });

    function actualizarGraficas(data) {
        $('#llamadasRecibidasPorDia').text(data.llamadasRecibidasPorDia);
        $('#primeraLlamadaPorDiaFormateada').text(data.primeraLlamadaPorDiaFormateada);
        $('#minutosEfectivosPorDia').text(data.minutosEfectivosPorDia);
        $('#ultimaLlamadaPorDiaFormateada').text(data.ultimaLlamadaPorDiaFormateada);

        if (solicitudesPorHoraChart) {
            solicitudesPorHoraChart.data.labels = data.labelsHora;
            solicitudesPorHoraChart.data.datasets[0].data = data.valuesHora;
            solicitudesPorHoraChart.update();
        }

        if (solicitudesAChart) {
            solicitudesAChart.data.labels = data.labelsArea;
            solicitudesAChart.data.datasets[0].data = data.valuesArea;
            solicitudesAChart.update();
        }
        
        if (solicitudesPChart) {
            solicitudesPChart.data.labels = data.labelsPrioridad;
            solicitudesPChart.data.datasets[0].data = data.valuesPrioridad;
            solicitudesPChart.update();
        }

        if (solicitudesEChart) {
            solicitudesEChart.data.labels = data.labelsEstatus;
            solicitudesEChart.data.datasets[0].data = data.valuesEstatus;
            solicitudesEChart.update();
        }

        if (solicitudesMinutoACUMChart) {
            solicitudesMinutoACUMChart.data.labels = data.labelsMinutoACUM;
            solicitudesMinutoACUMChart.data.datasets[0].data = data.valuesMinutoACUM;
            solicitudesMinutoACUMChart.update();
        }
        
        
    }

</script>

<script>
    function enviarGraficaAlServidorP() {//mando las 2
        html2canvas(document.getElementById('solicitudesPorHoraChart'), { willReadFrequently: true })
        .then(canvas => {
            let imagenBase64 = canvas.toDataURL('image/png');
            let nombre = 'solicitudesPorHoraDia';

            //fetch("https://callcenter.sev.gob.mx/index.php/solicitud/guardarGrafica", {
            fetch("http://127.0.0.1:8000/solicitud/guardarGrafica",{
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ imagen: imagenBase64, nombre: nombre })
            }).then(response => {
                if (response.ok) {
                    console.log("Imagen enviada correctamente");
                } else {
                    console.error("Error al enviar la imagen");
                }
            }).catch(error => console.error("Error en la petición:", error));
        });
        html2canvas(document.getElementById('solicitudesAChart'), { willReadFrequently: true })
        .then(canvas => {
            let imagenBase64 = canvas.toDataURL('image/png');
            let nombre = 'solicitudesPorAreaDia';

            //fetch("https://callcenter.sev.gob.mx/index.php/solicitud/guardarGrafica", {
            fetch("http://127.0.0.1:8000/solicitud/guardarGrafica",{
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ imagen: imagenBase64, nombre: nombre })
            }).then(response => {
                if (response.ok) {
                    console.log("Imagen enviada correctamente");
                } else {
                    console.error("Error al enviar la imagen");
                }
            }).catch(error => console.error("Error en la petición:", error));
        });
    }
    document.addEventListener("DOMContentLoaded", () => {
    setTimeout(enviarGraficaAlServidorP, 2000);
    });
</script>


<script>
    function actualizarTablaMunicipios() {
        let tablaDelegaciones = $("#tablaDelegaciones");
        tablaDelegaciones.DataTable().destroy();
        let tablaMunicipios = $("#tablaMunicipios");
        if ($.fn.DataTable.isDataTable(tablaMunicipios)) {
            tablaMunicipios.DataTable().destroy();
        }

        tablaMunicipios.DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "pageLength": -1,
            "scrollY": 380,
            "deferRender": true,
            "scroller": true,

        });
        tablaMunicipios.show();
    }

    //filtro
    document.getElementById('filtroTabla').addEventListener('input', function () {
        const filtro = this.value.toLowerCase().trim();
        if (document.getElementById('tablaMunicipios').style.display === "table") {
            $('#tablaMunicipios').DataTable().columns(0).search(filtro).draw();
        } else {
            $('#tablaDelegaciones').DataTable().columns(0).search(filtro).draw();
        }
    });
    //limpiar filtro
    document.getElementById('botonFiltro').addEventListener('click', function () {
        document.getElementById('filtroTabla').value = '';
        $('#tablaMunicipios, #tablaDelegaciones').DataTable().search('').columns().search('').draw();
    });
</script>

</html>