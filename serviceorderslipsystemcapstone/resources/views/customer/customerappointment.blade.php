@include('layouts.customernavigation')
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#FF4433; width: 100%; border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#FF4433; width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#FF4433; width: 100%">
                    <style>
                        body {
                            font-family: 'Century Gothic', sans-serif;
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                            background-color: #F2F2F2;
                        }

                        .container {
                            max-width: 600px;
                            margin: auto;
                            padding: 20px;
                            background-color: #FFFFFF;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }

                        label {
                            font-weight: bold;
                            font-size: 18px;
                        }

                        input[type="text"],
                        select,
                        textarea {
                            width: 100%;
                            padding: 12px;
                            margin-bottom: 16px;
                            display: inline-block;
                            border: 1px solid #ccc;
                            box-sizing: border-box;
                            border-radius: 4px;
                        }

                        .form-group {
                            margin-bottom: 16px;
                        }

                        .form-group::after {
                            content: "";
                            display: table;
                            clear: both;
                        }

                        .form-group label,
                        .form-group input,
                        .form-group select,
                        .form-group textarea {
                            width: 48%;
                            float: left;
                            margin-right: 4%;
                        }

                        button[type="submit"] {
                            width: 100%;
                            background-color: #04AA6D;
                            color: white;
                            padding: 12px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-size: 16px;
                        }

                        button[type="submit"]:hover {
                            background-color: #45a049;
                        }

                        h6 {
                            color: red;
                            font-size: 24px;
                            margin-bottom: 10px;
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

                    <form method="POST" action="{{ route('customerappointment-store') }}" class="container">
                        @csrf

                        <div class="form-group">
                            <label for="xfirstname">First Name</label>
                            <input type="text" name="xfirstname" value="{{old('xfirstname')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xmiddlename">Middle Name</label>
                            <input type="text" name="xmiddlename" value="{{old('xmiddlename')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xlastname">Last Name</label>
                            <input type="text" name="xlastname" value="{{old('xlastname')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xcontactnumber">Contact Number</label>
                            <input type="text" name="xcontactnumber" value="{{old('xcontactnumber')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xemail">Email</label>
                            <input type="text" name="xemail" value="{{old('xemail')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xaddress">Address</label>
                            <input type="text" name="xaddress" value="{{old('xaddress')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xappointmentpurpose">Appointment Purpose</label>
                            <input type="text" name="xappointmentpurpose" value="{{old('xappointmentpurpose')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="xappointmenttype">Appointment Type</label>
                            <select name="xappointmenttype">
                                <option value="Direct">Direct</option>
                                <option value="Scheduled">Scheduled</option>
                            </select>
                        </div>

                        <div class="form-group" style="text-align:center">
                            <label for="xdateandtime">Date and Time</label>
                            <input type="datetime-local" name="xdateandtime" value="{{old('xdateandtime')}}" required>
                        </div>

                        <button type="submit">Submit Info</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <br>
</x-app-layout>
