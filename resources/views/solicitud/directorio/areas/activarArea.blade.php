
<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalActivarUsuario{{ $area->idArea }}" tabindex="-1"
    aria-labelledby="modalActivarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalActivarUsuarioLabel">Activar área</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <h5 class="text-center">¿Estás seguro de activar el área: {{ $area->area }}?</h5>
                        <h5 class="text-center" style="font-weight: normal">El área será habilitado nuevamente para
                            el sistema.</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="activarArea{{ $area->idArea }}">Activar</button>
            </div>
        </div>
    </div>
</div>

<script>
        var btnActivarArea = document.getElementById("activarArea" + {{ $area->idArea }});

        btnActivarArea.addEventListener("click", function() {
        var idArea = "{{ $area->idArea }}";
        var area = "{{ $area->area }}";

        fetch(restoreArea, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    idArea: idArea,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                if (data.message === "Área reactivada correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Área activada con éxito!",
                        text: "El área: " + area +
                            ", ya es nuevamente accesible en el sistema",
                        showCancelButton: false,
                        confirmButtonText: `ACEPTAR`,
                        confirmButtonColor: "#7A1737",
                        cancelButtonText: `CANCELAR`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.close();
                            window.location.href = indexArea;
                        } else {
                            Swal.close();
                            window.location.href = indexArea;
                        }
                    });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al reactivar el área!",
                        text: "Ocurrió un error al activar el área" +
                            nombreRestore + ", por favor intente de nuevo o recargue la página",
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
    })
</script>


