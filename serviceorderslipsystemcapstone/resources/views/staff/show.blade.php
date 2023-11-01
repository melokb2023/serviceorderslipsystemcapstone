<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Staff Database') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h6>List of Students</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
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
</tr>
                    <tbody>
                    @foreach($staffdatabase as $staff)
                       <tr>
                        <td>{{$staff->serviceno}}</td>
                        <td>{{$staff->customerappointmentnumber}}</td>
                        <td>{{$staff->contactnumber}}</td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->address}}</td>
                        <td>{{$staff->typeofservice}}</td>
                        <td>{{$staff->listofproblems}}</td>
                        <td>{{$staff->maintenancerequired}}</td>
                        <td>{{$staff->customerpassword}}</td>
                        <td>{{$staff->assignedstaff}}</td>
                        <td>{{$staff->defectiveunits}}</td>
                        <td>{{$staff->actionstaken}}</td>
                        <td>{{$staff->viewtasks}}</td>
                        <td>{{$staff->workprogress}}</td>
                        
                    </tr>
                        @endforeach
                   </tbody>

                    </table>
                    <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('customerappointment')}}"> Back </a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>