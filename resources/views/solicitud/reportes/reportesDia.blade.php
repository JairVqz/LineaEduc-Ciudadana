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
        <div class="d-flex justify-content-between align-items-center mt-5">
                <h1 class="flex-grow-1 text-center" style="font-weight: bold; color: #7A1737;">Reporte del día</h1>
                <a href="{{ route('reportes.pdfReporteDia') }}">
                        <img src="{{ asset('images/pdf.png') }}" alt="Logo SEV"
                            style="height: 50px; object-fit: contain; margin: 5px; font-size:12px;">
                </a>
            </div>

            <!--REPORTE ACUMULADO-->
            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #7A1737 ; color: white;">
                        <h1>{{ $llamadasRecibidasPorDia }}</h1>
                        <h5>Llamadas recibidas </h5>
                    </div>
                </div>
                <div class="col-md-3 " style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #B28854 ; color: white;">
                        <h1>{{ $primeraLlamadaPorDiaFormateada }}</h1>
                        <h5>Primera llamada recibida</h5>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #DAC195; ">
                        <h1>{{ $minutosEfectivosPorDia }}</h1>
                        <h5>Minutos efectivos</h5>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: rgb(192,192,192) ;">
                        <h1>{{ $ultimaLlamadaPorDiaFormateada }}</h1>
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
                        <!--<form id="formFiltro" class="flex-row d-flex align-items-center justify-content-center">
                            <label for="fecha" class="me-2">Selecciona una fecha:</label>
                            <input type="date" class="form-control me-2" id="fecha" name="fecha"
                                value="{{ request('fecha', now()->toDateString()) }}" style="width: 150px;">
                            <button type="submit" id="btnFiltrar" class="btn btn-primary">Filtrar</button>
                        </form>-->
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
                            <table id="tablaSAreas" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Área</th>
                                        <th style="text-align: center;">Estatus</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parrafoAreas as $index => $data)
                                        <tr>
                                            <td>
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <span style="font-size: 13px; font-weight: bold; color:rgb(107, 107, 107);">{{ $data->nombre }}</span>
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

<!--DEL DIA-->

@include('solicitud.reportes.dia.sHoraDia')
@include('solicitud.reportes.dia.mapasDia')
@include('solicitud.reportes.dia.sPrioridadDia')
@include('solicitud.reportes.dia.sEstatusDia')
@include('solicitud.reportes.dia.sAreaDia')
@include('solicitud.reportes.dia.sDuracionMinutosDia')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    window.Laravel = <?php echo json_encode(value: [
        'guardarGrafica' => route('reportes.guardarGrafica'),
    ]); ?>
    
    function enviarGraficaAlServidorP() {//mando las 2
        html2canvas(document.getElementById('solicitudesPorHoraChart'), { willReadFrequently: true })
        .then(canvas => {
            let imagenBase64 = canvas.toDataURL('image/png');
            let nombre = 'solicitudesPorHoraDia';

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
        html2canvas(document.getElementById('solicitudesAChart'), { willReadFrequently: true })
        .then(canvas => {
            let imagenBase64 = canvas.toDataURL('image/png');
            let nombre = 'solicitudesPorAreaDia';

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