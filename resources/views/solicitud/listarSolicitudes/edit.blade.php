<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar solicitud</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <script src="/js/config.js"></script>
        <script src="/js/solicitud/general.js"></script>
        <link rel="stylesheet" href="/css/solicitud/general.css">
    </head>
    @include('menuNavigation')

    <body>
        

        <!-- Contenido Principal -->
        <div class="content">
            <div class="card" style="padding: 30px;">
                <form action="{{ route('solicitud.update', $solicitudes[0]->folio) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h1 class="mt-5" style="text-align: center; font-weight: bold; color: #7A1737;">Edición de la solicitud: {{ $solicitudes[0]->folio }}</h1>
        
                    <fieldset class="border border-secondary p-3" style="border-radius:5px">
                        <!--DATOS DEL SOLICITANTE-->
                        <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold">Datos del solicitante:</legend>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="nombre" class="form-label" style="font-weight:bold">Nombre(s):</label>
                                <input type="text" class="form-control"  id="nombre" name="nombre" value="{{ $solicitudes[0]->nombre }}" >
                            </div>
                            <div class="col-md-4">
                                <label for="apellidoPaterno" class="form-label" style="font-weight:bold">Primer apellido:</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="{{ $solicitudes[0]->apellidoPaterno }}" >
                            </div>
                            <div class="col-md-4">
                                <label for="apellidoMaterno" class="form-label" style="font-weight:bold">Segundo Apellido:</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="{{ $solicitudes[0]->apellidoMaterno }}" >
                            </div>
                            <input type="hidden" name="curpUsuario" id="curpUsuario">
                            <input type="hidden" name="usuario" id="usuario">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 mt-4">
                                <label for="extension" class="form-label" style="font-weight:bold">Extensión:</label>
                                <input type="number" class="form-control" id="extension" name="extension" value="{{ $solicitudes[0]->extension }}" >
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="areaSolicitante" class="form-label" style="font-weight:bold">Área Solicitante:</label>
                                <input type="text" class="form-control" id="areaSolicitante" name="areaSolicitante" value="{{ $solicitudes[0]->area }}" >
                            </div>
                        </div>
                    </fieldset><br>

                    <fieldset class="border border-secondary p-3" style="border-radius:5px">
                        <!--DATOS DE CONTACTO-->
                        <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold">Datos de contacto:</legend>
                        
                        <div class="row g-3">
                            <div class="col-md-4 ">
                                <label for="nombre" class="form-label" style="font-weight:bold">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="{{ $solicitudes[0]->correo }}" >
                            </div>
                            <div class="col-md-4 ">
                                <label for="apellidoPaterno" class="form-label" style="font-weight:bold">Teléfono Fijo:</label>
                                <input type="number" class="form-control" id="telefonoFijo" name="telefonoFijo" value="{{ $solicitudes[0]->telefonoFijo }}" >
                            </div>
                            <div class="col-md-4 ">
                                <label for="apellidoMaterno" class="form-label" style="font-weight:bold">Teléfono Celular:</label>
                                <input type="number" class="form-control" id="telefonoCelular" name="telefonoCelular" value="{{ $solicitudes[0]->telefonoCelular }}" >
                            </div>
                        </div>
                    </fieldset><br>

                    <fieldset class="border border-secondary p-3" style="border-radius:5px">
                        <!--DATOS DE LA SOLICITUD-->
                        <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold">Datos de la solicitud:</legend>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="fechaSolicitud" class="form-label" style="font-weight:bold">Fecha de la solicitud:</label>
                                <input type="text" id="fechaSolicitud" name="fechaSolicitud" class="form-control" value="{{ \Carbon\Carbon::parse($solicitudes[0]->created_at)->format('d/m/Y') }}" disabled>
                            </div>
                            <div class="col-md-6 ">
                                <label for="diasTranscurridos" class="form-label" style="font-weight:bold">Días transcurridos:</label>
                                <input type="text" id="diasTranscurridos" name="diasTranscurridos" class="form-control" value="{{ $solicitudes[0]->diasTranscurridos }}" disabled >
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6 mt-4">
                                <label for="tipoSolicitud" class="form-label" style="font-weight:bold">Tipo de solicitud:</label>
                                <select name="idTipoSolicitud" id="idTipoSolicitud" class="form-select">
                                    <option value="">Selecciona el tipo de solicitud</option>
                                    @foreach ($listaTiposSolicitud as $tipos)
                                        <option value="{{ $tipos->idTipoSolicitud }}"
                                            {{ $solicitud->idTipoSolicitud==$tipos->idTipoSolicitud ? 'selected': ''}}>
                                            {{ $tipos->tipoSolicitud }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="areaSolicitud" class="form-label" style="font-weight:bold">Área que atiende:</label>
                                <select name="idArea" id="idArea" class="form-select">
                                    <option value="">Selecciona una área</option>
                                    @foreach ($listaAreas as $areas)
                                        <option value="{{ $areas->idArea }}"
                                            {{ $solicitud->idArea==$areas->idArea ? 'selected': ''}}>
                                            {{ $areas->area }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="row g-3">
                            <div class="col-md-6 mt-4">
                                <label for="prioridad" class="form-label" style="font-weight:bold">Prioridad:</label>
                                <select name="idPrioridad" id="idPrioridad" class="form-select">
                                    <option value="">Selecciona una prioridad</option>
                                    @foreach ($listaPrioridades as $prioridades)
                                        <option value="{{ $prioridades->idPrioridad }}"
                                            {{ $solicitud->idPrioridad==$prioridades->idPrioridad ? 'selected': ''}}>
                                            {{ $prioridades->prioridad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="estatus" class="form-label" style="font-weight:bold">Estatus:</label>
                                <select name="idEstatus" id="idEstatus" class="form-select">
                                    <option value="">Seleccione un estatus</option>
                                    @foreach ($listaEstatus as $estatus)
                                        <option value="{{ $estatus->idEstatus }}"
                                            {{ $solicitud->idEstatus==$estatus->idEstatus ? 'selected': ''}}>
                                            {{ $estatus->estatus }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-12 mt-4">
                                <label for="descripcion" class="form-label"><strong>Descripción:</strong></label>
                                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" >{{ $solicitudes[0]->descripcion }}</textarea>
                            </div>
                        </div>
                    </fieldset><br>

                    <fieldset class="border border-secondary p-3" style="border-radius:5px">
                        <!--DATOS DE LA LLAMADA-->
                        <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold">Datos de la llamada:</legend>
                        
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="horaInicio" class="form-label" style="font-weight:bold">Hora de inicio:</label>
                                <input type="text" id="horaInicio" name="horaInicio" class="form-control" value="{{ \Carbon\Carbon::parse($solicitudes[0]->horaInicio)->format('H:i:s') }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="horaTermino" class="form-label" style="font-weight:bold">Hora de término:</label>
                                <input type="text" id="horaTermino" name="horaTermino" class="form-control" value="{{ \Carbon\Carbon::parse($solicitudes[0]->horaTermino)->format('H:i:s') }}" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="duracion" class="form-label" style="font-weight:bold">Duración de la llamada:</label>
                                <input type="text" class="form-control" id="duracion" name="horaTermino" value="{{ $solicitudes[0]->duracionMinutos }}" disabled>
                            </div>
                        </div>
                    </fieldset><br>

                    <fieldset class="border border-secondary p-3" style="border-radius:5px">
                        <!-- DATOS DEL CCT -->
                        <legend class="float-none w-auto px-2" style="font-size: 20px; font-weight:bold">Datos del CCT:</legend>
                        <div class="row g-3">
                            <div class="col-md-12 mt-0">
                                <div class="text-end">
                                    <button type="button" class="btn btn-third-color" style="width: 19.5%;"><i class="bi bi-search me-2"></i>Buscar CCT</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-4">
                                <label for="cct" class="form-label" style="font-weight:bold">CCT:</label>
                                <input type="text" id="cct" name="cct" class="form-control" value="{{ $solicitudes[0]->cct }}" >
                            </div>
                            <div class="col-md-4">
                                <label for="municipio" class="form-label" style="font-weight:bold">Municipio:</label>
                                <input type="text" id="municipio" name="municipio" class="form-control" value="{{ $solicitudes[0]->municipio }}" >
                            </div>
                            <div class="col-md-4">
                                <label for="localidad" class="form-label" style="font-weight:bold">Localidad:</label>
                                <input type="text" id="localidad" name="localidad" class="form-control" value="{{ $solicitudes[0]->localidad }}" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 mt-2">
                                <label for="nombrePlantel" class="form-label" style="font-weight:bold">Nombre del Plantel:</label>
                                <input type="text" id="nombrePlantel" name="nombrePlantel" class="form-control" value="{{ $solicitudes[0]->nombrePlantel }}">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 mt-2">
                                <label for="nombreDirector" class="form-label" style="font-weight:bold">Nombre del Director:</label>
                                <input type="text" id="nombreDirector" name="nombreDirector" class="form-control" value="{{ $solicitudes[0]->nombreDirector }}" >
                            </div>
                        </div>
                    
                        <div class="row mb-0">
                            <div class="col-12 mt-2">
                                <label for="direccionCct" class="form-label" style="font-weight:bold">Dirección del CCT:</label>
                                <input type="text" id="direccionCct" name="direccionCct" class="form-control" value="{{ $solicitudes[0]->direccionCct }}" >
                            </div>
                        </div>
                    
                    </fieldset><br>

                    <div style="align-content: center; text-align: center;">
                        <button type="submit" class="btn btn-primary btn-lg" id="guardar" style="text-align: center">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
