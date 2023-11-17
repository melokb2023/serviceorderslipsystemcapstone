@include('layouts.staffnavigation')
<x-app-layout>
  

    <div class="py-12" style="background-color:#CD5C5C">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C">
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

               <h6>List of Students</h6>
                    <table class="border-separate border-spacing-5" style="width:100%">
                      <tr>
                        <th>Staff Work Number</th>
                        <th>Service Number</th>
                        <th>Actions Taken</th>
                        <th>Work Progress</th>
                        <th>Options</th>
</tr>
<tbody>
                @foreach($staffdatabase as $staff)
                       <tr>
                        <td>{{$staff->staffnumber}}</td>
                        <td>{{$staff->serviceno}}</td>
                        <td>{{$staff->actionstaken}}</td>     
                        <td>{{$staff->workprogress}}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded"  href="{{route('staffdatabase-show', ['serviceno' => $staff->serviceno])}}">View Details</a> 
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href= "{{route('staffdatabase-edit', ['serviceno' => $staff->staffnumber]) }}" >Edit Data </a>
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
