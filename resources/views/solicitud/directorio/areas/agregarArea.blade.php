

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar área</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="area" class="form-label">Nueva Área:</label>
                        <input type="text" name="area" id="area" class="form-control" placeholder=""
                            required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color" id="guardarArea">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.Laravel = <?php echo json_encode([
        'guardarArea' => route('catalogos.store'),
        'indexArea' => route('catalogos.areas'),
        'actualizarArea' => route('catalogos.update'),
        'eliminarArea' => route('catalogos.destroy'),
        'activarArea' => route('catalogos.restore'),
    ]); ?>

    var btnGuardarArea = document.getElementById("guardarArea");

    const storeArea = window.Laravel.guardarArea;
    const indexArea = window.Laravel.indexArea;
    const updateArea = window.Laravel.actualizarArea;
    const deleteArea = window.Laravel.eliminarArea;
    const restoreArea = window.Laravel.activarArea;

    btnGuardarArea.addEventListener("click", function() {
        var area = document.getElementById("area").value;
        

        fetch(storeArea, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    area: area,
                    
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Área registrada correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Área registrada con éxito!",
                        text: "El área: " + area +
                            ", se ha registrado correctamente",
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
                        title: "¡Error al registrar el área!",
                        text: "Ocurrió un error al guardar el área, por favor intente de nuevo o recargue la página",
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

