@include('layouts.adminnavigation')

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;width: 100%;border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;width: 100%">
                    <style>
                        table,
                        tr {
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

                        .button {
                            display: block;
                            width: 100%;
                            font-weight: bold;
                            border-radius: 8px;
                            padding: 8px;
                            text-align: center;
                            cursor: pointer;
                            transition: background-color 0.3s ease-in-out;
                        }

                        .button-yellow {
                            background-color: #ffeb3b; /* Yellow */
                        }

                        .button-green {
                            background-color: #4caf50; /* Green */
                        }

                        .button-red {
                            background-color: #f44336; /* Red */
                        }

                        .button:hover {
                            background-color: #333; /* Change the hover background color as needed */
                        }
                        p{
                            color:white;
                            font-weight:bold;
                        }
                    </style>

                    <h6>List of Appointments</h6>
                    <br>
                    <br>

                    <!-- Filter Form -->
                    <form method="get" action="{{ route('customerlist') }}" class="flex items-center justify-center space-x-4">
                        <label for="month" class="text-sm font-semibold text-white">Select Month:</label>
                        <select name="month" id="month" class="border border-gray-300 rounded px-2 py-2">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" @if ($i == $month) selected @endif>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>

                        <label for="year" class="text-sm font-semibold text-white">Select Year:</label>
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

                    <!-- Display Appointments -->
                    @if(count($customerappointment) > 0)
                    <table style="text-align:center; width: 100%;">
                            <tr style="text-align:center">
                                <th>Customer Appointment Number</th>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Appointment Purpose</th>
                                <th>Appointment Type</th>
                                <th>Date and Time</th>
                                <th>Service Progress</th>
                                <th>Options</th>
                            </tr>
                            <tbody>
                                @foreach($customerappointment as $customer)
                                    <tr style="text-align:center">
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
                                        <td>
    <div class="grid grid-cols-3 gap-4 ml-1">
        <!-- First Row -->
        <div class="mr-4"> <!-- Increased margin for more space -->
    <a href="{{ route('customerlist-show', ['cano' => $customer->customerappointmentnumber]) }}"
       class="bg-yellow-400 text-black font-bold p-3 rounded hover:bg-yellow-500 h-12 w-12 flex items-center justify-center text-xl"
       title="View">
       👁
    </a>
</div>

<div class="ml-4"> <!-- Increased margin for more space -->
    <a href="{{ route('customerlist-edit', ['cano' => $customer->customerappointmentnumber]) }}"
       class="bg-blue-500 text-black font-bold p-3 rounded hover:bg-blue-600 h-12 w-12 flex items-center justify-center text-xl"
       title="Edit">
       ✏
    </a>
</div>

        <!-- Second Row -->
        <div class="col-span-3 flex items-center justify-center mt-2">
            <form method="POST"
                  action="{{ route('customerlist-delete', ['cano' => $customer->customerappointmentnumber]) }}"
                  onclick="return confirm('Are you sure you want to delete this record?')">
                @csrf
                @method('delete')
                <button class="bg-red-500 text-black font-bold p-3 rounded hover:bg-red-600 h-12 w-12 flex items-center justify-center text-xl" 
                        type="submit"
                        title="Delete">
                    🗑
                </button>
            </form>
        </div>
    </div>
</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No records found.</p>
                    @endif
                    <!-- End Display Appointments -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
