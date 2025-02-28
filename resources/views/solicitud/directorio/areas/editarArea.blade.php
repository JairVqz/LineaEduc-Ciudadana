

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }
</style>

<div class="modal fade" id="modalEditarUsuario{{ $area->idArea }}" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel"
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
                        <label for="area{{ $area->idArea }}" class="form-label">Área:</label>
                        <input type="text" name="area{{ $area->idArea }}" id="area{{ $area->idArea }}" value="{{ $area->area }}"
                            class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color"
                    id="actualizarArea{{ $area->idArea }}">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>

    var btnActualizarArea = document.getElementById("actualizarArea" + {{ $area->idArea }});

    btnActualizarArea.addEventListener("click", function() {
        var idArea = {{ $area->idArea }};
        //console.log (idUsuario);
        var area = document.getElementById("area"+ {{ $area->idArea }}).value;
        //console.log(nombreUpdate.toString());

        fetch(updateArea, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    idArea: idArea,
                    area: area,
                    
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Área actualizada correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Área actualizada con éxito!",
                        text: "La información del área: " + area +
                            ", se ha actualizado correctamente en el sistema",
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


