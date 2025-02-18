
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script>


$(document).ready(function () {
    $(document).on('click', '.agregarExtension', function (e) {
        e.preventDefault();
        let extension = $('#extension').val();
        let idArea = $('#idArea').val();


        $.ajax({
            url: "{{route('catalogos.agregarExtension')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { extension: extension, idArea:idArea},
            success: function (res) {
                if(res.status == 'success'){
                    $('#formAgregarExtension')[0].reset();
                    recargarTablaE(); // Llamamos la función para actualizar la tabla

                    Swal.fire({
                        icon: "success",
                        title: "Extensión registrada con éxito!",
                        text: 'La extensión: ' + extension + ' se ha agregado con éxito.',
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
                        title: "No se pudo agregar la extensión.",
                        text: value,
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#7A1737",
                    });
                });
            }
        });
    });
    //mostrar valor del area en el modal
    $(document).on('click', '.formEditarExtensiones', function(){
            //let idextensioncatalogo = $(this).data('idExtensionCatalogo');  
            let extension = $(this).data('extension');
            //let idarea=$(this).data('idarea');
            console.log(extension);
            //$('#e_idExtensionCatalogo').val(idExtensionCatalogo);
            //$('#e_idArea').val(idArea);
            $('#e_extension').val(extension);
            console.log(idExtensionCatalogo);
        });
        //actualizar area
        $(document).on('click', '.editarExtension', function (e) {
            e.preventDefault();
            let e_idExtensionCatalogo = $('#e_idExtensionCatalogo').val();
            //let e_idArea = $('#e_idArea').val();
            let e_extension = $('#e_extension').val();
            //console.log(e_idArea);

            $.ajax({
                url: "{{route('catalogos.editarExtension')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                
                data: { e_idExtensionCatalogo:e_idExtensionCatalogo,e_extension:e_extension },
                success: function (res) {
                    if(res.status=='success'){
                        $('#editarArea').modal('hide');
                        $('#formEditarArea')[0].reset();
                        Swal.fire({
                            icon: "success",
                            title: "Extensión actualizada con éxito!",
                            text: 'La extensión: ' + e_extension + ' se ha actualizado con éxito.',
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#7A1737",
                        });
                        recargarTabla(); 
                    }

                }, error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        Swal.fire({
                        icon: "error",
                        title: "No se pudo actualizar la extensión.",
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



