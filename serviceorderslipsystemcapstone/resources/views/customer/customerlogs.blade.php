@include('layouts.customernavigation')
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;width: 100%;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;width: 100%">
                <style>
              table,
            tr {
                font-family: "Century ";
                width: 5%;
                font-weight:bold;
                background-color:white;
                width:100%;
            }

            td {
                font-family: "Arial";
                background-color: #cbd6e4;
            }

            h6{
    font-weight:bold;
    text-align:center;
    font-size:30px;
    font-family:"Century Gothic";
    color:white;

 }

             </style>   
               
                    <h6>List of Customers</h6>
                    <table style="text-align:center">
                        <tr style="text-align:center">
                            <th>Customer Appointment Number</th>
                            <th>Complete Name</th>
                            <th>Appointment Purpose</th>
                            <th>Appointment Type</th>
                            <th>Date and Time</th>
                        </tr>
                    <tbody>
                @foreach($customerappointment as $customer)
                   <tr style="text-align:center">
                        <td>{{$customer->customerappointmentnumber}}</td>
                        <td>{{$customer->firstname}} {{$customer->middlename}} {{$customer->lastname}}</td>
                        <td>{{$customer->appointmentpurpose}}</td>
                        <td>{{$customer->appointmenttype}}</td>
                        <td>{{$customer->created_at}}</td> 
                    </tr>
                    @endforeach
</tbody>
                    </table>
                    <br>
                    <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</x-app-layout>
