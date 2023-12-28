@include('layouts.adminnavigation')
<x-app-layout style="background-color: #d70021;">

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
        max-width: 600px;
        margin: auto;
    }

    .card h2 {
        color: #d70021;
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
        background-color: black;
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
         style="background-color: #d70021; text-align: center; height: auto; width: 90%; max-width: 1200px; border: 3px solid black;">
        <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">

            <h1>Rating Data</h1>

            @foreach($customerrating as $customer)
                <div class="card">
                    <h2>Rating Number: {{ $customer->ratingno }}</h2>
                    <p>Reviewer ID: {{ $customer->reviewerid }}</p>
                    <p>Reviewer Name: {{ $customer->reviewername }}</p>
                    <p>Review: {{ $customer->review }}</p>
                    <p>Rating: {{ $customer->rating }}</p>
                    <br>
                </div>
            @endforeach

            <!-- Add any additional styling or elements as needed -->
            <a class="button" href="{{ route('customerrating') }}">
                BACK
            </a>
        </div>
    </div>
</div>
</x-app-layout>
