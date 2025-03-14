<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte por periodo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #membrete {
            display: flex;
        }

        #indicadores {
            display: flex;
            text-align: center;
        }

        .cuadrado {
            width: 180px;
            height: 80px;
            background-color: #7A1737;
            color: white;
        }

        .cuadrado2 {
            width: 180px;
            height: 80px;
            background-color: #B28854;
            color: white;
        }

        .cuadrado3 {
            width: 180px;
            height: 80px;
            background-color: #DAC195;
            color: black;
        }

        .cuadrado4 {
            width: 180px;
            height: 80px;
            background-color: #CCCCCC;
            color: black;
        }

        #areas {
            display: flex;
            
            margin-top: 30px;
        }

        #grafica {
            width: 300px;
            height: 300px;
            text-align: center;
            background-color: #6d6666;
        }

        #parrafo {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: auto;
            width: 300px;
            height: 300px;
            text-align: justify;
            padding: 5px;
            font-size: 12px;
            /*border: 1px dashed #6d6666;*/
        }
    </style>
</head>

<body>
    <div id="membrete">
        <img src="{{ public_path('images/SEV_Convivencia_Fondo blanco.png') }}" width="220px"
            style="float: left; margin-left: -20px; margin-top: -20px;" />
        <img src="{{ public_path('images/LEC.png') }}" width="80px" style="float: right; margin-top: -20px;" />
        <h3 style="text-aling: center; margin-left: 230px; margin-top: -20px;margin-bottom:-10px">Línea Educativa Ciudadana</h3>
        <h5 style="text-aling: center; margin-left: 195px; margin-top: -180px;">Reporte del periodo: {{ $start_date }} hasta {{ $end_date }}</h5>
    </div>
    <!--CUADRADOS DE INDICADORES-->
    <div id="indicadores" style="align-items: center">
        <div class="cuadrado" style="float: left; margin-left: 130px">
            <h2 style="padding: 0%; margin-top: 7px;">{{ $llamadasRecibidasPorDia }}</h2>
            <h5 style="padding: 0%; margin: 7px;">Llamadas Recibidas</h5>
        </div>

        <div class="cuadrado2" style="float: right; margin-right: 130px">
            <h2 style="padding: 0%; margin-top: 7px;">{{ $primeraLlamadaPorDiaFormateada }}</h2>
            <h5 style="padding: 0%; margin: 7px;">Primera llamada recibida</h5>
        </div>
    </div>
    <div id="indicadores" style="margin-top: 20px">
        <div class="cuadrado3" style="float: left; margin-left: 130px">
            <h2 style="padding: 0%; margin-top: 7px;">{{ $minutosEfectivosPorDia }}</h2>
            <h5 style="color: #6d6666; padding: 0%; margin: 7px;">Minutos efectivos</h5>
        </div>

        <div class="cuadrado4" style="float: right; margin-right: 130px">
            <h2 style="padding: 0%; margin-top: 7px;">{{ $ultimaLlamadaPorDiaFormateada }}</h2>
            <h5 style="color: #6d6666; padding: 0%; margin: 7px;">Última llamada recibida</h5>
        </div>
    </div>

    <h4 style="text-align: center; margin-bottom: -1px;">Llamada con más minutos de atención</h4>
    <h2 style="text-align: center; margin-top: -15px;">{{ $llamadaMasMinutosPorDia }}</h2>
    <!--GRAFICA DE BARRAS-->
    <!--
    <img src="{{ storage_path('app/public/tempdir/mpdf/ttfontdata/solicitudesPorHoraPeriodo.png') }}" alt="Gráfica de solicitudes por hora"
        style="width: 100%; height: auto;">
    -->
    <img src="{{ storage_path('app/public/tempdir/mpdf/ttfontdata/solicitudesPorHoraPeriodo.png') }}" alt="Gráfica de solicitudes por hora"
    style="width: 100%; height: auto;">
    <!--GRAFICA DE PASTEL Y PARRAFO-->
    <div id="areas">
        <div id="grafica" style="float: left; margin-left: 15px">
            <img src="{{ storage_path('app/public/tempdir/mpdf/ttfontdata/solicitudesPorAreaPeriodo.png') }}" alt="Gráfica de solicitudes por hora"
                style="width: 100%; height: auto;">
        </div>
        <div id="parrafo" style="float: right; margin-right: 15px">
            <p style="margin-top:80px;">En este periodo, la mayoría de llamadas estuvieron relacionadas con temas de  
                @foreach ($parrafoAreas as $index => $data)
                    @if ($index === count($parrafoAreas) - 1 && $index !== 0)
                        y {{ $data->nombre }} ({{ $data->porcentaje }}%),  
                    @elseif ($index === 0)
                        {{ $data->nombre }} ({{ $data->porcentaje }}%)
                    @else
                        , {{ $data->nombre }} ({{ $data->porcentaje }}%)
                    @endif
                @endforeach 
                destacando los siguientes asuntos: 
                @foreach ($parrafoTipos as $index => $data)
                    @if ($index === count($parrafoTipos) - 1 && $index !== 0)
                        y {{ $data->nombre }} ({{ $data->porcentaje }}%).
                    @elseif ($index === 0)
                        {{ $data->nombre }} ({{ $data->porcentaje }}%)
                    @else
                        , {{ $data->nombre }} ({{ $data->porcentaje }}%)
                    @endif
                @endforeach 
            </p>
            
        </div>
    </div>


</body>

</html>