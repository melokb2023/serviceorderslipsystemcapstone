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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 3px solid black;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            margin-top: 20px;
        }

        .chart-container {
            background-color: #e9e9e9;
            border: 3px solid black;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        h1 {
            font-weight: bold;
            font-size: 28px;
            text-align: center;
            color: black;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 16px;
        }

        button {
            background-color: #1e4f8f;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #144075;
        }

        canvas {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body class="antialiased">
    @include('layouts.adminnavigation')

    <x-app-layout>
        <div class="container">
            <h1>Service Performance Report</h1>

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
                <button type="submit" style="background-color: #1e4f8f; color: white; font-weight: bold; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#144075'" onmouseout="this.style.backgroundColor='#1e4f8f'">Apply Filter</button>
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
                        ticks: {
                            precision: 0
                        }
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
