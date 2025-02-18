<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        recargarTablaC();
    });



    function recargarTablaT() {
    let tabla = $('#tablaTipoS').DataTable();
    tabla.destroy(); // Elimina la instancia actual

    $.get(location.href, function (data) { 
        // Asegurarnos de traer solo la tabla de extensiones
        let nuevaTabla = $(data).find('#tablaTipoS').parent().html(); 
        $('#tablaTipoS').parent().html(nuevaTabla); 
        inicializarDataTableT(); // Vuelve a inicializar DataTables
    });
}

function inicializarDataTableT() {
    $('#tablaTipoS').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
}

function recargarTablaA() {
    let tabla = $('#tablaResultados').DataTable();
    tabla.destroy(); // Elimina la instancia actual

    $.get(location.href, function (data) {
        let nuevaTabla = $(data).find('#tablaResultados tbody').html(); // Obtiene solo los datos correctos
        $('#tablaResultados tbody').html(nuevaTabla); // Reemplaza el contenido
        inicializarDataTableA(); // Vuelve a inicializar DataTables
    });
}

function inicializarDataTableA() {
    $('#tablaResultados').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
}

function recargarTablaE() {
    let tabla = $('#tablaExtensiones').DataTable();
    tabla.destroy(); // Elimina la instancia actual

    $.get(location.href, function (data) { 
        // Asegurarnos de traer solo la tabla de extensiones
        let nuevaTabla = $(data).find('#tablaExtensiones').parent().html(); 
        $('#tablaExtensiones').parent().html(nuevaTabla); 
        inicializarDataTableE(); // Vuelve a inicializar DataTables
    });
}


function inicializarDataTableE() {
    $('#tablaExtensiones').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
}

function recargarTablaC() {
    let tabla = $('#tablaCatalogo').DataTable();
    tabla.destroy(); // Elimina la instancia actual

    $.get(location.href, function (data) { 
        // Asegurarnos de traer solo la tabla de extensiones
        let nuevaTabla = $(data).find('#tablaCatalogo').parent().html(); 
        $('#tablaCatalogo').parent().html(nuevaTabla); 
        inicializarDataTableC(); // Vuelve a inicializar DataTables
    });
}


function inicializarDataTableC() {
    $('#tablaCatalogo').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
}
</script>

<script>
    
    function showSegment(segment) {
    // Quita la clase 'active' de todos los botones y segmentos
    document.querySelectorAll('.segment-button').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.segment-content').forEach(content => content.classList.remove('active'));

    // Agrega la clase 'active' al botón y segmento seleccionado
    document.querySelector(`[onclick="showSegment('${segment}')"]`).classList.add('active');
    document.getElementById(segment).classList.add('active');

    // Verifica si el segmento es "extensiones" y actualiza la tabla
    if (segment === 'extensiones') {
        recargarTablaE();  // Recargar tabla de extensiones
    } else if (segment === 'areas') {
        recargarTablaA();  // Recargar tabla de áreas
    } else if (segment === 'solicitudes') {
        recargarTablaT();  // Recargar tabla de áreas
    }else if (segment === 'catalogo') {
        recargarTablaC();  // Recargar tabla de áreas
    }
}


</script>