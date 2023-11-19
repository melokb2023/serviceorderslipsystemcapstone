@include('layouts.adminnavigation')
<x-app-layout>

   <div class="py-12" style="background-color:#CD5C5C; display: flex; justify-content: center; align-items: center;">
>       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C; display: flex; justify-content: center; align-items: center;">
>          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h6>Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    @foreach($serviceprogress as $serviceinfo)
                <form method = "POST" action="{{ route('serviceprogress-update',['servicenumber' => $serviceinfo->serviceprogressno]) }}">
                        @csrf
                        @method('patch')
           
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
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>