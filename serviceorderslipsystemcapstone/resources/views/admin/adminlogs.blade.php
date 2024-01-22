@include('layouts.adminnavigation')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <style>
                        /* Your existing styles */

                        table th {
        background-color: black;
        color: white;
        border: 3px solid black;
    }

    table,
    tr {
        font-family: "Century Gothic";
        width: 100%; /* Extend table width */
        font-weight: bold;
        background-color: white;
    }

    td {
        font-family: "Century Gothic";
        background-color: white;
        padding: 8px; /* Adjust cell padding */
        border: 3px solid black; /* Keep the black border for cells */
    }

                        h6 {
                            font-weight: bold;
                            text-align: center;
                            font-size: 30px;
                            font-family: "Century Gothic";
                            color: black;
                        }

                        label {
                            color: black;
                        }

                        p {
                            color: white;
                            font-weight: bold;
                        }
                    </style>

                    <div style="text-align: center;">
                        <h6>System Logs</h6>
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

                        <div id="adminLogsContainer" style="max-height: 500px; overflow: auto;">
    @if(count($servicedata) > 0)
        <table id="adminLogs" style="border: 3px solid black; margin: auto; width: 100%;">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>User Type</th>
                <th>Description</th>
                <th>Action Date and Time</th>
            </tr>

            <tbody>
                @foreach($servicedata as $log)
                    <tr>
                        <td>{{ $log->userid }}</td>
                        <td>{{ $log->name}}</td>
                        <td>{{ $log->usertype}}</td>
                        <td>{{ $log->description}}</td>
                        <td>{{ date('F d, Y h:i A', strtotime($log->actiondatetime)) }}</td>
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
