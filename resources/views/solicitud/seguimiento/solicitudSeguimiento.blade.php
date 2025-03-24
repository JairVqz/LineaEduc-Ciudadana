<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <script src="/js/solicitud/general.js"></script>
    <link rel="stylesheet" href="/css/solicitud/solicitudSeguimiento.css">
    <script src="/js/solicitud/solicitudSeguimiento.js"></script>
    <style>
        .message-bubble {
            max-width: 60%;
            word-wrap: break-word;
            overflow-wrap: break-word;
            padding: 10px;
            border-radius: 8px;
            display: inline;
        }
    </style>
</head>
@include('menuNavigation')

<body>
    <!-- mi contenedor -->
    <div class="content">
        <div class="card" style="padding: 30px;">
            <h1 class="mt-2" style="text-align: center; font-weight: bold; color: #7A1737;">Seguimiento de la solicitud:
                {{ $solicitudes[0]->folio }}
            </h1>
            <button class="accordion" style="font-weight:bold;"><i class="bi bi-clipboard2-plus-fill"
                    style="margin-right:10px"></i>Detalles de la solicitud</button>
            <div class="panel">
                <div class="card mb-3" style="border-radius: 0px">
                    <div class="card-body">
                        <form action="{{ route('seguimiento.guardarSolicitud', $solicitudes[0]->folio) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <fieldset class="border border-secondary p-3" style="border-radius:5px">

                                <!--DATOS DEL SOLICITANTE-->
                                <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                        class="bi bi-person-lines-fill" style="margin-right:5px;"></i>Datos del
                                    solicitante:</legend>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="nombre" class="form-label"
                                            style="font-weight:bold">Nombre(s):</label>
                                        <input type="text" class="form-control" value="{{ $solicitudes[0]->nombre }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="apellidoPaterno" class="form-label" style="font-weight:bold">Primer
                                            apellido:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->apellidoPaterno }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="apellidoMaterno" class="form-label" style="font-weight:bold">Segundo
                                            Apellido:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->apellidoMaterno }}" disabled>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4 mt-4">
                                        <label for="nombre" class="form-label" style="font-weight:bold">Correo:</label>
                                        <input type="text" class="form-control" value="{{ $solicitudes[0]->correo }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="apellidoPaterno" class="form-label"
                                            style="font-weight:bold">Teléfono Fijo:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->telefonoFijo }}" disabled>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="apellidoMaterno" class="form-label"
                                            style="font-weight:bold">Teléfono Celular:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->telefonoCelular }}" disabled>
                                    </div>
                                </div>
                            </fieldset><br>
                            <input type="hidden" name="curpUsuario" id="curpUsuario">
                            <input type="hidden" name="usuario" id="usuario">
                            <input type="hidden" name="idArea" id="idArea">
                            <input type="hidden" name="folio" id="folio" value="{{$solicitudes[0]->folio}}">

                            <fieldset class="border border-secondary p-3" style="border-radius:5px">
                                <!--DATOS DE LA SOLICITUD-->
                                <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                        class="bi bi-file-earmark-post" style="margin-right:5px;"></i>Datos de la
                                    solicitud:</legend>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="fechaSolicitud" class="form-label" style="font-weight:bold">Fecha de
                                            la solicitud:</label>
                                        <input type="text" id="horaInicio" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($solicitudes[0]->created_at)->format('d/m/Y') }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for="diasTranscurridos" class="form-label" style="font-weight:bold">Días
                                            transcurridos:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->diasTranscurridos }}" disabled>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="estatus" class="form-label"
                                            style="font-weight:bold">Estatus:</label>
                                        @php
                                            $estatus = $solicitudes[0]->estatus;
                                            $color = match ($estatus) {
                                                'PENDIENTE' => '#ffcccc',
                                                'EN PROCESO' => '#ffeb99',
                                                'TERMINADO' => '#c1f0c1',
                                                default => '#000000'
                                            };
                                        @endphp
                                        <input type="text" class="form-control fw-bold" value="{{ $estatus }}" disabled
                                            style=" background-color: {{$color}};">
                                    </div>

                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4 mt-4">
                                        <label for="tipoSolicitud" class="form-label"
                                            style="font-weight:bold">Solicitud:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->tipoSolicitud }}" disabled>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <label for="prioridad" class="form-label"
                                            style="font-weight:bold">Prioridad:</label>
                                        <input type="text" class="form-control" value="{{ $solicitudes[0]->prioridad }}"
                                            disabled>
                                    </div>

                                </div>

                                <div class="col-md-12  mt-3">
                                    <label class="form-label"><strong>Descripción:</strong></label>
                                    <textarea id="modalDescripcion" class="form-control" rows="3"
                                        disabled>{{ $solicitudes[0]->descripcion }}</textarea>
                                </div>
                            </fieldset><br>

                            <fieldset class="border border-secondary p-3" style="border-radius:5px">
                                <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                        class="bi bi-pencil-fill" style="margin-right:5px;"></i>Datos de seguimiento:
                                </legend>
                                <div class="row g-3">
                                    <div class="col-md-6 ">
                                        <label for="extension" class="form-label"
                                            style="font-weight:bold">Extensión:</label>
                                        <input type="text" class="form-control" value="{{ $solicitudes[0]->extension }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="areaSolicitante" class="form-label" style="font-weight:bold">Área
                                            Solicitante:</label>
                                        <input type="text" class="form-control" value="{{ $solicitudes[0]->area }}"
                                            disabled>
                                    </div>
                                </div>
                            </fieldset><br>

                            <fieldset class="border border-secondary p-3" style="border-radius:5px">
                                <!-- DATOS DEL CCT -->
                                <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                        class="bi bi-geo-alt-fill" style="margin-right:5px;"></i>Datos de ubicación:
                                </legend>

                                <div class="row mb-0">
                                    <div class="col-md-4">
                                        <label for="cct" class="form-label" style="font-weight:bold">CCT:</label>
                                        <input type="text" id="cct" class="form-control"
                                            value="{{ $solicitudes[0]->cct }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="municipio" class="form-label"
                                            style="font-weight:bold">Municipio:</label>
                                        <input type="text" id="municipio" class="form-control"
                                            value="{{ $solicitudes[0]->municipio }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="localidad" class="form-label"
                                            style="font-weight:bold">Localidad:</label>
                                        <input type="text" id="localidad" class="form-control"
                                            value="{{ $solicitudes[0]->localidad }}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-8 mt-2">
                                        <label for="nombrePlantel" class="form-label" style="font-weight:bold">Nombre
                                            del Plantel:</label>
                                        <input type="text" id="nombrePlantel" class="form-control"
                                            value="{{ $solicitudes[0]->nombrePlantel }}" disabled>
                                    </div>

                                    <div class="col-4 mt-2">
                                        <label for="nivel" class="form-label" style="font-weight:bold">Nivel
                                            Educativo:</label>
                                        <input type="text" id="nivel" class="form-control"
                                            value="{{ $solicitudes[0]->nivelCct }}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-12 mt-2">
                                        <label for="nombreDirector" class="form-label" style="font-weight:bold">Nombre
                                            del Director:</label>
                                        <input type="text" id="nombreDirector" class="form-control"
                                            value="{{ $solicitudes[0]->nombreDirector }}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-12 mt-2">
                                        <label for="direccionCct" class="form-label" style="font-weight:bold">Dirección
                                            del CCT:</label>
                                        <input type="text" id="direccionCct" class="form-control"
                                            value="{{ $solicitudes[0]->direccionCct }}" disabled>
                                    </div>
                                </div>
                            </fieldset><br>

                            <fieldset class="border border-secondary p-3" style="border-radius:5px">
                                <!--DATOS DE LA LLAMADA-->
                                <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                        class="bi bi-telephone-fill" style="margin-right:5px;"></i>Datos de la llamada:
                                </legend>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="horaInicio" class="form-label" style="font-weight:bold">Hora de
                                            inicio:</label>
                                        <input type="text" id="horaInicio" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($solicitudes[0]->horaInicio)->format('H:i:s') }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="horaTermino" class="form-label" style="font-weight:bold">Hora de
                                            término:</label>
                                        <input type="text" id="horaTermino" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($solicitudes[0]->horaTermino)->format('H:i:s') }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="duracion" class="form-label" style="font-weight:bold">Duración de la
                                            llamada (en minutos):</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitudes[0]->duracionMinutos }}" disabled>
                                    </div>
                                </div>
                            </fieldset><br>


                    </div>
                </div>
            </div>

            <hr>
            <!--CHAT-->
            <fieldset class="border border-secondary p-3" style="border-radius:5px; background-color: antiquewhite;">
                <div class="p-2 text-center text-white fw-bold"
                    style="background-color: #7A1737; border-radius: 5px 5px 0 0; font-size: 22px;">
                    SEGUIMIENTO
                </div>
                <div class="chat-container p-3"
                    style="height: 400px; overflow-y: auto; background: #fff; border-radius: 5px; box-shadow: inset 0px 0px 10px rgba(0,0,0,0.1);">
                    @if($seguimientos->isEmpty())
                        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                            <div class="text-center text-secondary p-3 border rounded" style="background-color: #f0f0f0;">
                                <i class="bi bi-info-circle" style="font-size: 24px;"></i><br>
                                La solicitud no ha tenido seguimiento.
                            </div>
                        </div>
                    @else
                                            @foreach ($seguimientos as $seguimiento)
                                                                    @php
                                                                        $esUsuarioActual = $seguimiento->curp_usuario === $curpSesion;
                                                                    @endphp

                                                <div class="d-flex {{ $esUsuarioActual ? 'justify-content-end' : 'justify-content-start' }} mb-2">
                                                                        @if (!$esUsuarioActual)
                                                                            <i class="bi bi-person-circle " style="font-size: 35px; margin-right: 5px; color:rgb(143, 0, 0)"></i>
                                                                        @endif

                                                                        <div class="p-3 rounded shadow-sm message-bubble
                                                        {{ $esUsuarioActual ? 'bg-success-subtle text-end' : 'text-start' }}"style="background-color:rgb(255, 212, 212)">

                                                                            <strong>{{ $seguimiento->nombre_usuario }}</strong><br>
                                                                            {{ $seguimiento->comentario }}

                                                                            <div class="text-muted small text-end mt-1">
                                                                                <i class="bi bi-clock"></i> {{ date('d/m/Y H:i', strtotime($seguimiento->created_at)) }}
                                                                            </div>
                                                                        </div>

                                                                        @if ($esUsuarioActual)
                                                                            <i class="bi bi-person-circle text-success" style="font-size: 35px; margin-left: 5px;"></i>
                                                                        @endif
                                                                    </div>



                                            @endforeach
                    @endif
                </div>



                <br>

                <div class="col-md-12 mb-3">
                    <textarea name="comentarios" id="comentarios" class="form-control" rows="4"
                        placeholder="Escribe tus comentarios aquí..."
                        style="border-radius: 5px; box-shadow: inset 0px 0px 5px rgba(0,0,0,0.1);" required></textarea>
                </div>

                <div class="text-end d-flex justify-content-end align-items-center">
                    <label for="idEstatus" class="form-label mb-0 me-2 fw-bold">Cambiar estatus:</label>
                    <select name="idEstatus" id="idEstatus" class="form-select fw-bold shadow-sm"
                        style="width: 18%; border-radius: 5px;" onchange="cambiarColorFondoEstatus(this)">
                        <option value="">Seleccione el estatus</option>
                        @foreach ($listaEstatus as $estatus)
                            <option value="{{ $estatus->idEstatus }}" {{ $soli->idEstatus == $estatus->idEstatus ? 'selected' : '' }}>
                                {{ $estatus->estatus }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm" id="guardar"
                        style="border-radius: 5px;">
                        <i class="bi bi-send"></i> Dar seguimiento
                    </button>
                </div>

            </fieldset>
            <br><br>





            <!--Comentarios y seguimiento<br>
            <fieldset class="border border-secondary p-3" style="border-radius:5px">
                <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                        class="bi bi-chat-dots-fill" style="margin-right:5px;"></i>Comentarios del seguimiento:
                </legend>

                <div class="text-end d-flex justify-content-end align-items-center">
                    <button type="button" onclick="buscarSolicitudesSimilares();" class="btn btn-third-color mt-0 mb-2"
                        style="text-align: center; width:auto;"><i class="bi bi-search me-2"></i>Comentarios
                        anteriores</button>
                </div>

                <div class="col-md-12 mb-3">
                    <textarea name="comentarios" id="comentarios" class="form-control" rows="4"
                        placeholder="Escribe tus comentarios aquí..."></textarea>
                </div>

                <div class="text-end d-flex justify-content-end align-items-center">
                    <label for="idEstatus" class="form-label mb-0 me-2" style="font-weight: bold;">Cambiar
                        estatus:</label>
                    <select name="idEstatus" id="idEstatus" class="form-select fw-bold" style="width: 14%"
                        onchange="cambiarColorFondoEstatus(this)">
                        <option value="">Seleccione el estatus</option>
                        @foreach ($listaEstatus as $estatus)
                            <option value="{{ $estatus->idEstatus }}" {{ $soli->idEstatus == $estatus->idEstatus ? 'selected' : '' }}> {{ $estatus->estatus }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </fieldset><br>-->

            </form>
        </div>

    </div>
    </div>
</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode([
    'coincidenciasSeguimiento' => route('seguimiento.coincidenciasSeguimiento'),
]); ?>

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('curpUsuario').value = localStorage.getItem('curpSEV');
        document.getElementById('usuario').value = localStorage.getItem('nombreSEV');
        document.getElementById('idArea').value = localStorage.getItem('idArea');
    });

    //MODAL DE COINCIDENCIAS
    const coincidenciasSeguimiento = window.Laravel.coincidenciasSeguimiento;

    function buscarSolicitudesSimilares() {
        let folio = document.getElementById('folio').value;//hidden

        $.ajax({
            url: coincidenciasSeguimiento,
            type: 'GET',
            data: {
                folio: folio,
            },
            success: function (response) {
                if (!response || response.coincidenciasSeguimiento.length === 0) {
                    showModal('<p>Esta solicitud no ha tenido seguimiento.</p>');
                    return;
                }

                var coincidencias = response.coincidenciasSeguimiento;
                let content = '';

                content += '<table class="table table-bordered table-striped" style="width: 100%;">';
                content += '<thead>';
                content += '<tr>';
                content += '<th>Folio de Solicitud</th>';
                content += '<th>Usuario</th>';
                content += '<th>Área</th>';
                content += '<th>Seguimiento</th>';
                content += '<th>Fecha</th>';
                content += '</tr>';
                content += '</thead>';
                content += '<tbody>';


                coincidencias.forEach(function (item) {
                    if (item && item['folio']) {
                        var folio = item['folio'];
                        var nombre_usuario = item['nombre_usuario'];
                        var idArea = item['idArea'];
                        var comentario = item['comentario'];
                        var created_at = new Date(item['created_at']);

                        //Formatear fecha
                        var dia = created_at.getDate();
                        var mes = created_at.getMonth() + 1;
                        var anio = created_at.getFullYear();
                        dia = dia < 10 ? '0' + dia : dia;
                        mes = mes < 10 ? '0' + mes : mes;

                        var fechaFormateada = `${dia}/${mes}/${anio}`;

                        content += '<tr>';
                        content += `<td>${folio}</td>`;
                        content += `<td>${nombre_usuario}</td>`;
                        content += `<td>${idArea}</td>`;
                        content += `<td>${comentario}</td>`;
                        content += `<td>${fechaFormateada}</td>`;
                        content += '</tr>';
                    }
                });

                content += '</tbody>';
                content += '</table>';

                showModal(content);
            },
            error: function () {
                showModal('<p>Hubo un error al realizar la búsqueda.</p>');
            }
        });
    }

    function showModal(content) {
        let modalHTML = `
            <div class="modal fade" id="modalMostrarSegSimilares" tabindex="-1" role="dialog" aria-labelledby="modalMostrarSegSimilaresLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalMostrarSegSimilaresLabel">Seguimento anterior</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        ${content} <!-- Inyectamos el contenido aquí -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                #modalMostrarSegSimilares .modal-dialog {
                    max-width: 80%;
                    margin: 1.75rem auto;
                }

                @media (max-width: 576px) {
                    #modalMostrarSegSimilares .modal-dialog {
                        width: 100%;
                    }
                }
            </style>`;

        $('#modalMostrarSegSimilares').remove();

        $('body').append(modalHTML);

        $('#modalMostrarSegSimilares').modal({
            backdrop: 'true',
            keyboard: true
        });

        $('#modalMostrarSegSimilares').modal('show');

        $('#modalMostrarSegSimilares .btn-secondary').on('click', function () {
            $('#modalMostrarSegSimilares').modal('hide');
        });

        $('#modalMostrarSegSimilares .close').on('click', function () {
            $('#modalMostrarSegSimilares').modal('hide');
        });
    }
</script>

<script>//acordeon
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

</html>
