<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalActivarUsuario{{ $usuario->id }}" tabindex="-1"
    aria-labelledby="modalActivarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalActivarUsuarioLabel">Activar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <h5 class="text-center">¿Estás seguro de activar el usuario: {{ $usuario->name }}?
                        </h5>
                        <h5 class="text-center" style="font-weight: normal">El usuario será habilitado nuevamente
                            para
                            acceder al sistema.</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="activarUsuario{{ $usuario->id }}">Activar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var btnEliminarUsuario = document.getElementById("activarUsuario" + {{ $usuario->id }});

    btnEliminarUsuario.addEventListener("click", function () {
        var idUsuarioRestore = "{{ $usuario->id }}";
        var nombreRestore = "{{ $usuario->name }}";

        fetch(restoreUsuario, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            },
            body: JSON.stringify({
                id: idUsuarioRestore,
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                if (data.message === "Usuario activado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Usuario activado con éxito!",
                        text: "El usuario: " + nombreRestore +
                            ", ya tiene acceso nuevamente al sistema",
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
                        title: "¡Error al eliminar el usuario!",
                        text: "Ocurrió un error al activar el acceso del usuario" +
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