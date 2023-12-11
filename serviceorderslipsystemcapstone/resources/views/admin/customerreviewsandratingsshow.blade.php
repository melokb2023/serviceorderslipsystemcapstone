@include('layouts.adminnavigation')
<x-app-layout>
  

<div class="py-12" style="width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;width: 100%;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;width: 100%">
                <style>
                table,tr {
  font-family: "Century Gothic";
  border-collapse: collapse;
  width: 100%;
  font-weight:bold;
 }

 td{
    font-family: "Century Gothic";
    background-color:#cbd6e4;
 }
 th{
    font-family: "Century Gothic";
    background-color:white;
 }
             </style>   
               
                    <h6 style= "font-weight:bold;text-align:center">List of Customers</h6>
                    <table style="text-align:center">
                        <tr style="text-align:center">
                        <th>Rating Number</th>
                        <th>Reviewer ID</th>
                        <th>Reviewer Name</th>
                        <th>Review</th>
                        <th>Rating</th>
                        </tr>
                    <tbody>
                    @foreach($customerrating as $customer)
                       <tr>
                       <td>{{$customer->ratingno}}</td>
                        <td>{{$customer->reviewerid}}</td>
                        <td>{{$customer->reviewername}}</td>
                        <td>{{$customer->review}}</td>
                        <td>{{$customer->rating}}</td>
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
