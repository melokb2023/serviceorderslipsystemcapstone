<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Service Information') }}
        </h2>
    </x-slot>

    <div class="py-12" style="text-align:center;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:red;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <link rel="stylesheet" href="index.css">
               
                    <h6>Service Information</h6>
                    <table style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>Service Number</th>
                        <th>Appointment Number</th>
                        <th>Customer Name</th>
                        <th>Contact Number</th>
                        <th>List Of Problems</th>
                        <th>Email</th>
                        <th>Type of Service</th>
                        <th>Maintenance</th>
                        <th>Customer Password</th>
                        <th>Defective Units</th>
                        <th>Assigned Staff</th>
</tr>
<tr>
    <td>1</td>
<td>1</td>
<td>John Doe</td>
<td>09759090725</td>
<td>System Failed to Start Up</td>
<td>kyle.melo@lccdo.edu.ph</td>
<td>Formatting Service</td>
<td>Full Maintenance</td>
<td>kylemelo2023</td>
<td>AX500 Power Supply</td>
<td>John M. Kennedy</td>
</tr>
                    </table>
                  
</x-app-layout>
