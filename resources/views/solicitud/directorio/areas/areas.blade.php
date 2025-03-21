<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Catálogo de Áreas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <script src="/js/solicitud/general.js"></script>
    <link rel="stylesheet" href="/css/configuracion/listarUsuarios.css">
    <style>
        .dt-search {
            display: contents !important;
        }
    </style>
</head>

@include('menuNavigation')

<body>

    <!-- mi contenedor -->
    <div class="content">
        <div class="card" style="padding: 30px;">


            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="mt-5 mb-2" style="text-align: center; font-weight: bold; color: #7A1737;">Catálogo de Áreas</h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-color" style="width:180px;" id="btnAgregarUsuario"
                            data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Agregar Área</button>
                    </div>
                </div>
            </div>
            @include('solicitud/directorio/areas/agregarArea')

            <!--tabla de solicitudes-->
            <div class="table-responsive">
                <table id="tablaUsuarios" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Área</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaAreas as $key => $area)
                                                <tr>
                                                    <td>{{ $key+1 }} </td>
                                                    <td>{{ $area->area }}</td>
                                                    
                                                    <td class="text-center">

                                                        <button type="button" id="btnEditarUsuario" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditarUsuario{{ $area->idArea }}"
                                                            title="Editar"><i class="bi bi-pencil"></i></button>

                                                        @if ($area->trashed())
                                                            <button type="button" id="btnActivarUsuario" class="btn btn-success"
                                                                data-bs-toggle="modal" data-bs-target="#modalActivarUsuario{{ $area->idArea }}"
                                                                title="Activar">
                                                                <i class="bi bi-check-lg"></i></button>
                                                        @else
                                                            <button type="button" id="btnEliminarUsuario" class="btn btn-danger"
                                                                data-bs-toggle="modal" data-bs-target="#modalEliminarUsuario{{ $area->idArea }}"
                                                                title="Desactivar">
                                                                <i class="bi bi-x-lg"></i></button>
                                                        @endif
                                                    </td>

                                                </tr>
                                                @include('solicitud.directorio.areas.editarArea')
                                                @include('solicitud.directorio.areas.eliminarArea')
                                                @include('solicitud.directorio.areas.activarArea')

                                                
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

<script>
    //TABLA

    document.addEventListener('DOMContentLoaded', function () {
        $('#tablaUsuarios').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                "paginate": {
                    "first": "<<",   
                    "last": ">>",    
                    "next": ">",    
                    "previous": "<"
                },
            },
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true, //estaba en false
            "responsive": true,
        });

        $('#parametroBusqueda').on('input', function () {
            const parametro = parametroBusqueda.value.toLowerCase().trim();
            $('#tablaUsuarios').DataTable().columns(0).search(parametro).draw();
        });

    });
</script>

</html>