@include('layouts.customernavigation')
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
                    @foreach($customerappointment as $customer)
                <form method = "POST" action="{{ route('customerappointment-update',['cano' => $customer->customernumber]) }}">
                        @csrf
                        @method('patch')
                    <div class="flex-items-center"><label for="First Name">First Name</label>
                    <div>
                    <input type="text" name="xfirstname" value="{{$customer->firstname}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Middle Name">Middle Name</label>
                    <div>
                    <input type="text" name="xmiddlename" value="{{$customer->middlename}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Last Name">Last Name</label>
                    <div>
                    <input type="text" name="xlastname" value="{{$customer->lastname}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Appointment Purpose">Appointment Purpose</label>
                    <div>
                    <input type="text" name="xappointmentpurpose" value="{{$customer->appointmentpurpose}}"/>
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
      

    

             <button type ="submit" style="text-align:center;background-color:black"> Submit Info </button>
                   </form>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>