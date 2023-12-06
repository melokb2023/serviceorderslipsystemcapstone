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
                            <label for="order_reference_code">Order Reference Code:</label>
                            <input type="text" name="order_reference_code" class="form-input mt-1 block w-full" required>
                        </div>
                        
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Check Status</button>
                    </form>

                    @isset($serviceStatus)
                        <div class="mt-4">
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
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
