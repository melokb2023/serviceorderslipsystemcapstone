@include('layouts.staffnavigation')
<x-app-layout>
  

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C">
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

               <h6>Staff Logs</h6>
                    <table class="border-separate border-spacing-5" style="width:100%">
                      <tr>
                        <th>Service Number</th>
                        <th>Actions Taken</th>
                        <th>Date and Time</th>
</tr>
<tbody>
                @foreach($staffdatabase as $staff)
                       <tr>
                        <td>{{$staff->serviceno}}</td>
                        <td>{{$staff->actionstaken}}</td>     
                        <td>{{$staff->created_at}}</td>
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
