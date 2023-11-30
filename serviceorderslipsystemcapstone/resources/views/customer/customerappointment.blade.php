@include('layouts.customernavigation')
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; width: 100%; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #FF4433; width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;width: 100%">
                    <style>
                        /* Your existing styles */

                        .form-group {
                            width: 100%;
                            margin-bottom: 16px;
                        }

                        .form-group label {
                            display: block;
                            font-weight: bold;
                            margin-bottom: 6px;
                        }

                        .form-group input,
                        .form-group select,
                        .form-group textarea {
                            width: 100%;
                            padding: 10px;
                            margin-top: 6px;
                            box-sizing: border-box;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            resize: vertical;
                            font-size: 14px; /* Adjust font size */
                        }

                        .form-group select {
                            padding: 10px;
                        }

                        .form-row::after,
                        .form-group::after {
                            content: "";
                            display: table;
                            clear: both;
                        }

                        /* Additional styles for the example layout */

                        .example-form {
                            max-width: 600px;
                            margin: auto;
                            padding: 20px;
                            background-color: #FFFFFF;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }

                        .btn-primary {
                            width: 100%;
                            background-color: #04AA6D;
                            color: white;
                            padding: 12px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-size: 16px;
                        }

                        .btn-primary:hover {
                            background-color: #45a049;
                        }

                        /* Additional styles for the manual layout adjustment */

                        .manual-layout-row {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 16px;
                        }

                        .manual-layout-col {
                            width: 30%; /* Adjust the width as needed */
                            margin-right: 2%;
                        }

                        .manual-layout-col:last-child {
                            margin-right: 0;
                        }
                        h6{
                            font-family:"Century Gothic";
                            font-weight:bold;
                        }
                    </style>

                    <h6>Errors Encountered</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('customerappointment-store') }}" class="example-form">
                        @csrf

                        <div class="manual-layout-row">
                            <div class="manual-layout-col">
                                <div class="form-group">
                                    <label for="xfirstname">First Name</label>
                                    <input type="text" name="xfirstname" class="form-control"
                                        value="{{old('xfirstname')}}" required>
                                </div>
                            </div>
                            <div class="manual-layout-col">
                                <div class="form-group">
                                    <label for="xmiddlename">Middle Name</label>
                                    <input type="text" name="xmiddlename" class="form-control"
                                        value="{{old('xmiddlename')}}" required>
                                </div>
                            </div>
                            <div class="manual-layout-col">
                                <div class="form-group">
                                    <label for="xlastname">Last Name</label>
                                    <input type="text" name="xlastname" class="form-control"
                                        value="{{old('xlastname')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="manual-layout-row">
                            <div class="manual-layout-col">
                                <div class="form-group">
                                    <label for="xcontactnumber">Contact Number</label>
                                    <input type="text" name="xcontactnumber" class="form-control"
                                        value="{{old('xcontactnumber')}}" required>
                                </div>
                            </div>
                            <div class="manual-layout-col">
                                <div class="form-group">
                                    <label for="xemail">Email</label>
                                    <input type="text" name="xemail" class="form-control" value="{{old('xemail')}}"
                                        required>
                                </div>
                            </div>
                            <div class="manual-layout-col">
                                <div class="form-group">
                                    <label for="xaddress">Address</label>
                                    <input type="text" name="xaddress" class="form-control" value="{{old('xaddress')}}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="xappointmentpurpose">Appointment Purpose</label>
                            <input type="text" name="xappointmentpurpose" class="form-control"
                                value="{{old('xappointmentpurpose')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xappointmenttype">Appointment Type</label>
                            <select name="xappointmenttype" class="form-control">
                                <option value="Direct">Direct</option>
                                <option value="Scheduled">Scheduled</option>
                            </select>
                        </div>

                        <div class="form-group" style="text-align: center">
                            <label for="xdateandtime">Date and Time</label>
                            <input type="datetime-local" name="xdateandtime" class="form-control"
                                value="{{old('xdateandtime')}}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Info</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <br>
</x-app-layout>
