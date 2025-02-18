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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
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
                <h1 class="flex-grow-1 text-center" style="font-weight: bold; color: #7A1737;">Reporte acumulado</h1>
                <a href="{{ url('solicitud/pdf_generator') }}">
                    <button name="button" id="boton" style="border-radius: 8px;">
                        <img src="{{ asset('images/pdf.png') }}" alt="Logo SEV"
                            style="height: 50px; object-fit: contain; margin: 5px; font-size:12px;">
                    </button>
                </a>
            </div>

            <!--REPORTE ACUMULADO-->
            <div class="row g-3 flex-row d-flex mt-2">
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #7A1737 ; color: white;">
                        <h1>{{ $llamadasRecibidas }}</h1>
                        <h5>Llamadas recibidas </h5>
                    </div>
                </div>
                <div class="col-md-3 " style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #B28854 ; color: white;">
                        <h1>{{ $primeraLlamadaFormateada }}</h1>
                        <h5>Primera llamada recibida</h5>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: #DAC195; ">
                        <h1>{{ $minutosEfectivos }}</h1>
                        <h5>Minutos efectivos</h5>
                    </div>
                </div>
                <div class="col-md-3" style="padding: 5px; ">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px;background-color: rgb(192,192,192) ;">
                        <h1>{{ $ultimaLlamadaFormateada }}</h1>
                        <h5>Úlitma llamada recibida</h5>
                    </div>
                </div>
            </div>


            <div class="row g-3 flex-row d-flex mt-2 ">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="padding: 5px; justify-content-center align-items-center">
                    <div class="card justify-content-center align-items-center"
                        style="padding: 10px; padding-top: 20px; border: none;">

                        <canvas id="solicitudesPorHoraAcumuladoChart"></canvas>
                        <!--<form id="formFiltro" class="flex-row d-flex align-items-center justify-content-center">
                            <label for="fecha" class="me-2">Selecciona una fecha:</label>
                            <input type="date" class="form-control me-2" id="fecha" name="fecha"
                                value="{{ request('fecha', now()->toDateString()) }}" style="width: 150px;">
                            <button type="submit" id="btnFiltrar" class="btn btn-primary">Filtrar</button>
                        </form>-->
                        <div style="display: flex; justify-content: flex-end; width: 100%; padding-right: 10px;">
                            <a style="text-align: right; cursor: pointer; transition: transform 0.2s;"
                                onclick="downloadChart('SolicitudesPorHoraAcumulado', 'solicitudesPorHoraAcumuladoChart')"
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
                    <div class="card" style="padding: 20px; height: 100%; overflow: hidden;">
                        <h4 style="text-align: center;" id="tituloTabla">Solicitudes por Municipio</h4><br>
                        <div class="input-group">
                            <input type="text" class="form-control" id="filtroTabla" placeholder="Buscar...">
                            <button type="button" id='botonFiltro' class="btn btn-color">Limpiar</button>
                        </div>
                        <br><br>
                        <div style="height: 100%; width: 100%;">
                            <table id="tablaDelegaciones" class="table table-striped table-bordered"
                                style="display: none;">
                                <thead>
                                    <tr>
                                        <th>Delegación</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>uwu</td>
                                        <td>owo</td>
                                    </tr>
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
<!--ACUMULADO-->
@include('solicitud.reportes.acumulado.sHoraAcum')
@include('solicitud.reportes.acumulado.mapasAcum')
@include('solicitud.reportes.acumulado.sPrioridadAcum')
@include('solicitud.reportes.acumulado.sEstatusAcum')
@include('solicitud.reportes.acumulado.sAreaAcum')
@include('solicitud.reportes.acumulado.sDuracionMinutosAcum')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


<script>
/*document.getElementById("generarPDF").addEventListener("click", function() {
    let canvas = document.getElementById("solicitudesPorHoraAcumuladoChart");
    let chartImage = canvas.toDataURL("image/png"); // Convierte la gráfica a imagen
    console.log(chartImage);

    fetch("{{ route('solicitud.pdf_generator') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ chartImage: chartImage }) // Enviar imagen al servidor
    })
    .then(response => response.json())
    .then(data => {
        window.open(data.url, '_blank'); // Abre en nueva pestaña
    })
    .catch(error => console.error("Error generando PDF:", error));
});

document.getElementById("generarPDF").addEventListener("click", function() {
    fetch("{{ route('solicitud.pdf_generator') }}")  // Asegúrate de que esta ruta sea correcta
        .then(response => response.json())
        .then(data => {
            window.open(data.url, '_blank'); // Abre en nueva pestaña
        })
        .catch(error => console.error("Error generando PDF:", error));
});*/
</script>

<script>
    //tabla del Mapa
    // Inicializar DataTables
    document.addEventListener('DOMContentLoaded', function () {
        $('#tablaMunicipios, #tablaDelegaciones').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": true,
            "pageLength": 8
        });
    });

    // Filtrar contenido de la tabla activa
    document.getElementById('filtroTabla').addEventListener('input', function () {
        const filtro = this.value.toLowerCase().trim();
        if (document.getElementById('tablaMunicipios').style.display === "table") {
            $('#tablaMunicipios').DataTable().columns(0).search(filtro).draw();
        } else {
            $('#tablaDelegaciones').DataTable().columns(0).search(filtro).draw();
        }
    });

    // Botón para limpiar el filtro
    document.getElementById('botonFiltro').addEventListener('click', function () {
        document.getElementById('filtroTabla').value = '';
        $('#tablaMunicipios, #tablaDelegaciones').DataTable().search('').columns().search('').draw();
    });
</script>


</html>