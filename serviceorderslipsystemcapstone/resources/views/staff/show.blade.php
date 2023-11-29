@include('layouts.staffnavigation')
<x-app-layout>
<div class="py-12" style="background-color:#d70021; display: flex; justify-content: center; align-items: center;">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;width: 100%">
<link rel="stylesheet" href="style.scss">
<style>
    table,
    tr {
        font-family: "Arial";
        width: 100%;
    }

    td {
        font-family: "Arial";
        background-color: grey;
    }

</style>

<div class="py-12" style="background-color:#d70021;" >
             <h6>List of Students</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Service Number</th>
                        <th>Customer Appointment Number</th>
                        <th>Type of Service</th>
                        <th>List of Problems</th>
                        <th>Maintenance Required</th>
                        <th>Customer Password</th>
                        <th>Assigned Staff</th>
                        <th>Defective Units</th>
                        <th>View Tasks</th>
                      
</tr>
<tbody>
                    @foreach($servicedata as $serviceinfo)
                       <tr>
                        <td>{{$serviceinfo->serviceno}}</td>
                        <td>{{$serviceinfo->customerappointmentnumber}}</td>
                        <td>{{$serviceinfo->typeofservice}}</td>
                        <td>{{$serviceinfo->listofproblems}}</td>
                        <td>{{$serviceinfo->maintenancerequired}}</td>
                        <td>{{$serviceinfo->customerpassword}}</td>
                        <td>{{$serviceinfo->assignedstaff}}</td> 
                        <td>{{$serviceinfo->defectiveunits}}</td>
                        <td>{{$serviceinfo->viewtasks}}</td>
                    </tr>
                        @endforeach
                   </tbody>

                    </table>
                    <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('staffdatabase')}}"> Back </a>
                    
                </div>
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