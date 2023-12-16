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
                    <table style="width:100%">
                      <tr>
                        <th>Staff Work Number</th>
                        <th>Service Number</th>
                        <th>Staff Name</th>
                        <th>Actions Required</th>
                        <th>Type of Service</th>
                        <th>Work Started</th>
                        <th>Work Progress</th>
                        <th>Options</th>
</tr>
<tbody>
                @foreach($staffdatabase as $staff)
                       <tr>
                        <td>{{$staff->worknumber}}</td>
                        <td>{{$staff->serviceno}}</td>
                        <td>{{$staff->staffname}}</td>
                        <td>{{$staff->actionsrequired}}</td>  
                        <td>{{$staff->typeofservice}}</td>  
                        <td>{{ date('F d, Y h:i A', strtotime($staff->workstarted)) }}</td>      
                        <td>{{$staff->workprogress}}</td>
                        <td>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a style="background-color: #f6e05e; height: 0.10rem;" class="mt-4 text-black font-bold py-2 px-4 rounded" href="{{route('staffdatabase-show', ['serviceno' => $staff->serviceno])}}">View</a> 
                        <br>
                        <br>
                        <a style="background-color: blue; height: 0.20rem;" class="mt-4 text-black font-bold py-2 px-4 rounded" href= "{{route('staffdatabase-edit', ['serviceno' => $staff->serviceno]) }}" >Edit</a>
                        <br>
                        <br>
                     </td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>

                    <a class="button" href="{{ route('add-staffdatabase') }}">
                        Add Work Data
</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
