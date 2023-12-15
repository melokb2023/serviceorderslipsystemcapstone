@include('layouts.staffnavigation')

<x-app-layout>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
    <br>
    <br>
    <br>
    <br>
    <br>
    <style>
        *{
            text-align: center;
        }
        h2{
            font-family:"Century Gothic";
            font-weight:bold;
            color:red;
        }
        </style>

    <div style = "text-align:center;">
        <div class="flex space-x-4">
            <!-- Card 1 -->
            <div class="w-1/4 p-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                    <h2 class="text-2xl font-bold mb-4">{{$staffDatabaseCount}} Total Number of Works</h2>
                        <!-- Content for Card 1 -->
                    </div>
                </div>
    </div>      
    </div>
</div>
<div class="mt-8" style="background-color: #e9e9e9; border: 3px solid black; width: 80%;">
                <h2 class="text-2xl font-bold mb-4 text-center text-white">Service Performance Chart</h2>
                <canvas id="servicePerformanceChart"></canvas>
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
                type: 'bar', // Change chart type to 'bar'
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
</x-app-layout>
