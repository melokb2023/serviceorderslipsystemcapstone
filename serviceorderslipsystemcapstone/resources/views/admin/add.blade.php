@include('layouts.adminnavigation')
<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #CD5C5C; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                style="background-color: #CD5C5C; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #CD5C5C;">

                        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="resources/css/style.scss" rel="stylesheet" />
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
                   <h6 style = "font-family:Arial" >Errors Encountered</h6>
                    @if($errors)
                       <ul>
                          @foreach($errors->all() as $error)
                         <li>{{$error}}</li>
                    @endforeach
                         </ul>
                    @endif
                    <form style="text-align: center;" method="POST" action="{{ route('add-service') }}">
    @csrf

    <div class="form-group">
        <label for="customer-appointment-number">Appointment Number</label>
        <select name="xcustomerappointmentnumber">
            @foreach($customerappointment as $customerinfo)
                <option value="{{ $customerinfo->customerappointmentnumber }}">{{ $customerinfo->customerappointmentnumber }} - {{ $customerinfo->firstname }} {{ $customerinfo->middlename }} {{ $customerinfo->lastname }}</option>
            @endforeach
        </select>
    </div>

   <div class="form-group">
        <label for="list-of-problems">List of Problems</label>
        <input type="text" name="xlistofproblems" value="{{ old('xlistofproblems') }}" />
    </div>

<div class="form-group">
        <label for="type-of-service">Type Of Service</label>
        <select name="xtypeofservice">
            <option value="Reformatting">Reformatting</option>
            <option value="Replacement">Replacement</option>
            <option value="Virus Removal">Virus Removal</option>
            <option value="Computer Network Troubleshooting">Computer Network Troubleshooting</option>
            <option value="Upgrade Hardware">Upgrade Hardware</option>
        </select>
    </div>

    <div class="form-group">
        <label for="maintenance-required">Maintenance Required</label>
        <select name="xmaintenancerequired">
            <option value="Scheduled Maintenance">Scheduled Maintenance</option>
            <option value="Preventive Maintenance">Preventive Maintenance</option>
            <option value="Full Maintenance">Full Maintenance</option>
        </select>
    </div>

    <div class="form-group">
        <label for="customer-password">Customer Password</label>
        <input type="password" name="xcustomerpassword" value="{{ old('xcustomerpassword') }}" />
    </div>

    <div class="form-group">
        <label for="defective-units">Defective Units</label>
        <input type="text" name="xdefectiveunits" value="{{ old('xdefectiveunits') }}" />
    </div>

    <div class="form-group">
        <label for="assigned-staff">Assigned Staff</label>
        <select name="xassignedstaff">
            <option value="Scheduled Maintenance">Scheduled Maintenance</option>
            <option value="Preventive Maintenance">Preventive Maintenance</option>
            <option value="Full Maintenance">Full Maintenance</option>
        </select>
    </div>

    <div class="form-group">
        <label for="assigned-tasks">Assigned Tasks</label>
        <input type="text" name="xviewtasks" value="{{ old('xviewtasks') }}" />
    </div>

    <button class="submit" type="submit" style="background-color: black; color: white;">Submit Info</button>
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