<x-app-layout>

    @include('layouts.customernavigation')

    <div class="py-12">
        <div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center mx-auto max-w-4xl" style="width: 140%;">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <style>
                        * {
                            font-family: 'Century Gothic';
                            font-weight: bold;
                        }

                        label {
                            font-family: 'Century Gothic';
                            font-weight: bold;
                            color: black;
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
                

                        .form-input {
                            padding: 8px;
                            margin-bottom: 15px;
                            color:black;
                        }


                        .bg-white {
                            background-color: white;
                        }

                        .text-gray-900 {
                            color: #333; /* Dark gray color */
                        }

                       

                        .text-center {
                            text-align: center;
                        }

                        .font-bold {
                            font-weight: bold;
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
                        .blink-container {
                            display: inline-block;
                            animation: blink-animation 1s infinite; /* Blinking animation */
                            color: white;
                        }

                        @keyframes blink-animation {
                            0%, 49%, 100% {
                                opacity: 1;
                            }
                            50% {
                                opacity: 0;
                            }
                        }
                        .error-message {
                        background-color: #ff9999; /* Light red background */
                        color: #cc0000; /* Dark red text color */
                        padding: 1rem;
                        border-radius: 0.5rem; /* Rounded corners */
                        margin-bottom: 1rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    </style>

                    <form action="{{ route('checkServiceStatus') }}" method="post">
                        @csrf
                        <div class="mb-4" style="width: 100%; padding: 0 10px;">
                            <label for="service_reference_code">Service Reference Code:</label>
                            <input type="text" name="service_reference_code" class="form-input mt-1 block w-full" placeholder="202X-XXXX" required>
                        </div>
                        
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Check Status</button>
                    </form>

                    @if(isset($serviceStatus))
                        <div class="mt-4">
                            <h4 class="text-xl font-bold text-black">Service Reference Code: {{ $serviceReferenceCode }}</h4>
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
                    <div class="mt-4 error-message blink-container">
            <p>REFERENCE NUMBER NOT AVAILABLE</p>
        </div>
    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
