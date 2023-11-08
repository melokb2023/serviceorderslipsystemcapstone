@include('layouts.customernavigation')
<x-app-layout>


    <div class="py-12" style="background-color:red;width: 100%">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:red;width: 100%">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:red;width: 100%">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:red;width: 100%">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>