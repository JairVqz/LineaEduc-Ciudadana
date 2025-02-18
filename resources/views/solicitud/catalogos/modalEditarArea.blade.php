<!-- Modal -->
<div class="modal fade" id="editarArea" tabindex="-1" aria-labelledby="editarAreaLabel" aria-hidden="true">
    <form action="" method="post" id="formEditarArea">
        @csrf
        <input type="hidden" id="e_idArea">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarAreaLabel">Editar Área</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer mb-3">
                    </div>
                    <div class="form-group">
                        <label for="area">Área:</label>
                        <input type="text" name="area" id="e_area" class="form-control" placeholder="Nombre del área"
                            required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary editarArea">Editar</button>
                </div>
            </div>
        </div>
    </form>
</div>