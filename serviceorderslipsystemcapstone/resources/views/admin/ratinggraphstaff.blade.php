@include('layouts.adminnavigation')

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black;">
        <div class="p-6 text-black font-bold" style="border: 3px solid black; background-color: #e9e9e9; text-align: center;">

            <h1 style="color: black; font-weight: bold;">Rating Performance Report by Staff</h1>

            <div>
                <label for="staffFilter" style="font-weight: bold;">Filter by Assigned Staff:</label>
                <select id="staffFilter" style="font-weight: bold;">
                    @foreach($staffNames as $staffName)
                        <option value="{{ $staffName }}">{{ $staffName }}</option>
                    @endforeach
                </select>

                <!-- Add month and year dropdowns for filtering -->
                <label for="monthFilter" style="font-weight: bold;">Filter by Month:</label>
                <select id="monthFilter" style="font-weight: bold;">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                    @endfor
                </select>

                <label for="yearFilter" style="font-weight: bold;">Filter by Year:</label>
                <select id="yearFilter" style="font-weight: bold;">
                    @for ($year = date('Y'); $year >= 2020; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>

                <button onclick="applyFilter()" style="background-color: #38a169; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; font-weight: bold; cursor: pointer; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#2f855a'" onmouseout="this.style.backgroundColor='#38a169'">Apply Filter</button>
            </div>

            <!-- Display selected year and month -->
            <p id="selectedYearMonth" style="font-weight: bold; margin-top: 10px;"></p>

            <p id="averageRating" style="font-weight: bold; margin-top: 10px;">Average Rating: N/A</p>

            <canvas id="financialPerformanceChart" class="mt-4"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

        // Manually encode the PHP data into JSON format
        var rawData = '{!! json_encode($chartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
        var chartData = JSON.parse(rawData);

        var selectedStaff = document.getElementById('staffFilter').value;
        var selectedMonth = document.getElementById('monthFilter').value;
        var selectedYear = document.getElementById('yearFilter').value;

        renderChart(chartData[selectedStaff][`${selectedYear}-${selectedMonth}`]);
    });

    function applyFilter() {
        var selectedStaff = document.getElementById('staffFilter').value;
        var selectedMonth = document.getElementById('monthFilter').value;
        var selectedYear = document.getElementById('yearFilter').value;

        var rawData = '{!! json_encode($chartData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
        var chartData = JSON.parse(rawData);

        renderChart(chartData[selectedStaff][`${selectedYear}-${selectedMonth}`]);
    }

    function renderChart(data) {
        var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

        var labels = ['1', '2', '3', '4', '5'];
        var values = data;

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

            // Calculate and display the average rating
            var averageRating = values.reduce((acc, val, idx) => acc + (val * (idx + 1)), 0) / values.reduce((acc, val) => acc + val, 0);
            document.getElementById('averageRating').innerText = 'Average Rating: ' + (isNaN(averageRating) ? 'N/A' : averageRating.toFixed(2));
        }
    }
</script>

        </div>
    </div>
</x-app-layout>
