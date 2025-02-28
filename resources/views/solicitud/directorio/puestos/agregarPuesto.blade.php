

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar puesto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="puesto" class="form-label">Nuevo puesto:</label>
                        <input type="text" name="puesto" id="puesto" class="form-control" placeholder=""
                            required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-color" id="guardarPuesto">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.Laravel = <?php echo json_encode([
        'guardarPuesto' => route('puestos.store'),
        'indexPuesto' => route('puestos.puestos'),
        'actualizarPuesto' => route('puestos.update'),
        'eliminarPuesto' => route('puestos.destroy'),
        'activarPuesto' => route('puestos.restore'),
    ]); ?>

    var btnGuardarPuesto = document.getElementById("guardarPuesto");

    const storePuesto = window.Laravel.guardarPuesto;
    const indexPuesto = window.Laravel.indexPuesto;
    const updatePuesto = window.Laravel.actualizarPuesto;
    const deletePuesto = window.Laravel.eliminarPuesto;
    const restorePuesto = window.Laravel.activarPuesto;

    btnGuardarPuesto.addEventListener("click", function() {
        var puesto = document.getElementById("puesto").value;
        

        fetch(storePuesto, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    puesto: puesto,
                    
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Petición enviada correctamente:', data);
                console.log(data.message);
                if (data.message === "Puesto registrado correctamente") {
                    Swal.fire({
                        icon: "success",
                        title: "Puesto registrada con éxito!",
                        text: "El puesto: " + puesto +
                            ", se ha registrado correctamente",
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

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error al registrar el puesto!",
                        text: "Ocurrió un error al guardar el puesto, por favor intente de nuevo o recargue la página",
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

