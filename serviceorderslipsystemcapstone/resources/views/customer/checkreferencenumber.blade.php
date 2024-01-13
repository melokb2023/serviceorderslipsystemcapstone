<!-- resources/views/customer/checkreferencenumber.blade.php -->
@include('layouts.customernavigation')
<x-app-layout style="background-color: #d70021;">
    <style>
        * {
            font-family: 'Century Gothic';
            font-weight: bold;
        }

        label {
            font-family: 'Century Gothic';
            font-weight: bold;
            color: white;
        }

        /* Highlight "Ongoing" with orange color */
        .ongoing-container {
            background-color: orange; /* Orange background */
            padding: 0.2rem 0.5rem; /* Adjust padding as needed */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }

        /* Highlight "Completed" with green color */
        .completed-container {
            background-color: #4caf50; /* Green color */
            padding: 0.2rem 0.5rem; /* Adjust padding as needed */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }

        /* Professional statement style */
        .professional-statement {
            font-style: italic;
            font-size: 16px;
            color: #333; /* Dark gray color */
            margin-top: 10px;
        }

        /* Additional styles for the form and message */
        form {
            margin-top: 20px;
        }

        .form-input {
            padding: 8px;
            margin-bottom: 15px;
            color:black;
        }

        .bg-blue-500 {
            background-color: #007bff; /* Blue color */
        }

        .bg-white {
            background-color: white;
        }

        .text-gray-900 {
            color: #333; /* Dark gray color */
        }

        .max-w-7xl {
            max-width: 100%;
        }

        .sm\:px-6 {
            padding-right: 1.5rem;
            padding-left: 1.5rem;
        }

        .lg\:px-8 {
            padding-right: 2rem;
            padding-left: 2rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .text-center {
            text-align: center;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .block {
            display: block;
        }

        .w-full {
            width: 100%;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .flex {
            display: flex;
        }

        .flex-1 {
            flex: 1;
        }

        .flex-0 {
            flex: 0 0 auto;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .bg-white {
            background-color: white;
        }

        .dark\:bg-gray-800 {
            background-color: #333; /* Dark gray color */
        }

        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .sm\:rounded-lg {
            border-radius: 0.375rem; /* 6px rounded corners */
        }

        .max-w-7xl {
            max-width: 100%;
        }

        .mx-auto {
            margin-right: auto;
            margin-left: auto;
        }

        .border-3 {
            border-width: 3px;
        }

        .border-black {
            border-color: black;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .text-gray-900 {
            color: #333; /* Dark gray color */
        }

        .dark\:text-gray-100 {
            color: #fff; /* White color */
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white border-3 border-black"
            style="background-color: #d70021; border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center"
                style="background-color: #d70021;">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('checkServiceStatus') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="service_reference_code">Service Reference Code:</label>
                            <input type="text" name="service_reference_code" class="form-input mt-1 block w-full" required>
                        </div>
                        
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Check Status</button>
                    </form>

                    @if(isset($serviceStatus))
                        <div class="mt-4">
                            <h4 class="text-xl font-bold text-white">Service Reference Code: {{ $serviceReferenceCode }}</h4>
                            <h4 class="text-xl font-bold text-white">Service Status:</h4>
                            <div class="text-white @if($serviceStatus == 'Ongoing') ongoing-container @endif
                                                 @if($serviceStatus == 'Completed') completed-container @endif">
                                <p>{{ $serviceStatus }}</p>
                                <p class="professional-statement">
                                    @if($serviceStatus == 'Ongoing')
                                        Our team is diligently working on providing the best service for you.
                                    @elseif($serviceStatus == 'Completed')
                                        Your service is complete! You can now retrieve your fixed unit.
                                    @endif
                                </p>
                            </div>
                        </div>
                    @elseif($errors->any())
                        <div class="mt-4 text-white">
                            <p>REFERENCE NUMBER NOT AVAILABLE</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
