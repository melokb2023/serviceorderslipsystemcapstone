<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Staff Database Information') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="app.css">
    <div class="py-12" style="text-align:center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:grey;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h6>List of Students</h6>
                    <table style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>Staff Number</th>
                        <th>Customer Name</th>
                        <th>Service Number</th>
                        <th>Problems</th>
                        <th>Type Of Service</th>
                        <th>Maintenance</th>
                        <th>Defective Units</th>
                        <th>View Tasks</th>
                        <th>Actions Taken</th>
                        <th>Work Progress</th>
</tr>      
<tr>
                        <td>2</td>
                        <td>Kyle Bryant M. Melo</td>
                        <td>4</td>
                        <td>List of Problems</td>
                        <td>System Failed to Start Up</td>
                        <td>Full Maintenance</td>
                        <td>AX500 Power Supply</td>
                        <td>Clean Up Files and Restart</td>
                        <td>Reformat,Upgrade Hardware Laptop</td>
                        <td>Ongoing</td>
</tr>
                    </table>
</div>
</div>
</div>
</div>

</x-app-layout>
