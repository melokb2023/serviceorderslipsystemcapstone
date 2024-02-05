@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif
@include('layouts.staffnavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <style>
                        body {
                            font-family: 'Helvetica Neue', Helvetica, Arial;
                            font-size: 14px;
                            line-height: 20px;
                            font-weight: 400;
                            color: #3b3b3b;
                            -webkit-font-smoothing: antialiased;
                            font-smoothing: antialiased;
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
                            width: 100%;
                            text-align: center; /* Center align content */
                        }

                        .table {
                            margin: 0 auto; /* Center align table */
                            width: 100%; /* Set table width to 100% */
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                            display: table;
                            border-collapse: collapse; /* Collapse border spacing */
                        }

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
                            padding: 6px 12px; /* Apply padding to other cells */
                            margin: 0; /* Remove margin */
                            display: table-cell;
                            vertical-align: top; /* Align content to the top */
                        }

                        .work-number-cell {
                            padding: 6px 12px; /* Adjust padding */
                            width: 1%; /* Allow the cell to size to its content */
                            white-space: nowrap; /* Prevent wrapping */
                        }

                        @media screen and (max-width: 580px) {
                            .cell {
                                padding: 2px 16px;
                                display: block;
                            }
                        }

                        button {
                            align-items: center;
                        }

                        .tooltip {
                            position: relative;
                            display: inline-block;
                        }

                        .tooltip .tooltiptext {
                            visibility: hidden;
                            width: 100px;
                            background-color: black;
                            color: white;
                            text-align: center;
                            border-radius: 6px;
                            padding: 5px;
                            position: absolute;
                            z-index: 1;
                            bottom: -20px;
                            left: 50%;
                            transform: translateX(-50%);
                        }

                        .tooltip:hover .tooltiptext {
                            visibility: visible;
                        }
                    </style>
                    <div class="form-group" style="display: flex; gap: 10px;">
                        <!-- Filter Form -->
                        <form method="get" action="{{ route('staffdatabase') }}" class="flex items-center justify-center space-x-4 mb-8">
                            <label for="workNumber" class="text-black font-bold">Work Number:</label>
                            <input type="text" name="workNumber" value="{{ request('workNumber') }}" class="border rounded-md py-2 px-3">
                            <label for="workProgress" class="text-black font-bold">Work Progress:</label>
                            <select name="workProgress" class="border rounded-md py-2 px-3">
                                <option value="">Select Work Progress</option>
                                <option value="Ongoing" {{ request('workProgress') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="Completed" {{ request('workProgress') == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md font-bold hover:bg-blue-700 transition duration-300">Filter</button>
                        </form>
                    </div>
                    <!-- Display Works Table or No Records Found Message -->
                    @if($staffdatabase !== null && $staffdatabase->count() > 0)
                        <div class="table">
                            <div class="row header">
                                <div class="cell work-number-cell">Work Number</div> <!-- Apply specific class -->
                                <div class="cell">Service Number</div>
                                <div class="cell">Customer Name</div>
                                <div class="cell">Customer Password</div>
                                <div class="cell">Work Started</div>
                                <div class="cell">Actions Taken</div>
                                <div class="cell">Work Progress</div>
                                <div class="cell">Options</div>
                            </div>
                            @foreach($staffdatabase as $staffRecord)
                                <div class="row">
                                    <div class="cell">{{ $staffRecord->worknumber }}</div>
                                    <div class="cell">{{ $staffRecord->serviceno }}</div>
                                    <div class="cell">{{ $staffRecord->customername }}</div>
                                    <div class="cell">{{ str_repeat('*', strlen($staffRecord->customerpassword)) }}</div>
                                    <div class="cell">{{ date('F d, Y h:i A', strtotime($staffRecord->workstarted)) }}</div>
                                    <div class="cell">{{ $staffRecord->actionstaken }}</div>
                                    <div class="cell">{{ $staffRecord->workprogress }}</div>
                                    <div class="cell">
                                        <div class="grid grid-cols-2 gap-2">
                                            <!-- First Row -->
                                            <div class="cell">
                                                @if ($staffRecord->workstarted !== null && $staffRecord->worknumber !== null)
                                                    <a style="background-color: #f6e05e; width: 1.5rem; height: 1.5rem; line-height: 1.5rem; padding: 0.3rem; margin: 0.1rem; display: inline-flex; align-items: center; justify-content: center;"
                                                       class="mt-4 text-black font-bold rounded inline-block"
                                                       href="{{ route('staffdatabase-show', ['serviceno' => $staffRecord->serviceno]) }}"
                                                       title="View">
                                                        👁
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="cell">
                                                @if ($staffRecord->workstarted !== null && $staffRecord->worknumber !== null)
                                                    <a style="background-color: blue; width: 1.5rem; height: 1.5rem; line-height: 1.5rem; padding: 0.3rem; margin: 0.1rem; display: inline-flex; align-items: center; justify-content: center;"
                                                       class="mt-4 text-white font-bold rounded inline-block"
                                                       href="{{ route('staffdatabase-edit', ['serviceno' => $staffRecord->serviceno]) }}"
                                                       title="Edit">
                                                        ✏
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- Second Row -->
                                            <div class="col-span-2">
                                                @if ($staffRecord->worknumber === null)
                                                    <a class="mt-4 text-black font-bold rounded inline-block button text-center"
                                                       href="{{ route('add-staffdatabase', ['id' => $staffRecord->serviceno]) }}"
                                                       title="Start Work"
                                                       style="background-color: #76c893; /* Adjusted light green color */ color: black; /* Black text color */ width: 1.5rem; height: 1.5rem; line-height: 1.5rem; padding: 0.3rem; margin: 0.1rem; display: inline-flex; align-items: center; justify-content: center;">
                                                        +
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="no-records text-black font-bold" style="color:black">No records found.</p>
                    @endif
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
