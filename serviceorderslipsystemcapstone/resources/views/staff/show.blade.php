@include('layouts.staffnavigation')
<x-app-layout style="background-color: #2196f3;">

<style>
    table,
    tr {
        font-family: "Century ";
        font-weight: bold;
    }

    td {
        font-family: "Arial";
        background-color: #cbd6e4;
    }

    th {
        font-family: "Arial";
        background-color: white;
    }

    h1 {
        font-family: Arial;
        color: white;
        font-size: 30px;
        font-weight: bold;
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
        max-width: 600px; /* Adjust the max-width as needed */
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
        background-color: green;
        font-weight: bold;
    }

    .button:hover {
        transform: scale(1.05);
    }
    p{
        font-family:"Century Gothic";
        font-weight:bold;
    }
</style>

<div class="py-12" style="display: flex; justify-content: center; align-items: center;">

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
         style="background-color: #2196f3; text-align: center; height: auto; width: 90%; max-width: 1200px; border: 3px solid black;">
        <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #2196f3;">

            <h1 style="font-family:Century Gothic; color:white; font-size:30px; font-weight:bold;">Service Details</h1>

            @foreach($servicedata as $serviceinfo)
                <div class="card">
                    <h2>Service Number: {{ $serviceinfo->serviceno }}</h2>
                    <p>Customer Appointment Number: {{ $serviceinfo->customerappointmentnumber }}</p>
                    <p>Staff Number: {{ $serviceinfo->staffnumber }}</p>
                    <p>Customer's Password: {{ $serviceinfo->customerpassword }}</p>
                    <p>Type of Service: {{ $serviceinfo->typeofservice }}</p>
                    <p>List Of Problems: {{ $serviceinfo->listofproblems }}</p>
                    <p>Defective Units: {{ $serviceinfo->defectiveunits }}</p>
                    <p>Actions Required: {{ $serviceinfo->actionsrequired }}</p>
                    <p>Work Progress: {{ $serviceinfo->workprogress }}</p>
                    <a class="button" href="{{ route('staffdatabase') }}">
                        BACK
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
</x-app-layout>
