@include('layouts.adminnavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021; font-family: 'Century Gothic', sans-serif; font-weight: bold;">

                    <!-- Favicon-->
                    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
                    <!-- Font Awesome icons (free version)-->
                    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
                    <!-- Google fonts-->
                    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
                    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
                    <!-- Core theme CSS (includes Bootstrap)-->
                    <link href="resources/css/style.scss" rel="stylesheet" />
                    <style>
                        /* Your existing styles */

                        body {
                            font-family: 'Century Gothic', sans-serif;
                            font-weight: bold;
                            font-size: 16px;
                            color: white;
                            background-color: #d70021;
                        }

                        label {
                            display: block;
                            color: white;
                            text-align: left;
                            margin-bottom: 8px;
                            font-size: 16px;
                        }

                        select,
                        textarea,
                        input[type=datetime-local],
                        input[type=email],
                        input[type=password],
                        input[type=checkbox] {
                            width: 100%;
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            margin-top: 6px;
                            margin-bottom: 16px;
                            resize: vertical;
                            font-size: 14px;
                        }

                        .textexpand {
                            width: 100%;
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            margin-top: 6px;
                            margin-bottom: 16px;
                            resize: vertical;
                            font-size: 14px;
                            height: 120%;
                        }

                        .textexpand2 {
                            width: 100%;
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            margin-top: 6px;
                            margin-bottom: 16px;
                            resize: vertical;
                            font-size: 14px;
                        }

                        button[type=submit] {
                            width: 100%;
                            background-color: #04AA6D;
                            color: white;
                            padding: 12px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-size: 16px;
                        }

                        button[type=submit]:hover {
                            background-color: #45a049;
                        }

                        .container {
                            border-radius: 5px;
                            background-color: #f2f2f2;
                            padding: 20px;
                            margin-top: 20px;
                        }

                        .form-row {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                        }

                        .form-group {
                            width: 48%;
                        }

                        @media only screen and (max-width: 600px) {
                            body {
                                font-size: 14px;
                            }
                        }
                    </style>

                    <h6 style="font-family: Arial">Errors Encountered</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    @foreach($customerappointment as $customer)
                    <form style="text-align: center;" method="POST" action="{{ route('customerappointment-update',['cano' => $customer->customerappointmentnumber]) }}">
                        @csrf
                        @method('patch')

                           

                        <div class="form-row">
                            <div class="form-group">
                                <label for="xappointmentpurpose">Appointment Purpose</label>
                                <input class="textexpand2" type="text" name="xappointmentpurpose" value="{{$customer->appointmentpurpose}}" />
                            </div>
                            <div class="form-group">
                                <label for="xappointmenttype">Appointment Type</label>
                                <select name="xappointmenttype">
                                    <option value="Direct" {{$customer->appointmenttype === 'Direct' ? 'selected' : ''}}>Direct</option>
                                    <option value="Scheduled" {{$customer->appointmenttype === 'Scheduled' ? 'selected' : ''}}>Scheduled</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit">Update Info</button>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
