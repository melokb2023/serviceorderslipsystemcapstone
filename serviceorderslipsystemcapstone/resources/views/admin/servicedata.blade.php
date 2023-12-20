@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif
@include('layouts.adminnavigation')
<x-app-layout style="background-color:#d70021;">

    <div class="py-12" style="display: flex; justify-content: center; align-items: center;">
 
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #d70021; text-align: center;width: 1600px;border: 3px solid black;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">
                <div class="form-group" style="display: flex; gap: 10px;">
                <form action="{{ route('servicedata') }}" method="GET" style="display: flex; gap: 10px;">
    <label for="customer_appointment_number_filter">Customer Appointment Number:</label>
    <input type="text" name="customer_appointment_number_filter" value="{{ request('customer_appointment_number_filter') }}" style="height: 50px;"> <!-- Adjust the height as needed -->

    <label for="customer_name_filter">Customer Name:</label>
    <input type="text" name="customer_name_filter" value="{{ request('customer_name_filter') }}" style="height: 50px;"> <!-- Adjust the height as needed -->

    <label for="typeofservice_filter">Type of Service:</label>
    <select name="typeofservice_filter" style="font-weight:bold; height: 50px;"> <!-- Adjust the height as needed -->
        <option value="">All</option>
        @foreach($typesOfService as $typeOfService)
            <option style="font-weight:bold" value="{{ $typeOfService }}" {{ request('typeofservice_filter') == $typeOfService ? 'selected' : '' }}>
                {{ $typeOfService }}
            </option>
        @endforeach
    </select>

    <label for="serviceprogress_filter">Service Progress:</label>
    <select name="serviceprogress_filter" style="font-weight:bold; height: 50px;"> <!-- Adjust the height as needed -->
        <option value="">All</option>
        <option style="font-weight:bold" value="Ongoing" {{ request('serviceprogress_filter') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option style="font-weight:bold" value="Completed" {{ request('serviceprogress_filter') == 'Completed' ? 'selected' : '' }}>Completed</option>
    </select>

    <button type="submit" class="search-button" style="height: 50px;">Search</button>
<a href="{{ route('servicedata') }}" class="clear-button" style="height: 50px;">Clear</a>
</form>
</div>
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

label{
    font-family: "Century Gothic";
    font-weight:bold;
    color:white;
}

button{
    font-family: "Century Gothic";
    font-weight:bold;
    color:white;
    background-color:blue;
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
                            background-color:green;
                            font-weight:bold;
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }
                        .ongoing {
        background-color: #f6e05e; /* Set your desired color for Ongoing */
    }

    .finalizing {
        background-color: #3490dc; /* Set your desired color for Finalizing */
    }

    .completed {
        background-color: #4caf50; /* Set your desired color for Completed */
    }
    .search-button {
        background-color: green;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: darkgreen;
    }

    /* Styling for the clear button */
    .clear-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
        display: inline-block;
        font-weight:bold;
    }

    .clear-button:hover {
        background-color: darkred;
    }
    input[type="text"] {
        font-weight: bold;
        /* Add any additional styles you want for the input boxes */
    }

        </style>

                    <h1 style="font-family:Arial; color:white; font-size:30px; font-weight:bold;">Service Information</h1>
                    <table id="customers" style="border: 1px solid black; margin: auto;">
                        <tr>
                            <th>Service Number</th>
                            <th>Service Reference Code</th>
                            <th>Staff Name</th>
                            <th>Customer Name</th>
                            <th>Work Progress</th>
                            <th>Service Progress</th>
                            <th>Service Remarks</th>
                            <th>Date and Time</th>
                            <th>Service Started</th>
                            <th>Options</th>
                        </tr>

                        <tbody>
                            @forelse($servicedata as $serviceinfo)
                                <tr>
                                    <td>{{ $serviceinfo->serviceno }}</td>
                                     <td>{{ $serviceinfo->orderreferencecode }}</td>
                                    <td>{{ $serviceinfo->staffname }} </td>
                                    <td>{{ $serviceinfo->customername}} </td>
                                    <td class="@if($serviceinfo->serviceprogress == 'Ongoing') ongoing
                       @elseif($serviceinfo->serviceprogress == 'Finalizing') finalizing
                       @elseif($serviceinfo->serviceprogress == 'Completed') completed
                       @endif">{{ $serviceinfo->workprogress }}</td>
                                    <td class="@if($serviceinfo->serviceprogress == 'Ongoing') ongoing
                       @elseif($serviceinfo->serviceprogress == 'Finalizing') finalizing
                       @elseif($serviceinfo->serviceprogress == 'Completed') completed
                       @endif">{{ $serviceinfo->serviceprogress }}</td>
                                    <td>{{ $serviceinfo->serviceremarks }}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($serviceinfo->dateandtime)) }}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($serviceinfo->servicestarted)) }}</td>
                                   
                                    <td>
    <div class="flex flex-col space-y-2">
        <a href="{{ route('service-show', ['serno' => $serviceinfo->serviceno]) }}"
           class="bg-yellow-400 text-black font-bold py-2 px-4 rounded hover:bg-yellow-500">View</a>

        <a href="{{ route('service-edit', ['serno' => $serviceinfo->serviceno]) }}"
           class="bg-blue-500 text-black font-bold py-2 px-4 rounded hover:bg-blue-600">Edit</a>

        <a href="{{ route('service-editstaff', ['serno' => $serviceinfo->serviceno]) }}"
           class="bg-green-300 text-black font-bold py-2 px-4 rounded hover:bg-green-400 flex items-center justify-center text-decoration-none border border-blue-500 rounded-md">
            Change Staff
        </a>

        <form method="POST"
              action="{{ route('service-delete', ['serno' => $serviceinfo->serviceno ]) }}"
              onsubmit="return confirm('Are you sure you want to delete this record?')">
            @csrf
            @method('delete')
            <button class="bg-red-500 text-black font-bold py-2 px-4 rounded hover:bg-red-600" type="submit">Delete</button>
        </form>
    </div>
</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a class="button" href="{{ route('add-service') }}">
                        START SERVICE
                    </a>
                    <!-- Additional space if needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>