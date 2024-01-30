@include('layouts.adminnavigation')
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 text-gray-900 dark:text-gray-100" >
<style>
          table,
            tr {
                font-family: "Century Gothic ";
                font-weight:bold;
            }

            td {
                font-family: "Arial";
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
    color:black;
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
                        }

                        .button:hover {
                            transform: scale(1.05);
                        }
</style>

               <h6>List of Staff</h6>
                    <table style="width:100%">
                      <tr>
                        <th>ID</th>
                        <th>Staff Name</th>
                        <th>Staff Email</th>
                        <th>Options</th>
</tr>
<tbody>
                @foreach($staff as $staffco)
                       <tr>
                        <td>{{$staffco->id}}</td>
                        <td>{{$staffco->name}}</td> 
                        <td>{{$staffco->email}}</td>       
                        <td>
                            
        <div class="form-group " style="display: flex; justify-content: center; align-items: center;">
        <a style="display: inline-block; margin-right: 0.5rem; padding: 0.5rem 1rem; background-color: #f6e05e; color: #000; text-decoration: none; font-weight: bold; border-radius: 0.25rem; transition: background-color 0.3s;"
   href="{{ route('staff-show', ['staff' => $staffco->staffnumber]) }}" title="View"> 👁 </a>

<form method="POST"
      action="{{ route('staff-delete', ['staff' => $staffco->staffnumber ]) }}"
      onclick="return confirm('Are you sure you want to delete this record?')">
    @csrf
    @method('delete')
    <button style="display: inline-block; margin-right: 0.5rem; padding: 0.5rem 1rem; background-color: red; color: black; text-decoration: none; font-weight: bold; border-radius: 0.25rem; transition: background-color 0.3s;"
            type="submit" title="Delete"> 🗑</button>
    <br>
</form>
                    </div>
                     </td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>

                    <a class="button" href="{{ route('add-staff') }}">
                        ADD STAFF
                    </a>

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
