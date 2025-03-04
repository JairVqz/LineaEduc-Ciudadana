<?php
use App\Http\Controllers\APIsController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

//PAGINA DE INICIO LOGIN
Route::get('/', function () {
    return view('login');
});
//AUTORIZAR ACCESO
Route::controller(AuthController::class)->group(function () {

    Route::name('auth.')->group(function () {

        Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
//PAGINA DE CARGA QUE AUTORIZA ACCESO
Route::get('/preloadIndex', function () {
    return view('/preloadIndex');
});
//RUTAS CONTROLADOR DE SOLICITUD
Route::middleware('auth.validation')->group(function () {
    Route::controller(SolicitudController::class)->group(function () {
        Route::name('solicitud.')->group(function () {
            Route::get('/solicitud/index', [SolicitudController::class, 'index'])->name('index');
            Route::get('/solicitud/create', [SolicitudController::class, 'create'])->name('create');
            Route::post('/solicitud', [SolicitudController::class, 'store'])->name('store');

            // Rutas del select
            Route::get('/solicitud/listarSolicitudes', [SolicitudController::class, 'listarSolicitudes'])->name('listarSolicitudes');
            Route::get('/solicitud/show', [SolicitudController::class, 'show'])->name('show');

            // Editar un registro
            Route::get('/solicitud/edit/{solicitud}', [SolicitudController::class, 'edit'])->name('edit');
            Route::post('/solicitud/update', [SolicitudController::class, 'update'])->name('update');

            // Buscar coincidencias de solicitudes por nombre
            Route::get('/solicitud', [SolicitudController::class, 'coincidenciasSolicitud'])->name('coincidenciasSolicitud');

            // Obtener un registro
            Route::get('/solicitud/{folio}/detalle', [SolicitudController::class, 'detalle'])->name('solicitud.detalle');

            //API CCT QUE SACA LOS DATOS DE LA ESCUELA
            Route::get('/api-plantel', [SolicitudController::class, 'apiPlantel'])->name('apiPlantel');
            Route::get('/api-busquedaCct', [SolicitudController::class, 'apiBusquedaCct'])->name('apiBusquedaCct');

            //API DE MUNICIPIOS
            Route::get('/api-municipios', [SolicitudController::class, 'apiMunicipios'])->name('apiMunicipios');
            Route::get('/api-municipios/{idMunicipio}/localidad', [SolicitudController::class, 'apiLocalidades'])->name('apiLocalidades');

            //generar pdf
            Route::get('/solicitud/pdf_generator', [SolicitudController::class, 'pdf_generator'])->name('pdf_generator');

            //notificacion boton de inicio
            Route::post('/solicitud/notificarSeguimiento', [SolicitudController::class, 'notificarSeguimiento'])->name('notificarSeguimiento');

            Route::post('/api/fetchExtensionAreas', [SolicitudController::class, 'fetchExtensionAreas'])->name('fetchExtensionAreas');
            Route::post('/api/fetchAreaTipoSolicitudes', [SolicitudController::class, 'fetchAreaTipoSolicitudes'])->name('fetchAreaTipoSolicitudes');
            Route::post('/api/fetchTipoSolicitudPrioridad', [SolicitudController::class, 'fetchTipoSolicitudPrioridad'])->name('fetchTipoSolicitudPrioridad');

            //EXCEL
            Route::get('/exportarExcel', [SolicitudController::class, 'exportarExcel'])->name('exportarExcel');
            Route::get('/exportarExcelSeguimiento', [SolicitudController::class, 'exportarExcelSeguimiento'])->name('exportarExcelSeguimiento');

        });
    });
    //RUTAS API'S
    Route::controller(APIsController::class)->group(function () {
        Route::name('api.')->group(function () {
            Route::get('/apiMunicipios', [APIsController::class, 'apiMunicipios'])->name('apiMunicipios');
            Route::get('/apiLocalidades', [APIsController::class, 'apiLocalidades'])->name('apiLocalidades');
        });
    });

    //USUARIOS
    Route::controller(UsuarioController::class)->group(function () {
        Route::name('user.')->group(function () {
            Route::get('/usuario/index', [UsuarioController::class, 'index'])->name('index');
            Route::post('/usuario', [UsuarioController::class, 'store'])->name('store');
            Route::post('/usuario/update', [UsuarioController::class, 'update'])->name('update');
            Route::post('/usuario/destroy',  [UsuarioController::class,'destroy'])->name('destroy');
            Route::post('/usuario/restore', [UsuarioController::class, 'restore'])->name('restore');
        });
    });

    //SEGUIMIENTO
    Route::controller(SeguimientoController::class)->group(function () {
        Route::name('seguimiento.')->group(function () {
            Route::get('/solicitud/seguimiento', [SeguimientoController::class, 'seguimiento'])->name(name: 'seguimiento');
            Route::get('/solicitud/solicitudSeguimiento/{folio}', [SeguimientoController::class, 'solicitudSeguimiento'])->name('solicitudSeguimiento');
            Route::get('/solicitud/coincidenciasSeguimiento', [SeguimientoController::class, 'coincidenciasSeguimiento'])->name('coincidenciasSeguimiento');
            Route::put('/solicitud/guardarSolicitud/{folio}', [SeguimientoController::class, 'guardarSolicitud'])->name('guardarSolicitud');
            Route::get('/solicitud/obtenerTipos', [SeguimientoController::class, 'obtenerTipos']);
        });
    });

    //REPORTES
    Route::controller(ReportesController::class)->group(function () {
        Route::name('reportes.')->group(function () {
            Route::get('/solicitud/reportesDia', [ReportesController::class, 'reportesDia'])->name('reportesDia');
            Route::get('/solicitud/reportesAcumulado', [ReportesController::class, 'reportesAcumulado'])->name('reportesAcumulado');
            Route::get('/solicitud/reportesPeriodo', [ReportesController::class, 'reportesPeriodo'])->name('reportesPeriodo');

            Route::get('/solicitud/pdfReporteDia', [ReportesController::class, 'pdfReporteDia'])->name('pdfReporteDia');
            Route::get('/solicitud/pdfReporteAcum', [ReportesController::class, 'pdfReporteAcum'])->name('pdfReporteAcum');
            Route::get('/solicitud/pdfReportePeriodo', [ReportesController::class, 'pdfReportePeriodo'])->name('pdfReportePeriodo');

            Route::post('/solicitud/guardarGrafica', [ReportesController::class, 'guardarGrafica'])->name('guardarGrafica');


        });
    });

    //AREAS
    Route::controller(CatalogosController::class)->group(function () {
        Route::name('catalogos.')->group(function () {
            /*vista de catalogos crud de extension, area, tipo solicitud, usuarios
            Route::get('/solicitud/catalogos', [CatalogosController::class, 'catalogos'])->name('catalogos');
            //areas
            Route::post('/agregarArea', [CatalogosController::class, 'agregarArea'])->name('agregarArea');
            Route::post('/editarArea', [CatalogosController::class, 'editarArea'])->name('editarArea');
            //select de areas
            Route::get('/obtener-areas', [CatalogosController::class, 'obtenerAreas'])->name('obtenerAreas');
            //extensiones
            Route::post('/agregarExtension', [CatalogosController::class, 'agregarExtension'])->name('agregarExtension');
            Route::post('/editarExtension', [CatalogosController::class, 'editarExtension'])->name('editarExtension');
            //tipoSolicitud
            Route::post('/agregarTipoS', [CatalogosController::class, 'agregarTipoS'])->name('agregarTipoS');
            Route::post('/editarTipoS', [CatalogosController::class, 'editarTipoS'])->name('editarTipoS');*/

            Route::get('/solicitud/areas', [CatalogosController::class, 'areas'])->name('areas');
            Route::post('/areas', [CatalogosController::class, 'store'])->name('store');
            Route::post('/areas/update', [CatalogosController::class, 'update'])->name('update');
            Route::post('/areas/destroy',  [CatalogosController::class,'destroy'])->name('destroy');
            Route::post('/areas/restore', [CatalogosController::class, 'restore'])->name('restore');
        });
    });
    //PUESTOS
    Route::controller(PuestosController::class)->group(function () {
        Route::name('puestos.')->group(function () {
            Route::get('/solicitud/puestos', [PuestosController::class, 'puestos'])->name('puestos');
            Route::post('/puestos', [PuestosController::class, 'store'])->name('store');
            Route::post('/puestos/update', [PuestosController::class, 'update'])->name('update');
            Route::post('/puestos/destroy',  [PuestosController::class,'destroy'])->name('destroy');
            Route::post('/puestos/restore', [PuestosController::class, 'restore'])->name('restore');
        });
    });

    //DIRECTORIO
    Route::controller(DirectorioController::class)->group(function () {
        Route::name('directorio.')->group(function () {
            Route::get('/directorio/collection', [DirectorioController::class, 'collection'])->name('collection');
            Route::post('/directorio', [DirectorioController::class, 'store'])->name('store');
            Route::post('/directorio/directorioDinamico', [DirectorioController::class, 'storeDirectorioDinamico'])->name('storeDirectorioDinamico');
            Route::post('/directorio/update', [DirectorioController::class, 'update'])->name('update');
            Route::post('/directorio/destroy',  [DirectorioController::class,'destroy'])->name('destroy');
            Route::post('/directorio/restore', [DirectorioController::class, 'restore'])->name('restore');
        });
    });


});
