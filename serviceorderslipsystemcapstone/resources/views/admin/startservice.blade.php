@include('layouts.adminnavigation')
<x-app-layout>
    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #FF4433; border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #FF4433; text-align: center;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #FF4433;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <h1 style = "font-weight:bold;font-size:35px;color:white">
                         Welcome to COMPUSOURCE COMPUTER CENTER 
                    </h1>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <style>
                        .button {
                            border: none;
                            color: white;
                            text-decoration: none;
                            display: inline-block;
                            padding: 15px 32px;
                            background-color: black; /* Indian Red color */
                            border-radius: 8px;
                            font-size: 16px;
                            cursor: pointer;
                            transition: transform 0.2s ease-in-out;
                            background-color:green;
                            font-weight:bold;
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }

                        h1{
                            font-family: "Century Gothic";
                        }
                        
                    </style>

                    <a class="button" href="{{ route('add-service') }}">
                        START SERVICE NOW
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>