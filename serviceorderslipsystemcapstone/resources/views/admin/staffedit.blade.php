@include('layouts.adminnavigation')

<x-app-layout>
    <style>
        body {
            font-family: 'Century Gothic';
        }

        * {
            box-sizing: border-box;
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
        h6, label{
          color:white;
        }

        button[type=submit]:hover {
            background-color: #45a049;
            transform: scale(1.1);
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
    </style>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021; font-family: 'Century Gothic', sans-serif; font-weight: bold;">
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    @foreach($staff as $staffco)
                    <form method="POST" action="{{ route('staff-update',['staff' => $staffco->staffnumber]) }}">
                        @csrf
                        @method('patch')

                        <div class="flex-items-center">
                            <label for="Update Staff Name">Update Staff Name</label>
                            <div>
                                <input type="text" name="xstaffname" value="{{$staffco->staffname}}" />
                            </div>
                        </div>

                        <button class="submit" type="submit" style="background-color: green"> Update Info </button>
                    </form>
                    @endforeach
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <!-- Add more breaks if needed -->
        </div>
        <!-- Add more breaks if needed -->
    </div>
</x-app-layout>
