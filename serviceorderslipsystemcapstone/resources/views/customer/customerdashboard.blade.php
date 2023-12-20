<!-- resources/views/customerdashboard.blade.php -->

@include('layouts.customernavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; width: 100%; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">
                    <style>
                        table, tr {
                            font-family: "Century Gothic";
                            border-collapse: collapse;
                            width: 100%;
                            font-weight: bold;
                        }

                        td {
                            font-family: "Century Gothic";
                            background-color: #cbd6e4;
                        }

                        th {
                            font-family: "Century Gothic";
                            background-color: white;
                        }

                        h6 {
                            font-weight: bold;
                            text-align: center;
                            font-size: 30px;
                            font-family: "Century Gothic";
                            color: white;
                        }
                    </style>

                    <h6>Your Appointments</h6>
                    <br>
                    <br>
                    @if($customerappointment !== null && $customerappointment->count() > 0)
                        <table style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Customer Appointment Number</th>
                                    <th>ID</th>
                                    <th>Appointment Purpose</th>
                                    <th>Appointment Type</th>
                                    <th>Date and Time</th>
                                    <th>Service Reference Code</th> 
                                    <th>Service Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customerappointment as $customer)
                                <tr style="text-align:center">
                                    <td>{{$customer->customerappointmentnumber}}</td>
                                    <td>{{ $customer->customerno . ' - ' . auth()->user()->name }}</td>
                                    <td>{{$customer->appointmentpurpose}}</td>
                                    <td>{{$customer->appointmenttype}}</td>
                                    <td>{{ date('F d, Y h:i A', strtotime($customer->dateandtime)) }}</td>
                                    <td>
                                        @php
                                            $service = \App\Models\Service::where('customerappointmentnumber', $customer->customerappointmentnumber)->first();
                                            echo $service ? $service->orderreferencecode : 'N/A';
                                        @endphp
                                    </td>
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
                    @else
                        <p>No customer appointments available.</p>
                    @endif
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
