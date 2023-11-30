@include('layouts.adminnavigation')
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#d70021;border: 3px solid black;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#d70021">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#d70021">
<style>
          table,
            tr {
                font-family: "Century Gothic ";
                font-weight:bold;
            }

            td {
                font-family: "Arial";
                background-color: #cbd6e4;
            }

            th {
                font-family: "Arial";
                background-color: white;
            }
            h1{
                font-family:Arial;
                color:white;
                font-size:30px;
                font-weight:bold;
            }
 h6{
    font-family: "Century Gothic";
    font-size:32px;
    font-weight:bold;
    text-align:center;
    color:white;
 }
</style>

               <h6>List of Staff</h6>
                    <table class="border-separate border-spacing-5" style="width:100%">
                      <tr>
                        <th>Staff Number</th>
                        <th>Staff Name</th>
                        <th>Options</th>
</tr>
<tbody>
                @foreach($staff as $staffco)
                       <tr>
                        <td>{{$staffco->staffnumber}}</td>
                        <td>{{$staffco->staffname}}</td>     
                        <td>
                        <a style="background-color: #f6e05e; height: 0.20rem;"
   class="mt-4 text-black font-bold py-2 px-4 rounded"
   href="{{ route('staff-show', ['staff' => $staffco->staffnumber]) }}">View</a>
<br>
<br>
<a style="background-color: #3490dc; height: 0.20rem;"
   class="mt-4 text-black font-bold py-2 px-4 rounded"
   href="{{ route('staff-edit', ['staff' => $staffco->staffnumber]) }}">Edit</a>
<form method="POST"
      action="{{ route('staff-delete', ['staff' => $staffco->staffnumber ]) }}"
      onclick="return confirm('Are you sure you want to delete this record?')">
    @csrf
    @method('delete')
    <button class="mt-4 bg-red-500  text-black font-bold py-2 px-4 rounded"
            type="submit">Delete</button>
    <br>
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
