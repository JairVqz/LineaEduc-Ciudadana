<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }

    .modal-dialog {
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        max-width: 1040px;
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

<div class="modal fade" id="modalAgregarCatalogo" tabindex="-1" aria-labelledby="modalAgregarCatalogoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAgregarCatalogoLabel">Agregar Catálogo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2 mb-3 d-flex flex-column">
                        <label for="idExtension" class="form-label" style="font-weight:bold">Extensión:</label>
                        <select name="idExtension" id="idExtension" class="form-select select2-bootstrap" required>
                            @foreach ($listaExtensiones as $data)
                                <option value="{{ $data->idExtensionCatalogo }}">
                                    {{ $data->extension }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3 d-flex flex-column">
                        <label for="idArea" class="form-label" style="font-weight:bold">Área que
                            atiende:</label>
                        <select name="idArea" id="idArea" class="form-select select2-bootstrap" required>
                            @foreach ($listaAreas as $data)
                                <option value="{{ $data->idArea }}">
                                    {{ $data->area }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3 d-flex flex-column">
                        <label for="idTipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                            Solicitud:</label>
                        <select name="idTipoSolicitud" id="idTipoSolicitud" class="form-select select2-bootstrap"
                            required>
                            @foreach ($listaTiposSolicitud as $data)
                                <option value="{{ $data->idTipoSolicitud }}">
                                    {{ $data->tipoSolicitud }}
                                </option>
                            @endforeach
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3 d-flex flex-column">
                        <label for="idPrioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                        <select name="idPrioridad" id="idPrioridad" class="form-select select2-bootstrap" required>
                            @foreach ($listaPrioridades as $data)
                                <option value="{{ $data->idPrioridad }}">
                                    {{ $data->prioridad }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="nuevoDirectorio">
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color" id="guardarUsuario">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode([
        'guardarUsuario' => route('user.store'),
        'indexUsuario' => route('user.index'),
        'actualizarUsuario' => route('user.update'),
        'eliminarUsuario' => route('user.destroy'),
        'activarUsuario' => route('user.restore'),
    ]); ?>

    var btnGuardarUsuario = document.getElementById("guardarUsuario");

    const storeUser = window.Laravel.guardarUsuario;
    const indexUsuario = window.Laravel.indexUsuario;
    const updateUser = window.Laravel.actualizarUsuario;
    const deleteUser = window.Laravel.eliminarUsuario;
    const restoreUsuario = window.Laravel.activarUsuario;

    //SELECTS DINÁMICOS EXTENSIÓN-ÁREA-TIPO_SOLICITUD_-PRIORIDAD
    $('#idExtension').on('change', function () {
        var idExtensionSeleccionada = this.value;
        console.log("Extension: "+idExtensionSeleccionada);

        if ($('#idExtension').val() == "otro"){
            //Por Default los demás select están vacios o indice 0
            $("#idArea").html('');
            $("#idTipoSolicitud").html('');
            document.getElementById("idPrioridad").selectedIndex = -1;
            $('#idPrioridad').trigger('change');

            //Se habilita la sección para ingresar los valores de los nuevos catálogos y se quita que sean requeridos los select principales.
            $('#nuevosCatalogos').css("display", "block")
            $('#idExtension').prop('required',false);
            $('#idArea').prop('required',false);
            $('#idTipoSolicitud').prop('required',false);
            $('#idPrioridad').prop('required',false);
            $('#idPrioridad').trigger('change');
            
            //Se habilita y hacen requeridos los inputs de los nuevos catalogos
            $('#nuevaExtension').prop("readonly",false);
            $('#nuevaArea').prop("readonly",false);
            $('#nuevoTipoSolicitud').prop("readonly",false);
            $('#nuevaExtension').prop('required',true);
            $('#nuevaArea').prop('required',true);
            $('#nuevoTipoSolicitud').prop('required',true);

            //En caso de que previamente se hayan llenado y ocultado, se limpian de los valores que tengan anteriormente.
            $('#nuevaExtension').val('');
            $('#nuevaArea').val('');
            $('#nuevoTipoSolicitud').val('');
            document.getElementById("idNuevaPrioridad").selectedIndex = -1;
            $('#idNuevaPrioridad').trigger('change')

        } else if ($('#idExtension').val() == null) {
            console.log("entro a null");
            //Remover el valor que tengan asignado los inputs principales
            $("#idArea").html('');
            $("#idTipoSolicitud").html('');
            document.getElementById("idPrioridad").selectedIndex = -1;
            $('#idPrioridad').trigger('change');

            //Se habilitan como requeridos select principales y se quitan los de los nuevos catalogos.
            $('#idExtension').prop('required',true);
            $('#idArea').prop('required',true);
            $('#idTipoSolicitud').prop('required',true);
            $('#idPrioridad').prop('required',true);
            
            //Se regresan como solo lectura los inputs de los nuevos catálogos y se quitan como requeridos
            $('#nuevaExtension').prop("readonly",true);
            $('#nuevaArea').prop("readonly",true);
            $('#nuevoTipoSolicitud').prop("readonly",false);
            $('#nuevaExtension').prop('required',false);
            $('#nuevaArea').prop('required',false);
            $('#nuevoTipoSolicitud').prop('required',false);

            //Ocultar la sección de los nuevos catálogos y remover el valor que tengan asignado los inputs de la seccioón
            $('#nuevosCatalogos').css("display", "none")
            $('#nuevaExtension').val('');
            $('#nuevaArea').val('');
            $('#nuevoTipoSolicitud').val('');
            document.getElementById("idNuevaPrioridad").selectedIndex = -1;
            $('#idNuevaPrioridad').trigger('change');

        } else {
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
                $.each(data.extensionAreas, function (key, data) {
                    $("#idArea").append('<option value="' + data.idArea + '">' + data.area + '</option>');
                });
                $("#idArea").append('<option value="otro">OTRA</option>');
                $('#idArea').trigger('change');
            },
            error: function (xhr, status, error) {
                console.error('Error al enviar la petición:', error);

            }
        });

    }

    });

    $('#idArea').on('change', function () {
        var idAreaSeleccionada = this.value;

        if ($('#idArea').val() == "otro"){
            //Por Default los demás select están vacios o indice 0
            $("#idTipoSolicitud").html('');
            document.getElementById("idPrioridad").selectedIndex = -1;
            $('#idPrioridad').trigger('change');

            //Se habilita la sección para ingresar los valores de los nuevos catálogos y se refleja el valor de la extension seleccionada
            $('#nuevosCatalogos').css("display", "block")
            var valorExtension = Number($('#idExtension').find('option:selected').text());
            $('#nuevaExtension').val(valorExtension);

            //Se quitan que se sean requeridos los select principales
            $('#idArea').prop('required',false);
            $('#idTipoSolicitud').prop('required',false);
            $('#idPrioridad').prop('required',false);

            //Se habilita y hacen requeridos los inputs de los nuevos catalogos
            $('#nuevaArea').prop("readonly",false);
            $('#nuevoTipoSolicitud').prop("readonly",false);
            $('#nuevaArea').prop('required',true);
            $('#nuevoTipoSolicitud').prop('required',true);

        } else if ($('#idArea').val() == null) {
            //Remover el valor de los inputs principales
            $("#idTipoSolicitud").html('');
            document.getElementById("idPrioridad").selectedIndex = -1;
            $('#idPrioridad').trigger('change');

            //Remover el valor de los inputs de los nuevos catálogos
            $('#nuevaArea').val('');
            $('#nuevoTipoSolicitud').val('');
            document.getElementById("idNuevaPrioridad").selectedIndex = -1;
            $('#idNuevaPrioridad').trigger('change');
        } else {

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
                $.each(data.areaTipoSolicitudes, function (key, data) {
                    $("#idTipoSolicitud").append('<option value="' + data.idTipoSolicitud + '">' + data.tipoSolicitud + '</option>');
                });
                $("#idTipoSolicitud").append('<option value="otro">OTRA</option>');
                $('#idTipoSolicitud').trigger('change');
            },
            error: function (xhr, status, error) {
                console.error('Error al enviar la petición:', error);

            }
        });
    }

    });

    $('#idTipoSolicitud').on('change', function () {
        var idTipoSolicitudSeleccionado = this.value;

        if ($('#idTipoSolicitud').val() == "otro"){
            //Por Default los demás select están vacios o indice 0
            document.getElementById("idPrioridad").selectedIndex = -1;
            $('#idPrioridad').trigger('change');

            /*Se habilita la sección para ingresar los valores de los nuevos catálogos y se 
            refleja el valor de la extension y área seleccionada*/
            $('#nuevosCatalogos').css("display", "block");
            var valorExtension = Number($('#idExtension').find('option:selected').text());
            var valorArea = $('#idArea').find('option:selected').text();
            $('#nuevaExtension').val(valorExtension);
            $('#nuevaArea').val(valorArea);

            //Se quitan que se sean requeridos los select principales
            $('#idTipoSolicitud').prop('required',false);
            $('#idPrioridad').prop('required',false);

            //Se habilita y hacen requeridos los inputs de los nuevos catalogos            
            $('#nuevoTipoSolicitud').prop("readonly",false);
            $('#nuevoTipoSolicitud').prop('required',true);

        } else if ($('#idTipoSolicitud').val() == null) {
            //Remover el valor de los inputs principales
            document.getElementById("idPrioridad").selectedIndex = -1;
            $('#idPrioridad').trigger('change');

            //Remover el valor de los inputs de los nuevos catálogos
            document.getElementById("idNuevaPrioridad").selectedIndex = -1;
            $('#idNuevaPrioridad').trigger('change');
        } else {

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
        }

    });

    btnGuardarUsuario.addEventListener("click", function() {
        var nombre = document.getElementById("nombre").value;
        var curp = document.getElementById("curp").value;
        var email = document.getElementById("email").value;
        var rol = document.getElementById("rol").value;
        var idArea = document.getElementById("idArea").value;

        fetch(storeUser, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    nombre: nombre,
                    curp: curp,
                    email: email,
                    rol: rol,
                    idArea: idArea,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Usuario registrado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Usuario registrado con éxito!",
                        text: "El usuario: " + nombre +
                            ", se ha registrado correctamente con el rol: " + rol +
                            ".\n Ya puede iniciar y hacer uso del sistema",
                        showCancelButton: false,
                        confirmButtonText: `ACEPTAR`,
                        confirmButtonColor: "#7A1737",
                        cancelButtonText: `CANCELAR`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.close();
                            window.location.href = indexUsuario;
                        } else {
                            Swal.close();
                            window.location.href = indexUsuario;
                        }
                    });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al registrar el usuario!",
                        text: "Ocurrió un error al guardar el usuario, por favor intente de nuevo o recargue la página",
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

    $('#idExtension').select2({
        dropdownParent: $('#modalAgregarCatalogo'),
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
        dropdownParent: $('#modalAgregarCatalogo'),
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
        dropdownParent: $('#modalAgregarCatalogo'),
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
        dropdownParent: $('#modalAgregarCatalogo'),
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
</script>
