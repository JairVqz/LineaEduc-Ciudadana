<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF de Ejemplo</title>
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
    </style>
</head>

<body>
    <div id="membrete">
        <img src="{{ public_path('images/SEV_Convivencia_Fondo blanco.png') }}" width="220px"
            style="float: left; margin-left: -20px; margin-top: -20px;" />
        <img src="{{ public_path('images/LEC.png') }}" width="80px" style="float: right; margin-top: -20px;" />
        <h3 style="text-aling: center; margin-left: 230px; margin-top: -20px;">Linea Educativa Ciudadana</h3>
    </div>

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

    <canvas id="solicitudesPorHoraAcumuladoChart"></canvas>




    <?php
    /*$chartUrl = "https://quickchart.io/chart?c=" . urlencode(json_encode([
        "type" => "bar",
        "data" => [
            "labels" => $labelsHora,
            "datasets" => [[
                "data" => $valuesHora,
                "backgroundColor" => "rgba(122, 23, 55, 0.5)",
                "borderColor" => "rgba(122, 23, 55, 1)",
                "borderWidth" => 1,
            ]]
        ],
        "options" => [
            "responsive" => true,
            "scales" => [
                    "yAxes" => [[
                        "ticks" => [
                            "stepSize" => 1
                    ]
                    ]]
],
            "plugins" => [
                "title" => [
                    "display" => true,
                    "text" => "Solicitudes por hora"
                ]
            ],
            "legend"=>[
                "display"=> false,
            ],
        ]
    ]));*/
    ?>

    <!--<img src="<?php /*echo $chartUrl; */?>" alt="Gráfico de Solicitudes por Hora" style="width: 100%; height: 350px;">-->

</body>

</html>
