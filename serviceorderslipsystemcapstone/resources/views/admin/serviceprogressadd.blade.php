@include('layouts.adminnavigation')
<x-app-layout>
  <div class="py-12" style="background-color:#CD5C5C;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#C0C0C0;">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                <form style="align-items:center" method = "POST" action="{{ route('add-serviceprogress') }}">
                        @csrf
                <div class="flex-items-center" style="text-align:center"><label for="Customer Appointment Number">Appointment Number</label>
                    <div>  
                       <select name="xserviceno">
                            @foreach($servicedata as $service)
                            <option value="{{$service->serviceno}} "> {{$service->serviceno}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>  
                <div class="flex-items-center" style="text-align:center"><label for="Date and Time">Date and Time</label>
                    <div>
                    <input type="date" name="xdateandtime" value="{{old('xdateandtime')}}"/>
                    </div>
</div>
               <div class="flex-items-center"><label for="Service Progress">Service Progress</label>
                    <div>
                    <select name="xserviceprogress">
                        <option value="Ongoing">Ongoing</option>
                        <option value="Completed">Completed</option>
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