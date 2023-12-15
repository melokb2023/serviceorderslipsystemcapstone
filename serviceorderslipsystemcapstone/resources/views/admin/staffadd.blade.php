@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif
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
                            font-size: 17px;
                            color: white;
                        }

                        * {
                            box-sizing: border-box;
                        }

                        
                        select,
                        textarea,
                        input[type=datetime-local],
                        input[type=email],
                        input[type=password],
                        input[type=checkbox] {
                            width: 100%;
                            padding: 12px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            margin-top: 6px;
                            margin-bottom: 16px;
                            resize: vertical;
                            font-size: 14px;
                        }
                        .textexpand{
                            width: 100%;
                            padding: 12px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;
                            margin-top: 6px;
                            margin-bottom: 56px;
                            resize: vertical;
                            font-size: 14px;
                            height:120%;
                            
                        }
                        .textexpand2{
                            width: 100%;
                            padding: 12px;
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

                        .textexpand{
                            padding: 50px;
                        }

                        button[type=submit]:hover {
                            background-color: #45a049;
                        }

                        .container {
                            border-radius: 5px;
                            background-color: #f2f2f2;
                            padding: 20px;
                        }

                        .animated {
                            animation: fadeIn 1s;
                        }

                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                            }

                            to {
                                opacity: 1;
                            }
                        }

                        /* Example hover effect */
                        button[type=submit]:hover {
                            background-color: #45a049;
                            transform: scale(1.1);
                        }

                        .form-row {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                        }

                        .form-group {
                            width: 48%; /* Adjusted width */
                        }

                        label {
                            display: block;
                            text-align: left;
                        }

                        

                    </style>

                    <h6 style="font-family:Arial">Errors Encountered</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form style="text-align: center;" method="POST" action="{{ route('staff-store') }}">
                        @csrf

                     <!-- Form row with one column in one line -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="Enter a New Staff">Enter a New Staff</label>
                                <input class="textexpand2" type="text" name="xstaffname" value="{{ old('xstaffname') }}" />
                            </div>
                        </div>
                           <button class="btn btn-primary" type="submit">Submit Info</button>
                    </form>
                <br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
