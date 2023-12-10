@include('layouts.staffnavigation')
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021">
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
 h6{
    font-family: "Century Gothic";
    font-size:32px;
    font-weight:bold;
    text-align:center;
    color:white;
 }

 .button {
                            border: none;
                            color: white;
                            text-decoration: none;
                            display: inline-block;
                            padding: 15px 32px;
                            border-radius: 8px;
                            font-size: 16px;
                            cursor: pointer;
                            transition: transform 0.2s ease-in-out;
                            background-color:green;
                            font-weight:bold;
                            align-items:center;
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }
</style>

               <h6>List of Works</h6>
                    <table class="border-separate border-spacing-5" style="width:100%">
                      <tr>
                        <th>Staff Work Number</th>
                        <th>Service Number</th>
                        <th>Staff Number</th>
                        <th>Actions Required</th>
                        <th>Type of Service</th>
                        <th>Work Started</th>
                        <th>Work Progress</th>
                        <th>Options</th>
</tr>
<tbody>
                @foreach($staffdatabase as $staff)
                       <tr>
                        <td>{{$staff->staffnumber}}</td>
                        <td>{{$staff->serviceno}}</td>
                        <td>{{$staff->staffnumber}}</td>
                        <td>{{$staff->actionsrequired}}</td>  
                        <td>{{$staff->typeofservice}}</td>  
                        <td>{{ date('Y-m-d h:i A', strtotime($staff->workstarted)) }}</td>         
                        <td>{{$staff->workprogress}}</td>
                        <td>
                        <br>
                        <br>
                        <a style="background-color: #f6e05e; height: 0.20rem;" class="mt-4 text-black font-bold py-2 px-4 rounded" href="{{route('staffdatabase-show', ['serviceno' => $staff->serviceno])}}">View Details</a> 
                            <br>
                            <br>
                            <a style="background-color: #f6e05e; height: 0.20rem;" class="mt-4 text-black font-bold py-2 px-4 rounded" href= "{{route('staffdatabase-edit', ['serviceno' => $staff->staffnumber]) }}" >Edit Data </a>
                            <br>
                            <br>
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
                    <a class="button" href="{{ route('add-staffdatabase') }}">
                        Add Work Data
</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
