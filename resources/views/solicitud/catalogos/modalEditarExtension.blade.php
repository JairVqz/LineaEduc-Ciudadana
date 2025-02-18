<!-- Modal -->
<div class="modal fade" id="editarExtension" tabindex="-1" aria-labelledby="editarExtensionLabel" aria-hidden="true">
    <form action="" method="post" id="formEditarExtensiones">
        @csrf
        <input type="hidden" id="e_idExtensionCatalogo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarExtensionLabel">Editar Área</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer mb-3">
                    </div>
                    <div class="form-group">
                        <label for="extension">Extensión:</label>
                        <input type="text" name="extension" id="e_extension" class="form-control" placeholder="Extensión"
                            required>

                        <div class="col-md-4">
                            <label for="idArea" class="form-label">Área a la que pertenece:</label>
                            <select name="idArea" id="idArea" class="form-select" required>
                                <option>Selecciona el área</option>
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
                    <button type="button" class="btn btn-primary editarExtension">Editar</button>
                </div>
            </div>
        </div>
    </form>
</div>