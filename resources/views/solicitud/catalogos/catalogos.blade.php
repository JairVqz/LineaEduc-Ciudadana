<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lista de Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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
    </style>
</head>
@include('menuNavigation')

<body>
    

    <!-- mi contenedor -->
    <div class="content">
        <div class="card" style="padding: 30px;">
            <h1 class="mt-5" style="text-align: center; font-weight: bold; color: #7A1737;">Catálogos</h1>

            <!-- Segmento-->
            <div class="segment-container">
                <div class="segment-button active" onclick="showSegment('catalogo')">Catálogo completo</div>
                <div class="segment-button" onclick="showSegment('areas')">Áreas</div>
                <div class="segment-button" onclick="showSegment('extensiones')">Extensiones</div>
                <div class="segment-button" onclick="showSegment('solicitudes')">Tipos de Solicitud</div>
            </div>

            <div id="catalogo" class="segment-content active">
                <h3 style="text-align:center;">Catálogo completo</h3>
                <hr>

                <div class="table-responsive">
                    <table id="tablaCatalogo" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Extensión</th>
                                <th>Área</th>
                                <th>Tipo de solicitud</th>
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalogo as $keyc => $registro)
                                <tr>
                                    <td>{{$keyc + 1}}</td>
                                    <td>{{ $registro->extension }}</td>
                                    <td>{{ $registro->area }}</td>
                                    <td>{{ $registro->tipoSolicitud }}</td>
                                    <td>{{ $registro->prioridad }}</td>

                                    <td class="text-center">
                                        <a href="#" class="formEditarExtension mx-2" data-bs-toggle="modal"                                            
                                            title="Editar">
                                            <i class="bi bi-pencil text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="areas" class="segment-content">
                <h3 class="text-center">Gestión de Áreas</h3>
                <p style="text-align:center;">Información y administración de áreas.</p>
                <hr>

                <form action="" id="formAgregarArea" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="area" id="area" class="form-control" placeholder="Nombre del área"
                            required>
                        <button type="button" id='boton' class="btn btn-color agregarArea">Agregar</button>
                    </div>

                </form> <br>
                <!--tabla de solicitudes-->
                <div class="table-responsive">
                    <table id="tablaResultados" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Área</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listaAreas as $key => $area)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{ $area->area }}</td>
                                    <td class="text-center">
                                        <a href="#" class="formEditarArea mx-2" data-bs-toggle="modal"
                                            data-bs-target="#editarArea" 
                                            data-idarea="{{$area->idArea}}"
                                            data-area="{{$area->area}}" 
                                            title="Editar">
                                            <i class="bi bi-pencil text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div id="extensiones" class="segment-content">
                <h3 style="text-align:center;">Gestión de Extensiones</h3>
                <p style="text-align:center;">Información y administración de extensiones.</p>
                <hr>

                <form action="" id="formAgregarExtension" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="extension" class="form-label">Extensión:</label>
                            <input type="text" name="extension" id="extension" class="form-control"
                                placeholder="Extensión" required>
                        </div>
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
                        <div class="col-md-4" style="text-align:center;"><br>
                            <button type="button" id='boton' class="btn btn-color agregarExtension"
                                style="width:80%; height:70%">Agregar</button>
                        </div>
                    </div>
                </form> <br>
                <div class="table-responsive">
                    <table id="tablaExtensiones" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Extensión</th>
                                <th>Área</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($extensiones as $keye => $extension)
                                <tr>
                                    <td>{{$keye + 1}}</td>
                                    <td>{{ $extension->extension }}</td>
                                    <td>{{ $extension->area }}</td>
                                    <td class="text-center">
                                        <a href="#" class="formEditarExtension mx-2" data-bs-toggle="modal"
                                            data-bs-target="#editarExtension" 
                                            data-idextensioncatalogo="{{$extension->idExtensionCatalogo}}"
                                            data-extension="{{$extension->extension}}" 
                                            title="Editar">
                                            <i class="bi bi-pencil text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div id="solicitudes" class="segment-content">
                <h3 style="text-align:center;">Tipos de Solicitud</h3>
                <p style="text-align:center;">Información y administración de tipos de solicitud.</p>
                <hr>

                <form action="" id="formAgregarTipoS" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="tipoSolicitud" class="form-label">Tipo de solicitud:</label>
                            <input type="text" name="tipoSolicitud" id="tipoSolicitud" class="form-control"
                                placeholder="Solicitud" required>
                        </div>
                        <div class="col-md-3">
                            <label for="idAreaT" class="form-label">Área a la que pertenece:</label>
                            <select name="idAreaT" id="idAreaT" class="form-select" required>
                                <option>Selecciona el área</option>
                                @foreach ($listaAreas as $data)
                                    <option value="{{ $data->idArea }}">
                                        {{ $data->area }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="idPrioridad" class="form-label">Prioridad de la solicitud:</label>
                            <select name="idPrioridad" id="idPrioridad" class="form-select" required>
                                <option>Selecciona la prioridad</option>
                                @foreach ($listaPrioridades as $prioridad)
                                    <option value="{{ $prioridad->idPrioridad }}">
                                        {{ $prioridad->prioridad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3" style="text-align:center;"><br>
                            <button type="button" id='boton' class="btn btn-color agregarTipoS"
                                style="width:80%; height:70%">Agregar</button>
                        </div>
                    </div>
                </form> <br>
                <div class="table-responsive">
                    <table id="tablaTipoS" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Tipo de solicitud</th>
                                <th>Área</th>
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipoS as $keyt => $tipo)
                                <tr>
                                    <td>{{$keyt + 1}}</td>
                                    <td>{{ $tipo->tipoSolicitud }}</td>
                                    <td>{{ $tipo->area }}</td>
                                    <td>{{ $tipo->prioridad }}</td>
                                    <td class="text-center">
                                        <a href="#" class="formEditarExtension mx-2" data-bs-toggle="modal"                                            
                                            title="Editar">
                                            <i class="bi bi-pencil text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('solicitud/catalogos/tablasCatalogos')
    @include('solicitud/catalogos/modalEditarArea')
    @include('solicitud/catalogos/catalogoAreas')
    @include('solicitud/catalogos/catalogoExtensiones')
    @include('solicitud/catalogos/modalEditarExtension')
    @include('solicitud/catalogos/catalogoTipoS')
</body>