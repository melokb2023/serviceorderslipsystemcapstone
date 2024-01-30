@include('layouts.adminnavigation')

<x-app-layout>
<div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #2196f3; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #2196f3; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #2196f3; font-family: 'Century Gothic', sans-serif; font-weight: bold;">

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
                            background-color: #2196f3;
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
                        .card {
        background-color: #cbd6e4;
        border: 1px solid black;
        border-radius: 8px;
        margin: 20px;
        padding: 20px;
        text-align: left;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 600px;
        margin: auto;
    }

    .card h2 {
        color: #2196f3;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card p {
        font-family: "Arial";
        color: #333;
        margin-bottom: 10px;
    }
                    </style>

                    <h6>List of Staff</h6>
                    @foreach($staff as $staffco)
    <div class="card"> <!-- Wrap staff details inside a div with the card class -->
        <h2>Staff Details</h2> <!-- Add a header for staff details -->
        <p><strong>Staff Number:</strong> {{ $staffco->staffnumber }}</p> <!-- Wrap Staff Number inside <p> and apply bold styling -->
        <p><strong>Staff Name:</strong> {{ $staffco->name }}</p> <!-- Wrap Staff Name inside <p> and apply bold styling -->
    </div>
@endforeach
                    <a class ="custom" href="{{route('staff')}}">Back</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
