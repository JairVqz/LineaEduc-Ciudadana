<!DOCTYPE html>
<html lang="es">

<head>
    <title>Prueba reporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    #membrete {
        display: flex;
        position: block;
    }

    #indicadoresDiaActual {
        display: flex;
        position: block;
    }

    .cuadrado {
        width: 140px;
        height: 80px;
        background-color: #7A1737;
    }

    .cuadrado2 {
        width: 140px;
        height: 80px;
        background-color: #B28854;
    }

    .cuadrado3 {
        width: 140px;
        height: 80px;
        background-color: #DAC195;
    }

    .cuadrado4 {
        width: 140px;
        height: 80px;
        background-color: #CCCCCC;
    }

    h5{
        color: white;
    }
</style>

<body>
    <div id="membrete">
        <img src="<?php echo $logoSevVeracruz; ?>" width="220px" style="float: left; margin-right: 20px;">
        <img src="<?php echo $logoLineaEducativa; ?>" width="80px" style="float: right;">
        <h3 style="margin-left: 200px">Linea Educativa Ciudadana</h3>
        <h4 style="text-align: center">Fecha de reporte: {{ $fecha }}</h4>
    </div>

    <div id="indicadoresDiaActual">
        <div class="cuadrado" style="float: none; text-align: center;">
            <h5>Llamadas Recibidas</h5>
        </div>

        <div class="cuadrado2" style="float: none">

        </div>

        <div class="cuadrado3">

        </div>

        <div class="cuadrado4">

        </div>
    </div>

    <br>
    <table class="table table-bordered">
        <tr>
            <th>folio</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>apellido</th>
        </tr>
        @foreach ($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->folio }}</td>
                <td>{{ $solicitud->nombre }}</td>
                <td>{{ $solicitud->apellidoPaterno }}</td>
                <td>{{ $solicitud->apellidoMaterno }}</td>
            </tr>
        @endforeach
    </table>
</body>


</html>
