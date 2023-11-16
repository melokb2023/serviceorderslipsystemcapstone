<x-app-layout>
    @include('layouts.adminnavigation')

    <div>
        <h1>Service Report</h1>

        <canvas id="financialPerformanceChart" width="400" height="400"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

                // Manually encode the PHP data into JSON format
                var rawData = '{!! json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
                var data = JSON.parse(rawData);

                var labels = Object.keys(data);
                var values = Object.values(data);

                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Count',
                            data: values,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
</div>





          </x-app-layout>

