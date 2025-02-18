document.addEventListener('DOMContentLoaded', function () {

    const coincidenciasSolicitud = window.Laravel.coincidenciasSolicitud;
    const notificarSeguimiento = window.Laravel.notificarSeguimiento;
    const index = window.Laravel.index;

    let isProcessing = false;

    $('#mostrarBuscador').click(function () {

        showModal();

    });

    function showModal() {
        let modalHTML = `
        <div class="modal fade" id="modalMostrarSolicitudesSimilares" tabindex="-1" role="dialog" aria-labelledby="modalMostrarSolicitudesSimilaresLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalMostrarSolicitudesSimilaresLabel">Solicitudes Similares</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">
                            <div class="col-md-2 mt-4">
                                <select name="filtroBusqueda" id="filtroBusqueda" class="form-select">
                                    <option value="numeroTelefono">Número de Teléfono</option>
                                    <option value="folio">Folio</option>
                                </select>
                            </div>

                            <div class="col-md-8 mt-4">
                                <input type="text" name="parametroBusqueda" id="parametroBusqueda" class="form-control"
                                placeholder="Escribe el parametro por el que deseas buscar" required>
                            </div>

                            <div class="col-md-2">
                                <div class="text-end">
                                    <button type="button" class="btn btn-color btn-lg" style="width:130px;"
                                    id="buscarSolicitud">Buscar</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div id="resultadoBusqueda"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #modalMostrarSolicitudesSimilares .modal-dialog {
                max-width: 80%;
                margin: 1.75rem auto;
            }

            @media (max-width: 576px) {
                #modalMostrarSolicitudesSimilares .modal-dialog {
                    width: 100%;
                }
            }

            #modalMostrarSolicitudesSimilares {
                background-color: rgba(0, 0, 0, 0);
            }

            .modal-backdrop.show {
                opacity: 0.2;
            }

        </style>`;

        $('#modalMostrarSolicitudesSimilares').remove();
        $('body').append(modalHTML);

        $('#modalMostrarSolicitudesSimilares').modal({
            keyboard: true
        });

        $('#modalMostrarSolicitudesSimilares').modal('show');

        $('#modalMostrarSolicitudesSimilares .btn-secondary').on('click', function () {
            $('#modalMostrarSolicitudesSimilares').modal('hide');
        });

        $('#modalMostrarSolicitudesSimilares .close').on('click', function () {
            $('#modalMostrarSolicitudesSimilares').modal('hide');
        });
    }

    $(document).on('click', '#buscarSolicitud', function () {
        let filtroBusqueda = $('#filtroBusqueda').val();
        let parametroBusqueda = $('#parametroBusqueda').val();

        console.log("F:"+filtroBusqueda+", p:"+parametroBusqueda);

        if (!isProcessing) {
            isProcessing = true;

            $.ajax({
                url: coincidenciasSolicitud,
                type: 'GET',
                data: {
                    filtroBusqueda: filtroBusqueda,
                    parametroBusqueda: parametroBusqueda,
                },
                success: function (response) {
                    if (!response || response.coincidenciasSolicitud.length === 0) {
                        $('#resultadoBusqueda').html('<p>No se encontraron coincidencias de solicitudes</p>');
                        return;
                    }

                    var coincidencias = response.coincidenciasSolicitud;
                    let content = '';

                    content +=
                        '<table class="table table-bordered table-striped" style="width: 100%;">';
                    content += '<thead>';
                    content += '<tr>';
                    content += '<th>Folio de Solicitud</th>';
                    content += '<th>Nombre solicitante</th>';
                    content += '<th>Tipo de solicitud</th>';
                    content += '<th>Área</th>';
                    content += '<th>Descripción</th>';
                    content += '<th>Fecha de registro</th>';
                    content += '<th>Acciones</th>';
                    content += '</tr>';
                    content += '</thead>';
                    content += '<tbody>';

                    coincidencias.forEach(function (item, index) {
                        if (item && item['folio']) {
                            var folio = item['folio'];
                            var solicitante = item['nombre'] + " " + item['apellidoPaterno'] + " " + item['apellidoMaterno'];
                            var fechaRegistro = new Date(item['created_at']);
                            var curp_usuario = item['curp_usuario'];
                            var nombre_usuario = item['nombre_usuario'];
                            var idArea = item['idArea'];
                            var area = item['area'];

                            //Formatear fecha
                            var dia = fechaRegistro.getDate();
                            var mes = fechaRegistro.getMonth() + 1;
                            var anio = fechaRegistro.getFullYear();
                            dia = dia < 10 ? '0' + dia : dia;
                            mes = mes < 10 ? '0' + mes : mes;

                            var fechaFormateada = `${dia}/${mes}/${anio}`;

                            content += '<tr class="row-solicitud" data-index="' + index +
                                '">';
                            content += `<td>${folio}</td>`;
                            content +=
                                `<td>${item['nombre']} ${item['apellidoPaterno']} ${item['apellidoMaterno']}</td>`;
                            content += `<td>${item['tipoSolicitud']}</td>`;
                            content += `<td>${item['area']} (Ext. ${item['extension']})</td>`;
                            content += `<td>${item['descripcion']}</td>`;
                            content += `<td>${fechaFormateada}</td>`;

                            content += `<td><button class="btn btn-warning" data-folio="${folio}" data-id_area="${idArea}" data-area="${area}"
                                        data-solicitante="${solicitante}">Notificar <i class="bi bi-bell-fill"></i></button></td>`;

                            content += '</tr>';

                            content += `<tr class="row-details row-details-${index}" style="display: none;">
                                <td colspan="7" style="width: 100%;">
                                    <div style="display: flex; width: 100%; margin-bottom: 0%;">
                                        <!-- Columna izquierda -->
                                        <div style="flex: 1; padding-right: 10px;">
                                            <h6>Estatus y Datos de Contacto</h6>
                                            <p><strong>Prioridad:</strong> ${item['prioridad'] || 'No disponible'}</p>
                                            <p><strong>Estatus:</strong>${item['estatus'] || 'No disponible'}</p>
                                            <p><strong>Correo:</strong> ${item['correo'] || 'Sin correo'}</p>
                                            <p><strong>Teléfono Fijo:</strong> ${item['telefonoFijo'] || 'Sin número'} | <strong>Teléfono Celular:</strong> ${item['telefonoCelular'] || 'Sin número'}</p>
                                        </div>

                                        <!-- Columna central -->
                                        <div style="flex: 1; padding-right: 10px;">
                                            <h6>Datos del CCT</h6>
                                            <p><strong>CCT y Plantel:</strong> ${item['cct'] || 'No disponible'} - ${item['nombrePlantel'] || 'No disponible'}</p>
                                            <p><strong>Nivel:</strong> ${item['nivelCct'] || ''} | <strong>Director:</strong> ${item['nombreDirector'] || 'No disponible'}</p>
                                            <p><strong>Dirección del CCT:</strong> ${item['direccionCct'] || 'No disponible'}</p>
                                            <p><strong>Municipio y Localidad:</strong> ${item['municipio'] || 'No disponible'} - ${item['localidad'] || 'No disponible'}</p>
                                        </div>

                                        <!-- Columna derecha -->
                                        <div style="flex: 1;">
                                            <h6>Datos de la llamada</h6>
                                            <p><strong>Hora de inicio de la llamada:</strong> ${item['horaInicio'] || 'No disponible'}</p>
                                            <p><strong>Hora de finalización de la llamada:</strong> ${item['horaTermino'] || 'No disponible'}</p>
                                            <p><strong>Duración:</strong> ${item['duracionMinutos'] || 'No disponible'} minutos</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;

                        }
                    });

                    content += '</tbody>';
                    content += '</table>';

                    $('#resultadoBusqueda').html(content);
                },
                error: function () {
                    $('#resultadoBusqueda').html('<p>Hubo un error al realizar la búsqueda.</p>');
                },
                complete: function () {
                    isProcessing = false;
                }
            });
        }
    });

    $(document).on('keydown', '#parametroBusqueda', function (e) {
        if (e.key === "Enter") {
            $('#buscarSolicitud').click();
        }
    });

    $(document).on('click', '.row-solicitud', function () {
        var index = $(this).data('index');
        var detailsRow = $('.row-details-' + index);

        detailsRow.toggle();
    });

    $(document).on('click', '.btn-warning', function (event) {
        event.stopPropagation();
        var folio = $(this).data('folio');
        var nombre_usuario = $(this).data('nombre_usuario');
        var curp_usuario = $(this).data('curp_usuario');
        var idArea = $(this).data('id_area');
        var area = $(this).data('area');
        var solicitante = $(this).data('solicitante');

        // Crear el modal dinámicamente
        var modalHtml = `
        <div class="modal fade" id="modalConfirmarNotificacion" tabindex="-1" role="dialog" aria-labelledby="modalConfirmarNotificacionTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmarNotificacionTitle">Enviar Notificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>¿Estás segur@ de enviar una notificación de seguimiento a esta solicitud?</p>
                <p><strong>Folio:</strong> ${folio}</p>
                <p><strong>Nombre del Usuario:</strong> ${solicitante}</p>
                <p><strong>Área:</strong> ${area}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Enviar Notificación</button>
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

        $('#modalConfirmarNotificacion .btn-secondary').on('click', function () {
            $('#modalConfirmarNotificacion').modal('hide');
        });

        $('#modalConfirmarNotificacion .close').on('click', function () {
            $('#modalConfirmarNotificacion').modal('hide');
        });

        $('#modalConfirmarNotificacion .btn-primary').on('click', function () {
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                        text: "Se ha enviado una notificación a la solicitud con el folio: " + data.folio +
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
                    
                }else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al enviar la notificación!",
                        text: "Ocurrió un error al enviar la notificación de la solicitud con el folio: " + data.folio + ", por favor intente de nuevo o recargue la página",
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

});
