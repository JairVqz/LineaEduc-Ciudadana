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
                    <div class="col-md-12">
                        <label for="idNuevaExtension" class="form-label" style="font-weight:bold">Extensión:</label>
                        <select name="idNuevaExtension" id="idNuevaExtension" class="form-select select2-bootstrap">
                            @foreach ($listaExtensiones as $data)
                                <option value="{{ $data->idExtensionCatalogo }}">
                                    {{ $data->extension }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>
                    <div class="col-md-12" id="divNuevaExtension" style="display: none">
                        <label for="nuevaExtension" class="form-label" style="font-weight:bold">Nueva
                            Extensión:</label>
                        <input type="number" name="nuevaExtension" id="nuevaExtension" class="form-control"
                            placeholder="">
                    </div>

                    <div class="col-md-12">
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
                    <div class="col-md-12" id="divNuevaArea" style="display: none">
                        <label for="nuevaArea" class="form-label" style="font-weight:bold">Nueva
                            Área:</label>
                        <input type="text" name="nuevaArea" id="nuevaArea" class="form-control" placeholder="">
                    </div>

                    <div class="col-md-12" id="divNuevoFuncionario">
                        <label for="nuevoFuncionario" class="form-label" style="font-weight:bold">Funcionario:</label>
                        <input type="text" name="nuevoFuncionario" id="nuevoFuncionario" class="form-control"
                            placeholder="">
                    </div>
                    <div class="col-md-12" id="divIdNuevoPuesto">
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
                    <div class="col-md-12" id="divNuevoPuesto" style="display: none">
                        <label for="nuevoPuesto" class="form-label" style="font-weight:bold">Nuevo Puesto:</label>
                        <input type="text" name="nuevoPuesto" id="nuevoPuesto" class="form-control" placeholder="">
                    </div>

                    <div class="col-md-12">
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
                    <div class="col-md-12" id="divNuevoTipoSolicitud" style="display: none">
                        <label for="nuevoTipoSolicitud" class="form-label" style="font-weight:bold">Nuevo tipo de
                            solicitud:</label>
                        <input type="text" name="nuevoTipoSolicitud" id="nuevoTipoSolicitud" class="form-control"
                            placeholder="">
                    </div>

                    {{-- <div class="col-md-12">
                        <label for="idNuevaPrioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                        <select name="idNuevaPrioridad" id="idNuevaPrioridad" class="form-select">
                            <option value="" hidden></option>
                            @foreach ($listaPrioridades as $data)
                                <option value="{{ $data->idPrioridad }}">
                                    {{ $data->prioridad }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode([
        'apiFetchExtensionAreas' => route('solicitud.fetchExtensionAreas'),
        'apiFetchAreaTipoSolicitudes' => route('solicitud.fetchAreaTipoSolicitudes'),
    ]); ?>

    const apiFetchExtensionAreas = window.Laravel.apiFetchExtensionAreas;
    const apiFetchAreaTipoSolicitudes = window.Laravel.apiFetchAreaTipoSolicitudes;

    //SELECTS DINÁMICOS EXTENSIÓN-ÁREA-TIPO_SOLICITUD_-PRIORIDAD
    $('#idNuevaExtension').on('change', function() {
        var idNuevaExtensionSeleccionada = this.value;

        if ($('#idNuevaExtension').val() == "otro") {
            $('#idNuevaArea').val('').trigger('change');
            $('#idNuevoTipoSolicitud').val('').trigger('change');

            $('#divNuevaExtension').css('display', 'block');
            $('#divNuevoFuncionario').css('display', 'block');
            $('#divIdNuevoPuesto').css('display', 'block');

            var banderaSeleccionarNuevaArea = false;
            fetchNuevaExtensionArea(idNuevaExtensionSeleccionada, banderaSeleccionarNuevaArea);

        } else if ($('#idNuevaExtension').val() == null) {

            $('#divNuevaExtension').css('display', 'none');
            $('#divNuevoFuncionario').css('display', 'none');
            $('#divIdNuevoPuesto').css('display', 'none');

            var banderaSeleccionarNuevaArea = false;
            fetchNuevaExtensionArea(idNuevaExtensionSeleccionada, banderaSeleccionarNuevaArea);
            $('#idNuevaArea').trigger('change');

        } else {
            $('#divNuevaExtension').css('display', 'none');
            document.getElementById("idNuevaArea").selectedIndex = -1;
            $('#idNuevaArea').trigger('change');
            document.getElementById("idNuevoTipoSolicitud").selectedIndex = -1;
            $('#idNuevoTipoSolicitud').trigger('change');

            var banderaSeleccionarNuevaArea = true;
            fetchNuevaExtensionArea(idNuevaExtensionSeleccionada, banderaSeleccionarNuevaArea);

        }

    });

    $('#idNuevaArea').on('change', function() {
        var idAreaSeleccionada = this.value;

        if ($('#idNuevaArea').val() == "otro") {

            $('#divNuevaArea').css('display', 'block');
            $('#divNuevoFuncionario').css('display', 'block');
            $("#nuevoFuncionario").val('');
            $('#divIdNuevoPuesto').css('display', 'block');
            document.getElementById("idNuevoPuesto").selectedIndex = -1;
            $('#idNuevoPuesto').trigger('change');


        } else if ($('#idNuevaArea').val() == null) {

            $('#divNuevaArea').css('display', 'none');
            $('#divNuevoFuncionario').css('display', 'none');
            $("#nuevoFuncionario").val('');
            $('#divIdNuevoPuesto').css('display', 'none');
            document.getElementById("idNuevoPuesto").selectedIndex = -1;
            $('#idNuevoPuesto').trigger('change');



        } else {
            $('#divNuevaArea').css('display', 'none');
            $('#divNuevoFuncionario').css('display', 'none');
            $('#divIdNuevoPuesto').css('display', 'none');
            document.getElementById("idNuevoTipoSolicitud").selectedIndex = -1;
            $('#idNuevoTipoSolicitud').trigger('change');
            fetchNuevaAreaTipoSolicitud(idAreaSeleccionada);
        }

    });

    $('#idNuevoPuesto').on('change', function() {

        if ($('#idNuevoPuesto').val() == "otro") {

            $('#divNuevoPuesto').css('display', 'block');


        } else if ($('#idNuevoPuesto').val() == null) {

            $('#divNuevoPuesto').css('display', 'block');


        } else {
            $('#divNuevoPuesto').css('display', 'none');

        }

    });

    $('#idNuevoTipoSolicitud').on('change', function() {

        if ($('#idNuevoTipoSolicitud').val() == "otro") {

            $('#divNuevoTipoSolicitud').css('display', 'block');

        } else if ($('#idNuevoTipoSolicitud').val() == null) {

            $('#divNuevoTipoSolicitud').css('display', 'block');


        } else {
            $('#divNuevoTipoSolicitud').css('display', 'none');

        }

    });

    function fetchNuevaExtensionArea(idExtensionSeleccionada, banderaSeleccionar) {

        $.ajax({
            url: apiFetchExtensionAreas,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                idExtension: idExtensionSeleccionada,
            },
            success: function(data) {
                $("#idNuevaArea").html('');
                $.each(data.extensionAreas, function(key, data) {
                    $("#idNuevaArea").append('<option value="' + data.idArea + '">' + data.area +
                        '</option>');

                    $("#nuevoFuncionario").val(data.nombreTitular);
                    $("#idNuevoPuesto").val(data.idPuesto).trigger('change');
                });
                $("#idNuevaArea").append('<option value="otro">Otra</option>');
                if (banderaSeleccionar == false) {
                    $('#idNuevaArea').val(null);
                }
                $('#idNuevaArea').trigger('change');
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar la petición:', error);

            }
        });

    }

    function fetchNuevaAreaTipoSolicitud(idAreaSeleccionada) {
        console.log("nuevaArea: " + idAreaSeleccionada);
        $.ajax({
            url: apiFetchAreaTipoSolicitudes,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                idArea: idAreaSeleccionada,
            },
            success: function(data) {
                $("#idNuevoTipoSolicitud").html('');
                $.each(data.areaTipoSolicitudes, function(key, data) {
                    $("#idNuevoTipoSolicitud").append('<option value="' + data.idTipoSolicitud +
                        '">' + data.tipoSolicitud + '</option>');
                });
                $("#idNuevoTipoSolicitud").append('<option value="otro">Otro</option>');
                $('#idNuevoTipoSolicitud').val(null);
                $('#idNuevoTipoSolicitud').trigger('change');
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar la petición:', error);

            }
        });
    }

    /*function fetchTipoSolicitudPrioridad(idTipoSolicitudSeleccionado){
        $.ajax({
            url: apiFetchTipoSolicitudPrioridad,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                idPrioridad: idTipoSolicitudSeleccionado,
            },
            success: function (data) {
                for (var i = 0; i < listaPrioridades.length; i++) {
                    if (listaPrioridades[i].idPrioridad === data.tipoSolicitudPrioridad[0].idPrioridad) {
                        document.getElementById('idPrioridad').selectedIndex = i;
                        document.getElementById('idPrioridad').dispatchEvent(new Event('change'));
                        break;
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al enviar la petición:', error);

            }
        });
    }*/

    $('#modalAgregarDirectorio').on('click', function(e) {

        if ($(e.target).parent().attr("data-dismiss")) {
            //console.log("by Corner X");
            reflejarValoresModalenFormulario();
        } else if ($(e.target).hasClass("btn-secondary")) {
            //console.log("by Close Button");
            reflejarValoresModalenFormulario();
        } else {
            //console.log("by Background Overlay");
        }

    });

    const modalNuevoDirectorio = document.getElementById("modalAgregarDirectorio");

    // Cierra el modal si se hace clic fuera del contenido
    window.addEventListener("click", (event) => {
        if (event.target === modalNuevoDirectorio) {
            //modalNuevoDirectorio.style.display = "none";
            console.log("cerrar clic fuera");
            reflejarValoresModalenFormulario();
        }
    });

    function reflejarValoresModalenFormulario() {

        if ($('#idNuevaExtension').val() == 'otro') {
            var textNuevaExtension = $('#nuevaExtension').val();
            var valueNuevaExtension = 'otro';

            $("#idExtension").append('<option value="otro">' + textNuevaExtension +
                '</option>');

            $('#idExtension option').filter(function() {
                return $(this).text() === textNuevaExtension && $(this).val() === 'otro';
            }).prop('selected', true);


        } else if ($('#idNuevaExtension').val() == null) {

        } else {
            var textNuevaExtension = Number($('#idNuevaExtension').find('option:selected').text());
            var valueNuevaExtension = $('#idNuevaExtension').val();

            $("#nuevaExtension").val(textNuevaExtension);

            $("#idExtension").val(valueNuevaExtension).trigger('change');
        }

        if ($('#idNuevaArea').val() == 'otro') {
            var textNuevaArea = $('#nuevaArea').val();
            var valueNuevaArea = 'otro';

            $("#idArea").append('<option value="otro">' + textNuevaArea +
                '</option>');

            $('#idArea option').filter(function() {
                return $(this).text() === textNuevaArea && $(this).val() === 'otro';
            }).prop('selected', true);

            $("#nombreTitular").val($("#nuevoFuncionario").val());
        }

        if ($('#idNuevoTipoSolicitud').val() == 'otro') {
            var textNuevoTipoSolicitud = $('#nuevoTipoSolicitud').val();
            var valueNuevoTipoSolicitud = 'otro';

            $("#idTipoSolicitud").append('<option value="otro">' + textNuevoTipoSolicitud +
                '</option>');

            $('#idTipoSolicitud option').filter(function() {
                return $(this).text() === textNuevoTipoSolicitud && $(this).val() === 'otro';
            }).prop('selected', true);

        } else {
            var selectedValue = $('#idNuevoTipoSolicitud').val();
            var textNuevoTipo = $('#idNuevoTipoSolicitud').find('option:selected').text();

            $("#idTipoSolicitud").append('<option value="' + selectedValue + '" selected>' + textNuevoTipo + '</option>');
        }

    };
</script>
