<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://cdn.plot.ly/plotly-3.0.0.min.js" charset="utf-8"></script>
    <script src="/js/config.js"></script>
    <link rel="stylesheet" href="/css/solicitud/general.css">
    <script src="/js/solicitud/general.js"></script>
    <link rel="stylesheet" href="/css/solicitud/reportes.css">
</head>
@include('menuNavigation')

<body>
    <div class="content">
        <div class="card" style="padding: 30px;">
            <div class="d-flex justify-content-between align-items-center mt-2">
            <h1 class="flex-grow-1 text-center" style="font-weight: bold; color: #7A1737;">Lista de archivos</h1>
            </div>

            <div>
            <form action="{{ route('archivos.guardarArchivo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <label for="archivo" class="form-label">Selecciona un archivo</label>
                <input class="form-control" type="file" id="archivo" name="archivo" required>
                </div>
                <button type="submit" class="btn btn-primary">Subir</button>
            </form>
            </div>

            <hr>

            <h4 class="mt-4">Archivos subidos</h4>
            <ul class="list-group">
            @php
                $directorio = storage_path('app/public/tempdir/mpdf/ttfontdata/');
                $archivos = [];
                if (file_exists($directorio)) {
                    $archivos = array_diff(scandir($directorio), ['.', '..']);
                }
            @endphp
            @forelse($archivos as $archivo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $archivo }}
                    <a href="{{ route('archivos.descargarArchivo', ['nombre' => $archivo]) }}" class="btn btn-success btn-sm">
                        Descargar
                    </a>
                </li>
            @empty
                <li class="list-group-item">No hay archivos subidos.</li>
            @endforelse
            </ul>

        </div>
    </div>
</body>

<!--DEL DIA-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    window.Laravel = <?php echo json_encode(value: [
    'guardarGrafica' => route('reportes.guardarGrafica'),
]); ?>

    function enviarGraficaAlServidorP() {//mando las 2
        html2canvas(document.getElementById('solicitudesPorHoraChart'), { willReadFrequently: true })
            .then(canvas => {
                let imagenBase64 = canvas.toDataURL('image/png');
                let nombre = 'solicitudesPorHoraDia';

                const guardarGrafica = window.Laravel.guardarGrafica;
                fetch(guardarGrafica, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ imagen: imagenBase64, nombre: nombre })
                }).then(response => {
                    if (response.ok) {
                        console.log("Imagen enviada correctamente");
                    } else {
                        console.error("Error al enviar la imagen");
                    }
                }).catch(error => console.error("Error en la petición:", error));
            });
    }
    document.addEventListener("DOMContentLoaded", () => {
        setTimeout(enviarGraficaAlServidorP, 2000);
    });
</script>

</html>