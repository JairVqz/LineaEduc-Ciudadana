
<!-- Scripts 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>-->

<script>

$(document).ready(function () {
    $(document).on('click', '.agregarTipoS', function (e) {
        e.preventDefault();
        let tipoSolicitud = $('#tipoSolicitud').val();
        let idArea = $('#idAreaT').val();
        let idPrioridad = $('#idPrioridad').val();

        $.ajax({
            url: "{{route('catalogos.agregarTipoS')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { tipoSolicitud: tipoSolicitud, idAreaT:idArea, idPrioridad:idPrioridad},
            success: function (res) {
                if(res.status == 'success'){
                    $('#formAgregarTipoS')[0].reset();
                    recargarTablaT();

                    Swal.fire({
                        icon: "success",
                        title: "Tipo de solicitud registrado con éxito!",
                        text: 'El tipo de solicitud: ' + tipoSolicitud + ' se ha agregado con éxito.',
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
                        title: "No se pudo agregar el tipo de solicitud.",
                        text: value,
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#7A1737",
                    });
                });
            }
        });
        
    });
});
</script>

