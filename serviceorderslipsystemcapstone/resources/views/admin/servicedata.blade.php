@include('layouts.adminnavigation')
<x-app-layout style="background-color:#CD5C5C;">

    <div class="py-12" style="background-color:#CD5C5C; display: flex; justify-content: center; align-items: center;">
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
                    <th>Complete Name </th>
                    <th>Type of Service</th>
                    <th>List Of Problems</th>
                    <th>Maintenance</th>
                    <th>Customer Password</th>
                    <th>Defective Units</th>
                    <th>Assigned Staff</th>
                    <th>Assigned Tasks</th>
                    <th>Options</th>
                </tr>

                <tbody>
                    @foreach($servicedata as $serviceinfo)
                    <tr>
                        <td>{{$serviceinfo->serviceno}}</td>
                        <td>{{$serviceinfo->customerappointmentnumber}}</td>
                        <td>{{$serviceinfo->firstname }} {{ $serviceinfo->middlename }} {{ $serviceinfo->lastname }}</td>
                        <td>{{$serviceinfo->typeofservice}}</td>
                        <td>{{$serviceinfo->listofproblems}}</td>
                        <td>{{$serviceinfo->maintenancerequired}}</td>
                        <td>{{$serviceinfo->customerpassword}}</td>
                        <td>{{$serviceinfo->defectiveunits}}</td>
                        <td>{{$serviceinfo->assignedstaff}}</td>
                        <td>{{$serviceinfo->viewtasks}}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded"
                                href="{{route('service-show', ['serno' => $serviceinfo->serviceno])}}">View</a>
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded"
                                href="{{route('service-edit', ['serno' => $serviceinfo->serviceno])}}">Edit</a>
                            <form method="POST"
                                action="{{ route('service-delete', ['serno' => $serviceinfo->serviceno ]) }}"
                                onclick="return confirm('Are you sure you want to delete this record?')">
                                @csrf
                                @method('delete')
                                <button class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded" type="submit">Delete</button>
                            </form>
                        </td>
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
</x-app-layout>
