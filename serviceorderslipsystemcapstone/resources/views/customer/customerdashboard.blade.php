<!-- resources/views/customerdashboard.blade.php -->

@include('layouts.customernavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; width: 100%; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">
                    <style>
                        /* Your existing styles here */
                        table, tr {
                            font-family: "Century Gothic";
                            border-collapse: collapse;
                            width: 100%;
                            font-weight: bold;
                        }

                        td {
                            font-family: "Century Gothic";
                            background-color: #cbd6e4;
                            border: 1px solid #cbd6e4; /* Border color for table cells */
                            padding: 8px;
                        }

                        th {
                            font-family: "Century Gothic";
                            background-color: white;
                            border: 1px solid #cbd6e4; /* Border color for table cells */
                            padding: 8px;
                        }

                        h6 {
                            font-weight: bold;
                            text-align: center;
                            font-size: 30px;
                            font-family: "Century Gothic";
                            color: white;
                        }

                        /* Add new styles for the form and button */
                        form {
                            display: flex;
                            flex-direction: column;
                            max-width: 300px; /* Adjust the width as needed */
                            margin: 0 auto;
                        }

                        label {
                            margin-bottom: 10px;
                        }

                        input {
                            padding: 8px;
                            margin-bottom: 15px;
                        }

                        button {
                            padding: 10px;
                            background-color: #007bff; /* Button background color */
                            color: #fff; /* Button text color */
                            border: none;
                            border-radius: 5px; /* Add border-radius for a curved rectangle */
                            cursor: pointer;
                        }
                        .service-ongoing {
        background-color: yellow;
    }

    .service-completed {
        background-color: #90EE90;
    }
                    </style>

                    <h6>Your Appointments</h6>
                    <br>
                    <br>

                    <div class="form-group" style="display: flex; gap: 10px;">
    <form method="GET" action="{{ route('customerdashboard') }}" style="display: flex; flex: 1;">
    <label for="appointment_number" class="mr-2" style="flex: 0 0 auto; font-family: 'Century Gothic', sans-serif; font-weight: bold;color:white;">Appointment Number:</label>
<input type="text" name="appointment_number" value="{{ request('appointment_number') }}" class="form-control mr-2" style="flex: 1; font-family: 'Century Gothic', sans-serif;">
        <button type="submit" class="btn btn-primary" style="flex: 0 0 auto; border-radius: 15px; font-weight: bold; background-color: #28a745; color: #fff;">Apply Filters</button>
    </form>
</div>
                    @if($customerappointments !== null && $customerappointments->count() > 0)
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
                                @foreach($customerappointments as $customer)
                                    <tr style="text-align:center">
                                        <td>{{ $customer->customerappointmentnumber }}</td>
                                        <td>{{ $customer->customerno . ' - ' . auth()->user()->name }}</td>
                                        <td>{{ $customer->appointmentpurpose }}</td>
                                        <td>{{ $customer->appointmenttype }}</td>
                                        <td>{{ date('F d, Y h:i A', strtotime($customer->dateandtime)) }}</td>
                                        @php
    $service = \App\Models\Service::where('customerappointmentnumber', $customer->customerappointmentnumber)->first();
    $serviceProgressClass = $service && $service->serviceprogress == 'Ongoing' ? 'service-ongoing' : ($service && $service->serviceprogress == 'Completed' ? 'service-completed' : '');
@endphp

<td>{{ optional($service)->servicereferencecode ?: 'N/A' }}</td>
<td class="{{ $serviceProgressClass }}">
    {{ optional($service)->serviceprogress ?: 'N/A' }}
</td>                         </tr>
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
