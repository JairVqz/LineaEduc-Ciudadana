<script src="/js/config.js"></script>

<style>
    .form-label {
        text-align: left;
    }

    .modal-backdrop.show {
        opacity: 0.2;
    }
</style>

<!-- Modal -->
@csrf
<div class="modal fade" id="modalBuscadorCct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buscador de CCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="municipioEscuela" style="font-weight: bold" class="form-label">Se recomienda completar ambos 
                            campos para realizar una búsqueda más precisa.</label>
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="nombreEscuela" class="form-label">Nombre de la escuela:</label>
                        <input type="text" name="nombreEscuela" id="nombreEscuela" class="form-control"
                            placeholder="Ingresa aquí el nombre de la escuela">
                    </div>
                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="municipioEscuela" class="form-label">Municipio de la escuela:</label>
                        <!--input type="text" name="municipioEscuela" id="municipioEscuela" class="form-control"
                            placeholder="Ingresa aquí el municipio donde se ubica la escuela"-->
                            <select name="municipioEscuela" id="municipioEscuela" class="form-select">
                            </select>
                    </div>

                    <div class="col-md-12 mb-3 d-flex flex-column">
                        <label for="resultadoBusqueda" class="form-label" id="labelResultadoBusqueda"
                            style="display: none">CCTs localizados:</label>
                        <select name="resultadoBusqueda" id="resultadoBusqueda" class="form-select"
                            style="display: none">
                        </select>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.Laravel = <?php echo json_encode([
        'apiBusquedaCct' => route('solicitud.apiBusquedaCct'),
    ]); ?>

    const apiBusquedaCct = window.Laravel.apiBusquedaCct;

    $(document).ready(function() {

        $.ajax({
            url: 'https://msvc.sev.gob.mx/catalogos/entidad/api/estado/30/municipio/',
            //url: '/api-municipios',
            type: 'GET',
            success: function(response) {
                if (response) {
                    var selectMunicipioEscuela = $('#municipioEscuela');

                    selectMunicipioEscuela.empty();
                    selectMunicipioEscuela.append('<option value="">Selecciona el municipio</option>');

                    response.forEach(function(municipio) {
                        selectMunicipioEscuela.append(
                            '<option value="' + municipio.Id + '" >' + municipio.Nombre +
                            '</option>'
                        );

                    });
                    $('#municipioEscuela').trigger('change');
                } else {
                    console.error('La respuesta de la API está vacía.');
                }
            },
            error: function() {
                console.error('Hubo un error al consumir la API de municipios.');
            }
        });

        $('#nombreEscuela, #municipioEscuela').on('input', function() {
            var nombreEscuela = $('#nombreEscuela').val();
            //var municipioEscuela = $('#municipioEscuela').val();
            var municipioEscuela = $('#municipioEscuela').find('option:selected').text();
            console.log("mpioEscuela: "+municipioEscuela);

            if (nombreEscuela == "" && municipioEscuela == "") {
                $('#labelResultadoBusqueda').hide();
                $('#resultadoBusqueda').hide();
            } else {
                $('#labelResultadoBusqueda').show();
                $('#resultadoBusqueda').show();
            }

            var nombreEscuelaNormalizado = eliminarDiacriticos(nombreEscuela);
            var municipioEscuelaNormalizado = eliminarDiacriticos(municipioEscuela);

            $.ajax({
                url: apiBusquedaCct,
                type: 'GET',
                data: {
                    nombreEscuela: nombreEscuelaNormalizado,
                    municipioEscuela: municipioEscuelaNormalizado
                },
                success: function(response) {

                    if (!response || !Array.isArray(response) || response.length === 0) {
                        $('#resultadoBusqueda').html(
                            '<option value="">No se encontraron datos</option>');
                        return;
                    }

                    $('#resultadoBusqueda').html(
                        '<option hidden>Seleccione una opción</option>');

                    response.forEach(function(item) {
                        if (item && item['ClaveCT'] && item['Nombre'] && item[
                                'Localidad'] && item['Municipio']) {
                            var busquedaClaveCct = item['ClaveCT'];
                            var busquedaNombreEscuela = item['Nombre'];
                            var busquedaLocalidadEscuela = item['Localidad'][
                                'Descripcion'
                            ];
                            var busquedaMunicipioEscuela = item['Municipio'][
                                'Descripcion'
                            ];
                            var busquedaNivelEscuela = item['Nivel'];

                            $('#resultadoBusqueda').append(
                                '<option value="' + busquedaClaveCct + '">' +
                                busquedaNivelEscuela + '- ' +
                                busquedaNombreEscuela + ' (' +
                                busquedaLocalidadEscuela + ', ' +
                                busquedaMunicipioEscuela + ')' +
                                '</option>'
                            );
                        }
                    });
                },
                error: function() {
                    $('#resultadoBusqueda').html(
                        '<option value="">Hubo un error al realizar la búsqueda.</option>'
                    );
                }
            });
        });

    });

    $('#resultadoBusqueda').on('change', function() {
        var cctSeleccionado = $(this).val();
        localStorage.setItem('cctLocalizado', cctSeleccionado);
    });

    function eliminarDiacriticos(texto) {
        return texto.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    }

</script>
