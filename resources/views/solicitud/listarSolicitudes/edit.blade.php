<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
    <script src="/js/config.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/solicitud/general.js"></script>
    <script src="/js/solicitud/edit.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
</head>
@include('menuNavigation')

<body>


    <!-- Contenido Principal -->
    <div class="content">
        <div class="card" style="padding: 30px;">
            <form id="formularioActualizarSolicitud" method="POST">
                @csrf

                <h1 class="mt-5" style="text-align: center; font-weight: bold; color: #7A1737;">Edición de la
                    solicitud: {{ $solicitudes[0]->folio }}</h1>

                <fieldset class="border border-secondary p-3" style="border-radius:5px">
                    <!--DATOS DEL SOLICITANTE-->
                    <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                            class="bi bi-person-lines-fill" style="margin-right:5px;"></i>Datos del solicitante:
                    </legend>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="nombre" class="form-label" style="font-weight:bold">Nombre(s):</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                value="{{ $solicitudes[0]->nombre }}">
                        </div>
                        <div class="col-md-4">
                            <label for="apellidoPaterno" class="form-label" style="font-weight:bold">Primer
                                apellido:</label>
                            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno"
                                value="{{ $solicitudes[0]->apellidoPaterno }}">
                        </div>
                        <div class="col-md-4">
                            <label for="apellidoMaterno" class="form-label" style="font-weight:bold">Segundo
                                Apellido:</label>
                            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno"
                                value="{{ $solicitudes[0]->apellidoMaterno }}">
                        </div>
                        <input type="hidden" name="folio" id="folio" value="{{ $solicitudes[0]->folio }}">
                        <input type="hidden" name="curpUsuario" id="curpUsuario">
                        <input type="hidden" name="usuario" id="usuario">
                        <input type="hidden" name="nombreMunicipio" id="nombreMunicipio">
                        <input type="hidden" name="nombreLocalidad" id="nombreLocalidad">
                    </div>

                </fieldset><br>

                <fieldset class="border border-secondary p-3" style="border-radius:5px">
                    <!--DATOS DE CONTACTO-->
                    <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                            class="bi bi-file-earmark-post" style="margin-right:5px;"></i>Datos de contacto:</legend>

                    <div class="row g-3">
                        <div class="col-md-4 ">
                            <label for="nombre" class="form-label" style="font-weight:bold">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                value="{{ $solicitudes[0]->correo }}">
                        </div>
                        <div class="col-md-4 ">
                            <label for="apellidoPaterno" class="form-label" style="font-weight:bold">Teléfono
                                Fijo:</label>
                            <input type="number" class="form-control" id="telefonoFijo" name="telefonoFijo"
                                value="{{ $solicitudes[0]->telefonoFijo }}">
                        </div>
                        <div class="col-md-4 ">
                            <label for="apellidoMaterno" class="form-label" style="font-weight:bold">Teléfono
                                Celular:</label>
                            <input type="number" class="form-control" id="telefonoCelular" name="telefonoCelular"
                                value="{{ $solicitudes[0]->telefonoCelular }}">
                        </div>
                    </div>
                </fieldset><br>

                <fieldset class="border border-secondary p-3" style="border-radius:5px">
                    <!--DATOS DE LA SOLICITUD-->
                    <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                            class="bi bi-telephone-fill" style="margin-right:5px;"></i>Datos de la solicitud:</legend>

                    <div class="row g-3">
                        <!--div class="col-md-3 mt-4">
                            <label for="extension" class="form-label" style="font-weight:bold">Extensión:</label>
                            <input type="number" class="form-control" id="extension" name="extension"
                                value="{{ $solicitudes[0]->extension }}">
                        </div-->
                        <div class="col-md-3 mt-4">
                            <label for="idExtension" class="form-label" style="font-weight:bold">Extension:</label>
                            <select name="idExtension" id="idExtension" class="form-select">
                                <option value="">Selecciona la extención</option>
                                @foreach ($listaExtensiones as $extension)
                                    <option value="{{ $extension->idExtensionCatalogo }}"
                                        {{ $solicitudes[0]->idExtensionCatalogo == $extension->idExtensionCatalogo ? 'selected' : '' }}>
                                        {{ $extension->extension }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!--div class="col-md-3 mt-4">
                            <label for="areaSolicitud" class="form-label" style="font-weight:bold">Área
                                que atiende:</label>
                            <input type="text" class="form-control" id="idArea" name="idArea"
                                value="{{ $solicitudes[0]->area }}">
                        </div-->
                        <div class="col-md-3 mt-4">
                            <label for="areaSolicitud" class="form-label" style="font-weight:bold">Área:</label>
                            <select name="idArea" id="idArea" class="form-select">
                                <option value="">Selecciona el área</option>
                                @foreach ($listaAreas as $area)
                                    <option value="{{ $area->idArea }}"
                                        {{ $solicitudes[0]->idArea == $area->idArea ? 'selected' : '' }}>
                                        {{ $area->area }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="tipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                                solicitud:</label>
                            <select name="idTipoSolicitud" id="idTipoSolicitud" class="form-select">
                                <option value="">Selecciona el tipo de solicitud</option>
                                @foreach ($listaTiposSolicitud as $tipos)
                                    <option value="{{ $tipos->idTipoSolicitud }}"
                                        {{ $solicitud->idTipoSolicitud == $tipos->idTipoSolicitud ? 'selected' : '' }}>
                                        {{ $tipos->tipoSolicitud }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="prioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                            <select name="idPrioridad" id="idPrioridad" class="form-select">
                                <option value="">Selecciona una prioridad</option>
                                @foreach ($listaPrioridades as $prioridades)
                                    <option value="{{ $prioridades->idPrioridad }}"
                                        {{ $solicitud->idPrioridad == $prioridades->idPrioridad ? 'selected' : '' }}>
                                        {{ $prioridades->prioridad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-12 mt-4">
                            <label for="descripcion" class="form-label"><strong>Descripción:</strong></label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="4">{{ $solicitudes[0]->descripcion }}</textarea>
                        </div>
                    </div>
                </fieldset><br>

                <fieldset class="border border-secondary p-3" style="border-radius:5px">
                    <!-- DATOS DEL CCT -->
                    <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                            class="bi bi-geo-alt-fill" style="margin-right:5px;"></i>Datos del CCT:
                    </legend>
                    <div class="row g-3">
                        <div class="col-md-12 mt-0">
                            <div class="text-end" id="divBuscadorCct">
                                <button type="button" class="btn btn-third-color" style="width: 19.5%;"
                                    data-bs-toggle="modal" data-bs-target="#modalBuscadorCct"><i
                                        class="bi bi-search me-2"></i>Buscar CCT</button>
                                @include('solicitud.modalBuscadorCct')
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-2">
                            <label for="cct" class="form-label" style="font-weight:bold">CCT:</label>
                            <input type="text" id="cct" name="cct" class="form-control"
                                value="{{ $solicitudes[0]->cct }}">
                        </div>
                        <div class="col-md-2" id="divNivelCct">
                            <label for="nivelCct" class="form-label" style="font-weight:bold">Nivel:</label>
                            <input type="text" name="nivelCct" id="nivelCct" class="form-control"
                                value="{{ $solicitudes[0]->nivelCct }}">
                        </div>
                        <div class="col-8">
                            <label for="nombreCct" class="form-label" style="font-weight:bold">Nombre
                                CCT:</label>
                            <input type="text" id="nombreCct" name="nombreCct" class="form-control"
                                value="{{ $solicitudes[0]->nombrePlantel }}">
                        </div>
                        <div class="col-md-6">
                            <label for="municipio" class="form-label" style="font-weight:bold">Municipio:</label>
                            <!--input type="text" id="municipio" name="municipio" class="form-control"
                                value="{{ $solicitudes[0]->municipio }}"-->
                            <select name="municipio" id="municipio" class="form-select">
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="localidad" class="form-label" style="font-weight:bold">Localidad:</label>
                            <!--input type="text" id="localidad" name="localidad" class="form-control"
                                value="{{ $solicitudes[0]->localidad }}"-->
                            <select name="localidad" id="localidad" class="form-select">
                            </select>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="nombreDirector" class="form-label" style="font-weight:bold">Nombre del
                                Director:</label>
                            <input type="text" id="nombreDirector" name="nombreDirector" class="form-control"
                                value="{{ $solicitudes[0]->nombreDirector }}">
                        </div>


                        <div class="col-6 mt-2">
                            <label for="direccionCct" class="form-label" style="font-weight:bold">Dirección del
                                CCT:</label>
                            <input type="text" id="direccionCct" name="direccionCct" class="form-control"
                                value="{{ $solicitudes[0]->direccionCct }}">
                        </div>
                    </div>
                </fieldset><br>

                <fieldset class="border border-secondary p-3" style="border-radius:5px">
                    <!--DATOS DE LA LLAMADA-->
                    <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                            class="bi bi-calendar2-minus-fill" style="margin-right:5px;"></i>Datos de la llamada:
                    </legend>

                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="fechaSolicitud" class="form-label" style="font-weight:bold">Fecha de la
                                solicitud:</label>
                            <input type="text" id="fechaSolicitud" name="fechaSolicitud" class="form-control"
                                value="{{ \Carbon\Carbon::parse($solicitudes[0]->created_at)->format('d/m/Y') }}"
                                disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="horaInicio" class="form-label" style="font-weight:bold">Hora de
                                inicio:</label>
                            <input type="text" id="horaInicio" name="horaInicio" class="form-control"
                                value="{{ \Carbon\Carbon::parse($solicitudes[0]->horaInicio)->format('H:i:s') }}"
                                disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="horaTermino" class="form-label" style="font-weight:bold">Hora de
                                término:</label>
                            <input type="text" id="horaTermino" name="horaTermino" class="form-control"
                                value="{{ \Carbon\Carbon::parse($solicitudes[0]->horaTermino)->format('H:i:s') }}"
                                disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="duracion" class="form-label" style="font-weight:bold">Duración de la
                                llamada:</label>
                            <input type="text" class="form-control" id="duracion" name="horaTermino"
                                value="{{ $solicitudes[0]->duracionMinutos }}" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="diasTranscurridos" class="form-label" style="font-weight:bold">Días
                                transcurridos:</label>
                            <input type="text" id="diasTranscurridos" name="diasTranscurridos"
                                class="form-control" value="{{ $solicitudes[0]->diasTranscurridos }}" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="estatus" class="form-label" style="font-weight:bold">Estatus:</label>
                            <select name="idEstatus" id="idEstatus" class="form-select">
                                <option value="">Seleccione un estatus</option>
                                @foreach ($listaEstatus as $estatus)
                                    <option value="{{ $estatus->idEstatus }}"
                                        {{ $solicitud->idEstatus == $estatus->idEstatus ? 'selected' : '' }}>
                                        {{ $estatus->estatus }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset><br>

                <div style="align-content: center; text-align: center;">
                    <button type="submit" class="btn btn-color" id="guardar" style="text-align: center">Guardar
                        Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

<script>
    window.Laravel = <?php echo json_encode([
        'editarSolicitud' => route('solicitud.update'),
        'listarSolicitudes' => route('solicitud.listarSolicitudes'),
        'apiPlantel' => route('solicitud.apiPlantel'),
        'apiFetchExtensionAreas' => route('solicitud.fetchExtensionAreas'),
        'apiFetchAreaTipoSolicitudes' => route('solicitud.fetchAreaTipoSolicitudes'),
        'apiFetchTipoSolicitudPrioridad' => route('solicitud.fetchTipoSolicitudPrioridad'),
    ]); ?>

    var listaPrioridades = @json($listaPrioridades);

    $(document).ready(function() {
        $.ajax({
            url: 'https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/',
            //url: '/api-municipios',
            type: 'GET',
            success: function(response) {
                if (response) {
                    var selectMunicipio = $('#municipio');

                    selectMunicipio.empty();
                    selectMunicipio.append('<option value="">Selecciona el municipio</option>');

                    response.forEach(function(municipio) {
                        var selected = (municipio.Nombre == "{{ $solicitudes[0]->municipio }}") ? 'selected' : '';

                        selectMunicipio.append(
                            '<option value="' + municipio.Id + '" ' + selected + '>' + municipio.Nombre +
                            '</option>'
                        );

                    });
                    $('#municipio').trigger('change');
                } else {
                    console.error('La respuesta de la API está vacía.');
                }
            },
            error: function() {
                console.error('Hubo un error al consumir la API de municipios.');
            }
        });

        $('#municipio').on('change', function() {
            var idMunicipio = $(this).val();

            var selectLocalidad = $('#localidad');
            selectLocalidad.empty();
            selectLocalidad.append('<option value="">Selecciona la localidad</option>');

            if (idMunicipio) {
                //var urlLocalidades = `/api-municipios/${idMunicipio}/localidad`;
                var urlLocalidades =
                    `https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/${idMunicipio}/localidad`;

                $.ajax({
                    url: urlLocalidades,
                    type: 'GET',
                    success: function(response) {
                        if (response) {
                            response.forEach(function(localidad) {
                                var selected = (localidad.Nombre == "{{ $solicitudes[0]->localidad }}") ? 'selected' : '';

                                selectLocalidad.append(
                                    '<option value="' + localidad.Id + '" ' + selected + '>' + localidad.Nombre +
                                    '</option>'
                                );
                            });
                            $('#localidad').trigger('change');
                        } else {
                            console.error(
                                'La respuesta de la API de localidades está vacía.');
                        }
                    },
                    error: function() {
                        console.error('Hubo un error al consumir la API de localidades.');
                    }
                });
            }
        });
    });
</script>

</html>
