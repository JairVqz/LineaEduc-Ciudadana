<div class="modal fade" id="modalDetalle" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content " style="padding:15px">
                <div class="modal-header text-center">
                    <div class="w-100">
                        <h5 class="modal-title fw-bold d-inline mt-0" id="modalDetalleLabel">Detalles de la Solicitud:
                        </h5>
                        <h5 id="modalFolio" class="mb-0 d-inline fw-bold ms-1"></h5><br>
                        <h6 class="modal-title d-inline" id="modalDetalleLabel">Asignado a:</h6>
                        <h6 id="modalArea" class="mb-0 d-inline fw-bold ms-1"></h6>
                        <h6 class="mb-0 d-inline fw-bold ms-1">( Ext.</h6>
                        <h6 id="modalExtension" class="mb-0 d-inline fw-bold ms-1"></h6>
                        <h6 class="mb-0 d-inline fw-bold ms-1">)</h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <fieldset class="border border-secondary p-3" style="border-radius:5px; margin-bottom:5px;">
                            <!--DATOS DEL SOLICITANTE-->
                            <legend class="float-none w-auto px-2" style="font-size: 18px; font-weight:bold"><i
                                    class="bi bi-person-lines-fill" style="margin-right:5px;"></i>Datos del solicitante:
                            </legend>
                            <div class="row mb-0">
                                <div class="col-12 d-flex">
                                    <label class="form-label me-2"><strong>Nombre del solicitante:</strong></label>
                                    <p id="modalNombreCompleto" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>Correo:</strong></label>
                                    <p id="modalCorreo" class="mb-0"></p>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>T. Fijo:</strong></label>
                                    <p id="modalTelefonoFijo" class="mb-0"></p>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>T. Celular:</strong></label>
                                    <p id="modalTelefonoCelular" class="mb-0"></p>
                                </div>
                            </div>

                        </fieldset>


                        <fieldset class="border border-secondary p-3" style="border-radius:5px; margin-bottom:5px;">
                            <!--DATOS DE LA SOLICITUD-->
                            <legend class="float-none w-auto px-2" style="font-size: 18px; font-weight:bold"><i
                                    class="bi bi-file-earmark-post" style="margin-right:5px;"></i>Datos de la solicitud:
                            </legend>
                            <div class="row mb-0">
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>Fecha:</strong></label>
                                    <p id="modalFecha" class="mb-0"></p>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>Días transcurridos:</strong></label>
                                    <p id="modalDias" class="mb-0"></p>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>Estatus:</strong></label>
                                    <p id="modalEstatus" class="mb-0" style="font-weight:bold"></p>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-4 d-flex">
                                    <label class="form-label me-2"><strong>Prioridad:</strong></label>
                                    <p id="modalPrioridad" class="mb-0"></p>
                                </div>
                                <div class="col-8 d-flex">
                                    <label class="form-label me-2"><strong>Solicitud:</strong></label>
                                    <p id="modalTipoSolicitud" class="mb-0"></p>
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <label class="form-label"><strong>Descripción:</strong></label>
                                <textarea id="modalDescripcion" class="form-control" rows="2" readonly></textarea>
                            </div>
                        </fieldset>

                        <fieldset id="divDatosUbicacion" class="border border-secondary p-3" style="border-radius:5px; margin-bottom:5px;">
                            <!--DATOS DEL CCT-->
                            <legend class="float-none w-auto px-2" style="font-size: 18px; font-weight:bold"><i
                                    class="bi bi-geo-alt-fill" style="margin-right:5px;"></i>Datos de ubicación:
                            </legend>
                            <div class="row mb-0">
                                <div class="col-md-6 d-flex" id="divCct">
                                    <label id="labelCct" class="form-label me-2"><strong>CCT:</strong></label>
                                    <p id="modalCct" class="mb-0"></p>
                                </div>
                                <div class="col-md-6 d-flex" id="divNivel">
                                    <label id="labelNivel" class="form-label me-2"><strong>Nivel:</strong></label>
                                    <p id="modalNivel" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 d-flex" id="divMunicipio">
                                    <label  id="labelMunicipio" class="form-label me-2"><strong>Municipio:</strong></label>
                                    <p id="modalMunicipio" class="mb-0"></p>
                                </div>
                                <div class="col-md-6 d-flex" id="divLocalidad">
                                    <label id="labelLocalidad" class="form-label me-2"><strong>Localidad:</strong></label>
                                    <p id="modalLocalidad" class="mb-0"></p>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-12 d-flex" id="divNombrePlantel">
                                    <label id="labelNombrePlantel" class="form-label me-2"><strong>Nombre del plantel:</strong></label>
                                    <p id="modalNombrePlantel" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                
                            </div>
                            <div class="row mb-0">
                                <div class="col-12 d-flex" id="divNombreDirector">
                                    <label id="labelNombreDirector" class="form-label me-2"><strong>Nombre del director:</strong></label>
                                    <p id="modalNombreDirector" class="mb-0"></p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-12 d-flex" id="divDireccionCct">
                                    <label id="labelDireccionCct" class="form-label me-2"><strong>Dirección del CCT:</strong></label>
                                    <p id="modalDireccionCct" class="mb-0"></p>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset id="divDatosMunicipio" class="border border-secondary p-3" style="border-radius:5px; margin-bottom:5px;">
                            <!--DATOS DEL CCT-->
                            <legend class="float-none w-auto px-2" style="font-size: 18px; font-weight:bold"><i
                                    class="bi bi-geo-alt-fill" style="margin-right:5px;"></i>Datos de ubicación:
                            </legend>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 d-flex" id="divMunicipio2">
                                    <label  id="labelMunicipio" class="form-label me-2"><strong>Municipio:</strong></label>
                                    <p id="modalMunicipio2" class="mb-0"></p>
                                </div>
                                <div class="col-md-6 d-flex" id="divLocalidad2">
                                    <label id="labelLocalidad" class="form-label me-2"><strong>Localidad:</strong></label>
                                    <p id="modalLocalidad2" class="mb-0"></p>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="border border-secondary p-3" style="border-radius:5px; margin-bottom:5px;">
                            <legend class="float-none w-auto px-2" style="font-size: 18px; font-weight:bold"><i
                                    class="bi bi-telephone-fill" style="margin-right:5px;"></i>Datos de la llamada:
                            </legend>
                            <div class="row mb-0">
                                <div class="col-md-6 d-flex">
                                    <label class="form-label me-2"><strong>Hora de inicio:</strong></label>
                                    <p id="modalHoraI" class="mb-0"></p>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <label class="form-label me-2"><strong>Hora de término:</strong></label>
                                    <p id="modalHoraT" class="mb-0"></p>
                                </div>
                                
                            </div>
                            <div class="row mb-0">
                                <div class="col-6 d-flex" >
                                    <label class="form-label me-2"><strong>Operadora:</strong></label>
                                    <p id="modalUsuario" class="mb-0"></p>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <label class="form-label me-2"><strong>Duración:</strong></label>
                                    <p id="modalDuracion" class="mb-0"></p>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                </div>
                <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>-->
            </div>
        </div>
    </div>

    