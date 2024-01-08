@include('layouts.adminnavigation')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021">

                    <style>
                        /* Your existing styles */

                        table,
                        tr {
                            font-family: "Century ";
                            width: 100%; /* Extend table width */
                            font-weight: bold;
                            background-color: white;
                        }

                        td {
                            font-family: "Arial";
                            background-color: #cbd6e4;
                            padding: 8px; /* Adjust cell padding */
                        }

                        h6 {
                            font-weight: bold;
                            text-align: center;
                            font-size: 30px;
                            font-family: "Century Gothic";
                            color: white;
                        }

                        label {
                            color: white;
                        }

                        p {
                            color: white;
                            font-weight: bold;
                        }
                    </style>

                    <div style="text-align: center;">
                        <h6>Service Logs</h6>
                        <br>
                        <br>

                        <!-- Filter Form -->
                        <form id="filterForm" method="get" action="{{ route('servicelogs') }}" class="flex items-center justify-center space-x-4">
    <label for="month" class="text-sm font-semibold">Select Month:</label>
    <select name="month" id="month" class="border border-gray-300 rounded px-2 py-2">
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" @if ($i == $month) selected @endif>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
        @endfor
    </select>

    <label for="year" class="text-sm font-semibold">Select Year:</label>
    <select name="year" id="year" class="border border-gray-300 rounded px-2 py-2">
        @php
            $currentYear = date('Y');
        @endphp
        @for ($i = 2000; $i <= 2099; $i++)
            <option value="{{ $i }}" @if ($i == $year) selected @endif>{{ $i }}</option>
        @endfor
    </select>
</form>
                        <!-- End Filter Form -->

                        <br>
                        <br>

                        <div id="adminLogsContainer">
                            @if(count($servicedata) > 0)
                                <table id="adminLogs" style="border: 1px solid black; margin: auto;">
                                    <tr>
                                        <th>Service Number</th>
                                        <th>Customer Name</th>
                                        <th>Staff Name</th>
                                        <th>Actions Required</th>
                                        <th>Date and Time</th>
                                        <th>Service Started</th>
                                        <th>Service End</th>
                                        <th>Work Progress</th>
                                    </tr>

                                    <tbody>
                                        @foreach($servicedata as $log)
                                            <tr>
                                                <td>{{ $log->serviceno }}</td>
                                                <td>{{ $log->customername }}</td>
                                                <td>{{ $log->staffname }}</td>
                                                <td>{{ $log->actionsrequired }}</td>
                                                <td>{{ date('F d, Y h:i A', strtotime($log->dateandtime)) }}</td>
                                                <td>{{ date('F d, Y h:i A', strtotime($log->servicestarted)) }}</td>
                                                <td>{{ date('F d, Y h:i A', strtotime($log->serviceend)) }}</td>
                                                <td>{{ $log->workprogress}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No records found.</p>
                            @endif
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- Additional space if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript to trigger form submission on dropdown change -->
    <script>
        document.getElementById('month').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        document.getElementById('year').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });
    </script>
</x-app-layout>
