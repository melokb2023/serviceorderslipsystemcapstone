@include('layouts.adminnavigation')

<x-app-layout>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
        <style>
            *{box-sizing:border-box;font-family:"Century Gothic";font-weight:bold}
            h2{font-family:"Century Gothic";font-weight:bold;color:red}
            .additional-content p{color:black;font-weight:bold}
            .additional-content a{display:inline-block;padding:10px;background-color:#3490dc;color:white;text-decoration:none;border-radius:5px;margin-top:10px}
            .additional-content a:hover{background-color:#276695}
            .h6{color:white}.flex{display:flex}
            .justify-center{justify-content:center}
            .items-center{align-items:center}
            .h-screen{height:100vh}
            .space-x-4{margin-right:1rem}
            .p-4{padding:1rem}
            .bg-white{background-color:#fff}
            .dark:bg-gray-800{background-color:#2d2f33}
            .overflow-hidden{overflow:hidden}
            .shadow-sm{box-shadow:0 1px 2px rgba(0,0,0,0.05)}
            .sm\:rounded-lg{border-radius:0.375rem}
            .text-white{color:#fff}
            .dark\:text-gray-100{color:#f9fafb}
            .border{border:1px solid #d2d6dc}
            .rounded-lg{border-radius:0.5rem}
            .text-2xl{font-size:1.5rem;line-height:2rem}
            .font-bold{font-weight:700}.mb-4{margin-bottom:1rem}
            .mt-8{margin-top:2rem}.text-center{text-align:center}
            .text-blue-500{color:#3490dc}.mt-8{margin-top:2rem}
            #servicePerformanceChart{width:85%;height:70%}.chart-container{width:100%}.card-container{height:100%}
        </style>

<div>
            <br>
            <br>
            <div class="flex space-x-4">
                <!-- Card 1 -->
                <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                            <h2 class="text-2xl font-bold mb-4">{{$typesOfServicesCount}} Total Number of Service Types</h2>
                            <!-- Additional Content for Card 1 -->
                            <div class="additional-content">
                                <p>Explore the different types of services offered by your business. Monitor and manage service categories.</p>
                                <a href="{{ route('servicelist') }}">View Service Types</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                            <h2 class="text-2xl font-bold mb-4">{{$customerAppointmentsCount}} Total Number of Appointments</h2>
                            <!-- Additional Content for Card 2 -->
                            <div class="additional-content">
                                <p>Track and manage customer appointments efficiently. Ensure a smooth scheduling process for your clients.</p>
                                <a href="{{ route('customerlist') }}">View Appointments</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                            <h2 class="text-2xl font-bold mb-4">{{$serviceDataCount}} Total Number of Job Orders</h2>
                            <!-- Additional Content for Card 3 -->
                            <div class="additional-content">
                                <p>Keep an eye on all job orders and service requests. Manage and prioritize tasks effectively.</p>
                                <a href="{{ route('servicedata') }}">View Job Orders</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                            <h2 class="text-2xl font-bold mb-4">{{$ratingsCount}} Total Number of Ratings</h2>
                            <!-- Additional Content for Card 4 -->
                            <div class="additional-content">
                                <p>Monitor customer satisfaction through ratings. Address feedback and improve service quality.</p>
                                <a href="{{ route('customerrating') }}">View Ratings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <!-- Chart Section -->
        <div style="background-color: #e9e9e9; border: 3px solid black;">
            <h2 class="text-2xl font-bold mb-4 text-center text-white">Service Performance Chart</h2>
            <canvas id="servicePerformanceChart"></canvas>
        </div>
        <br>
        <br>
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
                        y: {beginAtZero: true}
                    }
                }
            });
        });
    </script>
</x-app-layout>
