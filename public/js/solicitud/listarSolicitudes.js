document.addEventListener('DOMContentLoaded', () => {
    const modalDetalle = document.getElementById('modalDetalle');
    modalDetalle.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const folio = button.getAttribute('data-folio');
        const nombre = button.getAttribute('data-nombre');
        const apellidoPaterno = button.getAttribute('data-apellido-paterno');
        const apellidoMaterno = button.getAttribute('data-apellido-materno');
        const tipoSolicitud = button.getAttribute('data-tipo-solicitud');
        const area = button.getAttribute('data-area');
        const prioridad = button.getAttribute('data-prioridad');
        const estatus = button.getAttribute('data-estatus');
        const correo = button.getAttribute('data-correo');
        const telefonoFijo = button.getAttribute('data-telefono-fijo');
        const telefonoCelular = button.getAttribute('data-telefono-celular');
        const descripcion = button.getAttribute('data-descripcion');
        const created_at = button.getAttribute('data-created-at');
        const diasTranscurridos = button.getAttribute('data-dias-transcurridos');
        const horaInicio = button.getAttribute('data-hora-inicio');
        const horaTermino = button.getAttribute('data-hora-termino');
        const duracion = button.getAttribute('data-duracion');
        const extension = button.getAttribute('data-extension');
        const usuario = button.getAttribute('data-usuario');

        document.getElementById('modalFolio').textContent = folio;
        document.getElementById('modalNombreCompleto').textContent = `${nombre} ${apellidoPaterno} ${apellidoMaterno}`;
        document.getElementById('modalTipoSolicitud').textContent = tipoSolicitud;
        document.getElementById('modalArea').textContent = area;
        document.getElementById('modalPrioridad').textContent = prioridad;

        const estatusElement = document.getElementById('modalEstatus');
        estatusElement.textContent = estatus;
        estatusElement.className = '';

        if (estatus === 'EN PROCESO') {
            estatusElement.classList.add('text-warning');
        } else if (estatus === 'TERMINADO') {
            estatusElement.classList.add('text-success');
        } else if (estatus === 'PENDIENTE') {
            estatusElement.classList.add('text-danger');
        }

        document.getElementById('modalCorreo').textContent = correo;
        document.getElementById('modalTelefonoFijo').textContent = telefonoFijo;
        document.getElementById('modalTelefonoCelular').textContent = telefonoCelular;
        document.getElementById('modalDescripcion').value = descripcion;
        document.getElementById('modalFecha').textContent = created_at;
        document.getElementById('modalDias').textContent = diasTranscurridos;
        if (modalHoraI && modalHoraT) {
            modalHoraI.textContent = horaInicio;
            modalHoraT.textContent = horaTermino;
        }
        document.getElementById('modalDuracion').textContent = duracion;
        document.getElementById('modalExtension').textContent = extension;
        document.getElementById('modalUsuario').textContent = usuario;


        //DATOS DE UBICACION
        var cct = (button.getAttribute('data-cct') || "").trim().toUpperCase();
        var nivel = (button.getAttribute('data-nivel') || "").trim().toUpperCase();
        var municipio = (button.getAttribute('data-municipio') || "").trim().toUpperCase();
        var localidad = (button.getAttribute('data-localidad') || "").trim().toUpperCase();
        var nombrePlantel = (button.getAttribute('data-nombrePlantel') || "").trim().toUpperCase();
        var nombreDirector = (button.getAttribute('data-nombre-director') || "").trim().toUpperCase();
        var direccionCct = (button.getAttribute('data-direccion') || "").trim().toUpperCase();

        function esVacio(valor) {
            return valor === "" || valor === "SIN ASIGNAR";
        }

        document.getElementById('modalCct').textContent = esVacio(cct) ? "" : cct;
        document.getElementById('modalNivel').textContent = esVacio(nivel) ? "" : nivel;
        document.getElementById('modalMunicipio').textContent = esVacio(municipio) ? "" : municipio;
        document.getElementById('modalLocalidad').textContent = esVacio(localidad) ? "" : localidad;
        document.getElementById('modalNombrePlantel').textContent = esVacio(nombrePlantel) ? "" : nombrePlantel;
        document.getElementById('modalNombreDirector').textContent = esVacio(nombreDirector) ? "" : nombreDirector;
        document.getElementById('modalDireccionCct').textContent = esVacio(direccionCct) ? "" : direccionCct;


        document.getElementById('modalMunicipio2').textContent = esVacio(municipio) ? "" : municipio;
        document.getElementById('modalLocalidad2').textContent = esVacio(localidad) ? "" : localidad;

        var divDatosUbicacion = document.getElementById('divDatosUbicacion');
        var divDatosMunicipio = document.getElementById('divDatosMunicipio');

        var divCct = document.getElementById('divCct');
        var divNivel = document.getElementById('divNivel');
        var divMunicipio = document.getElementById('divMunicipio');
        var divLocalidad = document.getElementById('divLocalidad');
        var divNombrePlantel = document.getElementById('divNombrePlantel');
        var divNombreDirector = document.getElementById('divNombreDirector');
        var divDireccionCct = document.getElementById('divDireccionCct');


        var divMunicipio2 = document.getElementById('divMunicipio2');
        var divLocalidad2 = document.getElementById('divLocalidad2');

        divDatosUbicacion.style.display = "none";
        divDatosMunicipio.style.display = "none";

        divCct.style.display = "none";
        divNivel.style.display = "none";
        divMunicipio.style.display = "none";
        divLocalidad.style.display = "none";
        divNombrePlantel.style.display = "none";
        divNombreDirector.style.display = "none";
        divDireccionCct.style.display = "none";

        divMunicipio2.style.display = "none";
        divLocalidad2.style.display = "none";

        if (
            esVacio(cct) && esVacio(nivel) && esVacio(municipio) && esVacio(localidad) &&
            esVacio(nombrePlantel) && esVacio(nombreDirector) && esVacio(direccionCct)
        ) {
            divDatosUbicacion.style.display = "none";
            divDatosMunicipio.style.display = "none";
        } else {


            // contar cuántos valores están llenos
            let camposLlenos = 0;
            if (!esVacio(cct)) camposLlenos++;
            if (!esVacio(nivel)) camposLlenos++;
            if (!esVacio(municipio)) camposLlenos++;
            if (!esVacio(localidad)) camposLlenos++;
            if (!esVacio(nombrePlantel)) camposLlenos++;
            if (!esVacio(nombreDirector)) camposLlenos++;
            if (!esVacio(direccionCct)) camposLlenos++;

            // si solo hay valores en municipio y localidad, mostrar solo esos dos
            if (!esVacio(municipio) && !esVacio(localidad) && camposLlenos === 2) {
                divDatosMunicipio.style.display = "block";
                divDatosUbicacion.style.display = "none";

                divMunicipio2.style.display = "flex";
                divLocalidad2.style.display = "flex";


            } else {
                divDatosMunicipio.style.display = "none";

                divDatosUbicacion.style.display = "block";
                // si hay otros datos además de municipio y localidad, mostrar todo
                if (!esVacio(municipio)) divMunicipio.style.display = "flex";
                if (!esVacio(localidad)) divLocalidad.style.display = "flex";
                if (!esVacio(cct)) divCct.style.display = "flex";
                if (!esVacio(nivel)) divNivel.style.display = "flex";
                if (!esVacio(nombrePlantel)) divNombrePlantel.style.display = "flex";
                if (!esVacio(nombreDirector)) divNombreDirector.style.display = "flex";
                if (!esVacio(direccionCct)) divDireccionCct.style.display = "flex";
            }
        }

    });
});

