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

                                <button type="button" class="accordion">
                                    <p id="estatusCoincidencias"
                                        style="text-align: start; color: black; font-weight: bold;">Coincidencias...</p>
                                </button>
                                <div class="panel">
                                    <div id="resultadosBusquedaCoincidencias"></div>
                                </div>

                                <input type="hidden" name="curpUsuario" id="curpUsuario">
                                <input type="hidden" name="usuario" id="usuario">
                                <input type="hidden" name="horaInicio" id="horaInicio">
                                <input type="hidden" name="nombreMunicipio" id="nombreMunicipio">
                                <input type="hidden" name="nombreLocalidad" id="nombreLocalidad">
                                <input type="hidden" name="idArea" id="idArea">
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
                                <div class="col-md-4">
                                    <label for="idExtension" class="form-label"
                                        style="font-weight:bold">Directorio:</label>
                                    <select name="idExtension" id="idExtension" class="form-select select2-bootstrap"
                                        required>
                                        @foreach ($listaDirectorio as $data)
                                            <option value="{{ $data->idExtensionCatalogo }}"
                                                data-idpuesto="{{ $data->idPuesto }}"
                                                data-idarea="{{ $data->idArea }}"
                                                data-nombretitular="{{ $data->nombreTitular }}">
                                                {{ $data->extension }} - {{ $data->area }} - {{ $data->puesto }}
                                            </option>
                                        @endforeach
                                        <option value="otro">Otra</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="nombreTitular" class="form-label"
                                        style="font-weight:bold">Funcionario:</label>
                                    <input type="text" name="nombreTitular" id="nombreTitular"
                                        class="form-control" placeholder="" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="idTipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                                        Solicitud:</label>
                                    <select name="idTipoSolicitud" id="idTipoSolicitud"
                                        class="form-select select2-bootstrap" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="descripcion" class="form-label"
                                        style="font-weight:bold">Descripción:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="" required></textarea>
                                </div>

                                @include('solicitud.nuevaSolicitud.modalAgregarDirectorio')

                            </div>
                        </fieldset>
                        <br>

                        <div class="row g-3">
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
                                    <select name="municipio" id="municipio" class="form-control select2-bootstrap">
                                    </select>
                                </div>
                                <div class="col-md-6" id="divLocalidad">
                                    <label for="localidad" class="form-label"
                                        style="font-weight:bold">Localidad:</label>
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
        'coincidenciasSolicitudRegistro' => route('solicitud.coincidenciasSolicitudRegistro'),
        'apiPlantel' => route('solicitud.apiPlantel'),
        'apiFetchAreaTipoSolicitudes' => route('solicitud.fetchAreaTipoSolicitudes'),
        'notificarSeguimiento' => route('solicitud.notificarSeguimiento'),
        'index' => route('solicitud.index'),
    ]); ?>

    var listaPrioridades = @json($listaPrioridades);

    const RoutecoincidenciasSolicitudRegistro = window.Laravel.coincidenciasSolicitudRegistro;
    const notificarSeguimiento = window.Laravel.notificarSeguimiento;
    const index = window.Laravel.index;

    $(document).ready(function() {

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        var xhrRequest = null;

        let debounceTimer; // Variable para almacenar el temporizador de debounce
        $('#nombre, #apellidoPaterno, #apellidoMaterno').on('input', function() {
            console.log('Hubo un cambio en alguno de los inputs');

            // Cancelar la solicitud anterior si existe
            if (xhrRequest !== null) {
                xhrRequest.abort();
                console.log('Solicitud anterior cancelada');
            }

            // Cancelar cualquier ejecución pendiente de la función de búsqueda
            clearTimeout(debounceTimer);

            $('#estatusCoincidencias').text('Buscando solicitudes...');

            var busquedaNombre = $('#nombre').val();
            var busquedaApellidoPaterno = $('#apellidoPaterno').val();
            var busquedaApellidoMaterno = $('#apellidoMaterno').val();

            // Esperar 500 ms después de la última entrada antes de hacer la solicitud AJAX
            debounceTimer = setTimeout(function() {
                xhrRequest = $.ajax({
                    url: RoutecoincidenciasSolicitudRegistro,
                    type: 'GET',
                    data: {
                        busquedaNombre: busquedaNombre,
                        busquedaApellidoPaterno: busquedaApellidoPaterno,
                        busquedaApellidoMaterno: busquedaApellidoMaterno,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#estatusCoincidencias').text('Se encontraron ' + response
                            .coincidenciasSolicitudRegistro.length +
                            ' solicitudes que coinciden con los datos ingresados'
                            );

                        if (!response || response.coincidenciasSolicitudRegistro
                            .length === 0) {
                            $('#resultadosBusquedaCoincidencias').html(
                                '<p>No se encontraron coincidencias de solicitudes</p>'
                                );
                            return;
                        }

                        var coincidencias = response.coincidenciasSolicitudRegistro;
                        let content = '';

                        content +=
                            '<table class="table table-bordered table-striped" style="width: 100%;">';
                        content += '<thead>';
                        content += '<tr>';
                        content += '<th>Folio</th>';
                        content += '<th>Nombre solicitante</th>';
                        content += '<th>Datos de contacto</th>';
                        content += '<th>Directorio</th>';
                        content += '<th>Tipo de solicitud</th>';
                        content += '<th>Descripción</th>';
                        content += '<th>Fecha de registro</th>';
                        content += '<th>Acciones</th>';
                        content += '</tr>';
                        content += '</thead>';
                        content += '<tbody>';

                        coincidencias.forEach(function(item, index) {
                            if (item && item['folio']) {
                                var folio = item['folio'];
                                var solicitante = item['nombre'] + " " +
                                    item['apellidoPaterno'] + " " + item[
                                        'apellidoMaterno'];
                                var fechaRegistro = new Date(item[
                                    'created_at']);
                                var curp_usuario = item['curp_usuario'];
                                var nombre_usuario = item['nombre_usuario'];
                                var idArea = item['idArea'];
                                var area = item['area'];
                                var extension = item['extension'];
                                var descripcion = item['descripcion'];
                                var tipoSolicitud = item['tipoSolicitud'];

                                var correo = item['correo'];
                                var telefonoFijo = item['telefonoFijo'];
                                var telefonoCelular = item[
                                    'telefonoCelular'];

                                // Formatear fecha
                                var dia = fechaRegistro.getDate();
                                var mes = fechaRegistro.getMonth() + 1;
                                var anio = fechaRegistro.getFullYear();
                                dia = dia < 10 ? '0' + dia : dia;
                                mes = mes < 10 ? '0' + mes : mes;

                                var fechaFormateada = `${dia}/${mes}/${anio}`;

                                content += '<tr class="row-solicitud" data-index="' + index + '">';
                                content += `<td>${folio}</td>`;
                                content += `<td>${item['nombre']} ${item['apellidoPaterno']} ${item['apellidoMaterno'] || ''}</td>`;
                                content +=
                                    `<td>Correo: ${correo || 'Sin correo'} <br> telefonoFijo: ${telefonoFijo || 'Sin teléfono fijo'} <br> telefonoCelular: ${telefonoCelular || 'Sin teléfono celular'}</td>`;
                                content += `<td>${area} (Ext. ${extension})</td>`;
                                content += `<td>${tipoSolicitud}</td>`;
                                content += `<td>${descripcion}</td>`;
                                content += `<td>${fechaFormateada}</td>`;

                                content += `<td><button id="btnNotificar" type="button" class="btn btn-warning" 
                                data-folio="${folio}" data-id_area="${idArea}" data-area="${area}" data-solicitante="${solicitante}" data-fecha="${fechaFormateada}"
                                data-descripcion="${descripcion}" data-tiposolicitud="${tipoSolicitud}" data-extension="${extension}">
                                Notificar <i class="bi bi-bell-fill"></i></button></td>`;

                                content += '</tr>';
                            }
                        });

                        content += '</tbody>';
                        content += '</table>';

                        $('#resultadosBusquedaCoincidencias').html(content);
                    },
                    error: function() {
                        $('#resultadosBusquedaCoincidencias').html(
                            '<p>Hubo un error al realizar la búsqueda.</p>');
                    },
                    complete: function() {
                        xhrRequest = null;
                    }
                });
            },
            500); // Retraso de 500 ms para realizar la solicitud después de que el usuario termine de escribir
        });

        $(document).on('click', '#btnNotificar', function(event) {
            event.stopPropagation();
            var folio = $(this).data('folio');
            var nombre_usuario = $(this).data('nombre_usuario');
            var curp_usuario = $(this).data('curp_usuario');
            var idArea = $(this).data('id_area');
            var area = $(this).data('area');
            var solicitante = $(this).data('solicitante');
            var descripcion = $(this).data('descripcion');
            var tiposolicitud = $(this).data('tiposolicitud');
            var fecha = $(this).data('fecha');
            var extension = $(this).data('extension');

            // Crear el modal dinámicamente
            var modalHtml = `
        <div class="modal fade" id="modalConfirmarNotificacion" tabindex="-1" role="dialog" aria-labelledby="modalConfirmarNotificacionTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmarNotificacionTitle">Enviar notificación al folio ${folio}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p style="color: #7A1737; font-weight: bold;">¿Deseas enviar la notificación de seguimiento en esta solicitud?</p>
                <p><strong>Nombre del Usuario:</strong> ${solicitante}</p>
                <p><strong>Fecha de la solicitud:</strong> ${fecha}</p>
                <p><strong>Asignada a:</strong> ${area} (Ext. ${extension})</p>
                <p><strong>Tipo de solicitud :</strong> ${tiposolicitud}</p>
                <p><strong>Descripción:</strong> ${descripcion}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-color" id="enviarNotificacion">Enviar Notificación</button>
              </div>
            </div>
          </div>
        </div>
        `;

            `<style>
            #modalConfirmarNotificacion {
                background-color: rgba(0, 0, 0, 0.5);
            }

            .modal-backdrop.show {
                opacity: 0.4;
            }

        </style>`;

            $('#modalConfirmarNotificacion').remove();
            $('body').append(modalHtml);

            $('#modalConfirmarNotificacion').modal({
                backdrop: true,
                keyboard: true
            });

            $('#modalConfirmarNotificacion').modal('show');

            $('#modalConfirmarNotificacion .btn-secondary').on('click', function() {
                $('#modalConfirmarNotificacion').modal('hide');
            });

            $('#modalConfirmarNotificacion .close').on('click', function() {
                $('#modalConfirmarNotificacion').modal('hide');
            });

            $('#modalConfirmarNotificacion #enviarNotificacion').on('click', function() {
                notificar(folio, idArea);
                $('#modalConfirmarNotificacion').modal('hide');
            });

        });

        function notificar(folio, idArea) {
            const nombre_usuario = localStorage.getItem('nombreSEV');
            const curp_usuario = localStorage.getItem('curpSEV');

            fetch(notificarSeguimiento, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        folio: folio,
                        nombre_usuario: nombre_usuario,
                        curp_usuario: curp_usuario,
                        idArea: idArea,
                        comentario: "La solicitud ha recibido nuevamente una llamada, favor de revisar la soliciud y dar seguimiento",
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === "Notificación enviada exitosamente") {
                        Swal.fire({
                            icon: "success",
                            title: "¡La notificación se ha enviado correctamente!",
                            text: "Se ha enviado una notificación a la solicitud con el folio: " +
                                data.folio +
                                ", para que se seguimiento a la brevedad posible.",
                            showCancelButton: false,
                            confirmButtonText: `ACEPTAR`,
                            confirmButtonColor: "#7A1737",
                            cancelButtonText: `CANCELAR`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.close();
                                window.location.href = index;
                            } else {
                                Swal.close();
                                window.location.href = index;
                            }
                        });

                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "¡Error al enviar la notificación!",
                            text: "Ocurrió un error al enviar la notificación de la solicitud con el folio: " +
                                data.folio + ", por favor intente de nuevo o recargue la página",
                            showCancelButton: false,
                            confirmButtonText: `ACEPTAR`,
                            confirmButtonColor: "#7A1737",
                            cancelButtonText: `CANCELAR`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.close();
                            }
                        });
                    }
                    console.log('Notificación enviada:', data);
                    //alert('Notificación enviada exitosamente');
                })
                .catch(error => {
                    console.error('Error al enviar la notificación:', error);
                    //alert('Hubo un error al enviar la notificación');
                });
        }

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

    $(document).on('select2:open', (e) => {
        const selectId = e.target.id;
        $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function(key,
            value, ) {
            value.focus();
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

    $('#idTipoSolicitud').select2({
        placeholder: "Selecciona un tipo de solicitud",
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
