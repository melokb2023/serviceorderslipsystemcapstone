@include('layouts.adminnavigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    @foreach($servicedata as $serviceinfo)
                <form method = "POST" action="{{ route('service-update',['serno' => $serviceinfo->serviceno]) }}">
                        @csrf
                        @method('patch')
            <div class="flex-items-center"><label for="List of Problems">List of Problems</label>
                    <div>
                    <input type="text" name="xlistofproblems" value="{{$serviceinfo->listofproblems}}"/>
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
                        <option value="Clean Up Files">Clean Up Files</option>
                        <option value="Hardware Fixing">Hardware Fixing</option>
                        <option value="Peripheral Fixing">Peripheral Fixing</option>
                        <option value="Software Installation">Software Installation</option>
                        <option value="Reapplication">Reapplication</option>
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
                    <input type="text" name="xcustomerpassword" value="{{$serviceinfo->customerpassword}}"/>
                    </div>
</div>
<div class="flex-items-center"><label for="Defective Units">Defective Units</label>
                    <div>
                    <input type="text" name="xdefectiveunits" value="{{$serviceinfo->defectiveunits}}"/>
                    </div>
</div>
<div class="flex-items-center"><label for="Assigned Staff">Assigned Staff</label>
                    <div>
                    <select name="xassignedstaff">
                    <option value="Staff 1">Staff 1</option>
            <option value="Staff 2">Staff 2</option>
            <option value="Staff 3">Staff 3</option>
    
</select>
                    </div>
</div>
<div class="flex-items-center"><label for="Assigned Tasks">Assigned Tasks</label>
                    <div>
                    <input type="text" name="xviewtasks" value="{{$serviceinfo->viewtasks}}"/>
                    </div>
</div>
<div class="flex-items-center"><label for="Remarks">Remarks</label>
                    <div>
                    <input type="text" name="xremarks" value="{{$serviceinfo->remarks}}"/>
                    </div>
</div>


             <button type ="submit" style="text-align:center;background-color:black"> Submit Info </button>
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>