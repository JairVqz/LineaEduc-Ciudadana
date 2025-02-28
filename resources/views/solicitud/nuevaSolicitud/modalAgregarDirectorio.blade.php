<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .modal-backdrop {
        opacity: 0.04 !important;
    }

    .modal-dialog {
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        max-width: 540px;
    }

    /* Asegurarse de que el contenedor de Select2 se comporte como un input de Bootstrap */
    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px);
        padding: 0.375rem 1.5rem 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        position: relative;
    }

    /* Centrar la flecha en el contenedor de la selección */
    .select2-container .select2-selection__arrow {
        right: 0.75rem;
        top: 50%;
        transform: translateY(20%);
    }

    /* Ajuste opcional si deseas que las opciones del select también se alineen de manera similar */
    .select2-container--default .select2-results__option {
        padding: 0.375rem 1rem;
    }
</style>

<div class="modal fade" id="modalAgregarDirectorio" tabindex="-1" aria-labelledby="modalAgregarDirectorioLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAgregarDirectorioLabel">Nuevo Directorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="nuevaExtension" class="form-label" style="font-weight:bold">Nueva
                            Extensión:</label>
                        <input type="number" name="nuevaExtension" id="nuevaExtension" class="form-control"
                            placeholder="" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="idArea" class="form-label" style="font-weight:bold">Área que
                            atiende:</label>
                        <select name="idArea" id="idArea" class="form-select select2-bootstrap">
                            @foreach ($listaAreas as $data)
                                <option value="{{ $data->idArea }}">
                                    {{ $data->area }}
                                </option>
                            @endforeach
                            <option value="otro">Otra</option>
                        </select>
                    </div>
                   
                    <div class="col-md-12" style="display: none">
                        <label for="idNuevaPrioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                        <select name="idNuevaPrioridad" id="idNuevaPrioridad" class="form-select">
                            <option value="" hidden></option>
                            @foreach ($listaPrioridades as $data)
                                <option value="{{ $data->idPrioridad }}">
                                    {{ $data->prioridad }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                      <label for="idPrioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                      <select name="idPrioridad" id="idPrioridad" class="form-select select2-bootstrap">
                          @foreach ($listaPrioridades as $data)
                              <option value="{{ $data->idPrioridad }}">
                                  {{ $data->prioridad }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                    <div class="col-md-12">
                        <label for="idTipoSolicitud" class="form-label" style="font-weight:bold">Tipo de
                            Solicitud:</label>
                        <select name="idTipoSolicitud" id="idTipoSolicitud" class="form-select select2-bootstrap">
                            @foreach ($listaTiposSolicitud as $data)
                                <option value="{{ $data->idTipoSolicitud }}">
                                    {{ $data->tipoSolicitud }}
                                </option>
                            @endforeach
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#idPrioridad').select2({
        dropdownParent: $('#modalAgregarDirectorio'),
        placeholder: "Selecciona la prioridad",
        allowClear: true,
        language: {
            noResults: function() {
                return "No hay resultados";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    }).val(null).trigger('change');
</script>
