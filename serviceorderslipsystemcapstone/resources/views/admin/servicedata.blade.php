<x-app-layout>

    <div class="py-12" style="background-color:red;width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:red;width: 100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:red;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:red;width: 100%">
                <link rel="stylesheet" href="index.css">
               
                    <h6>Service Information</h6>                
                    <table style="border: 5px solid black;width: 100%">
                    <tr>
                        <th>Service Number</th>
                        <th>Appointment Number</th>
                        <th>Customer Name</th>
                        <th>Contact Number</th>
                        <th>List Of Problems</th>
                        <th>Email</th>
                        <th>Type of Service</th>
                        <th>Maintenance</th>
                        <th>Customer Password</th>
                        <th>Defective Units</th>
                        <th>Assigned Staff</th>
                        <th>Options</th>
</tr>

<tbody>
                @foreach($servicedata as $serviceinfo)
                       <tr>
                        <td>{{$serviceinfo->appointmentnumber}}</td>
                        <td>{{$serviceinfo->firstname}}</td>
                        <td>{{$serviceinfo->middlename}}</td>
                        <td> {{$serviceinfo->lastname}}</td>
                        <td>{{$serviceinfo->contactnumber}}</td>
                        <td>{{$serviceinfo->listofproblems}}</td>
                        <td>{{$serviceinfo->email}}</td>
                        <td>{{$serviceinfo->typeofservice}}</td>
                        <td>{{$serviceinfo->maintenance}}</td>
                        <td>{{$serviceinfo->customerpassword}}</td>
                        <td>{{$serviceinfo->defectiveunits}}</td>
                        <td>{{$serviceinfo->assignedstaff}}</td>
                        <td>
                            <a class="mt-4 bg-yellow-200 text-black font-bold py-2 px-4 rounded" href= "{{route('service-show', ['serno' => $serviceinfo->serviceno]) }}" >View</a>
                            <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href= "{{route('service-edit', ['serno' => $serviceinfo->serviceno]) }}" >Edit</a>
                            <form method="POST" action = "{{ route('service-delete', ['serno' => $serviceinfo->serviceno ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">
                           @csrf
                           @method('delete')
                           <button class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded" type="submit" >Delete</a>
                        </form>
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
