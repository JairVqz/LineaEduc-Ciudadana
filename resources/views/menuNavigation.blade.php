<head>
    <link rel="icon" href="{{ asset(path: 'images/LEC.png') }}">

</head>
<!-- Barra Superior -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-none" style="background-color: #7A1737;">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/lec_blanco.png') }}" alt="Logo SEV"
                style="height: 50px; object-fit: contain; margin-left: 5em;">
            <button class="btn text-white me-3 shadow-none" id="sidebarToggle"
                style="font-size: 1.5rem; margin-left: 3.2em;">
                <i class="fas fa-bars"></i>
        </div>
        <!-- Botón de Perfil-->
        <div class="btn-group mb-0 shadow-none" style="margin-right: 0; padding-bottom: 0;">
            <button type="button" class="btn btn-lg text-white" id="btnPerfil"></button>
        </div>
    </div>
</nav>

<!--Muesca-->
<nav id="muesca" class="navbar navbar-expand-lg" style="background-color: #7A1737; width: 20px; height: 50px; border-top-left-radius: 30px; margin-top: 41px; margin-left: 250px; position: fixed; z-index: 1000; border-top-right-radius: 30px;">
    <div class="container-fluid d-flex align-items-center justify-content-center" style="position: relative;">
        <div id="navbarPrimeNg" style="position: absolute; top: 0; left: 0; background-color: #F5F5F5; width: 20px; height: 27px; border-top-left-radius: 30px; z-index: -2;"></div>
    </div>
</nav>

@include('solicitud.modalPerfil')
<div class="sidebar">
    @if (Auth::user()->rol == 'Administrador')

        <a href="{{ route('solicitud.index') }}" class="{{ request()->routeIs('solicitud.index') ? 'active' : '' }}">
            <i class="bi bi-house me-2"></i>Inicio
        </a>
        <a href="{{ route('solicitud.listarSolicitudes') }}"
            class="{{ request()->routeIs('solicitud.listarSolicitudes') ? 'active' : '' }}">
            <i class="bi bi-table me-2"></i>Solicitudes
        </a>
        <a href="{{ route('solicitud.create') }}" class="{{ request()->routeIs('solicitud.create') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-plus me-2"></i>Nueva Solicitud
        </a>
        <a href="{{ route('seguimiento.seguimiento') }}"
            class="{{ request()->routeIs('seguimiento.seguimiento') ? 'active' : '' }}">
            <i class="bi bi-check-circle me-2"></i>Seguimiento
        </a>

        @php
            $isReportesActive = request()->routeIs('reportes.reportesDia') || request()->routeIs('reportes.reportesAcumulado');
            $isCatalogosActive =  request()->routeIs('directorio.collection') || request()->routeIs('catalogos.areas') || request()->routeIs('puestos.puestos');
        @endphp

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuReportes"
                aria-expanded="{{ $isReportesActive ? 'true' : 'false' }}">
                <i class="bi bi-bar-chart me-2"></i>Reportes
            </a>
            <div id="submenuReportes" class="collapse {{ $isReportesActive ? 'show' : '' }}">
                <a href="{{ route('reportes.reportesDia') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesDia') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i>Reporte del día
                </a>
                <a href="{{ route('reportes.reportesAcumulado') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesAcumulado') ? 'active' : '' }}">
                    <i class="bi bi-calendar3 me-2"></i>Reporte acumulado
                </a>
                <a href="{{ route('reportes.reportesPeriodo') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesPeriodo') ? 'active' : '' }}">
                    <i class="bi bi-calendar4-week me-2"></i>Reporte periódico
                </a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuCatalogos"
                aria-expanded="{{ $isCatalogosActive ? 'true' : 'false' }}">
                <i class="bi bi-collection me-2"></i>Catálogos
            </a>

            <div id="submenuCatalogos" class="collapse {{ $isCatalogosActive ? 'show' : '' }}">
                <a href="{{ route('directorio.collection') }}"
                    class="ms-3 {{ request()->routeIs('directorio.collection') ? 'active' : '' }}">
                    <i class="bi bi-telephone me-2"></i>Directorio
                </a><!--DIRECTORIO, AREAS, PUESTOS-->
                <a href="{{ route('catalogos.areas') }}"
                    class="ms-3 {{ request()->routeIs('catalogos.areas') ? 'active' : '' }}">
                    <i class="bi bi-building-gear me-2"></i>Áreas
                </a>
                <a href="{{ route('puestos.puestos') }}"
                    class="ms-3 {{ request()->routeIs('puestos.puestos') ? 'active' : '' }}">
                    <i class="bi bi-person-gear me-2"></i>Puestos
                </a>
            </div>
        </div>

        
        <a href="{{ route('user.index') }}" class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i>Usuarios
        </a>
    @endif

    @if (Auth::user()->rol == 'Revisor')
        <a href="{{ route('solicitud.index') }}" class="{{ request()->routeIs('solicitud.index') ? 'active' : '' }}">
            <i class="bi bi-house me-2"></i>Inicio
        </a>

        <a href="{{ route('seguimiento.seguimiento') }}"
            class="{{ request()->routeIs('seguimiento.seguimiento') ? 'active' : '' }}">
            <i class="bi bi-check-circle me-2"></i>Seguimiento
        </a>

        @php
            $isReportesActive = request()->routeIs('reportes.reportesDia') || request()->routeIs('reportes.reportesAcumulado');
            $isCatalogosActive =  request()->routeIs('directorio.collection') || request()->routeIs('catalogos.areas') || request()->routeIs('puestos.puestos');
        @endphp

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuReportes"
                aria-expanded="{{ $isReportesActive ? 'true' : 'false' }}">
                <i class="bi bi-bar-chart me-2"></i>Reportes
            </a>
            <div id="submenuReportes" class="collapse {{ $isReportesActive ? 'show' : '' }}">
                <a href="{{ route('reportes.reportesDia') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesDia') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i>Reporte del día
                </a>
                <a href="{{ route('reportes.reportesAcumulado') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesAcumulado') ? 'active' : '' }}">
                    <i class="bi bi-calendar3 me-2"></i>Reporte acumulado
                </a>
                <a href="{{ route('reportes.reportesPeriodo') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesPeriodo') ? 'active' : '' }}">
                    <i class="bi bi-calendar4-week me-2"></i>Reporte periódico
                </a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuCatalogos"
                aria-expanded="{{ $isCatalogosActive ? 'true' : 'false' }}">
                <i class="bi bi-collection me-2"></i>Catálogos
            </a>

            <div id="submenuCatalogos" class="collapse {{ $isCatalogosActive ? 'show' : '' }}">
                <a href="{{ route('directorio.collection') }}"
                    class="ms-3 {{ request()->routeIs('directorio.collection') ? 'active' : '' }}">
                    <i class="bi bi-telephone me-2"></i>Directorio
                </a><!--DIRECTORIO, AREAS, PUESTOS-->
                <a href="{{ route('catalogos.areas') }}"
                    class="ms-3 {{ request()->routeIs('catalogos.areas') ? 'active' : '' }}">
                    <i class="bi bi-building-gear me-2"></i>Áreas
                </a>
                <a href="{{ route('puestos.puestos') }}"
                    class="ms-3 {{ request()->routeIs('puestos.puestos') ? 'active' : '' }}">
                    <i class="bi bi-person-gear me-2"></i>Puestos
                </a>
            </div>
        </div>
    @endif

    @if (Auth::user()->rol == 'Capturista')
        <a href="{{ route('solicitud.index') }}" class="{{ request()->routeIs('solicitud.index') ? 'active' : '' }}">
            <i class="bi bi-house me-2"></i>Inicio
        </a>
        <a href="{{ route('solicitud.listarSolicitudes') }}"
            class="{{ request()->routeIs('solicitud.listarSolicitudes') ? 'active' : '' }}">
            <i class="bi bi-table me-2"></i>Solicitudes
        </a>
        <a href="{{ route('solicitud.create') }}" class="{{ request()->routeIs('solicitud.create') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-plus me-2"></i>Nueva Solicitud
        </a>
        @php
            $isCatalogosActive =  request()->routeIs('directorio.collection') || request()->routeIs('catalogos.areas') || request()->routeIs('puestos.puestos');
        @endphp
        
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuCatalogos"
                aria-expanded="{{ $isCatalogosActive ? 'true' : 'false' }}">
                <i class="bi bi-collection me-2"></i>Catálogos
            </a>

            <div id="submenuCatalogos" class="collapse {{ $isCatalogosActive ? 'show' : '' }}">
                <a href="{{ route('directorio.collection') }}"
                    class="ms-3 {{ request()->routeIs('directorio.collection') ? 'active' : '' }}">
                    <i class="bi bi-telephone me-2"></i>Directorio
                </a><!--DIRECTORIO, AREAS, PUESTOS-->
                <a href="{{ route('catalogos.areas') }}"
                    class="ms-3 {{ request()->routeIs('catalogos.areas') ? 'active' : '' }}">
                    <i class="bi bi-building-gear me-2"></i>Áreas
                </a>
                <a href="{{ route('puestos.puestos') }}"
                    class="ms-3 {{ request()->routeIs('puestos.puestos') ? 'active' : '' }}">
                    <i class="bi bi-person-gear me-2"></i>Puestos
                </a>
            </div>
        </div>
    @endif

    <!--VISTA DEL JEFE DE OPERADORAS-->
    @if (Auth::user()->rol == 'Supervisor')

        <a href="{{ route('solicitud.index') }}" class="{{ request()->routeIs('solicitud.index') ? 'active' : '' }}">
            <i class="bi bi-house me-2"></i>Inicio
        </a>
        <a href="{{ route('solicitud.listarSolicitudes') }}"
            class="{{ request()->routeIs('solicitud.listarSolicitudes') ? 'active' : '' }}">
            <i class="bi bi-table me-2"></i>Solicitudes
        </a>
        <a href="{{ route('solicitud.create') }}" class="{{ request()->routeIs('solicitud.create') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-plus me-2"></i>Nueva Solicitud
        </a>
        

        @php
            $isReportesActive = request()->routeIs('reportes.reportesDia') || request()->routeIs('reportes.reportesAcumulado');
            $isCatalogosActive =  request()->routeIs('directorio.collection') || request()->routeIs('catalogos.areas') || request()->routeIs('puestos.puestos');
        @endphp

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuReportes"
                aria-expanded="{{ $isReportesActive ? 'true' : 'false' }}">
                <i class="bi bi-bar-chart me-2"></i>Reportes
            </a>
            <div id="submenuReportes" class="collapse {{ $isReportesActive ? 'show' : '' }}">
                <a href="{{ route('reportes.reportesDia') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesDia') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i>Reporte del día
                </a>
                <a href="{{ route('reportes.reportesAcumulado') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesAcumulado') ? 'active' : '' }}">
                    <i class="bi bi-calendar3 me-2"></i>Reporte acumulado
                </a>
                <a href="{{ route('reportes.reportesPeriodo') }}"
                    class="ms-3 {{ request()->routeIs('reportes.reportesPeriodo') ? 'active' : '' }}">
                    <i class="bi bi-calendar4-week me-2"></i>Reporte periódico
                </a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#submenuCatalogos"
                aria-expanded="{{ $isCatalogosActive ? 'true' : 'false' }}">
                <i class="bi bi-collection me-2"></i>Catálogos
            </a>

            <div id="submenuCatalogos" class="collapse {{ $isCatalogosActive ? 'show' : '' }}">
                <a href="{{ route('directorio.collection') }}"
                    class="ms-3 {{ request()->routeIs('directorio.collection') ? 'active' : '' }}">
                    <i class="bi bi-telephone me-2"></i>Directorio
                </a><!--DIRECTORIO, AREAS, PUESTOS-->
                <a href="{{ route('catalogos.areas') }}"
                    class="ms-3 {{ request()->routeIs('catalogos.areas') ? 'active' : '' }}">
                    <i class="bi bi-building-gear me-2"></i>Áreas
                </a>
                <a href="{{ route('puestos.puestos') }}"
                    class="ms-3 {{ request()->routeIs('puestos.puestos') ? 'active' : '' }}">
                    <i class="bi bi-person-gear me-2"></i>Puestos
                </a>
            </div>
        </div>

    @endif

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let toggles = document.querySelectorAll(".dropdown-toggle");

    toggles.forEach(function (toggle) {
        toggle.addEventListener("click", function () {
            let target = document.querySelector(this.getAttribute("data-bs-target"));

            // Cierra cualquier otro menú abierto
            document.querySelectorAll(".collapse.show").forEach(function (openMenu) {
                if (openMenu !== target) {
                    bootstrap.Collapse.getInstance(openMenu)?.hide();
                }
            });
        });
    });
});
</script>