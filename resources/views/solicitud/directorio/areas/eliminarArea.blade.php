

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalEliminarUsuario{{ $area->idArea }}" tabindex="-1"
    aria-labelledby="modalEliminarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEliminarUsuarioLabel">Eliminar área</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <h5 class="text-center">¿Estás seguro de eliminar el área: {{ $area->area }}?</h5>
                        <h5 class="text-center" style="font-weight: normal">El área estará inhabilitado para
                            el sistema.</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="eliminarArea{{ $area->idArea }}">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
        var btneliminarArea = document.getElementById("eliminarArea" + {{ $area->idArea }});

        btneliminarArea.addEventListener("click", function() {
        var idArea = "{{ $area->idArea }}";
        var area = "{{ $area->area }}";

        fetch(deleteArea, {
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
                if (data.message === "Área eliminada correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Área eliminada con éxito!",
                        text: "El área: " + area +
                            ", ya no será accesible para el sistema",
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
                        title: "¡Error al eliminar el área!",
                        text: "Ocurrió un error al inhabilitar el área" +
                            area + ", por favor intente de nuevo o recargue la página",
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
                console.error('Error al enviar la petición:', body);
                //alert('Hubo un error al enviar la notificación');
            });
    })
</script>


