@include('layouts.adminnavigation')
<x-app-layout>
  <div class="py-12" style="background-color:#CD5C5C;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C;">
                        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="resources/css/style.scss" rel="stylesheet" />
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
                <form style="align-items:center" method = "POST" action="{{ route('add-service') }}">
                        @csrf
                <div class="flex-items-center" style="text-align:center"><label for="Customer Appointment Number">Appointment Number</label>
                    <div>  
                       <select name="xcustomerappointmentnumber">
                            @foreach($customerappointment as $customerinfo)
                            <option value="{{$customerinfo->customerappointmentnumber}} "> {{$customerinfo->customerappointmentnumber}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>  
                      
<div class="flex-items-center"><label for="Contact Number">Contact Number</label>
                    <div> 
                    <input type="text" name="xcontactnumber" value="{{old('xcontactnumber')}}"/>
                    </div>
</div>
                 <div class="flex-items-center"><label for="List of Problems">List of Problems</label>
                    <div> 
                    <input type="text" name="xlistofproblems" value="{{old('xlistofproblems')}}"/>
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
               <div class="flex-items-center"><label for="Type Of Service">Type Of Service</label>
                    <div>
                    <select name="xtypeofservice">
                        <option value="Reformatting">Reformatting</option>
                        <option value="Replacement">Replacement</option>
                        <option value="Virus Removal">Virus Removal</option>
                        <option value="Computer Network Troubleshooting">Computer Network Troubleshooting</option>
                        <option value="Upgrade Hardware">Upgrade Hardware</option>
</select>
                    </div>
</div>
<div class="flex-items-center"><label for="Maintenance Required">Maintenance Required</label>
                    <div>
                    <select name="xmaintenancerequired">
                        <option value="Scheduled Maintenance">Scheduled Maintenance</option>
                        <option value="Preventive Maintenance">Preventive Maintenance</option>
                        <option value="Full Maintenance">Full Maintenance</option>
    
</select>
                    </div>
</div>
   <div class="flex-items-center"><label for="Customer Password">Customer Password</label>
                    <div>
                    <input type="text" name="xcustomerpassword" value="{{old('xcustomerpassword')}}"/>
                    </div>
</div>
<div class="flex-items-center"><label for="Defective Units">Defective Units</label>
                    <div>
                    <input type="text" name="xdefectiveunits" value="{{old('xdefectiveunits')}}"/>
                    </div>
</div>

<div class="flex-items-center"><label for="Assigned Staff">Assigned Staff</label>
                    <div>
                    <select name="xassignedstaff">
                        <option value="Scheduled Maintenance">Scheduled Maintenance</option>
                        <option value="Preventive Maintenance">Preventive Maintenance</option>
                        <option value="Full Maintenance">Full Maintenance</option>
    
</select>
                    </div>
</div>
        <div class="flex-items-center"><label for="Assigned Tasks">Assigned Tasks</label>
                    <div>
                    <input type="text" name="xviewtasks" value="{{old('xviewtasks')}}"/>
                    </div>
</div>
             <button class="submit" type ="submit" style="text-align:center;background-color:black"> Submit Info </button>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>