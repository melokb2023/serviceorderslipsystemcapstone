@include('layouts.adminnavigation')

<x-app-layout>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
    <br>
    <br>
    <br>
    <br>
    <br>
    <style>
        h2{
            font-family:"Century Gothic";
            font-weight:bold;
            color:red;
        }
        </style>

    <div class="flex justify-center items-center h-screen">
        <div class="flex space-x-4">
            <!-- Card 1 -->
            <div class="w-1/4 p-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                    <h2 class="text-2xl font-bold mb-4">{{$typesOfServicesCount}} Total Number of Service Types</h2>
                        <!-- Content for Card 1 -->
                    </div>
                </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;&nbsp;
            &nbsp;
            <!-- Card 2 -->
            <div class="w-1/4 p-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                        <h2 class="text-2xl font-bold mb-4">{{$customerAppointmentsCount}} Total Number of Appointments</h2>
                    </div>
                </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;&nbsp;
            &nbsp;
            <!-- Card 3 -->
            <div class="w-1/4 p-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                        <h2 class="text-2xl font-bold mb-4">{{$serviceDataCount}} Total Number of Job Orders</h2>
                    </div>
                </div>
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;&nbsp;
            &nbsp;
            <!-- Card 4 -->
            <div class="w-1/4 p-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #e9e9e9">
                       <h2 class="text-2xl font-bold mb-4">{{$ratingsCount}} Total Number of Ratings</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
</x-app-layout>
