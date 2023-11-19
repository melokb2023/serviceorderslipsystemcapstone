@include('layouts.adminnavigation')
<x-app-layout style="background-color:#CD5C5C;">

    <div class="py-12" style=" display: flex; justify-content: center; align-items: center;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C">
        <link rel="stylesheet" href="style.scss">
        <style>
            table,
            tr {
                font-family: "Century ";
                width: 5%;
                font-weight:bold;
            }

            td {
                font-family: "Arial";
                background-color: grey;
            }

        </style>

        <div style="text-align: center;">
            <h6>Service Information</h6>
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
                        <td>{{$serviceinfo->created_at}}</td>
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
