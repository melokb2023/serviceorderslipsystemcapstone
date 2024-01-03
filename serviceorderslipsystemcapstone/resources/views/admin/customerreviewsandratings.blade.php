@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif

@include('layouts.adminnavigation')

<x-app-layout>
    <div class="py-12" style="width: 100%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;width: 100%;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;width: 100%">
                    <link rel="stylesheet" href="style.scss">
                    <style>
                        table,
                        tr {
                            font-family: "Century Gothic";
                            border-collapse: collapse;
                            width: 100%;
                            font-weight: bold;
                        }

                        td {
                            font-family: "Century Gothic";
                            background-color: #cbd6e4;
                            font-size: 15px;
                        }

                        th,
                        tr {
                            font-family: "Century Gothic";
                            background-color: white;
                            font-size: 15px;
                        }

                        h6 {
                            font-style: "Century Gothic";
                            text-align: center;
                            font-weight: bold;
                            font-size: 30px;
                            color: white;
                        }

                        /* Add styling for the form */
                        form {
                            margin-bottom: 20px;
                            display: flex;
                            justify-content: space-between;
                        }

                        form select {
                            width: 150px;
                            margin-right: 10px;
                            border: 1px solid #cbd6e4;
                            border-radius: 4px;
                            padding: 6px;
                        }

                        .button-yellow {
                            background-color: #f6e05e;
                            color: black;
                            font-weight: bold;
                            border: 1px solid #f6e05e;
                            border-radius: 4px;
                            padding: 6px 10px;
                            cursor: pointer;
                        }

                        .button-yellow:hover {
                            background-color: #e0cc52;
                            border: 1px solid #e0cc52;
                        }
                        p{ 
                            color:white;
                            font-weight:bold;
                            text-align:center;
                        }
                    </style>

                    <h6>Rating Information</h6>

                    <!-- Add the form for filtering -->
                    <form id="filterForm" method="GET" action="{{ route('customerrating') }}" class="flex items-center justify-center space-x-4">
                        @csrf

                        <label for="ratingFilter" class="text-sm font-semibold text-white">Filter by Rating:</label>
                        <select name="rating_filter" id="ratingFilter">
                            <option value="">Select Rating (All)</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ request('rating_filter') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>

                        <!-- Add more dropdowns for additional filters if needed -->

                        <button type="button" class="button-yellow" onclick="applyFilter()">Filter</button>
                    </form>

                    @if(count($customerrating) > 0)
                        <table style="border: 5px solid black;width: 100%">
                            <tr>
                                <th>Rating Number</th>
                                <th>Service Number</th>
                                <th>Reviewer ID</th>
                                <th>Reviewer Name</th>
                                <th>Assigned Staff</th>
                                <th>Review</th>
                                <th>Staff Performance Rating</th>
                                <th>Overall Performance Rating</th>
                                <th>Options</th>
                            </tr>

                            <tbody>
                                @foreach($customerrating as $customer)
                                    <tr>
                                        <td>{{ $customer->ratingno }}</td>
                                        <td>{{ $customer->serviceno }}</td>
                                        <td>{{ $customer->reviewerid }}</td>
                                        <td>{{ $customer->reviewername }}</td>
                                        <td>{{ $customer->assignedstaff }}</td>
                                        <td>{{ $customer->review }}</td>
                                        <td>{{ $customer->staffperformance }}</td>
                                        <td>{{ $customer->rating }}</td>
                                        <td>
                                            <br>
                                            <br>
                                            <a style="background-color: #f6e05e; height: 0.20rem;"
                                               class="mt-4 text-black font-bold py-2 px-4 rounded"
                                               href="{{ route('customerrating-show', ['cr' => $customer->ratingno]) }}">View</a>
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No records found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function applyFilter() {
            document.getElementById('filterForm').submit();
        }
    </script>
</x-app-layout>
