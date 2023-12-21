@include('layouts.adminnavigation')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer Appointment Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h6 class="text-2xl font-semibold mb-4">List of Students</h6>
                    
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="py-2 px-4 border">Customer Number</th>
                                <th class="py-2 px-4 border">Complete Name</th>
                                <th class="py-2 px-4 border">Contact Number</th>
                                <th class="py-2 px-4 border">Email</th>
                                <th class="py-2 px-4 border">Address</th>
                                <th class="py-2 px-4 border">Appointment Purpose</th>
                                <th class="py-2 px-4 border">Appointment Type</th>
                                <th class="py-2 px-4 border">Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customerappointment as $customer)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td>{{$customer->customerappointmentnumber}}</td>
                        <td>{{$customer->customerno}} </td>
                        <td>{{$customer->customername}} </td>
                        <td>{{$customer->customeremail}} </td>
                        <td>{{$customer->appointmentpurpose}}</td>
                        <td>{{$customer->appointmenttype}}</td>
                        <td>{{ date('F d, Y h:i A', strtotime($customer->dateandtime)) }}</td>

                        <td>
                        @php
                        $service = \App\Models\Service::where('customerappointmentnumber', $customer->customerappointmentnumber)->first();
                              echo $service ? $service->serviceprogress : 'N/A';
                        @endphp
                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <a class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block" href="{{route('customerlist')}}">Back</a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
