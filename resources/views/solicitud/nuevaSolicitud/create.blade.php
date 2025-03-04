<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrar Solicitud</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="/js/config.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <script src="/js/solicitud/general.js"></script>
    <script src="/js/solicitud/create.js"></script>
    <link rel="stylesheet" href="/css/solicitud/create.css">

</head>
@include('menuNavigation')

<body>


    <!-- Contenido Principal -->
    <div class="content">
        <div class="card" style="padding: 30px;">
            <h1 class="mt-5" style="text-align: center; font-weight: bold; color: #7A1737;">Registro de solicitud</h1>

            <div class="row g-3">
                <div class="text-end d-flex justify-content-end align-items-center">
                    <label style="font-weight:bold">Fecha y hora de inicio:</label>
                    <input type="text" name="fechaSolicitud" id="fechaSolicitud"
                        class="form-control h-auto d-inline-block mt-0"
                        style="width:105px; border: none; margin-left: 5px; text-align:center;">
                    <input type="text" name="horaSolicitud" id="horaSolicitud"
                        class="form-control h-auto d-inline-block mt-0"
                        style="width:85px; border: none; margin-left: 5px; text-align:center;">
                </div>
                <div class="col-12">

                    <form id="formularioRegistrarSolicitud" method="POST">
                        @csrf

                        <fieldset class="border border-secondary p-3" style="border-radius:5px">
                            <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                    class="bi bi-person-lines-fill" style="margin-right:5px;"></i>Datos del solicitante:
                            </legend>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="nombre" class="form-label" style="font-weight:bold">Nombre(s):</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        placeholder="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="apellidoPaterno" class="form-label" style="font-weight:bold">Apellido
                                        Paterno:</label>
                                    <input type="text" name="apellidoPaterno" id="apellidoPaterno"
                                        class="form-control" placeholder="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="apellidoMaterno" class="form-label" style="font-weight:bold">Apellido
                                        Materno:</label>
                                    <input type="text" name="apellidoMaterno" id="apellidoMaterno"
                                        class="form-control" placeholder="">
                                </div>

                                <input type="hidden" name="curpUsuario" id="curpUsuario">
                                <input type="hidden" name="usuario" id="usuario">
                                <input type="hidden" name="horaInicio" id="horaInicio">
                                <input type="hidden" name="nombreMunicipio" id="nombreMunicipio">
                                <input type="hidden" name="nombreLocalidad" id="nombreLocalidad">
                            </div>
                        </fieldset>
                        <br>

                        <fieldset class="border border-secondary p-3" style="border-radius:5px">
                            <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                    class="bi bi-file-earmark-post" style="margin-right:5px;"></i>Datos de contacto:
                            </legend>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="correo" class="form-label" style="font-weight:bold">Correo:</label>
                                    <input type="email" name="correo" id="correo" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="col-md-4">
                                    <label for="telefonoFijo" class="form-label" style="font-weight:bold">Teléfono
                                        Fijo:</label>
                                    <input type="number" min="0" maxlength="10"
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        name="telefonoFijo" id="telefonoFijo" class="form-control" placeholder="">
                                    <p style="color: red; font-weight: bold; display: none;" id="errorTelefonoFijo">El
                                        número de teléfono no es válido</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="telefonoCelular" class="form-label" style="font-weight:bold">Teléfono
                                        Celular:</label>
                                    <input type="number" min="0" maxlength="10"
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        name="telefonoCelular" id="telefonoCelular" class="form-control"
                                        placeholder="">
                                    <p style="color: red; font-weight: bold; display: none;"
                                        id="errorTelefonoCelular">El número de teléfono no es válido</p>
                                </div>
                            </div>
                        </fieldset>

                        <br>

                        <fieldset class="border border-secondary p-3" style="border-radius:5px">
                            <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                    class="bi bi-telephone-fill" style="margin-right:5px;"></i>Datos de la solicitud:
                            </legend>
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <label for="idExtension" class="form-label"
                                        style="font-weight:bold">Extensión:</label>
                                    <select name="idExtension" id="idExtension" class="form-select select2-bootstrap"
                                        required>
                                        @foreach ($listaExtensiones as $data)
                                            <option value="{{ $data->idExtensionCatalogo }}" data-idpuesto="{{ $data->idPuesto }}">
                                                {{ $data->extension }}
                                            </option>
                                        @endforeach
                                        <option value="otro">Otra</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nombreTitular" class="form-label"
                                        style="font-weight:bold">Funcionario:</label>
                                        <input type="text" name="nombreTitular" id="nombreTitular" class="form-control"
                                        placeholder="" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="idArea" class="form-label" style="font-weight:bold">Área que
                                        atiende:</label>
                                    <select name="idArea" id="idArea" class="form-select select2-bootstrap"
                                        required>
                                        @foreach ($listaAreas as $data)
                                            <option value="{{ $data->idArea }}">
                                                {{ $data->area }}
                                            </option>
                                        @endforeach
                                        <option value="otro">Otra</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="idTipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                                        Solicitud:</label>
                                    <select name="idTipoSolicitud" id="idTipoSolicitud"
                                        class="form-select select2-bootstrap" required>
                                        @foreach ($listaTiposSolicitud as $data)
                                            <option value="{{ $data->idTipoSolicitud }}">
                                                {{ $data->tipoSolicitud }}
                                            </option>
                                        @endforeach
                                        <option value="otro">Otro</option>
                                    </select>
                                </div>
                                {{--<div class="col-md-2">
                                    <label for="idPrioridad" class="form-label"
                                        style="font-weight:bold">Prioridad:</label>
                                    <select name="idPrioridad" id="idPrioridad" class="form-select select2-bootstrap"
                                        required>
                                        @foreach ($listaPrioridades as $data)
                                            <option value="{{ $data->idPrioridad }}">
                                                {{ $data->prioridad }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>--}}

                            @include('solicitud.nuevaSolicitud.modalAgregarDirectorio')

                            {{--<div id="nuevosCatalogos" style="display: none">
                                <div class="row g-3">
                                    <div class="col-md-2">
                                        <label for="nuevaExtension" class="form-label" style="font-weight:bold">Nueva
                                            Extensión:</label>
                                        <input type="number" name="nuevaExtension" id="nuevaExtension"
                                            class="form-control" placeholder="" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nuevaArea" class="form-label" style="font-weight:bold">Nueva
                                            Área:</label>
                                        <input type="text" name="nuevaArea" id="nuevaArea" class="form-control"
                                            placeholder="" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nuevoTipoSolicitud" class="form-label"
                                            style="font-weight:bold">Nuevo tipo de solicitud:</label>
                                        <input type="text" name="nuevoTipoSolicitud" id="nuevoTipoSolicitud"
                                            class="form-control" placeholder="" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="idNuevaPrioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                                        <select name="idNuevaPrioridad" id="idNuevaPrioridad" class="form-select">
                                            <option value="" hidden></option>
                                            @foreach ($listaPrioridades as $data)
                                                <option value="{{ $data->idPrioridad }}">
                                                    {{ $data->prioridad }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>--}}

                                <div class="col-md-12">
                                    <label for="descripcion" class="form-label"
                                        style="font-weight:bold">Descripción:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="" required></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <br>

                        <div class="row g-3">
                            <!--div class="d-flex align-items-center justify-content-center">
                                <input class="form-check-input mr-2" type="checkbox" value=""
                                    id="origenSolicitud" style="transform: scale(1.5); margin-right: 15px;">
                                <label class="form-check-label ml-4" for="origenSolicitud" style="font-weight: bold">
                                    La solicitud proviene de un CCT
                                </label>
                            </div-->
                            <div class="d-flex align-items-center justify-content-center">

                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group"
                                    id="datosUbicacionSelector">
                                    <input type="radio" class="btn-check" name="btnradio" id="datosCct"
                                        autocomplete="off">
                                    <label class="btn btn-outline-color" for="datosCct">Habilitar datos de un
                                        CCT</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="snUbicacion"
                                        autocomplete="off" checked>
                                    <label class="btn btn-outline-color" for="snUbicacion">Sin Datos de
                                        Ubicación</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="mpioLoc"
                                        autocomplete="off">
                                    <label class="btn btn-outline-color" for="mpioLoc">Habilitar municipio y
                                        localidad</label>
                                </div>
                            </div>
                        </div>

                        <fieldset class="border border-secondary p-3" style="border-radius:5px" id="datosUbicacion">
                            <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold"><i
                                    class="bi bi-geo-alt-fill" style="margin-right:5px;"></i>Datos de ubicación:
                            </legend>
                            <div class="row g-3">
                                <div class=" mt-0">
                                    <div class="text-end" id="divBuscadorCct">
                                        <button type="button" class="btn btn-third-color" style="width: 19.5%;"
                                            data-bs-toggle="modal" data-bs-target="#modalBuscadorCct"><i
                                                class="bi bi-search me-2"></i>Buscar CCT</button>
                                        @include('solicitud.modalBuscadorCct')
                                    </div>
                                </div>
                                <div class="col-md-2" id="divCct">
                                    <label for="cct" class="form-label" style="font-weight:bold">CCT:</label>
                                    <input type="text" name="cct" id="cct" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="col-md-2" id="divNivelCct">
                                    <label for="nivelCct" class="form-label" style="font-weight:bold">Nivel:</label>
                                    <input type="text" name="nivelCct" id="nivelCct" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="col-md-8" id="divNombreCct">
                                    <label for="nombreCct" class="form-label" style="font-weight:bold">Nombre
                                        CCT:</label>
                                    <input type="text" name="nombreCct" id="nombreCct" class="form-control">
                                </div>
                                <div class="col-md-6" id="divMunicipio">
                                    <label for="municipio" class="form-label"
                                        style="font-weight:bold">Municipio:</label>
                                    <!--input type="text" name="municipio" id="municipio" class="form-control"-->
                                    <select name="municipio" id="municipio" class="form-control select2-bootstrap">
                                    </select>
                                </div>
                                <div class="col-md-6" id="divLocalidad">
                                    <label for="localidad" class="form-label"
                                        style="font-weight:bold">Localidad:</label>
                                    <!--input type="text" name="localidad" id="localidad" class="form-control"-->
                                    <select name="localidad" id="localidad" class="form-select select2-bootstrap"
                                        style="pointer-events: none; background-color: #f1f1f1;">
                                    </select>
                                </div>
                                <div class="col-md-6" id="divNombreDirector">
                                    <label for="nombreDirector" class="form-label"
                                        style="font-weight:bold">Director:</label>
                                    <input type="text" name="nombreDirector" id="nombreDirector"
                                        class="form-control">
                                </div>
                                <div class="col-md-6" id="divDireccionCct">
                                    <label for="direccionCct" class="form-label"
                                        style="font-weight:bold">Dirección:</label>
                                    <input type="text" name="direccionCct" id="direccionCct"
                                        class="form-control">

                                </div>

                            </div>
                        </fieldset>

                        <!-- Mostrar la respuesta de la API -->
                        <!--div id="resultadoApi"></div-->

                        <br>

                        <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-center">
                                <div class="text-center" style="margin-right: 15px;">
                                    <button type="button" class="btn btn-color btn-lg"
                                        id="btnLimpiarFormulario">Limpiar
                                        Formulario</button>
                                </div>
                                <div class="text-center" style="margin-left: 15px;">
                                    <button type="submit" class="btn btn-color btn-lg"
                                        id="btnRegistrarSolicitud">Enviar Formulario</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

<script>
    window.Laravel = <?php echo json_encode([
        'guardarSolicitud' => route('solicitud.store'),
        'coincidenciasSolicitud' => route('solicitud.coincidenciasSolicitud'),
        'apiPlantel' => route('solicitud.apiPlantel'),
        'apiFetchExtensionAreas' => route('solicitud.fetchExtensionAreas'),
        'apiFetchAreaTipoSolicitudes' => route('solicitud.fetchAreaTipoSolicitudes'),
        'apiFetchTipoSolicitudPrioridad' => route('solicitud.fetchTipoSolicitudPrioridad'),
    ]); ?>

    var listaPrioridades = @json($listaPrioridades);

    const coincidenciasSolicitud = window.Laravel.coincidenciasSolicitud;

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
                        selectMunicipio.append(
                            '<option value="' + municipio.Id + '">' + municipio.Nombre +
                            '</option>'
                        );
                    });
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
                                selectLocalidad.append(
                                    '<option value="' + localidad.Id + '">' +
                                    localidad.Nombre + '</option>'
                                );
                            });
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

    $('#idExtension').select2({
        placeholder: "Selecciona una extensión",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');

    $('#idArea').select2({
        placeholder: "Selecciona una área",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');

    $('#idTipoSolicitud').select2({
        placeholder: "Selecciona una solicitud",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');

    $('#idPrioridad').select2({
        placeholder: "Selecciona la prioridad",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');

    $('#municipio').select2({
        placeholder: "Selecciona el municipio",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');

    $('#localidad').select2({
        placeholder: "Selecciona la localidad",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados, seleccione un municipio";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');
</script>

</html>
