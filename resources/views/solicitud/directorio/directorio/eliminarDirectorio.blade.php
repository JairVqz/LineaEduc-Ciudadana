

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalEliminarUsuario{{ $directorio->idExtensionCatalogo }}" tabindex="-1"
    aria-labelledby="modalEliminarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEliminarUsuarioLabel">Eliminar directorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <h5 class="text-center">¿Estás seguro de eliminar el directorio: {{ $directorio->extension }}?</h5>
                        <h5 class="text-center" style="font-weight: normal">El directorio será inhabilitado para
                            acceder al sistema.</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="eliminarDirectorio{{ $directorio->idExtensionCatalogo }}">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
        var btnEliminarDirectorio = document.getElementById("eliminarDirectorio" + {{ $directorio->idExtensionCatalogo }});

        btnEliminarDirectorio.addEventListener("click", function() {
        var idExtensionCatalogo = "{{ $directorio->idExtensionCatalogo }}";
        var extension = "{{ $directorio->extension }}";

        fetch(deleteDirectorio, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    idExtensionCatalogo: idExtensionCatalogo,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                if (data.message === "Directorio eliminado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Directorio eliminado con éxito!",
                        text: "El directorio: " + extension +
                            ", ya no aparecerá en el sistema",
                        showCancelButton: false,
                        confirmButtonText: `ACEPTAR`,
                        confirmButtonColor: "#7A1737",
                        cancelButtonText: `CANCELAR`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.close();
                            window.location.href = indexDirectorio;
                        } else {
                            Swal.close();
                            window.location.href = indexDirectorio;
                        }
                    });

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al eliminar el directorio!",
                        text: "Ocurrió un error al inhabilitar el acceso al directorio" +
                            nombreDelete + ", por favor intente de nuevo o recargue la página",
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


