

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalEditarUsuario{{ $puesto->idPuesto }}" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarUsuarioLabel">Editar área</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="puesto{{ $puesto->idPuesto }}" class="form-label">Área:</label>
                        <input type="text" name="puesto{{ $puesto->idPuesto }}" id="puesto{{ $puesto->idPuesto }}" value="{{ $puesto->puesto }}"
                            class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="actualizarPuesto{{ $puesto->idPuesto }}">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>

    var btnActualizarPuesto = document.getElementById("actualizarPuesto" + {{ $puesto->idPuesto }});

    btnActualizarPuesto.addEventListener("click", function() {
        var idPuesto = {{ $puesto->idPuesto }};
        //console.log (idUsuario);
        var puesto = document.getElementById("puesto"+ {{ $puesto->idPuesto }}).value;
        //console.log(nombreUpdate.toString());

        fetch(updatePuesto, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    idPuesto: idPuesto,
                    puesto: puesto,
                    
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Puesto actualizado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Puesto actualizado con éxito!",
                        text: "La información del puesto: " + puesto +
                            ", se ha actualizado correctamente en el sistema",
                        showCancelButton: false,
                        confirmButtonText: `ACEPTAR`,
                        confirmButtonColor: "#7A1737",
                        cancelButtonText: `CANCELAR`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.close();
                            window.location.href = indexPuesto;
                        } else {
                            Swal.close();
                            window.location.href = indexPuesto;
                        }
                    });
                    
                }else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al actualizar la información del área!",
                        text: "Ocurrió un error al actualizar la información del área, por favor intente de nuevo o recargue la página",
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


