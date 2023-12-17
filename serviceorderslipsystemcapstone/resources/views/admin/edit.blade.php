@include('layouts.adminnavigation')
<x-app-layout>
    <style>
        /* Your existing styles */

        /* Add the following styles for the row group */
        .form-row-group {
            display: flex;
            justify-content: space-between;
        }

        .form-row-group .form-group {
            width: 48%;
        }

        body {
            font-family: 'Century Gothic', sans-serif;
            font-weight: bold;
            font-size: 16px;
            color: white;
            background-color: #d70021;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-size: 16px;
            color:white;
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
    </style>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #d70021; border: 3px solid black">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #d70021; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021; font-family: 'Century Gothic', sans-serif; font-weight: bold;">
                    <h6>Errors Encountered</h6>
                    @if($errors)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    @foreach($servicedata as $serviceinfo)
                        <form method="POST" action="{{ route('service-update',['serno' => $serviceinfo->serviceno]) }}">
                            @csrf
                            @method('patch')

                            <!-- Row group for List of Problems and Type of Service -->
                            <div class="form-row-group">
                                <div class="form-group">
                                    <label for="List of Problems">List of Problems</label>
                                    <input class="textexpand2" type="text" name="xlistofproblems" value="{{$serviceinfo->listofproblems}}"/>
                                </div>
                            <div class="form-group">
                                    <label for="Type Of Service">Type Of Service</label>
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
                            </div>

                            <!-- Row group for Customer Password and Defective Units -->
                            <div class="form-row-group">
                                <div class="form-group">
                                    <label for="Customer Password">Customer Password</label>
                                    <input class="textexpand2" type="text" name="xcustomerpassword" value="{{$serviceinfo->customerpassword}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="Defective Units">Defective Units</label>
                                    <input class="textexpand" type="text" name="xdefectiveunits" value="{{ $serviceinfo->defectiveunits }}" />
                                </div>
                            </div>

                            <!-- Row group for Actions Required and Service Progress -->
                            <div class="form-row-group">
                                <div class="form-group">
                                    <label for="Actions Required">Actions Required</label>
                                    <input class="textexpand2" type="text" name="xactionsrequired" value="{{$serviceinfo->actionsrequired }}" />
                                </div>

                                <div class="form-group">
                                    <br>
                                    <br>
                                    <br>
                                    <label for="Service Progress">Service Progress</label>
                                    <select name="xserviceprogress">
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row group for Service Remarks -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="Service Remarks">Service Remarks</label>
                                    <input class="textexpand2" type="text" name="xserviceremarks" value="{{$serviceinfo->serviceremarks}}"/>
                                </div>
                            </div>

                            <button type="submit" style="text-align:center;background-color:green">Update Info</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
