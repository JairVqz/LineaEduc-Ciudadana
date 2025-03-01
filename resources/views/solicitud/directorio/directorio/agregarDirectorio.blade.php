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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar directorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="extension" class="form-label">Extensión:</label>
                        <input type="text" name="extension" id="extension" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="nombreTitular" class="form-label">Titular:</label>
                        <input type="text" name="nombreTitular" id="nombreTitular" class="form-control" placeholder=""
                            style="text-transform:uppercase" required>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="idPuesto" class="form-label">Puesto:</label>
                        <select name="idPuesto" id="idPuesto" class="form-select">
                            <option value="" hidden>Selecciona el puesto</option>
                            @foreach ($listaPuestos as $data)
                                <option value="{{ $data->idPuesto }}">
                                    {{ $data->puesto }}
                                </option>
                            @endforeach
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
                <button type="button" class="btn btn-color" id="guardarDirectorio">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.Laravel = <?php echo json_encode([
    'guardarDirectorio' => route('directorio.store'),
    'indexDirectorio' => route('directorio.collection'),
    'actualizarDirectorio' => route('directorio.update'),
    'eliminarDirectorio' => route('directorio.destroy'),
    'activarDirectorio' => route('directorio.restore'),
]); ?>

    var btnGuardarDirectorio = document.getElementById("guardarDirectorio");

    const storeDirectorio = window.Laravel.guardarDirectorio;
    const indexDirectorio = window.Laravel.indexDirectorio;
    const updateDirectorio = window.Laravel.actualizarDirectorio;
    const deleteDirectorio = window.Laravel.eliminarDirectorio;
    const restoreDirectorio = window.Laravel.activarDirectorio;

    btnGuardarDirectorio.addEventListener("click", function () {
        var extension = document.getElementById("extension").value;
        var nombreTitular = document.getElementById("nombreTitular").value;
        var idPuesto = document.getElementById("idPuesto").value;
        var idArea = document.getElementById("idArea").value;

        fetch(storeDirectorio, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            },
            body: JSON.stringify({
                extension: extension,
                nombreTitular: nombreTitular,
                idPuesto: idPuesto,
                idArea: idArea,
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Directorio registrado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Directorio registrado con éxito!",
                        text: "El directoro: " + extension +
                            ", se ha registrado correctamente.",
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
                        title: "¡Error al registrar el directorio!",
                        text: "Ocurrió un error al guardar el directorio, por favor intente de nuevo o recargue la página",
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