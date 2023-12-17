@include('layouts.staffnavigation')

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="background-color: #d70021;border: 3px solid black; padding: 20px;">
            <div class="text-center">
                <h2 class="font-bold text-red-500 text-4xl mb-6">{{$staffDatabaseCount}} Total Number of Works</h2>
                <p style = "font-family:Century Gothic;color:white;font-weight:bold">Description for Works: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed lectus sit amet urna dignissim efficitur.</p>

                <!-- Service Performance Chart -->
                <div style="background-color:white;padding: 20px;">
                    <h2 style = "font-family:Century Gothic;color:black;font-weight:bold" class="text-2xl font-bold mb-4 text-center text-white">Service Performance Chart</h2>
                    <canvas id="servicePerformanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('servicePerformanceChart').getContext('2d');

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
                        ticks: {
                            precision: 0
                        }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
