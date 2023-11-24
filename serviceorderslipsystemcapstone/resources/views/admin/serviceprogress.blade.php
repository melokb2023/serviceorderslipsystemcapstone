@include('layouts.adminnavigation')
<x-app-layout>

    <div class="py-12" style="width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#FF4433;width: 100%;border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#FF4433;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#FF4433;width: 100%">
                <link rel="stylesheet" href="index.css">
                <style>
            table,
            tr {
                font-family: "Century ";
                width: 5%;
                font-weight:bold;
                background-color:white;
            }

            td {
                font-family: "Arial";
                background-color: grey;
            }

        </style>
                    
                <h6 style ="text-align:center" >Service Progress Information</h6>                
                    <table style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>Service Progress Number</th>
                        <th>Service Number</th>
                        <th>Date and Time</th>
                        <th>Service Progress</th>
                        <th>Service Remarks</th>
                        <th>Options</th>
</tr>

<tbody>
                @foreach($serviceprogress as $service)
                       <tr>
                        <td>{{$service->serviceprogressno}}</td>
                        <td>{{$service->serviceno}}</td>
                        <td>{{$service->dateandtime}}</td>
                        <td>{{$service->serviceprogress}}</td>
                        <td>{{$service->serviceremarks}}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded" href= "{{route('serviceprogress-show', ['servicenumber' => $service->serviceprogressno]) }}" >View</a>
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href= "{{route('serviceprogress-edit', ['servicenumber' => $service->serviceprogressno]) }}" >Edit</a>
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
