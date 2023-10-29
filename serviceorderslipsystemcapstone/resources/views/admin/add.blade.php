<x-app-layout>

    <div class="py-12" style="background-color:red;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:red;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:red;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#C0C0C0;">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form style="align-items:center" method = "POST" action="{{ route('service-store') }}">
                        @csrf
                        
                        <div class="flex-items-center" style="text-align:center"><label for="Appointment Number">Appointment Number</label>
                     <div>  
                       <select name="xappointmentnumber">
                            @foreach($customerappointment as $customer)
                            <option value="{{$customer->customernumber}} "> {{$customer->customernumber}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>  
                        <div class="flex-items-center" style="text-align:center"><label for="Complete Name">Complete Name</label>
                     <div>  
                       <select name="xcompletename">
                            @foreach($servicedata as $serviceinfo)
                            <option value="{{$serviceinfo->firstname }} {{$serviceinfo->middlename }} {{$serviceinfo->lastname }} ">  {{$serviceinfo->firstname}} {{$serviceinfo->middlename}} {{$serviceinfo->lastname}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>  
                        
                        <div class="flex-items-center" style="text-align:center"><label for="Complete Name">Complete Name</label>
                     <div>  
                       <select name="xcompletename">
                            @foreach($servicedata as $serviceinfo)
                            <option value="{{$serviceinfo->firstname }} {{$serviceinfo->middlename }} {{$serviceinfo->lastname }} ">  {{$serviceinfo->firstname}} {{$serviceinfo->middlename}} {{$serviceinfo->lastname}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>
<div class="flex-items-center"><label for="Contact Number">Contact Number</label>
                    <div> 
                    <input type="text" name="xcontactnumber" value="{{old('xcontactnumber')}}"/>
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
             <div class="flex-items-center"><label for="Problem Encountered">Problem Encountered</label>
                    <div>
                    <input type="text" name="xproblemencountered" value="{{old('xproblemencountered')}}"/>
                    </div>
</div>
<div class="flex-items-center"><label for="Customer Password">Customer Password</label>
                    <div>
                    <input type="text" name="xcustomerpassword" value="{{old('xcustomerpassword')}}"/>
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
             <button type ="submit" style="text-align:center;background-color:black"> Submit Info </button>
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