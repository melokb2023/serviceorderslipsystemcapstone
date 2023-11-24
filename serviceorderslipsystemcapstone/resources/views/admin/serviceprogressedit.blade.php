@include('layouts.adminnavigation')
<x-app-layout>
<style>
body {
    font-family: 'Century Gothic';
}
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

  .animated {
                            animation: fadeIn 1s;
                        }

                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                            }

                            to {
                                opacity: 1;
                            }
                        }

                        /* Example hover effect */
                        button[type=submit]:hover {
                            background-color: #45a049;
                            transform: scale(1.1);
                        }
}






</style>
   <div class="py-12">
>       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color:#FF4433; display: flex; justify-content: center; align-items: center;">
>          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color:#FF4433;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color:#FF4433;">
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
                <div class="flex-items-center"><label for="Remarks">Remarks</label>
                    <div>
                    <input type="text" name="xserviceremarks" value="{{$serviceinfo->serviceremarks}}"/>
                    </div>
</div>
              <button class="submit" type="submit" style="background-color: black; color: white;"> Submit Info </button>
                   </form>
                   @endforeach
                </div>
            </div>
            <br>
            <br>
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
        <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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
</x-app-layout>