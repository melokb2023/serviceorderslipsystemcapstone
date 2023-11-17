@include('layouts.adminnavigation')
<x-app-layout>

    <div class="py-12" style="width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;width: 100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C;width: 100%">
                <link rel="stylesheet" href="style.scss">
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
    
               
                    <h6>Service Information</h6>                
                    <table  style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>Rating Number</th>
                        <th>First Name</th>
                        <th>Customer Appointment Number</th>
                        <th>Appointment Purpose</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Options</th>
</tr>

<tbody>
                @foreach($customerrating as $customer)
                       <tr>
                        <td>{{$customer->ratingno}}</td>
                        <td>{{$customer->firstname}}</td>
                        <td>{{$customer->customerappointmentnumber}}</td>
                        <td>{{$customer->appointmentpurpose}}</td>
                        <td>{{$customer->review}}</td>
                        <td>{{$customer->rating}}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded" href= "{{route('customerrating-show', ['cr' => $customer->ratingno]) }}" >View</a>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
