<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Report</title>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
            background-color: #e9e9e9;
            color: black;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1{
            font-family: 'Century Gothic', sans-serif;
            font-weight:bold; 
            font-size:35px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            margin-top: 20px;
            font-weight:bold;
        }

        .chart-container {
            background-color: #e9e9e9;
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
        .selected-filters {
        font-weight: bold;
        font-size: 18px; /* Adjust the font size as needed */
        margin-top: 20px; /* Add margin for spacing */
    }
    .hidden {
            display: none;
        }
    </style>
</head>
<body class="antialiased">
    @include('layouts.adminnavigation')

    <x-app-layout>
        <div class="container">
            <h1>Service Performance Report</h1>

            <!-- Add date filter options -->
            <form action="{{ route('financialperformancereport') }}" method="get"> <!-- Update the route to the one that handles LineChart function -->
    @csrf
    <label for="monthFilter">Select Month:</label>
    <select name="month" id="monthFilter">
        @for ($month = 1; $month <= 12; $month++)
            <option value="{{ $month }}" {{ isset($selectedMonth) && $selectedMonth == $month ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $month, 1)) }}
            </option>
        @endfor
    </select>

    <label for="yearFilter">Select Year:</label>
    <select name="year" id="yearFilter">
        @for ($year = date('Y'); $year >= 2020; $year--)
            <option value="{{ $year }}" {{ isset($selectedYear) && $selectedYear == $year ? 'selected' : '' }}>
                {{ $year }}
            </option>
        @endfor
    </select>

    <!-- Add a select box for the range of days -->
    <label for="rangeFilter">Select Range of Days:</label>
    <select name="range" id="rangeFilter">
        @for ($startDay = 1; $startDay <= 31; $startDay += 7)
            @php
                $endDay = min($startDay + 6, 31);
            @endphp
            <option value="{{ $startDay }}-{{ $endDay }}" {{ isset($selectedRange) && $selectedRange == "$startDay-$endDay" ? 'selected' : '' }}>
                Days {{ $startDay }} - {{ $endDay }}
            </option>
        @endfor
    </select>

    <!-- Add a select box for the service progress -->
    <label for="progressFilter">Select Service Progress:</label>
    <select name="progress" id="progressFilter">
        @php
            $progressOptions = ['Ongoing', 'Refer to Other Technicians or Other Shop', 'Completed'];
        @endphp
        @foreach ($progressOptions as $progressOption)
            <option value="{{ $progressOption }}" {{ isset($selectedProgress) && $selectedProgress == $progressOption ? 'selected' : '' }}>
                {{ $progressOption }}
            </option>
        @endforeach
    </select>

    <!-- Add a button to trigger the chart update -->
    <button type="submit" style="background-color: #1e4f8f; color: white; font-weight: bold; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#144075'" onmouseout="this.style.backgroundColor='#1e4f8f'">Apply Filter</button>
</form>
            <div class="selected-filters" class="selected-filters hidden">
    @if(isset($selectedMonth))
        <p>Selected Month: {{ date('F', mktime(0, 0, 0, $selectedMonth, 1)) }}</p>
    @endif

    @if(isset($selectedYear))
        <p>Selected Year: {{ $selectedYear }}</p>
    @endif

    @if(isset($selectedRange))
        @php
            list($startDay, $endDay) = explode('-', $selectedRange);
        @endphp
        <p>Selected Range of Days: Days {{ $startDay }} - {{ $endDay }}</p>
    @endif

    @if(isset($selectedProgress))
        <p>Selected Service Progress: {{ $selectedProgress }}</p>
    @endif
</div>
            <!-- Chart container -->
            <div id="financialPerformanceChart" class="chart-container">
                @isset($data)
                    <canvas id="financialPerformanceChartCanvas"></canvas>
                @endisset
            </div>
            
        </div>
    </x-app-layout>

    <!-- Chart.js CDN and script -->
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
                            label: 'Number of Services',
                            data: values,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue background
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
        
        document.getElementById('filterForm').addEventListener('submit', function (event) {
                event.preventDefault();
                updateSelectedFilters();
            });

            function updateSelectedFilters() {
                var selectedFiltersDiv = document.getElementById('selectedFilters');
                selectedFiltersDiv.innerHTML = '';

                var selectedMonth = document.getElementById('monthFilter').value;
                if (selectedMonth) {
                    selectedFiltersDiv.innerHTML += '<p>Selected Month: ' + selectedMonth + '</p>';
                }

                var selectedYear = document.getElementById('yearFilter').value;
                if (selectedYear) {
                    selectedFiltersDiv.innerHTML += '<p>Selected Year: ' + selectedYear + '</p>';
                }

                var selectedRange = document.getElementById('rangeFilter').value;
                if (selectedRange) {
                    selectedFiltersDiv.innerHTML += '<p>Selected Range of Days: ' + selectedRange + '</p>';
                }

                var selectedProgress = document.getElementById('progressFilter').value;
                if (selectedProgress) {
                    selectedFiltersDiv.innerHTML += '<p>Selected Service Progress: ' + selectedProgress + '</p>';
                }

                // Show the selected-filters div after updating content
                selectedFiltersDiv.classList.remove('hidden');
            }
    </script>
    @endisset
</body>
</html>