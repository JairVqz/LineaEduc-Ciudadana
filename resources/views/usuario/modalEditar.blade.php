<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/config.js"></script>

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalEditarUsuario{{ $usuario->id }}" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarUsuarioLabel">Editar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="nombre{{ $usuario->id }}" class="form-label">Nombre:</label>
                        <input type="text" name="nombre{{ $usuario->id }}" id="nombre{{ $usuario->id }}" value="{{ $usuario->name }}"
                            class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="curp{{ $usuario->id }}" class="form-label">CURP:</label>
                        <input type="text" name="curp{{ $usuario->id }}" id="curp{{ $usuario->id }}" value="{{ $usuario->curp }}"
                            class="form-control" placeholder="" style="text-transform:uppercase" required>
                    </div>

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="email{{ $usuario->id }}" class="form-label">Email:</label>
                        <input type="email" name="email{{ $usuario->id }}" id="email{{ $usuario->id }}" value="{{ $usuario->email }}"
                            class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="rol{{ $usuario->id }}" class="form-label">Rol:</label>
                        <select name="rol{{ $usuario->id }}" id="rol{{ $usuario->id }}" class="form-select" required>
                            <option value="{{ $usuario->rol }}">{{ $usuario->rol }}</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Revisor">Revisor</option>
                            <option value="Capturista">Capturista</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="idArea{{ $usuario->id }}" class="form-label">Área a la que pertenece:</label>
                        <select name="idArea{{ $usuario->id }}" id="idArea{{ $usuario->id }}" class="form-select">
                            <option value="{{ $usuario->idArea }}">{{ $usuario->area }}</option>
                            @foreach ($listaAreas as $data)
                                <option value="{{ $data->idArea }}">
                                    {{ $data->area }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="actualizarUsuario{{ $usuario->id }}">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>

    var btnActualizarUsuario = document.getElementById("actualizarUsuario" + {{ $usuario->id }});

    btnActualizarUsuario.addEventListener("click", function() {
        var idUsuario = {{ $usuario->id }};
        var nombreUpdate = document.getElementById("nombre"+ {{ $usuario->id }}).value;
        var curpUpdate = document.getElementById("curp"+ {{ $usuario->id }}).value;
        var emailUpdate = document.getElementById("email"+ {{ $usuario->id }}).value;
        var rolUpdate = document.getElementById("rol"+ {{ $usuario->id }}).value;
        var idAreaUpdate = document.getElementById("idArea"+ {{ $usuario->id }}).value;
        console.log(nombreUpdate.toString()+", "+curpUpdate+", "+emailUpdate+", "+rolUpdate+", "+idAreaUpdate+", id=> "+idUsuario);

        fetch(updateUser, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    id: idUsuario,
                    nombre: nombreUpdate,
                    curp: curpUpdate,
                    email: emailUpdate,
                    rol: rolUpdate,
                    idArea: idAreaUpdate,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Usuario actualizado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Usuario actualizado con éxito!",
                        text: "La información del usuario: " + nombreUpdate +
                            ", se ha actualizado correctamente en el sistema",
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
                    
                }else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al actualizar la información del usuario!",
                        text: "Ocurrió un error al actualizar la información del usuario, por favor intente de nuevo o recargue la página",
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
