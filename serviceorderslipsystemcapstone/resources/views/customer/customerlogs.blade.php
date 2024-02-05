<x-app-layout>

    @include('layouts.customernavigation')

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Filter Form -->
                    <div style="text-align: center;">
                        <form id="filterForm" method="get" action="{{ route('customerlogs') }}" class="flex items-center justify-center space-x-4">
                            @csrf
                            <label for="month" class="text-sm font-semibold">Select Month:</label>
                            <select name="month" id="month" class="border border-gray-300 rounded px-2 py-2">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" @if ($i == $selectedMonth) selected @endif>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                @endfor
                            </select>

                            <label for="year" class="text-sm font-semibold">Select Year:</label>
                            <select name="year" id="year" class="border border-gray-300 rounded px-2 py-2">
                                @php
                                    $currentYear = date('Y');
                                @endphp
                                @for ($i = 2000; $i <= 2099; $i++)
                                    <option value="{{ $i }}" @if ($i == $selectedYear) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </form>
                        <!-- End Filter Form -->

                        <div class="wrapper" id="customerLogsContainer">
                            <div class="table" id="customerLogs">
                                <div class="row header">
                                    <div class="user-id-cell">User ID</div>
                                    <div class="cell name-cell">Name</div> <!-- Adjusted width for Name cell -->
                                    <div class="cell type-cell">User Type</div>
                                    <div class="cell description-cell">Description</div> <!-- Adjusted width for Description cell -->
                                    <div class="cell">Action Date and Time</div>
                                </div>
                                @foreach($logs as $customer)
                                    <div class="row">
                                        <div class="user-id-cell">{{ $customer->userid }}</div>
                                        <div class="cell name-cell">{{ $customer->name}}</div>
                                        <div class="cell type-cell">{{ $customer->usertype}}</div>
                                        <div class="cell description-cell">{{ $customer->description}}</div>
                                        <div class="cell">{{ date('F d, Y h:i:s A', strtotime($customer->actiondatetime)) }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="pagination">
                            @if($logs->previousPageUrl())
                                <a href="{{ $logs->previousPageUrl() }}" class="button prev">Prev</a>
                            @endif

                            @if($logs->nextPageUrl())
                                <a href="{{ $logs->nextPageUrl() }}" class="button next">Next</a>
                            @endif
                        </div>
                        <!-- End Pagination -->

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
                            width: 100%; /* Adjusted to fill the available space */
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                            display: table;
                        }

                        /* Rest of your styles */
                        .row {
                            display: table-row;
                            background: #f6f6f6;
                        }

                        .row:nth-of-type(odd) {
                            background: #e9e9e9;
                        }

                        .row.header {
                            font-weight: 900;
                            color: #ffffff;
                            background: #2980b9;
                        }

                        .cell {
                            padding: 6px 12px;
                            display: table-cell;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }

                        /* Adjusted widths for Name and Description cells */
                        .name-cell {
                            width: 20%;
                        }

                        .description-cell {
                            width: 40%;
                        }

                        @media screen and (max-width: 580px) {
                            .cell {
                                padding: 2px 16px;
                                display: block;
                            }
                        }

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
                            background-color: green;
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
        color:white; /* Adjust this to your desired shade of blue */
    }

    /* Next button style */
    .pagination a.next {
        background-color: darkgreen;
        color:white; /* Adjust this to your desired shade of green */
    }

    .pagination a.active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
    </style>
</x-app-layout>
