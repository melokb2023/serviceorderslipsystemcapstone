
@include('layouts.adminnavigation')
@if(session('success_message'))
                        <div >
                            <script>
                                // Replace this with your preferred pop-up library or implementation
                                alert("{{ session('success_message') }}");
                            </script>
                        </div>
                    @endif
<x-app-layout style="background-color:#2b2b2b;">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                 
                    <style>
                        body {
                            font-family: 'Helvetica Neue', Helvetica, Arial;
                            font-size: 14px;
                            line-height: 20px;
                            font-weight: 400;
                            color: #3b3b3b;
                            -webkit-font-smoothing: antialiased;
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
                            width:100%;
                            text-align: center; /* Center align content */
                        }

                        .table {
                            margin: 0 auto; /* Center align table */
                            width: 100%; /* Set table width to 100% */
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                            display: table;
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
    margin-right: 50px; /* Adjust margin as needed */
}
.icon-label {
    display: block;
    margin-top: 10px; /* Add space between icon and label */
    font-size: 12px;
    color: #888;
}

                        .cell {
                            padding: 6px 12px;
                            display: table-cell;
                        }

                        @media screen and (max-width: 580px) {
                            .cell {
                                padding: 2px 16px;
                                display: block;
                            }
                        }
                        button{
                            align-items:center;
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
                    <div class="wrapper">
                        <div class="form-group" style="display: flex; gap: 10px;">
                            <form action="{{ route('servicedata') }}" method="GET" style="display: flex; gap: 10px;">
                                <label for="customer_appointment_number_filter">Customer Appointment Number:</label>
                                <input type="text" name="customer_appointment_number_filter"
                                       value="{{ request('customer_appointment_number_filter') }}" style="height: 50px;">
                                <!-- Adjust the height as needed -->

                                <label for="customer_name_filter">Customer Name:</label>
                                <input type="text" name="customer_name_filter"
                                       value="{{ request('customer_name_filter') }}" style="height: 50px;">
                                <!-- Adjust the height as needed -->

                                <label for="typeofservice_filter">Type of Service:</label>
                                <select name="typeofservice_filter" style="height: 50px;">
                                    <!-- Adjust the height as needed -->
                                    <option value="">All</option>
                                    @foreach($typesOfService as $typeOfService)
                                        <option value="{{ $typeOfService }}"
                                                {{ request('typeofservice_filter') == $typeOfService ? 'selected' : '' }}>
                                            {{ $typeOfService }}
                                        </option>
                                    @endforeach
                                </select>

                                <label for="serviceprogress_filter">Service Progress:</label>
                                <select name="serviceprogress_filter" style="height: 50px;width:100px;">
                                    <!-- Adjust the height as needed -->
                                    <option value="">All</option>
                                    <option  value="Ongoing"
                                            {{ request('serviceprogress_filter') == 'Ongoing' ? 'selected' : '' }}>Ongoing
                                    </option>
                                    <option  value="Refer to Other Technicians or Shop"
                                            {{ request('serviceprogress_filter') == 'Refer to Other Technicians or Shop' ? 'selected' : '' }}>Refer to Other Technicians or Shop
                                    </option>
                                    <option  value="Completed"
                                            {{ request('serviceprogress_filter') == 'Completed' ? 'selected' : '' }}>Completed
                                    </option>
                                </select>
                                <div style="display: flex; gap: 10px;">
    <button type="submit" class="search-button" style="height: 50px; display: inline-block;">Search</button>
    <a href="{{ route('servicedata') }}" class="clear-button" style="height: 50px; display: inline-block; margin-top: 15px;">Clear</a>
</div>




                            </form>
                        </div>
                        <div class="table">
                            <div class="row header">
                                <div class="cell">Service Number</div>
                                <div class="cell">Service Reference Code</div>
                                <div class="cell">Staff Name</div>
                                <div class="cell">Customer Name</div>
                                <div class="cell">Work Progress</div>
                                <div class="cell">Service Progress</div>
                                <div class="cell">Service Remarks</div>
                                <div class="cell">Date and Time</div>
                                <div class="cell">Service Started</div>
                                <div class="cell">Service End Date</div>
                                <div class="cell">Options</div>
                            </div>
                            @forelse($servicedata as $serviceinfo)
                                <div class="row">
                                    <div class="cell">{{ $serviceinfo->serviceno }}</div>
                                    <div class="cell">{{ $serviceinfo->servicereferencecode }}</div>
                                    <div class="cell">{{ $serviceinfo->staffname }}</div>
                                    <div class="cell">{{ $serviceinfo->customername }}</div>
                                    <div class="cell @if($serviceinfo->workprogress == 'Ongoing') ongoing
                                    @elseif($serviceinfo->workprogress == 'Unable to Complete') incomplete
                                    @elseif($serviceinfo->workprogress == 'Completed') completed
                                    @endif">{{ $serviceinfo->workprogress }}</div>
                                    <div class="cell @if($serviceinfo->serviceprogress == 'Ongoing') ongoing
                                    @elseif($serviceinfo->serviceprogress == 'Refer to Other Technicians or Other Shop') refer-to-other-technicians
                                    @elseif($serviceinfo->serviceprogress == 'Completed') completed
                                    @endif">{{ $serviceinfo->serviceprogress }}</div>
                                    <div class="cell">{{ $serviceinfo->serviceremarks }}</div>
                                    <div class="cell">{{ date('F d, Y h:i A', strtotime($serviceinfo->dateandtime)) }}</div>
                                    <div class="cell">{{ date('F d, Y h:i A', strtotime($serviceinfo->servicestarted)) }}</div>
                                    <div class="cell">{{ date('F d, Y h:i A', strtotime($serviceinfo->serviceend)) }}</div>
                                    <div class="cell" style="width: 120px;">
    <div class="grid grid-cols-2 gap-4" style="width: 120px;"> <!-- Adjust the gap size as needed -->
        <div class="icon-container">
            <a href="{{ route('service-show', ['serno' => $serviceinfo->serviceno]) }}"
               class="bg-yellow-400 text-black font-bold p-1 rounded hover:bg-yellow-500 h-8 w-8 flex items-center justify-center text-lg" title="View">👁</a>
            <span class="icon-label">View</span>
        </div>
        <div class="icon-container">
            <a href="{{ route('service-edit', ['serno' => $serviceinfo->serviceno]) }}"
               class="bg-blue-500 text-black font-bold p-1 rounded hover:bg-blue-600 h-8 w-8 flex items-center justify-center text-lg" title="Edit">✏</a>
            <span class="icon-label">Edit</span>
        </div>
        <div class="icon-container">
            <a href="{{ route('service-editstaff', ['serno' => $serviceinfo->serviceno]) }}"
               class="bg-green-300 text-black font-bold p-1 rounded hover:bg-green-400 h-8 w-8 flex items-center justify-center text-lg" title="Change Staff">👥</a>
            <span class="icon-label">Staff</span>
        </div>
        <div class="icon-container">
            <form method="POST"
                  action="{{ route('service-delete', ['serno' => $serviceinfo->serviceno ]) }}"
                  onsubmit="return confirm('Are you sure you want to delete this record?')">
                @csrf
                @method('delete')
                <button class="bg-red-500 text-black font-bold p-1 rounded hover:bg-red-600 h-8 w-8 flex items-center justify-center text-lg" type="submit" title="Delete">🗑</button>
                <span class="icon-label">Delete</span>
            </form>
        </div>
    </div>
</div>

                                </div>
                            @empty
                                <div class="row">
                                    <div class="cell" colspan="15">No records found.</div>
                                </div>
                            @endforelse
                        </div>
                        <br>
                        <br>
                        <div style="text-align: center;">
                            <a class="button" href="{{ route('add-service') }}">START SERVICE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
