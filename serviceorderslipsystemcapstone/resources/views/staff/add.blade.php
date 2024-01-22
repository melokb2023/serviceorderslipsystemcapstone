@include('layouts.staffnavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #2196f3; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #2196f3; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #2196f3;">
                    <!-- Include Favicon, Font Awesome, Google fonts, Core theme CSS, etc., based on your requirements -->

                    <style>
                        * {
                            box-sizing: border-box;
                            font-family: "Century Gothic";
                            font-weight: bold;
                        }

                        label {
                            font-family: "Century Gothic";
                            color: white;
                            font-size: 15px;
                            font-weight: bold;
                        }

                        input[type=text],
                        select,
                        textarea,
                        input[type=datetime-local] {
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

                        h6 {
                            font-family: "Century Gothic";
                            color: white;
                            font-size: 15px;
                            font-weight: bold;
                        }
                    </style>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                  

        
                    <p style="font-family: 'Century Gothic', sans-serif; font-size: 24px; color: white;">START WORK</p>
                    
                    <form style="text-align: center;" method="POST" action="{{ route('staffdatabase-store', ['id' => $id]) }}">
                        @csrf

                        <div class="flex-items-center" style="text-align:center">
                        </div>
                        <div class="form-group" style="text-align:center">
                            <label for="workstarted">Work Started</label>
                            <input type="datetime-local" name="xworkstarted" value="{{old('xworkstarted')}}" required>
                        </div>

                        <button class="btn btn-primary" type="submit">Start Work</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
