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
                <a id="btnExportarExcel" href="{{ route('reportes.exportarExcelPeriodo') }}" class="ms-2 tooltip-trigger" 
                data-bs-toggle="tooltip" data-bs-placement="left" title="Descargar registro de solicitudes">
                    <img src="{{ asset('images/excel.png') }}" alt="Logo SEV"
                        style="height: 47px; object-fit: contain; margin: 5px; font-size:12px; margin-right: 10px;">
                </a>
                <a id="descargarPDF" href="#" class="ms-2 tooltip-trigger"
                data-bs-toggle="tooltip" data-bs-placement="left" title="Descargar reporte de solicitudes ">
                    <img src="{{ asset('images/pdf.png') }}" alt="Descargar PDF"
                        style="height: 53px; object-fit: contain; margin: 5px; font-size:12px;">
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
                <div class="col-md-12" style="padding: 5px;">
                    <div class="card" style="padding: 10px;">
                        <h4 style="text-align: center; margin-top: 10px;">Áreas con mayor número de solicitudes</h4><br>
                        <div style="height: 100%; width: 100%;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Área</th>
                                        <th style="text-align: center;">Estatus</th>

                                    </tr>
                                </thead>
                                <tbody id="tablaSAreas">
                                    @foreach ($parrafoAreas as $index => $data)
                                        <tr>
                                            <td>
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <span id="nombreNuevo" style="font-size: 13px; font-weight: bold; color:rgb(107, 107, 107);">{{ $data->nombre }}</span>
                                                <p style="font-size: 12px; font-weight: bold; color:rgb(155, 155, 155);" class="mb-0 ms-2">100% ({{ $llamadasRecibidasPorDia }})</p>
                                            </div>

                                            <div class="progress position-relative" id="progreso1" style="height: 20px; position: relative;">
                                                <div class="progress-bar progress-bar-striped " 
                                                    role="progressbar" aria-valuenow="{{ $data->porcentaje }}" 
                                                    aria-valuemin="0" aria-valuemax="100" 
                                                    style="width: {{ $data->porcentaje }}%;">
                                                </div>
                                                <span class="position-absolute fw-bold text-dark" 
                                                    style="right: 5px; top: 50%; transform: translateY(-50%);">
                                                    {{ $data->porcentaje }}% ({{ $data->cantidad }})
                                                </span>
                                            </div>

                                            </td>
                                            <td>
                                                <div class="d-flex ">
                                                    <i class="bi bi-circle-fill" style="color:red; font-size: 14px; margin-right:4px" ></i>
                                                    <span style="font-size: 14px;">Pendientes: {{ $data->soliPendientes }} </span>
                                                </div>
                                                <div class="d-flex ">
                                                    <i class="bi bi-circle-fill" style="color:rgb(230, 188, 53); font-size: 14px; margin-right:4px" ></i>
                                                    <span style="font-size: 14px;">En proceso: {{ $data->soliProceso }} </span>
                                                </div>
                                                <div class="d-flex ">
                                                    <i class="bi bi-circle-fill" style="color:green; font-size: 14px; margin-right:4px" ></i>
                                                    <span style="font-size: 14px;">Terminadas: {{ $data->soliTerminado }}</span>
                                                </div>
                                                
                                            </td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode(value: [
        'guardarGrafica' => route('reportes.guardarGrafica'),
        'reportesPeriodo' => route('reportes.reportesPeriodo'),
    ]); ?>

    $(function () {
        var start = moment().startOf('month');
        var end = moment().endOf('month');

        function cb(start, end) {
            $('#reportrange span').html('Desde ' + start.format('DD-MM-YYYY') + ' hasta ' + end.format('DD-MM-YYYY'));

            const reportesPeriodo = window.Laravel.reportesPeriodo;
            $.ajax({
                url: reportesPeriodo,
                type: 'GET',
                data: {
                    start_date: start.format('YYYY-MM-DD'),
                    end_date: end.format('YYYY-MM-DD')
                },
                success: function (response) {
                    actualizarVista(response);
                    setTimeout(enviarGraficaAlServidorP, 2000);
                },
                error: function () {
                    console.error('Error al obtener los datos.');
                }
            });
            // actualizar pdf
            let pdfUrl = "{{ route('reportes.pdfReportePeriodo') }}?start_date=" + start.format('YYYY-MM-DD') + "&end_date=" + end.format('YYYY-MM-DD');
            $('#descargarPDF').attr('href', pdfUrl);
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

    function actualizarVista(data) {
        $('#llamadasRecibidasPorDia').text(data.llamadasRecibidasPorDia);
        $('#primeraLlamadaPorDiaFormateada').text(data.primeraLlamadaPorDiaFormateada);
        $('#minutosEfectivosPorDia').text(data.minutosEfectivosPorDia);
        $('#ultimaLlamadaPorDiaFormateada').text(data.ultimaLlamadaPorDiaFormateada);

        if (solicitudesPorHoraChart) {
            solicitudesPorHoraChart.data.labels = data.labelsHora;
            solicitudesPorHoraChart.data.datasets[0].data = data.valuesHora;
            solicitudesPorHoraChart.update();
        }

        // Limpiar el contenido de la tabla
    $('#tablaSAreas').empty();

   


// Recorrer los datos recibidos y agregarlos a la tabla
data.parrafoAreas.forEach(area => {
    let fila = `
        <tr>
            <td>
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <span style="font-size: 13px; font-weight: bold; color:rgb(107, 107, 107);">${area.nombre}</span>
                    <p style="font-size: 12px; font-weight: bold; color:rgb(155, 155, 155);" class="mb-0 ms-2">
                        100% (${data.llamadasRecibidasPorDia})
                    </p>
                </div>
                <div class="progress position-relative" style="height: 20px; position: relative;">
                    <div class="progress-bar progress-bar-striped" 
                        role="progressbar" 
                        aria-valuenow="${area.porcentaje}" 
                        aria-valuemin="0" 
                        aria-valuemax="100" 
                        style="width: ${area.porcentaje}%;"></div>
                    <span class="position-absolute fw-bold text-dark" 
                        style="right: 5px; top: 50%; transform: translateY(-50%);">
                        ${area.porcentaje}% (${area.cantidad})
                    </span>
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <i class="bi bi-circle-fill" style="color:red; font-size: 14px; margin-right:4px"></i>
                    <span style="font-size: 14px;">Pendientes: ${area.soliPendientes} </span>
                </div>
                <div class="d-flex">
                    <i class="bi bi-circle-fill" style="color:rgb(230, 188, 53); font-size: 14px; margin-right:4px"></i>
                    <span style="font-size: 14px;">En proceso: ${area.soliProceso} </span>
                </div>
                <div class="d-flex">
                    <i class="bi bi-circle-fill" style="color:green; font-size: 14px; margin-right:4px"></i>
                    <span style="font-size: 14px;">Terminadas: ${area.soliTerminado}</span>
                </div>
            </td>
        </tr>
    `;

    $('#tablaSAreas').append(fila);
});


    }

</script>

<script>
    function enviarGraficaAlServidorP() {//mando las 2
        html2canvas(document.getElementById('solicitudesPorHoraChart'), { willReadFrequently: true })
        .then(canvas => {
            let imagenBase64 = canvas.toDataURL('image/png');
            let nombre = 'solicitudesPorHoraPeriodo';

            const guardarGrafica = window.Laravel.guardarGrafica;
            fetch(guardarGrafica, {
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
    /*document.addEventListener("DOMContentLoaded", () => {
    setTimeout(enviarGraficaAlServidorP, 2000);
    });*/
</script>

<style>
    .tooltip {
        pointer-events: none; 
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = document.querySelectorAll('.tooltip-trigger');

        tooltipTriggerList.forEach(function (el) {
            var tooltip = new bootstrap.Tooltip(el, {
                trigger: 'manual',
                html: true
            });

            el.addEventListener('mouseenter', function () {
                tooltip.show();
            });

            el.addEventListener('mouseleave', function () {
                setTimeout(function () {
                    tooltip.hide();
                }, 50); 
            });
        });
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
    /*document.getElementById('filtroTabla').addEventListener('input', function () {
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
    });*/
</script>

</html>