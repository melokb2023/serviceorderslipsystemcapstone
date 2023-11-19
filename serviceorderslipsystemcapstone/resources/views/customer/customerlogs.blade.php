@include('layouts.customernavigation')
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;width: 100%;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C;width: 100%">
                <style>
                table,tr {
  font-family: "Century Gothic";
  border-collapse: collapse;
  width: 100%;
  font-weight:bold;
 }

 td{
    font-family: "Century Gothic";
    background-color:grey;
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
