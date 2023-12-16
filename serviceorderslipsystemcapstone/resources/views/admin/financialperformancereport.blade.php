<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Report</title>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #e9e9e9;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #d70021;
            border: 3px solid black;
            padding: 20px;
            box-sizing: border-box;
        }

        .chart-container {
            background-color: #e9e9e9;
            border: 3px solid black;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }

        h1 {
            font-weight: bold;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        button {
            background-color: #1e4f8f;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #144075;
        }
    </style>
</head>
<body class="antialiased">
    @include('layouts.adminnavigation')

    <x-app-layout>
        <div class="container">
            <h1>Service Report</h1>

            <!-- Add date filter options -->
            <form action="{{ route('financialperformancereport') }}" method="get">
                @csrf
                <label for="monthFilter">Select Month:</label>
                <select name="month" id="monthFilter">
                    @for ($month = 1; $month <= 12; $month++)
                        <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                    @endfor
                </select>

                <label for="yearFilter">Select Year:</label>
                <select name="year" id="yearFilter">
                    @for ($year = date('Y'); $year >= 2020; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>

                <!-- Add a button to trigger the chart update -->
                <button type="submit" class="mt-2 bg-blue-500 text-white font-bold py-2 px-4 rounded">Apply Filter</button>
            </form>

            <!-- Chart container -->
            <div id="financialPerformanceChart" class="chart-container">
                @isset($data)
                    <canvas id="financialPerformanceChartCanvas"></canvas>
                @endisset
            </div>
        </div>
    </x-app-layout>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @isset($data)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('financialPerformanceChartCanvas').getContext('2d');

            // Manually encode the PHP data into JSON format
            var rawData = '{!! json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
            var originalData = JSON.parse(rawData);

            // Initial rendering with all data
            renderChart(originalData);
        });

        function renderChart(data) {
            var ctx = document.getElementById('financialPerformanceChartCanvas').getContext('2d');

            var labels = Object.keys(data);
            var values = Object.values(data);

            // Destroy the previous chart instance if it exists
            if (window.myBarChart) {
                window.myBarChart.destroy();
            }

            // Only render the chart if new data is available
            if (labels.length > 0) {
                window.myBarChart = new Chart(ctx, {
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
                                beginAtZero: true,
                                precision: 0, // Set the precision to 0 for integer values
                                stepSize: 1
                            }
                        }
                    }
                });
            }
        }
    </script>
@endisset
</body>
</html>
