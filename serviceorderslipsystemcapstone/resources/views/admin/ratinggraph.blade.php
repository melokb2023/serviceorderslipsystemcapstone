@include('layouts.adminnavigation')
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <div class="p-6 text-black font-bold" style="text-align: center;">

            <h1 style="color: black; font-weight: bold;">Overall Performance Report</h1> 
            <p class="mt-4" style="font-weight: bold;">Company's Overall Rating :{{ $average }}</p>
            <div class="mt-4">
           
            <form action="{{ route('ratinggraph') }}" method="get" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-primary" style="background-color: #3490dc; color: #fff; border-radius: 8px; padding: 10px 20px; margin-right: 10px; font-weight: bold;">View Rating Graph</button>
</form>

<form action="{{ route('ratinggraphstaff') }}" method="get" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-primary" style="background-color: #38a169; color: #fff; border-radius: 8px; padding: 10px 20px; font-weight: bold;">View Rating Graph by Staff</button>
</form>
            </div>
            <canvas id="financialPerformanceChart" class="mt-4"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('financialPerformanceChart').getContext('2d');
        var rawData = '{!! json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!}';
        var data = JSON.parse(rawData);
        var labels = ['1', '2', '3', '4', '5'];
        var backgroundColors = ['#ff8c5a', '#ffb234', '#ffd934', '#add633', '#a0c15a'];

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Count',
                    data: [
                        data['1'] ? data['1'] : 0,
                        data['2'] ? data['2'] : 0,
                        data['3'] ? data['3'] : 0,
                        data['4'] ? data['4'] : 0,
                        data['5'] ? data['5'] : 0
                    ],
                    backgroundColor: backgroundColors,
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
                },
                plugins: {
                    legend: {
                        display: true, // Set to true to display legend
                        labels: {
                            generateLabels: function (chart) {
                                return labels.map(function (label, index) {
                                    return {
                                        text: label,
                                        fillStyle: backgroundColors[index],
                                        strokeStyle: backgroundColors[index],
                                        lineWidth: 2,
                                        hidden: false, // Set to true if you want to hide specific legend items
                                        index: index
                                    };
                                });
                            }
                        }
                    },
                    title: {
                        display: false
                    }
                }
            }
        });
    });
</script>



        </div>
    </div>
</x-app-layout>
