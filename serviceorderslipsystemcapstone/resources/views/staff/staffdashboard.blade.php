@include('layouts.staffnavigation')

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="padding: 20px;">
            <div class="text-center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #e9e9e9;">
               
                        <h2 style="font-family: Century Gothic; font-weight: bold; color: black" class="font-bold text-black text-2xl mb-4">
                            {{ $staffDatabaseCount }} Total Number of Works
                        </h2>
                        <h2 style="font-family: Century Gothic; font-weight: bold; color: black" class="font-bold text-black text-2xl mb-4">
                            {{ $ongoingWorksCount }} Ongoing Works
                        </h2>
                        <h2 style="font-family: Century Gothic; font-weight: bold; color: black" class="font-bold text-black text-2xl mb-4">
                            {{ $completedWorksCount }} Completed Works
                        </h2>

                        <!-- Service Performance Chart -->
                        <div style="background-color: white; padding: 20px;">
                            <h2 style="font-family: Century Gothic; color: black; font-weight: bold" class="text-2xl font-bold mb-4 text-center text-black">Work Chart</h2>
                            <canvas id="servicePerformanceChart"></canvas>
                        </div>
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
