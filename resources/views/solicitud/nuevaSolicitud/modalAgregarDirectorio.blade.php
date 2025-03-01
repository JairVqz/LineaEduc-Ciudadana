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
                        <label for="idNuevaExtension" class="form-label"
                            style="font-weight:bold">Extensión:</label>
                        <select name="idNuevaExtension" id="idNuevaExtension" class="form-select select2-bootstrap"
                            required>
                            @foreach ($listaExtensiones as $data)
                                <option value="{{ $data->idExtensionCatalogo }}">
                                    {{ $data->extension }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="nuevaExtension" class="form-label" style="font-weight:bold">Nueva
                            Extensión:</label>
                        <input type="number" name="nuevaExtension" id="nuevaExtension"
                            class="form-control" placeholder="" readonly>
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
                    <div class="col-md-12" style="display: none">
                        <label for="nuevaArea" class="form-label" style="font-weight:bold">Nueva
                            Área:</label>
                        <input type="text" name="nuevaArea" id="nuevaArea" class="form-control"
                            placeholder="" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="idNuevoTipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                            Solicitud:</label>
                        <select name="idNuevoTipoSolicitud" id="idNuevoTipoSolicitud" class="form-select select2-bootstrap">
                            @foreach ($listaTiposSolicitud as $data)
                                <option value="{{ $data->idTipoSolicitud }}">
                                    {{ $data->tipoSolicitud }}
                                </option>
                            @endforeach
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-12" style="display: none">
                        <label for="nuevoTipoSolicitud" class="form-label"
                            style="font-weight:bold">Nuevo tipo de solicitud:</label>
                        <input type="text" name="nuevoTipoSolicitud" id="nuevoTipoSolicitud"
                            class="form-control" placeholder="" readonly>
                    </div>

                    <div class="col-md-12">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    //SELECTS DINÁMICOS EXTENSIÓN-ÁREA-TIPO_SOLICITUD_-PRIORIDAD
    $('#idExtension').on('change', function () {
        var idExtensionSeleccionada = this.value;
        console.log("Extension: "+idExtensionSeleccionada);

        if ($('#idExtension').val() == "otro"){
            
            var banderaSeleccionar = false;
            fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar);

        } else if ($('#idExtension').val() == null) {
            

            var banderaSeleccionar = false;
            fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar);
            $('#idArea').trigger('change');

        } else {
            $("#idArea").html('');
            $("#idTipoSolicitud").html('');

            var banderaSeleccionar = true;
            fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar);

    }

    });

    $('#idArea').on('change', function () {
        var idAreaSeleccionada = this.value;

        if ($('#idArea').val() == "otro"){
            

        } else if ($('#idArea').val() == null) {
           

        } else {
            $("#idTipoSolicitud").html('');
            fetchAreaTipoSolicitud(idAreaSeleccionada);
    }

    });

    $('#idTipoSolicitud').on('change', function () {
        var idTipoSolicitudSeleccionado = this.value;

        if ($('#idTipoSolicitud').val() == "otro"){
            

        } else if ($('#idTipoSolicitud').val() == null) {
            
        } else {

            fetchTipoSolicitudPrioridad(idTipoSolicitudSeleccionado);
            
        }

    });

    function fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar){

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
            success: function (data) {
                $("#idArea").html('');
                $.each(data.extensionAreas, function (key, data) {
                    $("#idArea").append('<option value="' + data.idArea + '">' + data.area + '</option>');

                    $("#nombreTitular").val(data.nombreTitular);
                });
                $("#idArea").append('<option value="otro">Otra</option>');
                if (banderaSeleccionar == false){
                    $('#idArea').val(null); 
                }
                $('#idArea').trigger('change');    
            },
            error: function (xhr, status, error) {
                console.error('Error al enviar la petición:', error);

            }
        });

    }

    function fetchAreaTipoSolicitud(idAreaSeleccionada){
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
            success: function (data) {
                $("#idTipoSolicitud").html('');
                $.each(data.areaTipoSolicitudes, function (key, data) {
                    $("#idTipoSolicitud").append('<option value="' + data.idTipoSolicitud + '">' + data.tipoSolicitud + '</option>');
                });
                $("#idTipoSolicitud").append('<option value="otro">Otro</option>');
                $('#idTipoSolicitud').val(null); 
                $('#idTipoSolicitud').trigger('change');
            },
            error: function (xhr, status, error) {
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

</script>
