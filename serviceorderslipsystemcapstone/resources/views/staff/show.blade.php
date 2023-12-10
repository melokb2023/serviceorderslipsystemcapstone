@include('layouts.staffnavigation')
<x-app-layout style="background-color: #d70021;">

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
                            background-color: black; /* Indian Red color */
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

        </style>

    <div class="py-12" style="display: flex; justify-content: center; align-items: center;">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
             style="background-color: #d70021; text-align: center; height:900px;width: 1200px;border: 3px solid black;">
            <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">

            <h1 style="font-family:Century Gothic; color:white; font-size:30px; font-weight:bold;">Service Information</h1>
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
                        <th>Work Remarks</th>
                        <th>Service Progress</th>
                        <th>Service Remarks</th>
                        <th>Date and Time</th>
                        <th>Service Started</th>
                        <th>Order Reference Code</th>
                    </tr>
                    <tbody>
                        @foreach($servicedata as $serviceinfo)
                            <tr>
                                <td>{{ $serviceinfo->serviceno }}</td>
                                <td>{{ $serviceinfo->customerappointmentnumber }}</td>
                                <td>{{ $serviceinfo->staffnumber }}</td>
                                <td>{{ $serviceinfo->typeofservice }}</td>
                                <td>{{ $serviceinfo->listofproblems }}</td>
                                <td>{{ $serviceinfo->defectiveunits }}</td>
                                <td>{{ $serviceinfo->actionsrequired }}</td>
                                <td>{{ $serviceinfo->workprogress }}</td>
                                <td>{{ $serviceinfo->workremarks }}</td>
                                <td>{{ $serviceinfo->serviceprogress }}</td>
                                <td>{{ $serviceinfo->serviceremarks }}</td>
                                <td>{{ $serviceinfo->dateandtime }}</td>
                                <td>{{ $serviceinfo->servicestarted }}</td>
                                <td>{{ $serviceinfo->orderreferencecode }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <a class="button" href="{{ route('staffdatabase') }}">
                    BACK
                </a>
                <!-- Additional space if needed -->
            </div>
        </div>
    </div>
</x-app-layout>