
<!-- Scripts
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>-->

<script>
function actualizarSelectAreas() {
    $.get("{{ route('catalogos.obtenerAreas') }}", function (data) { 
        let select = $('#idArea');
        let select2 = $('#idAreaT');
        select.empty(); // Limpiar opciones anteriores
        select2.empty(); // Limpiar opciones anteriores

        select.append('<option>Selecciona el área</option>'); // Opción por defecto
        select2.append('<option>Selecciona el área</option>'); // Opción por defecto

        $.each(data.areas, function (key, area) {
            select.append('<option value="' + area.idArea + '">' + area.area + '</option>');
            select2.append('<option value="' + area.idArea + '">' + area.area + '</option>');
        });
    });
}

/*function recargarTabla() {
    let tabla = $('#tablaResultados').DataTable();
    tabla.destroy(); // Elimina la instancia actual

    $.get(location.href, function (data) { 
        let nuevaTabla = $(data).find('.table').html(); // Obtiene el nuevo contenido
        $('.table').html(nuevaTabla); // Reemplaza el contenido de la tabla
        inicializarDataTable(); // Vuelve a inicializar DataTables
    });
}

function inicializarDataTable() {
    $('#tablaResultados').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
}*/

$(document).ready(function () {
    $(document).on('click', '.agregarArea', function (e) {
        e.preventDefault();
        let area = $('#area').val();

        $.ajax({
            url: "{{route('catalogos.agregarArea')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { area: area },
            success: function (res) {
                if(res.status == 'success'){
                    $('#formAgregarArea')[0].reset();
                    recargarTablaA(); // Llamamos la función para actualizar la tabla
                    actualizarSelectAreas(); // Llamamos la función para actualizar el select

                    Swal.fire({
                        icon: "success",
                        title: "Área registrada con éxito!",
                        text: 'El área: ' + area + ' se ha agregado con éxito.',
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#7A1737",
                    });
                }
            },
            error: function (err) {
                let error = err.responseJSON;
                $.each(error.errors, function (index, value) {
                    Swal.fire({
                        icon: "error",
                        title: "No se pudo agregar el área.",
                        text: value,
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#7A1737",
                    });
                });
            }
        });
    });
    //mostrar valor del area en el modal
    $(document).on('click', '.formEditarArea', function(){
            let idArea = $(this).data('idarea');  
            let area = $(this).data('area');    
            $('#e_idArea').val(idArea);
            $('#e_area').val(area);
        });
        //actualizar area
        $(document).on('click', '.editarArea', function (e) {
            e.preventDefault();
            let e_idArea = $('#e_idArea').val();
            let e_area = $('#e_area').val();
            console.log(e_idArea);

            console.log(e_area);

            $.ajax({
                url: "{{route('catalogos.editarArea')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                
                data: { e_idArea:e_idArea,e_area:e_area },
                success: function (res) {
                    if(res.status=='success'){
                        $('#editarArea').modal('hide');
                        $('#formEditarArea')[0].reset();
                        recargarTablaA(); 
                        actualizarSelectAreas();
                        Swal.fire({
                            icon: "success",
                            title: "Área actualizada con éxito!",
                            text: 'El área: ' + e_area + ' se ha actualizado con éxito.',
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#7A1737",
                        });
                        
                    }

                }, error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        Swal.fire({
                        icon: "error",
                        title: "No se pudo actualizar el área.",
                        text: value,
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#7A1737",
                    });
                    });
                }
            });
        })
});
    
</script>