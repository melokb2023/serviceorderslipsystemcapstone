@include('layouts.staffnavigation')
<x-app-layout>
  

    <div class="py-12" style="background-color:#CD5C5C">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C">

                    <h6>List of Students</h6>
                    <table class="border-separate border-spacing-5" style="width:100%">
                      <tr>
                        <th>Staff Work Number</th>
                        <th>Service Number</th>
                        <th>Customer Appointment Number</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Type of Service</th>
                        <th>List of Problems</th>
                        <th>Maintenance Required</th>
                        <th>Customer Password</th>
                        <th>Assigned Staff</th>
                        <th>Defective Units</th>
                        <th>Actions Taken</th>
                        <th>View Tasks</th>
                        <th>Work Progress</th>
                        <th>Options</th>
</tr>
<tbody>
                @foreach($staffdatabase as $serviceinfo)
                       <tr>
                       <td>{{$serviceinfo->staffnumber}}</td>
                        <td>{{$serviceinfo->serviceno}}</td>
                        <td>{{$serviceinfo->customerappointmentnumber}}</td>
                        <td>{{$serviceinfo->contactnumber}}</td>
                        <td>{{$serviceinfo->listofproblems}}</td>
                        <td>{{$serviceinfo->email}}</td>
                        <td>{{$serviceinfo->address}}</td>
                        <td>{{$serviceinfo->typeofservice}}</td>
                        <td>{{$serviceinfo->maintenancerequired}}</td>
                        <td>{{$serviceinfo->customerpassword}}</td>
                        <td>{{$serviceinfo->defectiveunits}}</td>
                        <td>{{$serviceinfo->assignedstaff}}</td>
                        <td>{{$serviceinfo->actionstaken}}</td>     
                         <td>{{$serviceinfo->viewtasks}}</td>
                        <td>{{$serviceinfo->workprogress}}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded" href= "{{route('staffdatabase-show', ['serviceno' => $serviceinfo->serviceno]) }}" >View</a>
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href= "{{route('staffdatabase-edit', ['serviceno' => $serviceinfo->serviceno]) }}" >Edit</a>
                     
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
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
