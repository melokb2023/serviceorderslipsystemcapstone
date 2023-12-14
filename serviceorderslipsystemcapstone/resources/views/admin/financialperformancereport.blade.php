@include('layouts.adminnavigation')

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black;">
        <div class="p-6 text-black font-bold" style="border: 3px solid black; background-color: #e9e9e9; text-align: center;">

            <h1 style="color: black; font-weight: bold;">Service Report</h1>

            <!-- Add date filter options -->
            <label for="dateFilter">Select Date Range:</label>
            <select id="dateFilter" class="w-full p-2 border rounded">
                <option value="all">All</option>
                <option value="week">Current Week</option>
                <option value="month">Current Month</option>
                <option value="year">Entire Year</option>
            </select>

            <!-- Add a button to trigger the chart update -->
            <button onclick="updateChart()" class="mt-2 bg-blue-500 text-white font-bold py-2 px-4 rounded">Apply Filter</button>

            <canvas id="financialPerformanceChart" class="mt-4"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

                    // Manually encode the PHP data into JSON format
                    var rawData = '{!! json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
                    var originalData = JSON.parse(rawData);

                    // Initial rendering with all data
                    renderChart(originalData);
                });

                function updateChart() {
                    var selectedFilter = document.getElementById('dateFilter').value;
                    var filteredData = originalData;

                    // Apply date filter
                    if (selectedFilter === 'week') {
                        filteredData = filterDataByWeek(filteredData);
                    } else if (selectedFilter === 'month') {
                        filteredData = filterDataByMonth(filteredData);
                    } else if (selectedFilter === 'year') {
                        filteredData = filterDataByYear(filteredData);
                    }

                    // Render the updated chart
                    renderChart(filteredData);
                }

                function renderChart(data) {
                    var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

                    var labels = Object.keys(data);
                    var values = Object.values(data);

                    // Destroy the previous chart instance if it exists
                    if (window.myBarChart) {
                        window.myBarChart.destroy();
                    }

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

                // ... (rest of the code remains the same)
            </script>
        </div>
    </div>
</x-app-layout>
