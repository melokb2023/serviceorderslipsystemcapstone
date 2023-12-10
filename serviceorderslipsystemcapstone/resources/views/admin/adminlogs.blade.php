@include('layouts.adminnavigation')
<x-app-layout style="background-color:#d70021;">

    <div class="py-12" style=" display: flex; justify-content: center; align-items: center;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021">
        <link rel="stylesheet" href="style.scss">
        <style>
            table,
            tr {
                font-family: "Century ";
                width: 5%;
                font-weight:bold;
                background-color:white;
            }

            td {
                font-family: "Arial";
                background-color: #cbd6e4;
            }

            h6{
    font-weight:bold;
    text-align:center;
    font-size:30px;
    font-family:"Century Gothic";
    color:white;

 }

        </style>

        <div style="text-align: center;">
            <h6>Service Logs</h6>
            <br>
            <br>
            <table id="customers" style="border: 1px solid black; margin: auto;">
                <tr>
                    <th>Service Number</th>
                    <th>Customer Appointment Number</th>
                    <th>Type of Service</th>
                    <th>Date and Time</th>
                </tr>

                <tbody>
                    @foreach($servicedata as $serviceinfo)
                    <tr>
                        <td>{{$serviceinfo->serviceno}}</td>
                        <td>{{$serviceinfo->customerappointmentnumber}}</td>
                        <td>{{$serviceinfo->typeofservice}}</td>
                        <td>{{ date('Y-m-d h:i A', strtotime($serviceinfo->created_at)) }}</td>
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
</x-app-layout>
