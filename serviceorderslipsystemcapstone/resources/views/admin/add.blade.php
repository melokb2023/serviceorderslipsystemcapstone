@include('layouts.adminnavigation')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021; font-family: 'Century Gothic', sans-serif; font-weight: bold;">

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
                        /* Your existing styles */

                      body {
    font-family: 'Century Gothic', sans-serif;
    font-weight: bold;
    font-size: 16px;
    color: white;
    background-color: #d70021;
}

label {
    display: block;
    color:white;
    text-align: left;
    margin-bottom: 8px;
    font-size: 16px;
}

select,
textarea,
input[type=datetime-local],
input[type=email],
input[type=password],
input[type=checkbox] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    font-size: 14px;
}

.textexpand {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    font-size: 14px;
    height: 120%;
}

.textexpand2 {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    font-size: 14px;
}

button[type=submit] {
    width: 100%;
    background-color: #04AA6D;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    margin-top: 20px;
}

.form-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.form-group {
    width: 48%;
}

@media only screen and (max-width: 600px) {
    body {
        font-size: 14px;
    }
}

/* Ensure table cells are left-aligned */
                        

                    </style>

                    <h6 style="font-family:Arial">Errors Encountered</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif

                    @php
                        $availableCustomerAppointments = app(\App\Http\Controllers\ServiceController::class)->getAvailableCustomerAppointments();
                        $availableStaffNumbers = app(\App\Http\Controllers\ServiceController::class)->getAvailableStaffNumbers();
                    @endphp

                    @if($availableCustomerAppointments->isEmpty() || $availableStaffNumbers->isEmpty())
                    <p>No available customer appointments. Please add customer appointments first.</p>
                    
                    @else
                    <form style="text-align: center;" method="POST" action="{{ route('add-service') }}">
                        @csrf

                        <!-- Form row with two columns in one line -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="customer-appointment-number">Appointment Number</label>
                                <select name="xcustomerappointmentnumber">
                                    @foreach($availableCustomerAppointments as $customerinfo)
                                    <option value="{{ $customerinfo->customerappointmentnumber }}">{{ $customerinfo->customerappointmentnumber }} - {{ $customerinfo->customername }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="staffnumber">Staff Number</label>
                                <select class="textexpand2" name="xstaffnumber">
                                    @foreach($availableStaffNumbers as $staffco)
                                    <option value="{{ $staffco->staffnumber }}">{{ $staffco->staffnumber }}-{{ $staffco->staffname }}</option>
                                    @endforeach
                                </select>
                            </div>

                           
                        </div>
                          <div class="form-group">
                                <label for="type-of-service">Type Of Service</label>
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
                        <!-- Form row with three columns in one line -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="list-of-problems">List of Problems</label>
                                <input class="textexpand" type="text" name="xlistofproblems" value="{{ old('xlistofproblems') }}" />
                            </div>
                        
                             <div class="form-group">
                                <label for="customer-password">Customer Password</label>
                                <input type="password" name="xcustomerpassword" value="{{ old('xcustomerpassword') }}" />
                            </div>
                        </div>
                          <div class="form-row">
                            <div class="form-group">
                                <br>
                                <br>
                                <br>
                                <br>
                                <label for="defective-units">Defective Units</label>
                                <input class="textexpand2" type="text" name="xdefectiveunits" value="{{ old('xdefectiveunits') }}" />
                            </div>
                        </div>   
                         <div class="form-group">
                                <label for="actions-required">Actions Required</label>
                                <input class="textexpand2" type="text" name="xactionsrequired" value="{{ old('xactionsrequired') }}" />
                        </div>
                        <div class="form-group" style="text-align:center">
                            <label for="servicestarted">Service Started</label>
                            <input type="datetime-local" name="xservicestarted" value="{{old('xservicestarted')}}" required>
                        </div>
                       

                       
                        <button class="btn btn-primary" type="submit">Submit Info</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
