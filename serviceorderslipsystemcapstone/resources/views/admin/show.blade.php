@include('layouts.adminnavigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Service Data Information') }}
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
                        <th>Appointment Number</th>
                        <th>Contact Number</th>
                        <th>List Of Problems</th>
                        <th>Email</th>
                        <th>Type of Service</th>
                        <th>Maintenance</th>
                        <th>Customer Password</th>
                        <th>Defective Units</th>
                        <th>Assigned Staff</th>
                        <th>Options</th>
</tr>
                    <tbody>
                    @foreach($servicedata as $serviceinfo)
                       <tr>
                        <td>{{$serviceinfo->serviceno}}</td>
                        <td>{{$serviceinfo->customerappointmentnumber}}</td>
                        <td>{{$serviceinfo->contactnumber}}</td>
                        <td>{{$serviceinfo->listofproblems}}</td>
                        <td>{{$serviceinfo->email}}</td>
                        <td>{{$serviceinfo->typeofservice}}</td>
                        <td>{{$serviceinfo->maintenancerequired}}</td>
                        <td>{{$serviceinfo->customerpassword}}</td>
                        <td>{{$serviceinfo->defectiveunits}}</td>
                        <td>{{$serviceinfo->assignedstaff}}</td>
                        <td>{{$serviceinfo->options}}</td>
                    </tr>
                        @endforeach
                   </tbody>

                    </table>
                    <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('servicedata')}}"> Back </a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>