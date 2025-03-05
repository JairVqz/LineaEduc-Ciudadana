<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .form-label {
        text-align: left;
    }

    .modal-backdrop {
        opacity: 0.4 !important;
    }

    .modal-dialog {
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        max-width: 540px;
    }

    input[readonly] {
        background-color: #d9cdcd;
        /* Color de fondo */
        color: #010101;
        /* Color del texto */
        border: 1px solid #ccc;
        /* Borde */
    }

    /* Asegurarse de que el contenedor de Select2 se comporte como un input de Bootstrap */
    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px);
        padding: 0.375rem 1.5rem 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        position: relative;
    }

    /* Centrar la flecha en el contenedor de la selección */
    .select2-container .select2-selection__arrow {
        right: 0.75rem;
        top: 50%;
        transform: translateY(20%);
    }

    /* Ajuste opcional si deseas que las opciones del select también se alineen de manera similar */
    .select2-container--default .select2-results__option {
        padding: 0.375rem 1rem;
    }
</style>

<div class="modal fade" id="modalAgregarDirectorio" tabindex="-1" aria-labelledby="modalAgregarDirectorioLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAgregarDirectorioLabel">Nuevo Directorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="idNuevaExtension" class="form-label" style="font-weight:bold">Extensión:</label>
                        <select name="idNuevaExtension" id="idNuevaExtension" class="form-select select2-bootstrap">
                            @foreach ($listaExtensiones as $data)
                                <option value="{{ $data->idExtensionCatalogo }}"
                                    data-nombretitular="{{ $data->nombreTitular }}">
                                    {{ $data->extension }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nuevaExtension" class="form-label" style="font-weight:bold">Nueva
                            Extensión:</label>
                        <input type="number" name="nuevaExtension" id="nuevaExtension" class="form-control"
                            placeholder="" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="nuevoFuncionario" class="form-label" style="font-weight:bold">Funcionario:</label>
                        <input type="text" name="nuevoFuncionario" id="nuevoFuncionario" class="form-control"
                            placeholder="" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="idNuevaArea" class="form-label" style="font-weight:bold">Área que
                            atiende:</label>
                        <select name="idNuevaArea" id="idNuevaArea" class="form-select select2-bootstrap">
                            @foreach ($listaAreas as $data)
                                <option value="{{ $data->idArea }}">
                                    {{ $data->area }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nuevaArea" class="form-label" style="font-weight:bold">Nueva
                            Área:</label>
                        <input type="text" name="nuevaArea" id="nuevaArea" class="form-control" placeholder=""
                            readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="idNuevoPuesto" class="form-label" style="font-weight:bold">Puesto:</label>
                        <select name="idNuevoPuesto" id="idNuevoPuesto" class="form-select select2-bootstrap">
                            @foreach ($listaPuestos as $data)
                                <option value="{{ $data->idPuesto }}">
                                    {{ $data->puesto }}
                                </option>
                            @endforeach
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nuevoPuesto" class="form-label" style="font-weight:bold">Nuevo Puesto:</label>
                        <input type="text" name="nuevoPuesto" id="nuevoPuesto" class="form-control" placeholder=""
                            readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="idNuevoTipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                            Solicitud:</label>
                        <select name="idNuevoTipoSolicitud" id="idNuevoTipoSolicitud"
                            class="form-select select2-bootstrap">
                            @foreach ($listaTiposSolicitud as $data)
                                <option value="{{ $data->idTipoSolicitud }}">
                                    {{ $data->tipoSolicitud }}
                                </option>
                            @endforeach
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="nuevoTipoSolicitud" class="form-label" style="font-weight:bold">Nuevo tipo de
                            solicitud:</label>
                        <input type="text" name="nuevoTipoSolicitud" id="nuevoTipoSolicitud" class="form-control"
                            placeholder="" readonly>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-color" id="guardarNuevoDirectorio">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode([
        'guardarDirectorio' => route('directorio.storeDirectorioDinamico'),
    ]); ?>

    const guardarDirectorioRoute = window.Laravel.guardarDirectorio;

    document.addEventListener('DOMContentLoaded', function() {

        $('#idNuevaExtension').on('change', function() {
            var extensionSeleccionada = $('#idNuevaExtension').find('option:selected');
            var nombreTitular = extensionSeleccionada.data('nombretitular');

            if ($('#idNuevaExtension').val() == "otro") {
                $('#nuevaExtension').prop('readonly', false);
                $('#nuevoFuncionario').prop('readonly', false);
                $('#nuevoFuncionario').val('');
            } else if ($('#idNuevaExtension').val() == null) {
                $('#nuevaExtension').prop('readonly', true);
                $('#nuevoFuncionario').prop('readonly', true);
                $('#nuevoFuncionario').val('');
            } else {
                $('#nuevaExtension').prop('readonly', true);
                $('#nuevoFuncionario').prop('readonly', true);
                $('#nuevoFuncionario').val(nombreTitular);
            }

        });

        $('#idNuevaArea').on('change', function() {

            if ($('#idNuevaArea').val() == "otro") {
                $('#nuevaArea').prop('readonly', false);

            } else if ($('#idNuevaArea').val() == null) {
                $('#nuevaArea').prop('readonly', true);

            } else {
                $('#nuevaArea').prop('readonly', true);

            }

        });

        $('#idNuevoPuesto').on('change', function() {

            if ($('#idNuevoPuesto').val() == "otro") {
                $('#nuevoPuesto').prop('readonly', false);
            } else if ($('#idNuevoPuesto').val() == null) {
                $('#nuevoPuesto').prop('readonly', true);
            } else {
                $('#nuevoPuesto').prop('readonly', true);
            }

        });

        $('#idNuevoTipoSolicitud').on('change', function() {

            if ($('#idNuevoTipoSolicitud').val() == "otro") {
                $('#nuevoTipoSolicitud').prop('readonly', false);
            } else if ($('#idNuevoTipoSolicitud').val() == null) {
                $('#nuevoTipoSolicitud').prop('readonly', true);
            } else {
                $('#nuevoTipoSolicitud').prop('readonly', true);
            }

        });

        $('#guardarNuevoDirectorio').on('click', function(e) {

            var idNuevaExtension = document.getElementById("idNuevaExtension").value;
            var nuevaExtension = document.getElementById("nuevaExtension").value;
            var nuevoFuncionario = document.getElementById("nuevoFuncionario").value;
            var idNuevaArea = document.getElementById("idNuevaArea").value;
            var nuevaArea = document.getElementById("nuevaArea").value;
            var idNuevoPuesto = document.getElementById("idNuevoPuesto").value;
            var nuevoPuesto = document.getElementById("nuevoPuesto").value;
            var idNuevoTipoSolicitud = document.getElementById("idNuevoTipoSolicitud").value;
            var nuevoTipoSolicitud = document.getElementById("nuevoTipoSolicitud").value;

            fetch(guardarDirectorioRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute(
                                'content')
                    },
                    body: JSON.stringify({
                        idNuevaExtension: idNuevaExtension,
                        nuevaExtension: nuevaExtension,
                        nuevoFuncionario: nuevoFuncionario,
                        idNuevaArea: idNuevaArea,
                        nuevaArea: nuevaArea,
                        idNuevoPuesto: idNuevoPuesto,
                        nuevoPuesto: nuevoPuesto,
                        idNuevoTipoSolicitud: idNuevoTipoSolicitud,
                        nuevoTipoSolicitud: nuevoTipoSolicitud,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Petición enviada correctamente:', data);
                    if (data.mensaje === "directorio guardado correctamente") {
                        Swal.fire({
                            icon: "success",
                            title: "Directorio registrado con éxito!",
                            showCancelButton: false,
                            confirmButtonText: `ACEPTAR`,
                            confirmButtonColor: "#7A1737",
                            cancelButtonText: `CANCELAR`,
                        }).then((result) => {

                            document.getElementById('idArea').dispatchEvent(new Event(
                                'change'));

                            document.getElementById('idArea').dispatchEvent(new Event(
                                'change'));

                            if ($("#idNuevaExtension").val() == "otro") {
                                $("#idExtension").append('<option value="' + data
                                    .idExtension + '">' + nuevaExtension + '</option>');
                                $("#idExtension").val(data.idExtension).trigger('change');
                            } else {

                                if ($("#idNuevaArea").val() == "otro") {

                                    /*document.getElementById('idArea').dispatchEvent(new Event('change'));
                                    $('#idArea').val(data.idArea).trigger('change');*/
                                    $("#idExtension").append('<option value="' + data
                                        .idExtension + '">' + $(
                                            "#idNuevaExtension option:selected")
                                        .text() + '</option>');
                                    $("#idExtension").val(data.idExtension).trigger(
                                        'change');

                                } else {
                                    $("#idExtension").val($("#idNuevaExtension").val())
                                        .trigger('change');

                                }
                            }

                            if (result.isConfirmed) {
                                Swal.close();
                                $("#modalAgregarDirectorio").modal('hide');
                            } else {
                                Swal.close();
                                $("#modalAgregarDirectorio").modal('hide');
                            }
                        });

                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "¡Error al guardar el directorio!",
                            text: "Ocurrió un error al guardar el directorio, por favor intente de nuevo o recargue la página",
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
                })
                .catch(error => {
                    console.error('Error al enviar la petición:', error);
                    //alert('Hubo un error al enviar la notificación');
                });
        });

        $('#idNuevaExtension').select2({
            dropdownParent: $('#modalAgregarDirectorio'),
            placeholder: "Selecciona una extensión",
            allowClear: true,
            language: {
                noResults: function() {
                    return "No hay resultados";
                },
                searching: function() {
                    return "Buscando..";
                }
            },
            width: '100%'
        }).val(null).trigger('change');

        $('#idNuevaArea').select2({
            dropdownParent: $('#modalAgregarDirectorio'),
            placeholder: "Selecciona una área",
            allowClear: true,
            language: {
                noResults: function() {
                    return "No hay resultados";
                },
                searching: function() {
                    return "Buscando..";
                }
            },
            width: '100%'
        }).val(null).trigger('change');

        $('#idNuevoPuesto').select2({
            dropdownParent: $('#modalAgregarDirectorio'),
            placeholder: "Selecciona un puesto",
            allowClear: true,
            language: {
                noResults: function() {
                    return "No hay resultados";
                },
                searching: function() {
                    return "Buscando..";
                }
            },
            width: '100%'
        }).val(null).trigger('change');

        $('#idNuevoTipoSolicitud').select2({
            dropdownParent: $('#modalAgregarDirectorio'),
            placeholder: "Selecciona un tipo de solicitud",
            allowClear: true,
            language: {
                noResults: function() {
                    return "No hay resultados";
                },
                searching: function() {
                    return "Buscando..";
                }
            },
            width: '100%'
        }).val(null).trigger('change');

    });
</script>
