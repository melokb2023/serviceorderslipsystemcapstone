@include('layouts.adminnavigation')
<x-app-layout style="background-color:#d70021;">

    <div class="py-12" style="display: flex; justify-content: center; align-items: center;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #d70021; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">

                    <!-- Filter form -->
                    <form action="{{ route('servicedata') }}" method="GET">
    <label for="customer_appointment_number_filter">Customer Appointment Number:</label>
    <input type="text" name="customer_appointment_number_filter" value="{{ request('customer_appointment_number_filter') }}">
    
    <button type="submit">Search</button>
    <a href="{{ route('servicedata') }}">Clear</a>
</form>

<form action="{{ route('servicedata') }}" method="GET">
     <label for="typeofservice_filter">Type of Service:</label>
    <select name="typeofservice_filter">
        <option value="">All</option>
        @foreach($typesOfService as $typeOfService)
            <option value="{{ $typeOfService }}" {{ request('typeofservice_filter') == $typeOfService ? 'selected' : '' }}>
                {{ $typeOfService }}
            </option>
        @endforeach
    </select>

    <button type="submit">Apply Filters</button>
</form>

                    <br>
                    <br>
                    <br>
                    
                    <link rel="stylesheet" href="style.scss">
        <style>
            table,
            tr {
                font-family: "Century ";
                font-weight:bold;
            }

            td {
                font-family: "Arial";
                background-color: #cbd6e4;
            }

            th {
                font-family: "Arial";
                background-color: white;
            }
            h1{
                font-family:Arial;
                color:white;
                font-size:30px;
                font-weight:bold;
            }

            #customers {
    width: 95%; /* Adjust the width as needed */
    margin: auto;
    margin-left: 2%; /* Adjust the left margin as needed */
}

/* Center the table header text */
#customers th {
    text-align: center;
}

/* Center the table content text */
#customers td {
    text-align: center;
}

        </style>

                    <h1 style="font-family:Arial; color:white; font-size:30px; font-weight:bold;">Service Information</h1>
                    <table id="customers" style="border: 1px solid black; margin: auto;">
                        <tr>
                            <th>Service Number</th>
                            <th>Customer Appointment Number</th>
                            <th>Staff Number</th>
                            <th>Type of Service</th>
                            <th>List Of Problems</th>
                            <th>Defective Units</th>
                            <th>Actions Required</th>
                            <th>Work Progress</th>
                            <th>Service Progress</th>
                            <th>Service Remarks</th>
                            <th>Date and Time</th>
                            <th>Service Started</th>
                            <th>Order Reference Code</th>
                            <th>Options</th>
                        </tr>

                        <tbody>
                            @forelse($servicedata as $serviceinfo)
                                <tr>
                                    <td>{{ $serviceinfo->serviceno }}</td>
                                    <td>{{ $serviceinfo->customerappointmentnumber }}</td>
                                    <td>{{ $serviceinfo->staffnumber }} </td>
                                    <td>{{ $serviceinfo->typeofservice }}</td>
                                    <td>{{ $serviceinfo->listofproblems }}</td>
                                    <td>{{ $serviceinfo->defectiveunits }}</td>
                                    <td>{{ $serviceinfo->actionsrequired }}</td>
                                    <td>{{ $serviceinfo->workprogress }}</td>
                                    <td>{{ $serviceinfo->serviceprogress }}</td>
                                    <td>{{ $serviceinfo->serviceremarks }}</td>
                                    <td>{{ $serviceinfo->dateandtime }}</td>
                                    <td>{{ $serviceinfo->servicestarted }}</td>
                                    <td>{{ $serviceinfo->orderreferencecode }}</td>
                                    <td>
                                        <br>
                                    <a style="background-color: #f6e05e; height: 0.20rem;"
                                          class="mt-4 text-black font-bold py-2 px-4 rounded"
                                          href="{{ route('service-show', ['serno' => $serviceinfo->serviceno]) }}">View</a>
                                            <br>
                                            <br>
                                            <a style="background-color: #3490dc; height: 0.20rem;"
                                             class="mt-4 text-black font-bold py-2 px-4 rounded"
                                             href="{{ route('service-edit', ['serno' => $serviceinfo->serviceno]) }}">Edit</a>
                                        <form method="POST"
                                            action="{{ route('service-delete', ['serno' => $serviceinfo->serviceno ]) }}"
                                            onclick="return confirm('Are you sure you want to delete this record?')">
                                            @csrf
                                            @method('delete')
                                            <button class="mt-4 bg-red-500  text-black font-bold py-2 px-4 rounded"
                                                type="submit">Delete</button>
                                                <br>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Additional space if needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>