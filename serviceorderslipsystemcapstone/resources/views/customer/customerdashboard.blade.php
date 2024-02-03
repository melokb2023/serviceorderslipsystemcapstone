<!-- resources/views/customerdashboard.blade.php -->

@include('layouts.customernavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial;
        font-size: 14px;
        line-height: 20px;
        font-weight: 400;
        color: #3b3b3b;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
        background: #2b2b2b;
    }

    @media screen and (max-width: 580px) {
        body {
            font-size: 16px;
            line-height: 22px;
        }
    }

    .wrapper {
        margin: 0 auto;
        width: 100%;
        text-align: center;
    }

    .table {
        margin: 0 auto;
        width: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        display: table;
        border-collapse: collapse; /* Added border collapse */
    }

    @media screen and (max-width: 580px) {
        .table {
            display: block;
        }
    }

    .row {
        display: table-row;
        background: #f6f6f6;
    }

    .row:nth-of-type(odd) {
        background: #e9e9e9;
    }

    .row.header {
        font-weight: 900;
        color: #ffffff;
        background: #2980b9;
    }

    .row.green {
        background: #27ae60;
    }

    .row.blue {
        background: #2980b9;
    }

    @media screen and (max-width: 580px) {
        .row {
            padding: 14px 0 7px;
            display: block;
        }

        .row.header {
            padding: 0;
            height: 6px;
        }

        .row.header .cell {
            display: none;
        }

        .cell {
            margin-bottom: 10px;
        }

        .cell:before {
            margin-bottom: 3px;
            content: attr(data-title);
            min-width: 98px;
            font-size: 10px;
            line-height: 10px;
            font-weight: bold;
            text-transform: uppercase;
            color: #969696;
            display: block;
        }
    }

    .icon-container {
        margin-right: 10px;
    }

    .icon-label {
        display: block;
        margin-top: 10px;
        font-size: 12px;
        color: #888;
    }

    .cell {
        padding: 6px 12px;
        display: table-cell;
        border: 1px solid #ccc; /* Added border */
    }

    @media screen and (max-width: 580px) {
        .cell {
            padding: 2px 16px;
            display: block;
        }
    }

    button {
        align-items: center;
    }

    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 100px;
        background-color: black;
        color: white;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
                    <br>
                    <br>

                    <div class="form-group" style="display: flex; gap: 10px;">
    <form method="GET" action="{{ route('customerdashboard') }}" style="display: flex; flex: 1;">
    <label for="appointment_number" class="mr-2" style="flex: 0 0 auto; font-family: 'Century Gothic', sans-serif; font-weight: bold;color:black;">Appointment Number:</label>
    <input type="text" name="appointment_number" value="{{ request('appointment_number') }}" class="form-control mr-2" style="flex: 0.5; font-family: 'Century Gothic', sans-serif;">
        <button type="submit" class="btn btn-primary" style="flex: 0 0 auto; border-radius: 15px; font-weight: bold; background-color: #28a745; color: #fff;">Apply Filters</button>
    </form>
    <a href="{{ route('checkreferencenumber') }}" class="btn btn-primary" style="flex: 0 0 auto; border-radius: 15px; font-weight: bold; background-color: #007bff; color: #fff; text-decoration: none;">Check Service Status</a>
</div>
<br>
<br>
                    @if($customerappointments !== null && $customerappointments->count() > 0)
                    <div class="table">
                             <div class="row header">
                                    <div class = "cell">Customer Appointment Number</div>
                                    <div class = "cell">ID</div>
                                    <div class = "cell">Appointment Purpose</div>
                                    <div class = "cell">Appointment Type</div>
                                    <div class = "cell">Date and Time</div>
                                    <div class = "cell">Service Reference Code</div> 
                                    <div class = "cell">Service Progress</div>
</div>
                                @foreach($customerappointments as $customer)
                                <div class="row">
                                        <div class = "cell" >{{ $customer->customerappointmentnumber }}</div>
                                        <div class = "cell">{{ $customer->customerno . ' - ' . auth()->user()->name }}</div>
                                        <div class = "cell">{{ $customer->appointmentpurpose }}</div>
                                        <div class = "cell">{{ $customer->appointmenttype }}</div>
                                        <div class = "cell">{{ date('F d, Y h:i A', strtotime($customer->dateandtime)) }}</div>
                                        @php
    $service = \App\Models\Service::where('customerappointmentnumber', $customer->customerappointmentnumber)->first();
    $serviceProgressClass = $service && $service->serviceprogress == 'Ongoing' ? 'service-ongoing' : ($service && $service->serviceprogress == 'Completed' ? 'service-completed' : '');
@endphp

<div class = "cell" >{{ optional($service)->servicereferencecode ?: 'N/A' }}</div>
<div class="{{ $serviceProgressClass }}">
    {{ optional($service)->serviceprogress ?: 'N/A' }}
</div>                       </div>
                                @endforeach
                           
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
