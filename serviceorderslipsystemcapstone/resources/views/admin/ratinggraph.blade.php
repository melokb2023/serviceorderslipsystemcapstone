@include('layouts.adminnavigation')

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black;">
        <div class="p-6 text-black font-bold" style="border: 3px solid black; background-color: #e9e9e9; text-align: center;">

            <h1 style="color: black; font-weight: bold;">Rating Performance Report</h1>

            <canvas id="financialPerformanceChart" class="mt-4"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

                    // Manually encode the PHP data into JSON format
                    var rawData = '{!! json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
                    var data = JSON.parse(rawData);

                    var labels = Object.keys(data);
                    var values = Object.values(data);

                    var myBarChart = new Chart(ctx, {
                        type: 'bar',
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
    </div>
</x-app-layout>
