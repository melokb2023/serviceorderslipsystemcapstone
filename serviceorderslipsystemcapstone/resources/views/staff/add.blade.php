@include('layouts.staffnavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;">
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
                       

                        * {
                            box-sizing: border-box;
                            font-family: "Century Gothic";
                            font-weight:bold;
                        }

                        label{
                            font-family: "Century Gothic";
                            color:white;
                            font-size:15px;
                            font-weight:bold;
                        }

                        input[type=text],
                        select,
                        textarea {
                            width: 100%;
                            padding: 12px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            margin-top: 6px;
                            margin-bottom: 16px;
                            resize: vertical;
                        }

                        button[type=submit] {
                            background-color: #04AA6D;
                            color: white;
                            padding: 12px 20px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                        }

                        button[type=submit]:hover {
                            background-color: #45a049;
                        }

                        .container {
                            border-radius: 5px;
                            background-color: #f2f2f2;
                            padding: 20px;
                        }

                        button[type=submit] {
                            background-color: #04AA6D;
                            color: white;
                            padding: 12px 20px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                        }

                        button[type=submit]:hover {
                            background-color: #45a049;
                        }
                        h6{
                            font-family:"Century Gothic";
                            color:white;
                            font-size:15px;
                            font-weight:bold;
                        }
                    </style>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h6>Errors Encountered</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form style="text-align: center;" method="POST" action="{{ route('add-staffdatabase') }}">
                        @csrf

                        <div class="flex-items-center" style="text-align:center">
                            <label for="Service Number">Service Number</label>
                            <div>
                                <select name="xserviceno">
                                    @foreach($servicedata as $service)
                                    <option value="{{ $service->serviceno }}">
                                       Service Number {{ $service->serviceno }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="submit" type="submit" style="background-color: green; color: white;">Submit Info</button>
                    </form>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
