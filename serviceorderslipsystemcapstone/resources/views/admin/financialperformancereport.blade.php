@include('layouts.adminnavigation')

<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black;">
        <div class="p-6 text-black font-bold" style="border: 3px solid black; background-color: #e9e9e9; text-align: center;">

            <h1 style="color: black; font-weight: bold;">Service Report</h1>

            <!-- Add date filter options -->
            <label for="dateFilter">Select Date Range:</label>
            <select id="dateFilter" onchange="updateChart()" class="w-full p-2 border rounded">
                <option value="all">All</option>
                <option value="week">Current Week</option>
                <option value="month">Current Month</option>
            </select>

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
                    }

                    // Render the updated chart
                    renderChart(filteredData);
                }

                function filterDataByWeek(data) {
                    // Implement logic to filter data for the current week
                    // You may use a library like moment.js for date manipulation
                    // Example: Filter data for the last 7 days
                    var lastWeekData = {};
                    var currentDate = new Date();
                    for (var i = 0; i < 7; i++) {
                        var dateKey = formatDate(currentDate);
                        lastWeekData[dateKey] = data[dateKey] || 0;
                        currentDate.setDate(currentDate.getDate() - 1); // Move to the previous day
                    }
                    return lastWeekData;
                }

                function filterDataByMonth(data) {
                    // Implement logic to filter data for the current month
                    // Example: Filter data for the current month
                    var currentMonthData = {};
                    var currentDate = new Date();
                    var currentMonth = currentDate.getMonth();
                    for (var dateKey in data) {
                        var date = new Date(dateKey);
                        if (date.getMonth() === currentMonth) {
                            currentMonthData[dateKey] = data[dateKey];
                        }
                    }
                    return currentMonthData;
                }

                function renderChart(data) {
                    var ctx = document.getElementById('financialPerformanceChart').getContext('2d');

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
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }
                        }
                    });
                }

                function formatDate(date) {
                    // Implement logic to format the date as needed
                    // You may use a library like moment.js for date formatting
                    return date.toISOString().split('T')[0];
                }
            </script>
        </div>
    </div>
</x-app-layout>
