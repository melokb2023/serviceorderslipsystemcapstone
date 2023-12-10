@include('layouts.staffnavigation')
<x-app-layout>
  

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021">
<style>
         table,
            tr {
                font-family: "Century ";
                width: 5%;
                font-weight:bold;
                width:100%;
                background-color:white;
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

               <h6>Staff Logs</h6>
                    <table>
                      <tr>
                        <th>Service Number</th>
                        <th>Actions Taken</th>
                        <th>Service Started</th>
</tr>
<tbody>
                @foreach($staffdatabase as $staff)
                       <tr>
                        <td>{{$staff->serviceno}}</td>
                        <td>{{$staff->actionsrequired}}</td>     
                        <td>{{$staff->workstarted}}</td>
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
