<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0-rc.1/chartjs-plugin-datalabels.min.js"
    integrity="sha512-+UYTD5L/bU1sgAfWA0ELK5RlQ811q8wZIocqI7+K0Lhh8yVdIoAMEs96wJAIbgFvzynPm36ZCXtkydxu1cs27w=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
<script>
    $(document).ready(function () {
        var ctx = document.getElementById('solicitudesPorHoraAcumuladoChart').getContext('2d');
        var solicitudesPorHoraChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelsHora) !!},
                datasets: [{
                    label: 'Solicitudes por Hora',
                    data: {!! json_encode($valuesHora) !!},
                    backgroundColor: 'rgba(122, 23, 55, 0.5)',
                    borderColor: 'rgba(122, 23, 55, 1)',
                    borderWidth: 1,
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        color: 'rgba(122, 23, 55, 1)',
                        offset: 2,
                        //backgroundColor: 'rgba(122, 23, 55, 1)',
                        //borderRadius: 4,
                        font: {
                            weight: 'bold',
                            size: 14,
                        },

                    },
                }]
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            precision: 0,
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Solicitudes por hora',
                        font: {
                            size: 18,
                        },
                        padding: {
                            bottom: 23,
                        },
                    },
                },
            },
            plugins: [ChartDataLabels],
        });

        $("#formFiltro").submit(function (event) {
            event.preventDefault();
            var fechaSeleccionada = $("#fecha").val();
            $.ajax({
                url: "{{ route('reportes.reportesAcumulado') }}",
                type: "GET",
                data: { fecha: fechaSeleccionada },
                success: function (response) {
                    solicitudesPorHoraChart.data.labels = response.labelsHora;
                    solicitudesPorHoraChart.data.datasets[0].data = response.valuesHora;
                    solicitudesPorHoraChart.update();
                }
            });
        });
    });
</script>