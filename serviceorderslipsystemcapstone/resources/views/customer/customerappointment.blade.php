@include('layouts.customernavigation')
<x-app-layout>


    <div class="py-12" style="background-color:#CD5C5C;width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;width: 100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C;width: 100%">
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
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form method = "POST" action="{{ route('customerappointment-store') }}">
                        @csrf
                    <div class="flex-items-center"><label for="First Name">First Name</label>
                    <div>
                    <input type="text" name="xfirstname" value="{{old('xfirstname')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Middle Name">Middle Name</label>
                    <div>
                    <input type="text" name="xmiddlename" value="{{old('xmiddlename')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Last Name">Last Name</label>
                    <div>
                    <input type="text" name="xlastname" value="{{old('xlastname')}}"/>
                    </div>
</div>
               <div class="flex-items-center"><label for="Contact Number">Contact Number</label>
                    <div>
                    <input type="text" name="xcontactnumber" value="{{old('xcontactnumber')}}"/>
                    </div>
</div>
        <div class="flex-items-center"><label for="Email">Email</label>
                    <div>
                    <input type="text" name="xemail" value="{{old('xemail')}}"/>
                    </div>
</div>
             <div class="flex-items-center"><label for="Address">Address</label>
                    <div>
                    <input type="text" name="xaddress" value="{{old('xaddress')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Appointment Purpose">Appointment Purpose</label>
                    <div>
                    <input type="text" name="xappointmentpurpose" value="{{old('xappointmentpurpose')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Appointment Type">Appointment Type</label>
                    <div> 
                    <select name="xappointmenttype">
                        <option value="Direct">Direct</option>
                        <option value="Scheduled">Scheduled</option>
</select>
                    </div>
</div>
                           
                             
             <button type ="submit"> Submit Info </button>
                   </form>
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

    <br>
</x-app-layout>