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

                        .button-green {
                            background-color:green;
                            color: white;
                            font-weight: bold;
                            border-radius: 4px;
                            padding: 6px 10px;
                            cursor: pointer;
                        }

                        .button-green:hover {
                            background-color: blue;
                            border: 1px solid blue;
                        }
                        p{ 
                            color:white;
                            font-weight:bold;
                            text-align:center;
                        }
                        label{
                            color:white;
                            font-weight:bold;
                        }
                    </style>

                    <h6>Rating Information</h6>

                    <!-- Add the form for filtering -->
                    <form id="filterForm" method="GET" action="{{ route('customerrating') }}" class="flex items-center justify-center space-x-4">
    @csrf

    <label for="reviewername_filter">Reviewer Name:</label>
    <input type="text" id="reviewername_filter" name="reviewername_filter" style="font-weight: bold; height: 50px;" value="{{ request('reviewername_filter') }}" placeholder="Enter Reviewer Name">

    <!-- Add more input boxes for additional filters if needed -->

    <button type="button" class="button-green" onclick="applyFilter()">Search</button>
</form>
                    @if(count($customerrating) > 0)
                        <table style="border: 5px solid black;width: 100%">
                            <tr>
                                <th>Service Number</th>
                                <th>Reviewer Name</th>
                                <th>Assigned Staff</th>
                                <th>Review</th>
                                <th>Staff Performance Rating</th>
                                <th>Performance Interpretation</th>
                                <th>Overall Performance Rating</th>
                                <th>Interpretation</th>
                                <th>Options</th>
                            </tr>

                            <tbody>
                                @foreach($customerrating as $customer)
                                    <tr>
                                        <td>{{ $customer->serviceno }}</td>
                                        <td>{{ $customer->reviewername }}</td>
                                        <td>{{ $customer->assignedstaff }}</td>
                                        <td>{{ $customer->review }}</td>
                                        <td>{{ $customer->staffperformance }}</td>
                                        <td>
                                        @if (!empty($customer->staffperformance))
                            @switch($customer->staffperformance)
                                @case(1)
                                    Very Poor
                                    @break
                                @case(2)
                                    Poor
                                    @break
                                @case(3)
                                    Average
                                    @break
                                @case(4)
                                    Good
                                    @break
                                @case(5)
                                    Excellent
                                    @break
                                @default
                                    Unknown Rating
                            @endswitch
                        @else
                            No Rating
                        @endif
        </td>
                                        <td>{{ $customer->rating }}</td>
                                        <td>
            @if (!empty($customer->rating))
                @switch($customer->rating)
                    @case(1)
                        Very Dissatisfied
                        @break
                    @case(2)
                        Somewhat Dissatisfied
                        @break
                    @case(3)
                        Neither Satisfied nor Dissatisfied
                        @break
                    @case(4)
                        Somewhat Satisfied
                        @break
                    @case(5)
                        Very Satisfied
                        @break
                    @default
                        Unknown Rating
                @endswitch
            @else
                No Rating
            @endif
        </td>
                                        
                                        <td>
                                            <br>
                                            <br>
                                            <a style="background-color: #f6e05e; height: 0.20rem;"
   class="mt-4 text-black font-bold py-2 px-4 rounded mr-4"
   href="{{ route('customerrating-show', ['cr' => $customer->ratingno]) }}"
   title="View">
   👁️
</a>
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
