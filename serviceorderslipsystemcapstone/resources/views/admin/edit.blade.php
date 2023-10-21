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
                    @foreach($service as $serviceinfo)
                <form method = "POST" action="{{ route('service-update',['serviceno' => $serviceinfo->serviceno]) }}">
                        @csrf
                        @method('patch')
                    <div class="flex-items-center"><label for="First Name">First Name</label>
                    <div>
                    <input type="text" name="xfirstName" value="{{$serviceinfo->firstName}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Middle Name">Middle Name</label>
                    <div>
                    <input type="text" name="xmiddleName" value="{{$serviceinfo->middleName}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Last Name">Last Name</label>
                    <div>
                    <input type="text" name="xlastName" value="{{$serviceinfo->lastName}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Contact Number">Contact Number</label>
                    <div>
                    <input type="text" name="xcontactNumber" value="{{$serviceinfo->contactNumber}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Address">Address</label>
                    <div> 
                    <input type="text" name="xaddress" value="{{$serviceinfo->address}}"/>
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
                    <select name="xtypeofservice">
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
             <button type ="submit" style="text-align:center;background-color:black"> Submit Info </button>
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>