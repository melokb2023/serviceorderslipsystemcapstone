@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif

@include('layouts.adminnavigation')

<x-app-layout>
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
        font-weight:900;
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
        margin-right: 1px;
    }

    .icon-label {
        display: block;
        margin-top: 5px;
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
    .icon-container {
    margin-right: 50px; /* Adjust margin as needed */
}
.icon-label {
    display: block;
    margin-top: 10px; /* Add space between icon and label */
    font-size: 12px;
    color: #888;
}

.form-group {
        display: flex;
        flex-wrap: nowrap;
        justify-content: center; /* Align items horizontally to center */
    }
    .icon-container {
        margin-right: 10px; /* Adjust margin as needed */
    }
</style>
    <div class="py-12">
    <div class="max-w-14xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Filter Form -->
                    <form method="get" action="{{ route('customerlist') }}" class="flex items-center justify-center space-x-4">
                        <label for="month" class="text-sm font-semibold text-black">Select Month:</label>
                        <select name="month" id="month" class="border border-gray-300 rounded px-2 py-2">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" @if ($i == $month) selected @endif>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>

                        <label for="year" class="text-sm font-semibold text-black">Select Year:</label>
                        <select name="year" id="year" class="border border-gray-300 rounded px-2 py-2">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}" @if ($i == $year) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>

                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                    </form>
                    <!-- End Filter Form -->

                    <br>
                    <br>
                 @if(count($customerappointment) > 0)
                        <div class="table">
                            <div class="row header">
                                <div class="cell">Customer Appointment Number</div>
                                <div class="cell">ID</div>
                                <div class="cell">Customer Name</div>
                                <div class="cell">Customer Email</div>
                                <div class="cell">Appointment Purpose</div>
                                <div class="cell">Appointment Type</div>
                                <div class="cell">Date and Time</div>
                                <div class="cell">Service Progress</div>
                                <div class="cell">Options</div>
                            </div>
                         @foreach($customerappointment as $customer)
                                    <div class="row">
                                        <div class="cell">{{ $customer->customerappointmentnumber }}</div>
                                        <div class="cell">{{ $customer->customerno }}</div>
                                        <div class="cell">{{ $customer->customername }}</div>
                                        <div class="cell">{{ $customer->customeremail }}</div>
                                        <div class="cell">{{ $customer->appointmentpurpose }}</div>
                                        <div class="cell">{{ $customer->appointmenttype }}</div>
                                        <div class="cell">{{ date('F d, Y h:i A', strtotime($customer->dateandtime)) }}</div>
                                        <div class="cell">
                                            @php
                                                $service = \App\Models\Service::where('customerappointmentnumber', $customer->customerappointmentnumber)->first();
                                                echo $service ? $service->serviceprogress : 'N/A';
                                            @endphp
                                        </div>
                                        <div class="form-group">
    <div class="icon-container">
        <a href="{{ route('customerlist-show', ['cano' => $customer->customerappointmentnumber]) }}" class="bg-yellow-400 text-black font-bold p-1 rounded hover:bg-yellow-500 h-8 w-8 flex items-center justify-center text-lg" title="View">👁</a>
        <span class="icon-label">View</span>
    </div>
    <div class="icon-container">
        <a href="{{ route('customerlist-edit', ['cano' => $customer->customerappointmentnumber]) }}" class="bg-blue-500 text-black font-bold p-1 rounded hover:bg-blue-600 h-8 w-8 flex items-center justify-center text-lg" title="Edit">✏</a>
        <span class="icon-label">Edit</span>
    </div>
    <div class="icon-container" style="display: flex; flex-direction: column; align-items: center;">
        <form method="POST" action="{{ route('customerlist-delete', ['cano' => $customer->customerappointmentnumber]) }}" onsubmit="return confirm('Are you sure you want to delete this record?')">
            @csrf
            @method('delete')
            <div style="display: flex; flex-direction: column; align-items: center;">
                <button class="bg-red-500 text-black font-bold p-1 rounded hover:bg-red-600 h-8 w-8 flex items-center justify-center text-lg" type="submit" title="Delete">🗑</button>
                <span class="icon-label">Delete</span>
            </div>
        </form>
    </div>
</div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="cell" colspan="9">No records found.</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
