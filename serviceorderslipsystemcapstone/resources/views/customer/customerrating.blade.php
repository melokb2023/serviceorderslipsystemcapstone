@include('layouts.customernavigation')
<x-app-layout>
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#CD5C5C;border:3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#CD5C5C;text-align:center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#CD5C5C;">
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

.star{
  color:orange;
}

.description{
  color:black;
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
                <form style="align-items:center" method = "POST" action="{{ route('add-customerrating') }}">
                        @csrf
                        <div class="flex-items-center"><label for="Put Your Email">Email</label>
                    <div> 
                    <input type="text" name="xrateemail" value="{{old('xrateemail')}}"/>
                    </div>
</div>
                <div class="flex-items-center"><label for="Review">Review</label>
                    <div> 
                    <input type="textarea" name="xreview" value="{{old('xreview')}}"/>
                    </div>
</div>
   
               <div class="flex-items-center"><label for="Rating">Rating</label>
                    <div>
                    <select name="xrating">
                        <option style="color:orange" value="1">
                        <h2 class = "star"> *  - <h3 class = "description">Very Poor</h3>
                        </option>
                        <option style="color:orange" value="2">
                        <h2 class = "star"> * * </h2> - <h3 class = "description"> Poor</h3>
                        </option>
                        <option style="color:orange" value="3">
                        <h2 class = "star"> * * *</h2> - <h3 class = "description"> Average</h3>
                        </option>
                        <option style="color:orange" value="4">
                        <h2 class = "star"> * * * *</h2> - <h3 class = "description"> Good</h3>
                        </option>
                        <option style="color:orange" value="5">
                        <h2 class = "star"> * * * * * </h2> - <h3 class = "description"> Very Good</h3>
                        </option>
</select>
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