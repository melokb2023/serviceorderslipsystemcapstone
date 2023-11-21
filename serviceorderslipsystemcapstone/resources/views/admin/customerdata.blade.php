@include('layouts.adminnavigation')
<x-app-layout>
  

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;width: 100%;border: 3px solid black">
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
 th{
    font-family: "Century Gothic";
    background-color:white;
 }
             </style>   
               
                    <h6 style= "font-weight:bold;text-align:center">List of Customers</h6>
                    <table style="text-align:center">
                        <tr style="text-align:center">
                            <th>Appointment Number</th>
                            <th>Complete Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Appointment Purpose</th>
                            <th>Appointment Type</th>
                            <th>Options</th>
                        </tr>
                    <tbody>
                @foreach($customerappointment as $customer)
                   <tr style="text-align:center">
                        <td>{{$customer->customerappointmentnumber}}</td>
                        <td>{{$customer->firstname}} {{$customer->middlename}} {{$customer->lastname}}</td>
                        <td>{{$customer->contactnumber}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->appointmentpurpose}}</td>
                        <td>{{$customer->appointmenttype}}</td>
                        <td> <a style="background-color:yellow;width: 100%;display: block;font-weight:bold"  href= "{{route('customerlist-show', ['cano' => $customer->customerappointmentnumber]) }}" > View</a>
                             <a style="background-color:green;width: 100%;display: block;font-weight:bold" href= "{{route('customerlist-edit', ['cano' => $customer->customerappointmentnumber]) }}" >Edit</a>
                             <form method="POST" action = "{{ route('customerlist-delete', ['cano' => $customer->customerappointmentnumber ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">
                           @csrf
                           @method('delete')
                           <button style="background-color:red;width: 100%;display: block;font-weight:bold" type="submit" >Delete</a>
</form>
                        </td>
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
