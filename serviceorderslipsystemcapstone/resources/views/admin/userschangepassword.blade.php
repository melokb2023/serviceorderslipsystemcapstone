@include('layouts.adminnavigation')
<x-app-layout>
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
            font-weight: bold;
            font-size: 16px;
            color: white;
            background-color: #d70021;
        }

        label {
            display: block;
            text-align: center;
            margin-bottom: 8px;
            font-size: 16px;
            color:white;
            font-family:"Century Gothic";

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

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;font-family: 'Century Gothic', sans-serif; font-weight: bold;">

                @if($errors->any())
    <div style="background-color: #ffcccc; border: 1px solid #ff3333; border-radius: 5px; padding: 10px; margin-bottom: 10px;">
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach($errors->all() as $error)
                <li style="color: #ff3333;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    @foreach($users as $user)
                        <form method="POST" action="{{ route('user-updatepassword',['id' => $user->id]) }}">
                            @csrf
                            @method('patch')
                      <div class="flex-items-center">
                                <label for="Please Enter Your New Password">Please Enter a New Password For The User:</label>
                                <input class="textexpand2" type="password" name="xpassword" value="{{ old('xpassword') }}"/>
                                </div>
                       

            <div class="flex-items-center">
                <label for="Confirm New Password">Confirm New Password:</label>
                <input class="textexpand2" type="password" name="xpassword_confirmation" value="{{ old('xpassword_confirmation') }}" />
            </div>
                            <button type="submit" class="btn btn-primary" style="text-align:center;background-color:green"> Update User Type</button>        
                            </div>

                        
                        </form>
                    @endforeach

          
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
