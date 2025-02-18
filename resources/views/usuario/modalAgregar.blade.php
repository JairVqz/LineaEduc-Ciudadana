

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }

    .modal-dialog {
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        max-width: 520px;
    }
</style>

<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder=""
                            required>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="curp" class="form-label">CURP:</label>
                        <input type="text" name="curp" id="curp" class="form-control" placeholder=""
                            style="text-transform:uppercase" required>
                    </div>

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder=""
                            required>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="rol" class="form-label">Rol:</label>
                        <select name="rol" id="rol" class="form-select" required>
                            <option value="" hidden>Selecciona el rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Revisor">Revisor</option>
                            <option value="Capturista">Capturista</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="idArea" class="form-label">Área a la que pertenece:</label>
                        <select name="idArea" id="idArea" class="form-select">
                            <option value="" hidden>Selecciona el área</option>
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
                <button type="button" class="btn btn-color" id="guardarUsuario">Guardar</button>
            </div>
        </div>
    </div>
</div>

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
    })
</script>

