<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <script src="/js/solicitud/general.js"></script>
    <link rel="stylesheet" href="/css/solicitud/seguimiento.css">
    <script src="/js/solicitud/seguimiento.js"></script>


</head>
@include('menuNavigation')

<body>


    <!-- mi contenedor -->
    <div class="content">
        <div class="card" style="padding: 30px;">
            <div class="d-flex justify-content-between align-items-center mt-5">
                <h1 class="flex-grow-1 text-center" style="font-weight: bold; color: #7A1737;">Seguimiento de
                    solicitudes</h1>
                <a href="{{ route('solicitud.exportarExcelSeguimiento') }}">
                    <img src="{{ asset('images/excel.png') }}" alt="Logo SEV"
                        style="height: 50px; object-fit: contain; margin: 5px; font-size:12px;">

                </a>
            </div>

            <button class="accordion" style="font-weight:bold;"><i class="bi bi-search"
                    style="margin-right:10px"></i>Filtros de búsqueda</button>
            <div class="panel">
                <!-- Filtros-->
                <div class="card mb-3" style="border-radius: 0px">
                    <div class="card-body">

                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label for="filtroFolio" class="form-label">Folio:</label>
                                <input type="text" class="form-control" id="filtroFolio" placeholder="Ej. 2025010006">
                            </div>
                            <div class="col-md-6">
                                <label for="filtroNombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="filtroNombre"
                                    placeholder="Ej. Juan López Gómez">
                            </div>
                            <div class="col-md-3">
                                <label for="fecha" class="form-label">Fecha de solicitud:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>

                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="idArea" class="form-label">Área que atiende:</label>
                                <select name="idArea" id="idArea" class="form-select">
                                    <option value="">Selecciona el área</option>
                                    @foreach ($listaAreas as $data)
                                        <option value="{{ $data->idArea }}">{{ $data->area }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="idTipoSolicitud" class="form-label">Tipo de solicitud:</label>
                                <select name="idTipoSolicitud" id="idTipoSolicitud" class="form-select">
                                    <option value="">Selecciona el tipo de solicitud</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="filtroPrioridad" class="form-label">Prioridad:</label>
                                <select name="idPrioridad" id="idPrioridad" class="form-select">
                                    <option>Selecciona la prioridad</option>
                                    @foreach ($listaPrioridades as $data)
                                        <option value="{{ $data->idPrioridad }}">
                                            {{ $data->prioridad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="filtroEstatus" class="form-label">Estatus:</label>
                                <select name="idEstatus" id="idEstatus" class="form-select">
                                    <option>Selecciona el estatus</option>
                                    @foreach ($listaEstatus as $data)
                                        <option value="{{ $data->idEstatus }}">
                                            {{ $data->estatus }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="filtroCCT" class="form-label">CCT:</label>
                                <input type="text" class="form-control" id="filtroCCT" placeholder="Ej. 30DPR0969O">
                            </div>

                            <div class="col-md-3">
                                <label for="filtroMunicipio" class="form-label">Municipio:</label>
                                <select name="idMunicipio" id="SelectMunicipio" class="form-select">
                                    <option>Selecciona el municipio</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="filtroLocalidad" class="form-label">Localidad:</label>
                                <select name="idLocalidad" id="SelectLocalidad" class="form-select">
                                    <option>Selecciona la localidad</option>
                                </select>
                            </div>
                            <div class="col-md-3" style="text-align: center;">
                                <br>
                                <button name="button" id="btnLimpiarFiltros" style="border-radius: 8px; 
                                width:100%; height:75%">Limpiar filtros</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!--tabla de solicitudes-->
            <div class="table-responsive">
                <table id="tablaResultados" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre del solicitante</th>
                            <th>Área que atiende</th>
                            <th>Solicitud</th>
                            <th>Prioridad</th>
                            <th>CCT</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Estatus</th>
                            <th>Fecha</th>
                            <th>Días</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->folio }} </td>
                            <td>{{ $solicitud->nombre }} {{ $solicitud->apellidoPaterno }}
                                {{ $solicitud->apellidoMaterno }}
                            </td>
                            <!--todos los que son foraneas-->
                            <td>{{ $solicitud->area ?? 'Sin asignar' }}</td>
                            <td>{{ $solicitud->tipoSolicitud ?? 'Sin asignar' }}</td>
                            <td>{{ $solicitud->prioridad ?? 'Sin asignar' }}</td>

                            @if(($solicitud->cct) !== 'SIN ASIGNAR')
                                <td class="ms-2 tooltip-trigger" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="{{ $solicitud->cct }}">
                                    Sí
                                </td>
                            @else
                                <td class="ms-2 tooltip-trigger" data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="SIN ASIGNAR">
                                    No
                                </td>
                            @endif


                            <td>{{ $solicitud->municipio}}</td>
                            <td>{{ $solicitud->localidad}}</td>
                            <!--ESTATUS POR COLOR.-->
                            <td class="
                                        @if(trim(strtoupper($solicitud->estatus ?? '')) === 'PENDIENTE') estado-pendiente
                                        @elseif(trim(strtoupper($solicitud->estatus ?? '')) === 'EN PROCESO') estado-en-proceso
                                        @elseif(trim(strtoupper($solicitud->estatus ?? '')) === 'TERMINADO') estado-terminado
                                        @else ''
                                        @endif
                                    ">
                                {{ $solicitud->estatus ?? 'Sin asignar' }}
                            </td>

                            @php
                                $fecha = \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y');
                            @endphp
                            <td>{{ $fecha }}</td>
                            <td>{{ $solicitud->diasTranscurridos ?? '-' }}</td>


                            <td class="text-center">
                                <a href="#" title="Ver" class="mx-2" data-bs-toggle="modal"
                                    data-bs-target="#modalDetalle" data-folio="{{ $solicitud->folio }}"
                                    data-nombre="{{ $solicitud->nombre }}"
                                    data-apellido-paterno="{{ $solicitud->apellidoPaterno }}"
                                    data-apellido-materno="{{ $solicitud->apellidoMaterno }}"
                                    data-tipo-solicitud="{{ $solicitud->tipoSolicitud}}"
                                    data-area="{{ $solicitud->area}}" data-prioridad="{{ $solicitud->prioridad}}"
                                    data-cct="{{ $solicitud->cct }}" data-municipio="{{ $solicitud->municipio }}"
                                    data-localidad="{{ $solicitud->localidad }}"
                                    data-direccion="{{ $solicitud->direccionCct }}"
                                    data-nombre-director="{{ $solicitud->nombreDirector }}"
                                    data-correo="{{ $solicitud->correo ?? 'No especificado' }}"
                                    data-telefono-fijo="{{ $solicitud->telefonoFijo ?? 'No especificado' }}"
                                    data-telefono-celular="{{ $solicitud->telefonoCelular ?? 'No especificado' }}"
                                    data-estatus="{{ $solicitud->estatus}}" @php
                                        $fechamodal = \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y');
                                    @endphp
                                    data-created-at="{{ $fechamodal }}"
                                    data-dias-transcurridos="{{ $solicitud->diasTranscurridos}}"
                                    data-descripcion="{{ $solicitud->descripcion }}" @php
                                    $horaInicio=\Carbon\Carbon::parse($solicitud->horaInicio)->format('H:i:s');
                                    $horaTermino = \Carbon\Carbon::parse($solicitud->horaTermino)->format('H:i:s');
                                    @endphp data-hora-inicio="{{ $horaInicio }}" data-hora-termino="{{ $horaTermino }}"
                                    data-duracion="{{ $solicitud->duracionMinutos }}"
                                    data-extension="{{ $solicitud->extension}}"
                                    data-nombrePlantel="{{ $solicitud->nombrePlantel }}"
                                    data-nivel="{{ $solicitud->nivelCct }}"
                                    data-usuario="{{ $solicitud->nombre_usuario }}"
                                    >
                                    <i class="bi bi-eye text-primary"></i>
                                </a>

                                <a href="{{ route('seguimiento.solicitudSeguimiento', $solicitud->folio) }}"
                                    title="Revisar" class="mx-2">
                                    <i class="bi bi-check-square text-success"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@include('solicitud.seguimiento.modalDetalle')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

<script>
     window.Laravel = <?php echo json_encode([
        'getTipos' => route(name: 'seguimiento.obtenerTipos'),
        'apiMunicipios' => route('api.apiMunicipios'),
        'apiLocalidades' => route('api.apiLocalidades'),
    ]); ?>

    $(document).ready(function () {
        $('#idArea').change(function () {
            var idArea = $(this).val();
            var tipoSolicitudSelect = $('#idTipoSolicitud');
            tipoSolicitudSelect.empty().append('<option value="">Cargando...</option>');

            const obtenerTi = window.Laravel.getTipos;
            
            if (idArea) {
                $.ajax({
                    url: obtenerTi,
                    type: 'GET',
                    data: { idArea: idArea },
                    dataType: 'json',
                    success: function (data) {
                        tipoSolicitudSelect.empty().append('<option value="">Selecciona el tipo de solicitud</option>');

                        $.each(data, function (key, tipo) {
                            tipoSolicitudSelect.append('<option value="' + tipo.idTipoSolicitud + '">' + tipo.tipoSolicitud + '</option>');
                        });
                    }
                });
            } else {
                tipoSolicitudSelect.empty().append('<option value="">Selecciona el tipo de solicitud</option>');
            }
        });
    });
</script>

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
                var tooltipEl = document.querySelector('.tooltip.show');
                if (tooltipEl) {
                    tooltipEl.addEventListener('mouseleave', function () {
                        tooltip.hide();
                    });
                }
            });

            el.addEventListener('mouseleave', function (event) {
                setTimeout(function () {
                    if (!document.querySelector('.tooltip:hover')) {
                        tooltip.hide();
                    }
                }, 100);
            });
        });
    });
</script>

<script>//TABLA
    document.addEventListener('DOMContentLoaded', function () {
        const tabla = $('#tablaResultados').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                "paginate": {
                    "first": "<<",   
                    "last": ">>",    
                    "next": ">",    
                    "previous": "<"
                },
            },
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: false,
            info: true,
            autoWidth: true,
            responsive: true,
        });


        /* Filtro de CCT
            $('#filtroCCT').on('input', function () {
                let filtro = $(this).val().toLowerCase().trim();
                tabla.rows().every(function () {
                    let cct = $(this.node()).find('td:last-child a').data('cct') || ''; // Obtiene el data-cct
                    let match = cct.toLowerCase().includes(filtro);
                    console.log(match);
    
                    $(this.node()).toggle(match); // Muestra u oculta la fila según el filtro
                });
            });*/
        $('#filtroCCT').on('input', function () {
            let filtro = $(this).val().toLowerCase().trim();
            tabla.rows().nodes().each(function (row) {
                let cct = $(row).find('td:last-child a').data('cct') || '';
                let match = cct.toString().toLowerCase().trim().includes(filtro);
                $(row).toggle(match);
            });
        });




        //SCRIPTS DE FILTROS :D
        filtroFolio.addEventListener('input', function () {
            const filtro = filtroFolio.value.toLowerCase().trim();
            $('#tablaResultados').DataTable().columns(0).search(filtro).draw();
        });
        filtroNombre.addEventListener('input', function () {
            const filtro = filtroNombre.value.toLowerCase().trim();
            $('#tablaResultados').DataTable().columns(1).search(filtro).draw();
        });

        idTipoSolicitud.addEventListener('input', function () {
            const filtro = idTipoSolicitud.options[idTipoSolicitud.selectedIndex].text.toLowerCase().trim();
            if (idTipoSolicitud.selectedIndex === 0) {
                $('#tablaResultados').DataTable().columns(3).search('').draw();
                return;
            } else {
                $('#tablaResultados').DataTable().columns(3).search(filtro).draw();
            }
        });

        idPrioridad.addEventListener('input', function () {
            const filtro = idPrioridad.options[idPrioridad.selectedIndex].text.toLowerCase().trim();
            if (idPrioridad.selectedIndex === 0) {
                $('#tablaResultados').DataTable().columns(4).search('').draw();
                return;
            } else {
                $('#tablaResultados').DataTable().columns(4).search(filtro).draw();
            }
        });
        idArea.addEventListener('input', function () {
            const filtro = idArea.options[idArea.selectedIndex].text.toLowerCase().trim();
            if (idArea.selectedIndex === 0) {
                $('#tablaResultados').DataTable().columns(2).search('').draw();
                return;
            } else {
                $('#tablaResultados').DataTable().columns(2).search(filtro).draw();
            }
        });
        SelectMunicipio.addEventListener('input', function () {
            const filtro = SelectMunicipio.options[SelectMunicipio.selectedIndex].text.toLowerCase().trim();
            if (SelectMunicipio.selectedIndex === 0) {
                $('#tablaResultados').DataTable().columns(6).search('').draw();
                return;
            } else {
                $('#tablaResultados').DataTable().columns(6).search(filtro).draw();
            }
        });
        SelectLocalidad.addEventListener('input', function () {
            const filtro = SelectLocalidad.options[SelectLocalidad.selectedIndex].text.toLowerCase().trim();
            if (SelectLocalidad.selectedIndex === 0) {
                $('#tablaResultados').DataTable().columns(7).search('').draw();
                return;
            } else {
                $('#tablaResultados').DataTable().columns(7).search(filtro).draw();
            }
        });
        idEstatus.addEventListener('input', function () {
            const filtro = idEstatus.options[idEstatus.selectedIndex].text.toLowerCase().trim();
            if (idEstatus.selectedIndex === 0) {
                $('#tablaResultados').DataTable().columns(8).search('').draw();
                return;
            } else {
                $('#tablaResultados').DataTable().columns(8).search(filtro).draw();
            }
        });
        fecha.addEventListener('input', function () {
            if (fecha.value) {
                let partes = fecha.value.split('-');
                if (partes.length === 3) {
                    let formatoCorrecto = `${partes[2]}/${partes[1]}/${partes[0]}`;
                    $('#tablaResultados').DataTable().columns(9).search(formatoCorrecto).draw();
                }
            } else {
                $('#tablaResultados').DataTable().columns(9).search('').draw();
                return;
            }
        });


    });
</script>

<script>//acordeon de filtros
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

<script> //limpiar filtros
    document.getElementById('btnLimpiarFiltros').addEventListener('click', function () {
        const selects = document.querySelectorAll('select');
        selects.forEach(select => {
            select.selectedIndex = 0;
        });
        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach(input => {
            input.value = '';
        });
        const dates = document.querySelectorAll('input[type="date"]');
        dates.forEach(date => {
            date.value = '';
        });
        $('#tablaResultados').DataTable().search('').columns().search('').draw();
    });
</script>

<script>//API DE MUNICIPIOS Y LOCALIDADES
    document.addEventListener('DOMContentLoaded', function () {

        const apiMunicipios = window.Laravel.apiMunicipios;
        const apiLocalidades = window.Laravel.apiLocalidades;

        $(document).ready(function () {
            $.ajax({
                //url: 'https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/',
                //url: '/api-municipios',
                url: apiMunicipios,
                type: 'GET',
                success: function (response) {
                    if (response) {
                        var selectMunicipio = $('#SelectMunicipio');
                        selectMunicipio.empty();
                        selectMunicipio.append('<option value="">Selecciona el municipio</option>');
                        response.forEach(function (municipio) {
                            selectMunicipio.append(
                                '<option value="' + municipio.Id + '">' + municipio.Nombre + '</option>'
                            );
                        });
                    } else {
                        console.error('La respuesta de la API está vacía.');
                    }
                },
                error: function () {
                    console.error('Hubo un error al consumir la API de municipios.');
                }
            });



            $('#SelectMunicipio').on('change', function () {
                var idMunicipio = $(this).val();
                var selectLocalidad = $('#SelectLocalidad');
                selectLocalidad.empty();
                selectLocalidad.append('<option value="">Selecciona la localidad</option>');
                if (idMunicipio) {
                    //var urlLocalidades = `/api-municipios/${idMunicipio}/localidad`;
                    var urlLocalidades = `https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/${idMunicipio}/localidad`;

                    $.ajax({
                        url: urlLocalidades,
                        type: 'GET',
                        success: function (response) {
                            if (response) {
                                response.forEach(function (localidad) {
                                    selectLocalidad.append(
                                        '<option value="' + localidad.Id + '">' + localidad.Nombre + '</option>'
                                    );
                                });
                            } else {
                                console.error('La respuesta de la API de localidades está vacía.');
                            }
                        },
                        error: function () {
                            console.error('Hubo un error al consumir la API de localidades.');
                        }
                    });
                }
            });
        });
    });
</script>

</html>