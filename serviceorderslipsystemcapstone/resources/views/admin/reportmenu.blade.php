@include('layouts.adminnavigation')
<x-app-layout>
    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #CD5C5C; border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #CD5C5C; text-align: center;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #CD5C5C;">
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
                        🚀 Welcome to COMPUSOURCE COMPUTER CENTER 🚀
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
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }

                    </style>

                    <a class="button" href="{{ route('financialperformancereport') }}">
                        Service Report
                    </a>
                    <a class="button" href="{{ route('ratinggraph') }}">
                        Rating Graph
                        </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>