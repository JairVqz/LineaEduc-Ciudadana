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
        const cct = button.getAttribute('data-cct');
        const municipio = button.getAttribute('data-municipio');
        const localidad = button.getAttribute('data-localidad');
        const direccionCct = button.getAttribute('data-direccion');
        const nombreDirector = button.getAttribute('data-nombre-director');
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
        const nombrePlantel = button.getAttribute('data-nombrePlantel');
        const nivel = button.getAttribute('data-nivel');


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

        document.getElementById('modalCct').textContent = cct;
        document.getElementById('modalMunicipio').textContent = municipio;
        document.getElementById('modalLocalidad').textContent = localidad;
        document.getElementById('modalDireccionCct').textContent = direccionCct;
        document.getElementById('modalNombreDirector').textContent = nombreDirector;
        document.getElementById('modalCorreo').textContent = correo;
        document.getElementById('modalTelefonoFijo').textContent = telefonoFijo;
        document.getElementById('modalTelefonoCelular').textContent = telefonoCelular;
        document.getElementById('modalDescripcion').value = descripcion;
        document.getElementById('modalFecha').textContent=created_at;
        document.getElementById('modalDias').textContent=diasTranscurridos;
        if (modalHoraI && modalHoraT) {
            modalHoraI.textContent = horaInicio;
            modalHoraT.textContent = horaTermino;
        }
        document.getElementById('modalDuracion').textContent=duracion;
        document.getElementById('modalExtension').textContent = extension;
        document.getElementById('modalNombrePlantel').textContent = nombrePlantel;
        document.getElementById('modalNivel').textContent = nivel;


    });
});
