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
                            <th>Options</th>
</tr>
                    <tbody>
                    @foreach($servicedata as $serviceinfo)
                       <tr>
                                    <td>{{ $serviceinfo->serviceno }}</td>
                                    <td>{{ $serviceinfo->customerappointmentnumber }}</td>
                                    <td>{{ $serviceinfo->staffnumber }} </td>
                                    <td>{{ $serviceinfo->typeofservice }}</td>
                                    <td>{{ $serviceinfo->listofproblems }}</td>
                                    <td>{{ $serviceinfo->maintenancerequired }}</td>
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
                    <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('servicedata')}}"> Back </a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>