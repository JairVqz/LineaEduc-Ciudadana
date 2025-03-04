document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('datosUbicacion').style.display = 'none';

    const guardarSolicitudRoute = window.Laravel.guardarSolicitud;
    const listarSolicitudesRoute = '/index.php/solicitud/index';
    const apiPlantel = window.Laravel.apiPlantel;
    const apiFetchExtensionAreas = window.Laravel.apiFetchExtensionAreas;
    const apiFetchAreaTipoSolicitudes = window.Laravel.apiFetchAreaTipoSolicitudes;
    const apiFetchTipoSolicitudPrioridad = window.Laravel.apiFetchTipoSolicitudPrioridad;

    let now = new Date();

    const fechaInicio = now.getDate().toString().padStart(2, '0') + "/" + (now.getMonth() + 1).toString().padStart(2, '0') + "/" + now.getFullYear();
    const horaInicio = now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0') + ":" + now.getSeconds().toString().padStart(2, '0');

    document.getElementById("fechaSolicitud").value = fechaInicio;
    document.getElementById("horaSolicitud").value = horaInicio;
    document.getElementById("horaInicio").value = horaInicio;

    var inputNombre = document.getElementById("nombre");
    var inputApellidoPaterno = document.getElementById("apellidoPaterno");
    var inputApellidoMaterno = document.getElementById("apellidoMaterno");

    //FUNCIÓN PARA VALIDAR EL VALOR DE ENTRADA DEL CAMPO NOMBRE, APELLIDO PATERNO Y APELLIDO MATERNO
    inputNombre.addEventListener('keypress', validarCaracterInput);
    inputApellidoPaterno.addEventListener('keypress', validarCaracterInput);
    inputApellidoMaterno.addEventListener('keypress', validarCaracterInput);

    function validarCaracterInput(event) {
        var regex = /^[A-Za-zÁáÉéÍíÓóÚúÑñ' ]+$/;

        const tecla = String.fromCharCode(event.which || event.keyCode);

        if (!regex.test(tecla)) {
            event.preventDefault();
        }
    }

    //SELECTS DINÁMICOS EXTENSIÓN-ÁREA-TIPO_SOLICITUD_-PRIORIDAD
    $('#idExtension').on('change', function () {
        var idExtensionSeleccionada = this.value;
        console.log("Extension: "+idExtensionSeleccionada);

        if ($('#idExtension').val() == "otro"){
            //Por Default los demás select están vacios o indice 0
            $('#idArea').val(null);
            $("#idTipoSolicitud").html('');
            $("#idArea").trigger('change');
            $("#idTipoSolicitud").trigger('change');
            document.getElementById("idNuevoPuesto").selectedIndex = -1;
            $('#idNuevoPuesto').trigger('change');

            //Se muestra el modal para ingresar los valores del nuevo directorio.
            $('#modalAgregarDirectorio').modal('show');

            //En caso de que previamente se hayan llenado y ocultado, se limpian de los valores que tengan anteriormente.
            $('#nuevaExtension').val('');
            $('#nuevaArea').val('');
            $('#nuevoTipoSolicitud').val('');
            $('#idNuevaExtension').val('').trigger('change');
            $('#idNuevaArea').val('').trigger('change');
            $('#idNuevoTipoSolicitud').val('').trigger('change');
            $('#idNuevaPrioridad').val('').trigger('change');
            //document.getElementById("idNuevaPrioridad").selectedIndex = -1;
            //$('#idNuevaPrioridad').trigger('change');

            $("#nombreTitular").val('');

            var banderaSeleccionar = false;
            fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar);

        } else if ($('#idExtension').val() == null) {
            console.log("entro a null");
            //Remover el valor que tengan asignado los inputs principales
            $("#idTipoSolicitud").html('');
            $("#nombreTitular").val('');
            $("#idTipoSolicitud").trigger('change');
            $('#idArea').val(null);
            $("#idTipoSolicitud").html('');
            $("#idArea").trigger('change');
            $("#idTipoSolicitud").trigger('change');
            //document.getElementById("idPrioridad").selectedIndex = -1;
            //$('#idPrioridad').trigger('change');

            //Ocultar la sección de los nuevos catálogos y remover el valor que tengan asignado los inputs de la seccioón
            //$('#nuevosCatalogos').css("display", "none")
            $('#nuevaExtension').val('');
            $('#nuevaArea').val('');
            $('#nuevoTipoSolicitud').val('');
            $('#idNuevaExtension').val('').trigger('change');
            $('#idNuevaArea').val('').trigger('change');
            $('#idNuevoTipoSolicitud').val('').trigger('change');
            $('#idNuevaPrioridad').val('').trigger('change');
            //document.getElementById("idNuevaPrioridad").selectedIndex = -1;
            //$('#idNuevaPrioridad').trigger('change');

            var banderaSeleccionar = false;
            fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar);
            $('#idArea').trigger('change');

        } else {
            $("#idArea").html('');
            $("#idTipoSolicitud").html('');

            var extensionSeleccionada = $('#idExtension').find('option:selected');
            var idPuesto = extensionSeleccionada.data('idpuesto');
            $('#idNuevoPuesto').val(idPuesto).trigger('change');

            var banderaSeleccionar = true;
            fetchExtensionArea(idExtensionSeleccionada, banderaSeleccionar);

    }

    });

    $('#idArea').on('change', function () {
        var idAreaSeleccionada = this.value;

        if ($('#idArea').val() == "otro"){

            $("#idTipoSolicitud").html('');
            document.getElementById("idNuevoTipoSolicitud").selectedIndex = -1;
            $('#idNuevoTipoSolicitud').trigger('change');

            if ($('#idExtension').val() != null) {
                var indexExtension = $('#idExtension').val();
                $('#idNuevaExtension').val(indexExtension).trigger('change');
            }

            $('#modalAgregarDirectorio').modal('show');

        } else if ($('#idArea').val() == null) {

            $("#idTipoSolicitud").html('');


        } else {
            $("#idTipoSolicitud").html('');
            fetchAreaTipoSolicitud(idAreaSeleccionada);
    }

    });

    $('#idTipoSolicitud').on('change', function () {

        if ($('#idTipoSolicitud').val() == "otro"){

            document.getElementById("idNuevoTipoSolicitud").selectedIndex = -1;
            $('#idNuevoTipoSolicitud').trigger('change');

            if ($('#idExtension').val() != null){
                var indexExtension = $('#idExtension').val();
                $('#idNuevaExtension').val(indexExtension).trigger('change');
            }

            if ($('#idArea').val() != null){
                var indexArea = $('#idArea').val();
                $('#idNuevaArea').val(indexArea).trigger('change');
            }

            $('#modalAgregarDirectorio').modal('show');

        } else if ($('#idTipoSolicitud').val() == null) {

        } else {

            //fetchTipoSolicitudPrioridad(idTipoSolicitudSeleccionado);

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

    $('#municipio').on('change', function () {
        var municipioSeleccionado = $(this).find('option:selected').text();

        if (municipioSeleccionado === "Selecciona el municipio") {
            municipioSeleccionado = "";
        }
        document.getElementById("nombreMunicipio").value = municipioSeleccionado;
    });

    $('#localidad').on('change', function () {
        var localidadSeleccionada = $(this).find('option:selected').text();

        if (localidadSeleccionada === "Selecciona la localidad") {
            localidadSeleccionada = "";
        }
        document.getElementById("nombreLocalidad").value = localidadSeleccionada;
    });

    //LIMPIAR FORMULARIO
    var btnLimpiarFormulario = document.getElementById("btnLimpiarFormulario");

    btnLimpiarFormulario.addEventListener('click', function () {
        document.getElementById("nombre").value = "";
        document.getElementById("apellidoPaterno").value = "";
        document.getElementById("apellidoMaterno").value = "";
        document.getElementById("correo").value = "";
        document.getElementById("telefonoFijo").value = "";
        document.getElementById("telefonoCelular").value = "";
        document.getElementById("idTipoSolicitud").selectedIndex = 0;
        document.getElementById("idArea").selectedIndex = 0;
        document.getElementById("idPrioridad").selectedIndex = 0;
        document.getElementById("descripcion").value = "";
        document.getElementById("cct").value = "";
        document.getElementById("nivelCct").value = "";
        document.getElementById("municipio").selectedIndex = 0;
        document.getElementById("nombreMunicipio").value = "";
        document.getElementById("localidad").selectedIndex = 0;
        document.getElementById("nombreLocalidad").value = "";
        document.getElementById("nombreCct").value = "";
        document.getElementById("nombreDirector").value = "";
        document.getElementById("direccionCct").value = "";
        document.getElementById("extension").value = "";
        document.getElementById("areaSolicitante").value = "";
    });

    //CERRAR EL MODAL BUSQUEDA CCT Y REFLEJAR EL CCT SELECCIONADO EN EL FORMULARIO PRINCIPAL
    $('#modalBuscadorCct').on('hidden.bs.modal', function () {
        var cctSeleccionado = localStorage.getItem('cctLocalizado');
        document.getElementById("cct").value = cctSeleccionado;
        $('#cct').trigger('change');
    });

    //GESTIONAR EL GUARDADO DE LOS DATOS DE UBICACIÓN
    $('#datosUbicacionSelector input').on('click', function () {
        if (this.id === 'datosCct') {

            document.getElementById('datosUbicacion').style.display = 'block';
            document.getElementById('divBuscadorCct').style.display = 'block';
            document.getElementById('divCct').style.display = 'block';
            document.getElementById('divNivelCct').style.display = 'block';
            document.getElementById('divNombreCct').style.display = 'block';
            document.getElementById('divMunicipio').style.display = 'block';
            document.getElementById('divLocalidad').style.display = 'block';
            document.getElementById('divNombreDirector').style.display = 'block';
            document.getElementById('divDireccionCct').style.display = 'block';

        } else if (this.id === 'snUbicacion') {

            document.getElementById('datosUbicacion').style.display = 'none';
            document.getElementById('divBuscadorCct').style.display = 'none';
            document.getElementById('divCct').style.display = 'none';
            document.getElementById('divNivelCct').style.display = 'none';
            document.getElementById('divNombreCct').style.display = 'none';
            document.getElementById('divMunicipio').style.display = 'none';
            document.getElementById('divLocalidad').style.display = 'none';
            document.getElementById('divNombreDirector').style.display = 'none';
            document.getElementById('divDireccionCct').style.display = 'none';
        } else if (this.id === 'mpioLoc') {

            document.getElementById('datosUbicacion').style.display = 'block';
            document.getElementById('divBuscadorCct').style.display = 'none';
            document.getElementById('divCct').style.display = 'none';
            document.getElementById('divNivelCct').style.display = 'none';
            document.getElementById('divNombreCct').style.display = 'none';
            document.getElementById('divMunicipio').style.display = 'block';
            document.getElementById('divLocalidad').style.display = 'block';
            document.getElementById('divNombreDirector').style.display = 'none';
            document.getElementById('divDireccionCct').style.display = 'none';
        }
    });

    document.getElementById('curpUsuario').value = localStorage.getItem('curpSEV');
    document.getElementById('usuario').value = localStorage.getItem('nombreSEV');

    let isProcessing = false;

    $('#cct').on('input change', function () {
        if (isProcessing) return; //evitar que se dispare el evento 2 veces
        isProcessing = true;

        var parametro = $(this).val();

        if (parametro === "") {
            //$('#resultadoApi').html("");
            document.getElementById("nivelCct").value = "";
            document.getElementById("municipio").selectedIndex = 0;
            document.getElementById("nombreMunicipio").value = "";
            document.getElementById("localidad").selectedIndex = 0;
            document.getElementById("nombreLocalidad").value = "";
            document.getElementById("nombreCct").value = "";
            document.getElementById("nombreDirector").value = "";
            document.getElementById("direccionCct").value = "";
            isProcessing = false;
            return;
        }

        $.ajax({
            url: apiPlantel,
            type: 'GET',
            data: {
                param: parametro
            },
            success: function (response) {

                if (!response ||
                    !response['Ubicacion'] ||
                    !response['Municipio'] ||
                    !response['Localidad'] ||
                    !response['Director'] ||
                    !response['Nombre']) {

                    document.getElementById("nivelCct").value = "";
                    document.getElementById("municipio").selectedIndex = 0;
                    document.getElementById("nombreMunicipio").value = "";
                    document.getElementById("localidad").selectedIndex = 0;
                    document.getElementById("nombreLocalidad").value = "";
                    document.getElementById("nombreDirector").value = "";
                    document.getElementById("nombreCct").value = "";
                    document.getElementById("direccionCct").value = "";

                    /*$('#resultadoApi').html(
                        '<p style="color:red;">No se encontraron datos para el CCT proporcionado.</p>'
                    );*/
                    return;
                }

                var callePrincipal = response['Ubicacion']['Domicilio'];
                var numeroExterno = response['Ubicacion']['NumeroExterno'];

                if (numeroExterno == "" || numeroExterno == null) {
                    numeroExterno = "S/N";
                }

                var colonia = response['Ubicacion']['Colonia'];
                var delegacion = response['Ubicacion']['Delegacion'];
                var codigoPostal = response['Ubicacion']['CodigoPostal'];

                var municipioPlantel = response['Municipio']['Descripcion'];
                var localidadPlantel = response['Localidad']['Descripcion'];

                var nombreCct = response['Nombre'];
                var nivelCct = response['NivelEducativo']['Nivel'];
                var nombreDirector = response['Director']['Nombre'];
                var apellidoPaternoDirector = response['Director']['Apellido1'];
                var apellidoMaternoDirector = response['Director']['Apellido2'];

                listarUbicacion();

                function listarUbicacion() {
                    var selectMunicipio = document.getElementById("municipio");
                    var municipioFound = false;
                    var selectLocalidad = document.getElementById("localidad");
                    var localidadFound = false;

                    async function listarMunicipios() {
                        for (var i = 0; i < selectMunicipio.options.length; i++) {
                            if (selectMunicipio.options[i].text.toLowerCase() === municipioPlantel.toLowerCase()) {
                                selectMunicipio.selectedIndex = i;
                                document.getElementById("nombreMunicipio").value = selectMunicipio.options[i].text;
                                municipioFound = true;
                                $('#municipio').trigger('change');
                                break;
                            }
                        }
                    }

                    async function listarLocalidades() {
                        await listarMunicipios();

                        setTimeout(function () {

                            for (var i = 0; i < selectLocalidad.options.length; i++) {
                                if (selectLocalidad.options[i].innerText.toLowerCase() === localidadPlantel.toLowerCase()) {
                                    selectLocalidad.selectedIndex = i;
                                    selectLocalidad.dispatchEvent(new Event('change'));
                                    document.getElementById("nombreLocalidad").value = selectLocalidad.options[i].innerText;
                                    localidadFound = true;
                                    break;
                                }
                            }
                        }, 500);
                    }

                    listarLocalidades();
                }

                document.getElementById("nombreCct").value = nombreCct;
                document.getElementById("nivelCct").value = nivelCct;
                document.getElementById("nombreDirector").value = nombreDirector + " " +
                    apellidoPaternoDirector + " " + apellidoMaternoDirector;

                document.getElementById("direccionCct").value = callePrincipal + " #" +
                    numeroExterno + " COL. " + colonia + ", " + delegacion + ", C.P " +
                    codigoPostal;

                //$('#resultadoApi').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');
            },
            error: function () {
                //$('#resultadoApi').html('<p style="color:red;">Hubo un error al consumir la API</p>');
            }
        });
        setTimeout(function () {
            isProcessing = false;
        }, 200);
    });

    //Modal Guardado exitoso o error
    $('#formularioRegistrarSolicitud').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        console.log(formData);

        var correo = document.getElementById("correo").value;
        var telefonoFijo = document.getElementById("telefonoFijo").value;
        var telefonoCelular = document.getElementById("telefonoCelular").value;

        if ((correo === null || correo === "") && (telefonoFijo === null || telefonoFijo === "") && (telefonoCelular === null || telefonoCelular === "")) {
            Swal.fire({
                icon: "warning",
                title: "¡Faltan datos de contacto!",
                text: "Es necesario proporcionar al menos 1 medio de contacto",
                showCancelButton: false,
                confirmButtonText: `ACEPTAR`,
                confirmButtonColor: "#7A1737",
                cancelButtonText: `CANCELAR`,
            });

            return false;
        }

        //VALIDAR ERROR EN CAMPOS NÚMEROS DE TELÉFONO
        var banderaErrorTelefonoFijo = false;
        var banderaErrorTelefonoCelular = false;

        if (telefonoFijo.length !== 0 && telefonoFijo.length !== 10) {
            banderaErrorTelefonoFijo = true;
        }
        if (telefonoCelular.length !== 0 && telefonoCelular.length !== 10) {
            banderaErrorTelefonoCelular = true;
        }

        if (banderaErrorTelefonoFijo !== false && banderaErrorTelefonoCelular !== false) {
            document.getElementById("errorTelefonoFijo").style.display = "block";
            document.getElementById("errorTelefonoCelular").style.display = "block";

            setTimeout(() => {
                document.getElementById("errorTelefonoFijo").style.display = "none";
                document.getElementById("errorTelefonoCelular").style.display = "none";
            }, 3000);

            return false;
        } else if (banderaErrorTelefonoFijo !== false && banderaErrorTelefonoCelular === false) {
            document.getElementById("errorTelefonoFijo").style.display = "block";

            setTimeout(() => {
                document.getElementById("errorTelefonoFijo").style.display = "none";
            }, 3000);
            return false;
        } else if (banderaErrorTelefonoFijo === false && banderaErrorTelefonoCelular !== false) {
            document.getElementById("errorTelefonoCelular").style.display = "block";

            setTimeout(() => {
                document.getElementById("errorTelefonoCelular").style.display = "none";
            }, 3000);
            return false;
        }

        $.ajax({
            url: guardarSolicitudRoute,
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.mensaje === "Solicitud guardada correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Solicitud registrada con éxito!",
                        text: "Folio de seguimiento: " + response.folio,
                        showCancelButton: false,
                        confirmButtonText: `ACEPTAR`,
                        confirmButtonColor: "#7A1737",
                        cancelButtonText: `CANCELAR`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.close();
                            window.location.href = listarSolicitudesRoute;
                        } else {
                            Swal.close();
                            window.location.href = listarSolicitudesRoute;
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al registrar la solicitud!",
                        text: "Ocurrió un error al guardar la solicitud, por favor intente de nuevo o recargue la página",
                        showCancelButton: false,
                        confirmButtonText: `ACEPTAR`,
                        confirmButtonColor: "#7A1737",
                        cancelButtonText: `CANCELAR`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.close();
                        } else {
                            Swal.close();
                        }
                    });
                }

                $('#mensajeModal').text(response.mensaje);
                $('#staticBackdrop').show();
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "¡Error al registrar la solicitud!",
                    text: "Intente nuevamente guardar la solicitud, si el problema persiste contacte al administrador.",
                    showCancelButton: false,
                    confirmButtonText: `ACEPTAR`,
                    confirmButtonColor: "#7A1737",
                    cancelButtonText: `CANCELAR`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.close();
                    } else {
                        Swal.close();
                    }
                });

                $('#mensajeModal').text(xhr.responseJSON.mensaje);
                $('#staticBackdrop').show();
            }
        });

    });

});
