@include('layouts.adminnavigation')
<x-app-layout>

    <div class="py-12" style="width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;width: 100%;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021;width: 100%">
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
    font-size:15px;
 }
 th,tr{
    font-family: "Century Gothic";
    background-color:white;
    font-size:15px;
 }
 h6{
    font-style:"Century Gothic";
    text-align:center;
    font-weight:bold;
    font-size:30px;
    color:white;
 }
</style> 
    
               
                    <h6>Rating Information</h6>                
                    <table  style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>Rating Number</th>
                        <th>Email</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Options</th>
</tr>

<tbody>
                @foreach($customerrating as $customer)
                       <tr>
                        <td>{{$customer->ratingno}}</td>
                        <td>{{$customer->rateemail}}</td>
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
