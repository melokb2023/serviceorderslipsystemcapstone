@include('layouts.adminnavigation')

<x-app-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-gray-100" style="border: 3px solid black; background-color: #2980b9;">
                    <h1 class="text-3xl font-bold mb-6" style="font-family:Century Gothic; color: white; text-align: center;">List of Services</h1>
                    
                    <ol class="list-decimal" style="padding-left: 20px;"> <!-- Adjust the padding-left as needed -->
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Reformatting</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Replacement</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Virus Removal</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Computer Network Troubleshooting</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Upgrade Hardware</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Clean Up Files</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Hardware Fixing</li>
                        <li style="font-family: 'Century Gothic'; font-weight: bold; font-size: 24px; color: white; text-align: left; margin-bottom: 10px;">Peripheral Fixing</li>
                        <!-- Add more list items for other services -->
                    </ol>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
