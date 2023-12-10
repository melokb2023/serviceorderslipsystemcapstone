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

                        h6 {
                            color: white;
                            font-size: 18px;
                        }

                        table {
                            width: 100%;
                            border-collapse: separate;
                            border-spacing: 5px;
                        }

                        table th,
                        table td {
                            padding: 10px;
                            text-align: left;
                        }

                        table th {
                            background-color: #04AA6D;
                            color: white;
                        }

                        table td {
                            background-color: #f2f2f2;
                            color: black;
                        }

                        .custom {
                            display: inline-block;
                            margin-top: 20px;
                            background-color: #04AA6D;
                            color: white;
                            font-weight: bold;
                            padding: 10px 20px;
                            text-decoration: none;
                            border-radius: 4px;
                        }

                        .custom:hover {
                            background-color: #45a049;
                        }

                        @media only screen and (max-width: 600px) {
                            body {
                                font-size: 14px;
                            }
                        }
                    </style>

                    <h6>List of Staff</h6>
                    <table>
                        <tr>
                            <th>Staff Number</th>
                            <th>Staff Name</th>
                        </tr>
                        <tbody>
                            @foreach($staff as $staffco)
                                <tr>
                                    <td>{{$staffco->staffnumber}}</td>
                                    <td>{{$staffco->staffname}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a class ="custom" href="{{route('staff')}}">Back</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
