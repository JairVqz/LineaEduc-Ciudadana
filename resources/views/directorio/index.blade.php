<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lista de Solicitudes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/solicitud/general.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <style>
        .segment-container {
            display: flex;
            /*justify-content: center;*/
            margin-top: 20px;
        }

        .segment-button {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #7A1737;
            color: #7A1737;
            background-color: #fff;
        }

        .segment-button.active {
            background-color: #7A1737;
            color: white;
        }

        .segment-content {
            display: none;
            /*text-align: center;*/
            padding: 20px;
            border: 1px solid #ccc;
            margin-top: 10px;
        }

        .segment-content.active {
            display: block;
        }

        #boton {
            background-color: #7A1737;
            color: white;
            border: none;
        }

        #boton:hover {
            background-color: #501125;
        }

        thead {
            background-color: #7f8081 !important;
        }

        th {
            color: rgb(255, 255, 255) !important;
            text-align: start !important;
        }

        td {
            text-align: start !important;
        }

        .page-item.active .page-link {
            color: #fff !important;
            background-color: #7A1737 !important;
            border-color: #7A1737 !important;
        }

        .page-link {
            color: #000000 !important;
            background-color: #F2F2F2 !important;
            border: 1px solid #c9cccf !important;
        }

        .page-link:hover {
            color: #fff !important;
            background-color: #501125 !important;
            border-color: #501125 !important;
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
                        <h1 class="mt-5 mb-2" style="text-align: center; font-weight: bold; color: #7A1737;">Lista de
                            Catálogos</h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-color" style="width:180px;" id="btnAgregarCatalogo"
                            data-bs-toggle="modal" data-bs-target="#modalAgregarCatalogo">Agregar
                            directorio</button>
                    </div>
                </div>
            </div>

            @include('directorio/modalAgregar')

            <div class="table-responsive">
                <table id="tablaCatalogos" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Extensión</th>
                            <th>Área</th>
                            <th>Tipo de Solicitud</th>
                            <th>Prioridad</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogoCompleto as $catalogo)
                            <tr>
                                <td>{{ $catalogo->extension }} </td>
                                <td>{{ $catalogo->area }}</td>
                                <td>{{ $catalogo->tipoSolicitud }}</td>
                                <td>{{ $catalogo->prioridad }}</td>

                                @php
                                    $fecha = \Carbon\Carbon::parse($catalogo->created_at)->format('d/m/Y');
                                @endphp
                                <td>{{ $fecha }}</td>

                                <td class="text-center">

                                    {{--<button type="button" id="btnEditarUsuario" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalEditarUsuario{{ $usuario->id }}"
                                        title="Editar"><i class="bi bi-pencil"></i></button>

                                    @if ($usuario->trashed())
                                        <button type="button" id="btnActivarUsuario" class="btn btn-success"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalActivarUsuario{{ $usuario->id }}" title="Activar">
                                            <i class="bi bi-check-lg"></i></button>
                                    @else
                                        <button type="button" id="btnEliminarUsuario" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEliminarUsuario{{ $usuario->id }}"
                                            title="Desactivar">
                                            <i class="bi bi-x-lg"></i></button>
                                    @endif>--}}


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

</body>

</html>

<script>
    //TABLA

    document.addEventListener('DOMContentLoaded', function() {
        $('#tablaCatalogos').DataTable({
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

        $('#parametroBusqueda').on('input', function() {
            const parametro = parametroBusqueda.value.toLowerCase().trim();
            $('#tablaUsuarios').DataTable().columns(0).search(parametro).draw();
        });

    });
</script>
