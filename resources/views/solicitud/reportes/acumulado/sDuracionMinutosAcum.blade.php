<!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>-->


<script>


    //REPORTE ACUMULADO
    //Gráfica de solicitudes por minuto
    var ctx = document.getElementById('solicitudesMinutoACUMChart').getContext('2d');
    var randomColors = generateRandomColors(@json($valuesMinutoACUM).length);
    var solicitudesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: @json($labelsMinutoACUM),
            datasets: [{
                label: 'Número de solicitudes',
                data: @json($valuesMinutoACUM),
                backgroundColor: [
                    'rgba(26, 127, 178, 0.2)',
                    'rgba(82, 178, 26 , 0.2)',
                    'rgba(255, 45, 132, 0.5)',
                    'rgba(218, 113, 37, 0.5)',
                    'rgba(125, 161, 37, 0.5)',
                    'rgba(155, 37, 161, 0.5)',
                    'rgba(247, 222, 0, 0.5)',
                    'rgba(88, 26, 178, 0.5)',
                    'rgba(161, 37, 37, 0.5)',
                    'rgba(161, 79, 37, 0.5)',
                    'rgba(26, 178, 175, 0.5)',
                    'rgba(26, 112, 178, 0.5)',
                    'rgba(158, 178, 26, 0.5)',
                    'rgba(178, 26, 26 , 0.5)',
                    'rgba(26, 178, 160, 0.5)',
                ],
                borderColor: [
                    'rgba(26, 127, 178, 1)',
                    'rgba(82, 178, 26 , 1)',
                    'rgba(255, 45, 132, 1)',
                    'rgba(218, 113, 37, 1)',
                    'rgba(125, 161, 37, 1)',
                    'rgba(155, 37, 161, 1)',
                    'rgba(247, 222, 0, 1)',
                    'rgba(88, 26, 178, 1)',
                    'rgba(161, 37, 37, 1)',
                    'rgba(161, 79, 37, 1)',
                    'rgba(26, 178, 175, 1)',
                    'rgba(26, 112, 178, 1)',
                    'rgba(158, 178, 26, 1)',
                    'rgba(178, 26, 26 , 1)',
                    'rgba(26, 178, 160, 1)',
                ],
                borderWidth: 1,
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Llamadas por minutos de atención',
                    font: {
                        size: 18,
                    },
                },
                datalabels: {
                    formatter: function (value, context) {
                        let sum = 0;
                        let dataArr = context.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum = parseInt(sum) + parseInt(data);
                        });
                        //console.log(sum);
                        let percentage = ((value / sum) * 100).toFixed(2) + '%' + ' (' + value + ')';
                        return percentage;
                    },

                    anchor: 'center',
                    align: 'center',
                    backgroundColor: function (context) {
                        return context.dataset.borderColor;
                    },
                    borderRadius: 5,
                    font: {
                        size: 11,
                        fontStyle: 'bold',

                    },
                    color: "white",
                },
            },
        },
        plugins: [ChartDataLabels],
    });

</script>