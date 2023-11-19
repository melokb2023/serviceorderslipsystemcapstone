@include('layouts.staffnavigation')
<x-app-layout>
  <div class="py-12" style="background-color:#CD5C5C;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C;">
                <style>
body {font-family: Century;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

button[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

button[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type=submit]:hover {
  background-color: #45a049;
}




</style>
                   <h6 style="font-family: Century">Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    @foreach($staffdatabase as $staff)
                    <form method = "POST" action="{{ route('staffdatabase-update',['serviceno' => $staff->serviceno]) }}">
                        @csrf
                        @method('patch')
              <div class="flex-items-center" style="text-align:center"><label for="Actions Taken">Actions Taken</label>
                    <div>
                    <input type="text" name="xactionstaken" value="{{$staff->actionstaken}}"/>
                    </div>
</div>
               <div class="flex-items-center"><label for="Work Progress">Work Progress</label>
                    <div>
                    <select name="xworkprogress">
                        <option value="Ongoing">Ongoing</option>
                        <option value="Completed">Completed</option>
</select>
                    </div>
</div>

             <button type ="submit" style="text-align:center;background-color:black"> Submit Info </button>
                   </form>
                   @endforeach
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