@include('layouts.adminnavigation')
<x-app-layout>
    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #2196f3; border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #2196f3; text-align: center;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #2196f3;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <h1 style="text-align: center; font-weight: bold; color: #FDFEFE;">
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
                            color: black;
                            text-decoration: none;
                            display: inline-block;
                            padding: 15px 32px;
                            background-color:#87CEEB;
                            border-radius: 8px;
                            font-size: 16px;
                            cursor: pointer;
                            transition: transform 0.2s ease-in-out;
                            font-weight:bold;
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }
                        .button2 {
                            border: none;
                            color: black;
                            text-decoration: none;
                            display: inline-block;
                            padding: 15px 32px;
                            background-color: yellow; 
                            border-radius: 8px;
                            font-size: 16px;
                            cursor: pointer;
                            transition: transform 0.2s ease-in-out;
                            font-weight:bold;
                        }

                        .button2:hover {
                            transform: scale(1.05);
                        }
                        h1{
                            font-family: "Century Gothic";
                            font-size:32px;
                        }
                    </style>

                    <a class="button" href="{{ route('financialperformancereport') }}">
                        Service Report
                    </a>
                    <a class="button2" href="{{ route('ratinggraph') }}">
                        Rating Graph
                        </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>