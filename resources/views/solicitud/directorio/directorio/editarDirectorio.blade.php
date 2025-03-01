

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalEditarUsuario{{ $directorio->idExtensionCatalogo }}" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarUsuarioLabel">Editar directorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="extension{{ $directorio->idExtensionCatalogo }}" class="form-label">Extensión:</label>
                        <input type="text" name="extension{{ $directorio->idExtensionCatalogo }}" id="extension{{ $directorio->idExtensionCatalogo }}" value="{{ $directorio->extension }}"
                            class="form-control" placeholder="" required>
                    </div>

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="nombreTitular{{ $directorio->idExtensionCatalogo }}" class="form-label">Titular:</label>
                        <input type="text" name="nombreTitular{{ $directorio->idExtensionCatalogo }}" id="nombreTitular{{ $directorio->idExtensionCatalogo }}" value="{{ $directorio->nombreTitular }}"
                            class="form-control" placeholder="" style="text-transform:uppercase" required>
                    </div>

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="idPuesto{{ $directorio->idExtensionCatalogo }}" class="form-label">Puesto:</label>
                        <select name="idPuesto{{ $directorio->idExtensionCatalogo }}" id="idPuesto{{ $directorio->idExtensionCatalogo }}" class="form-select">
                            <option value="{{ $directorio->idPuesto }}">{{ $directorio->puesto }}</option>
                            @foreach ($listaPuestos as $data)
                                <option value="{{ $data->idPuesto }}">
                                    {{ $data->puesto }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="idArea{{ $directorio->idExtensionCatalogo }}" class="form-label">Área a la que pertenece:</label>
                        <select name="idArea{{ $directorio->idExtensionCatalogo }}" id="idArea{{ $directorio->idExtensionCatalogo }}" class="form-select">
                            <option value="{{ $directorio->idArea }}">{{ $directorio->area }}</option>
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
                    id="actualizarDirectorio{{ $directorio->idExtensionCatalogo }}">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>

    var btnActualizarDirectorio = document.getElementById("actualizarDirectorio" + {{ $directorio->idExtensionCatalogo }});

    btnActualizarDirectorio.addEventListener("click", function() {
        var idExtensionCatalogo = {{ $directorio->idExtensionCatalogo }};
        var extension = document.getElementById("extension"+ {{ $directorio->idExtensionCatalogo }}).value;
        var nombreTitular = document.getElementById("nombreTitular"+ {{ $directorio->idExtensionCatalogo }}).value;
        var idPuesto = document.getElementById("idPuesto"+ {{ $directorio->idExtensionCatalogo }}).value;
        var idArea = document.getElementById("idArea"+ {{ $directorio->idExtensionCatalogo }}).value;

        fetch(updateDirectorio, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    idExtensionCatalogo: idExtensionCatalogo,
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
                if (data.message === "Directorio actualizado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Directorio actualizado con éxito!",
                        text: "La información del directorio: " + extension +
                            ", se ha actualizado correctamente en el sistema",
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
                    
                }else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al actualizar la información del directorio!",
                        text: "Ocurrió un error al actualizar la información del directorio, por favor intente de nuevo o recargue la página",
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


