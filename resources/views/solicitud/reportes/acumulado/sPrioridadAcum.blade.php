<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0-rc.1/chartjs-plugin-datalabels.min.js"
    integrity="sha512-+UYTD5L/bU1sgAfWA0ELK5RlQ811q8wZIocqI7+K0Lhh8yVdIoAMEs96wJAIbgFvzynPm36ZCXtkydxu1cs27w=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
<script>
    //Gráfica de solicitudes por prioridad
    var ctx = document.getElementById('solicitudesPChart').getContext('2d');
    var randomColors = generateRandomColors(@json($valuesPrioridad).length);
    var solicitudesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: @json($labelsPrioridad),
            datasets: [{
                label: 'Número de solicitudes',
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
                data: @json($valuesPrioridad)
            }]

        },
        options: {

            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Número de solicitudes por prioridad',
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
                    clamping: true,
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
    function getRandomColor() {
        return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
    }
    function generateRandomColors(count) {
        let colors = [];
        for (let i = 0; i < count; i++) {
            colors.push(getRandomColor());
        }
        return colors;
    }

    // descargar GRÁFICA :)
    function downloadChart(nombre, grafica) {
        var link = document.createElement('a');
        link.download = nombre + '.png'; //PONER LA FECHA 
        link.href = document.getElementById(grafica).toDataURL('image/png');
        link.click();
    }
</script>