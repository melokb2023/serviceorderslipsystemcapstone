@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif
@include('layouts.staffnavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; width: 100%; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">
                    <style>
                        table, tr {
                            font-family: "Century Gothic";
                            border-collapse: collapse;
                            width: 100%;
                            font-weight: bold;
                        }

                        td {
                            font-family: "Century Gothic";
                            background-color: #cbd6e4;
                        }

                        th {
                            font-family: "Century Gothic";
                            background-color: white;
                        }

                        h6 {
                            font-weight: bold;
                            text-align: center;
                            font-size: 30px;
                            font-family: "Century Gothic";
                            color: white;
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
                            align-items: center;
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }

                        .no-records {
                            font-family: "Century Gothic";
                            font-size: 18px;
                            text-align: center;
                            color: red;
                            margin-top: 20px;
                        }
                        .ongoing { background-color: yellow; }
                        .incomplete {
    background-color: #FFB6C1; /* Light Red */
}
                        .completed { background-color: #90EE90; }
                    </style>

                    <h6>List of Works</h6>
                    <br>
                    <br>

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
                        <table style="text-align:center">
                            <thead>
                                <tr>
                            <th>Work Number</th>
                            <th>Service Number</th>
                            <th>Staff Name</th>
                            <th>Customer Name</th>

                            <th>Customer Password</th>
                            <th>Work Started</th>
                            <th>Actions Taken</th>
                            <th>Work Progress</th>
                            <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffdatabase as $staffRecord)
                                    <tr style="text-align:center">
                                        <td>{{ $staffRecord->worknumber }}</td>
                                        <td>{{ $staffRecord->serviceno }}</td>
                                        <td>{{ $staffRecord->staffname }}</td>
                                        <td>{{ $staffRecord->customername }}</td>
                                        <td>{{ str_repeat('*', strlen($staffRecord->customerpassword)) }}</td>
                                        <td>{{ date('F d, Y h:i A', strtotime($staffRecord->workstarted)) }}</td>
                                        <td>{{ $staffRecord->actionstaken }}</td>
                                        <td class="{{ $staffRecord->workprogress === 'Ongoing' ? 'ongoing' : ($staffRecord->workprogress === 'Unable to Complete' ? 'incomplete' : 'completed') }}">{{ $staffRecord->workprogress }}</td>
                                        <td>
                                        <div class="grid grid-cols-2 gap-2">
    <!-- First Row -->
    <div>
    @if ($staffRecord->workstarted !== null && $staffRecord->worknumber !== null)
        <a style="background-color: #f6e05e; width: 1.5rem; height: 1.5rem; line-height: 1.5rem; padding: 0.3rem; margin: 0.1rem; display: inline-flex; align-items: center; justify-content: center;"
           class="mt-4 text-black font-bold rounded inline-block"
           href="{{ route('staffdatabase-show', ['serviceno' => $staffRecord->serviceno]) }}"
           title="View">
           👁
        </a>
    @endif
    </div>

    <div>
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
</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
