<x-app-layout>

    @include('layouts.adminnavigation')

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <style>
                        /* Your existing styles */
                        body {
                            font-family: 'Helvetica Neue', Helvetica, Arial;
                            font-size: 14px;
                            line-height: 20px;
                            font-weight: 400;
                            color: #3b3b3b;
                            -webkit-font-smoothing: antialiased;
                            background: #2b2b2b;
                        }

                        @media screen and (max-width: 580px) {
                            body {
                                font-size: 16px;
                                line-height: 22px;
                            }
                        }

                        .wrapper {
                            margin: 0 auto;
                            padding: 22px;
                            max-width: 100%;
                            overflow-x: auto;
                        }

                        .table {
                            margin: 0 auto;
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                            display: flex;
                            flex-direction: column;
                            min-width: 100%;
                            overflow-x: auto; /* Enable horizontal scroll for small screens */
                        }

                        .row {
                            display: flex;
                            flex-wrap: wrap; /* Wrap cells to the next line if necessary */
                            border-bottom: 1px solid #ddd;
        
                        }

                        .cell {
                            padding: 10px;
                            flex: 1 1 0; /* Equal width, allow shrinking, don't grow */
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
                        .header{
                            background-color: #2980b9;
                        }

                        .cell:nth-child(1) {
                            flex-basis: 10%; /* Adjust the width of the first column */
                        }

                        .cell:nth-child(2) {
                            flex-basis: 20%; /* Adjust the width of the second column */
                        }

                        /* Adjust the widths of other columns as needed */

                        .button {
                            border: none;
                            color: white;
                            text-decoration: none;
                            display: inline-block;
                            padding: 15px 32px;
                            border-radius: 8px;
                            font-size: 16px;
                            cursor: pointer;
                            transition: transform 0.2s ease-in-out;
                            font-weight: bold;
                        }

                        .button:hover {
                            transform: scale(1.05);
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
                            color: black;
                            font-weight: bold;
                        }

                        /* Pagination styles */
                        .pagination {
                            margin-top: 20px;
                            display: flex;
                            justify-content: center;
                        }

                        .pagination a {
                            padding: 8px 16px;
                            margin: 0 5px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            text-decoration: none;
                            color: #333;
                        }

                        /* Prev button style */
                        .pagination a.prev {
                            background-color: blue;
                            color: white; /* Adjust this to your desired shade of blue */
                        }

                        /* Next button style */
                        .pagination a.next {
                            background-color: darkgreen;
                            color: white; /* Adjust this to your desired shade of green */
                        }

                        .pagination a.active {
                            background-color: #007bff;
                            color: #fff;
                            border-color: #007bff;
                        }

                    </style>

                    <div style="text-align: center;">
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

                        @if(count($servicedata) > 0)
                            <div class="wrapper" id="staffLogsContainer">
                                <div class="table" id="staffLogs">
                                    <div class="row header">
                                        <div class="cell" style="color:white"> User ID</div>
                                        <div class="cell" style="color:white"> Name</div>
                                        <div class="cell" style="color:white"> User Type </div>
                                        <div class="cell" style="color:white"> Description </div>
                                        <div class="cell" style="color:white"> Action Date and Time </div>
                                    </div>
                                    @foreach($servicedata as $log)
                                        <div class="row">
                                            <div class="cell">{{ $log->userid }}</div>
                                            <div class="cell">{{ $log->name}}</div>
                                            <div class="cell">{{ $log->usertype}}</div>
                                            <div class="cell">{{ $log->description}}</div>
                                            <div class="cell">{{ date('F d, Y h:i:s A', strtotime($log->actiondatetime)) }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Pagination links -->
                            <div class="pagination">
                                @if($servicedata->currentPage() > 1)
                                    <a href="{{ $servicedata->previousPageUrl() }}" class="button prev">Prev</a>
                                @endif

                                @if($servicedata->nextPageUrl())
                                    <a href="{{ $servicedata->nextPageUrl() }}" class="button next">Next</a>
                                @endif
                            </div>

                        @else
                            <p>No records found.</p>
                        @endif
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
