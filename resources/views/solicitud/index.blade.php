<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <link rel="stylesheet" href="/css/solicitud/index.css">
    <script src="/js/solicitud/general.js"></script>
    <script src="/js/solicitud/index.js"></script>
</head>

@include('menuNavigation')

<body>

    <!-- Contenido Principal -->
    <div class="content" style="padding:50px;">
        <div class="row justify-content-center align-items-center ">
            <!-- Imagen del lado izquierdo -->
            <div class="col-12 text-center" style="margin-top: 3em; ">
                <img src="/images/sev_vertical.png" style="height:18vh; margin-right: 50px;"
                    alt="Línea Educación Ciudadana">
                <img src="/images/LEC.png" style="height:20vh; " alt="Línea Educación Ciudadana">
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 ">
                    <br><br><br>
                    <h5 style="font-weight:bold;">Justificación:</h5>
                    <p style="text-align: justify;">Como parte de las acciones para la mejora de la gestión educativa,
                        el Gobierno del Estado y la Secretaria
                        de Educación, instruyeron el desarrollo de una plataforma que permita mantener una comunicación
                        cercana y
                        permanente con las y los veracruzanos, que permita la atención oportuna de las solicitudes
                        hechas por los
                        ciudadanos, usuarios y áreas internas de la SEV. Esta plataforma permitirá detectar el volumen
                        de solicitudes
                        que actualmente se atienden por medio de correo, teléfono, de forma verbal, lo que ha no ha
                        permitido tener un
                        control de los casos atendidos o pendientes de atender.</p>
                    <h5 style="font-weight:bold;">Objetivo:</h5>
                    <p style="text-align: justify;">Automatizar el registro de las solicitudes que requieran realizar
                        tanto los ciudadanos en general,
                        así como los usuarios internos y externos del sector educativo; mejorar la atención de las
                        solicitudes
                        a través de un seguimiento oportuno; optimizar la comunicación entre área mediante el registro
                        de comentarios,
                        observación y actualizaciones al seguimiento de cada solicitud. </p>

                    <br><br><br>

                    <div class="mb-3 row">
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                        @if (Auth::user()->rol == 'Capturista' || Auth::user()->rol == 'Administrador')
                            <div class="text-center" style="margin-right: 15px;">
                                <button name="button" id="mostrarBuscador" class="btn btn-color btn-lg"><i class="bi bi-search me-2"></i>Buscar
                                    solicitud</button>
                            </div>
                            <div class="text-center" style="margin-right: 15px;">
                                <a href="{{ route('solicitud.create') }}"><button name="button"
                                         id="boton" class="btn btn-color btn-lg"><i class="bi bi-file-earmark-plus me-2"></i>Nueva
                                        solicitud</button></a>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    window.Laravel = <?php echo json_encode([

        'coincidenciasSolicitud' => route('solicitud.coincidenciasSolicitud'),
        'notificarSeguimiento' => route('solicitud.notificarSeguimiento'),
        'index' => route('solicitud.index'),
    ]); ?>
</script>

</html>
