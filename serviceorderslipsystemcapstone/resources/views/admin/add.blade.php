<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pre-Service Listing') }}
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
                <form method = "POST" action="{{ route('student-store') }}">
                        @csrf
                       <div class="flex-items-center"><label for="ID Number">ID Number</label>
                    <div>
                        <input type="text" name="xidNo" value="{{old('xidNo')}}"/>
                    </div>
                </div>
                    <div class="flex-items-center"><label for="First Name">First Name</label>
                    <div>
                    <input type="text" name="xfirstName" value="{{old('xfirstName')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Middle Name">Middle Name</label>
                    <div>
                    <input type="text" name="xmiddleName" value="{{old('xmiddleName')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Last Name">Last Name</label>
                    <div>
                    <input type="text" name="xlastName" value="{{old('xlastName')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Suffix">Suffix</label>
                    <div>
                    <input type="text" name="xsuffix" value="{{old('xsuffix')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Course">Course</label>
                    <div> 
                    <input type="text" name="xcourse" value="{{old('xcourse')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="Year">Year</label>
                    <div>
                    <input type="number" min="1" max="4" name="xyear" value="{{old('xyear')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="birthDate"></label>
                    <div>
                    <input type="date" name="xbirthDate" value="{{old('xbirthDate')}}"/>
                    </div>
</div>
                       <div class="flex-items-center"><label for="gender"></label>
                    <div>
                    <select name="xgender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
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