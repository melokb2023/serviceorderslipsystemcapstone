<x-app-layout>
    @include('layouts.adminnavigation')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #2980b9;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #2980b9; text-align: center">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #2980b9; font-family: 'Century Gothic', sans-serif; font-weight: bold;">
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
                            background-color: #2196f3;
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
                        .password-input-container {
                            position: relative;
                        }

                        .password-input {
                            padding-right: 30px; /* Adjust the padding to make room for the icon */
                        }

                        .password-toggle-btn {
                            position: absolute;
                            top: 50%;
                            right: 10px; /* Adjust the right spacing as needed */
                            transform: translateY(-50%);
                            cursor: pointer;
                            border: none;
                            background: none;
                            font-size: 20px;
                            color: #888; /* Adjust the color as needed */
                        }

                        @media only screen and (max-width: 600px) {
                            body {
                                font-size: 14px;
                            }
                        }
                        #typeofservice {
    pointer-events: none; /* Disable pointer events */
    background-color: #f2f2f2; /* Add a background color to indicate readonly */
    color: #888; /* Adjust the color to make it appear disabled */
}
                    </style>

                    @if($errors)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    @foreach($servicedata as $serviceinfo)
                        <form method="POST" id="updateForm" action="{{ route('service-update',['serno' => $serviceinfo->serviceno]) }}">
                            @csrf
                            @method('patch')

                            <!-- Row group for List of Problems and Type of Service -->
                            <div class="form-row-group">
                                <div class="form-group">
                                    <label for="List of Problems">List of Problems</label>
                                    <input class="textexpand2" type="text" name="xlistofproblems" value="{{$serviceinfo->listofproblems}}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="Type Of Service">Type Of Service</label>
                                    <select id="typeofservice" name="xtypeofservice" readonly>
    <option value="Reformatting" <?php if($serviceinfo->typeofservice == 'Reformatting') echo 'selected'; ?>>Reformatting</option>
    <option value="Replacement" <?php if($serviceinfo->typeofservice == 'Replacement') echo 'selected'; ?>>Replacement</option>
    <option value="Virus Removal" <?php if($serviceinfo->typeofservice == 'Virus Removal') echo 'selected'; ?>>Virus Removal</option>
    <option value="Computer Network Troubleshooting" <?php if($serviceinfo->typeofservice == 'Computer Network Troubleshooting') echo 'selected'; ?>>Computer Network Troubleshooting</option>
    <option value="Upgrade Hardware" <?php if($serviceinfo->typeofservice == 'Upgrade Hardware') echo 'selected'; ?>>Upgrade Hardware</option>
    <option value="Clean Up Files" <?php if($serviceinfo->typeofservice == 'Clean Up Files') echo 'selected'; ?>>Clean Up Files</option>
    <option value="Hardware Fixing" <?php if($serviceinfo->typeofservice == 'Hardware Fixing') echo 'selected'; ?>>Hardware Fixing</option>
    <option value="Peripheral Fixing" <?php if($serviceinfo->typeofservice == 'Peripheral Fixing') echo 'selected'; ?>>Peripheral Fixing</option>
    <option value="Software Installation" <?php if($serviceinfo->typeofservice == 'Software Installation') echo 'selected'; ?>>Software Installation</option>
    <option value="Reapplication" <?php if($serviceinfo->typeofservice == 'Reapplication') echo 'selected'; ?>>Reapplication</option>
</select>
                                </div>
                            </div>

                            <!-- Row group for Customer Password and Defective Units -->
                            <div class="form-row-group">
                                <div class="form-group password-strength">
                                    <label for="Customer Password">Customer Password</label>
                                    <div class="password-input-container">
                                        <input class="textexpand2 password-input" type="password" name="xcustomerpassword" id="passwordInput" value="{{$serviceinfo->customerpassword}}" readonly />
                                        <button type="button" id="togglePassword" class="password-toggle-btn">&#x1F441;</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Defective Units">Defective Units</label>
                                    <input class="textexpand" type="text" name="xdefectiveunits" value="{{ $serviceinfo->defectiveunits }}" readonly />
                                </div>
                            </div>

                            <!-- Row group for Actions Required and Service Progress -->
                            <div class="form-row-group">
                                <div class="form-group">
                                    <label for="Actions Required">Actions Required</label>
                                    <input class="textexpand2" type="text" name="xactionsrequired" value="{{$serviceinfo->actionsrequired }}" readonly />
                                </div>
                                <div class="form-group">
                                    <br>
                                    <br>
                                    <br>
                                    <label for="Service Progress">Service Progress</label>
                                    <select id="serviceProgress" name="xserviceprogress">
                                        <option value="Completed" <?php if($serviceinfo->serviceprogress == 'Completed') echo 'selected'; ?>>Completed</option>
                                        <option value="Ongoing" <?php if($serviceinfo->serviceprogress == 'Ongoing') echo 'selected'; ?>>Ongoing</option>
                                        <option value="Refer to Other Technicians or Shop" <?php if($serviceinfo->serviceprogress == 'Refer to Other Technicians or Shop') echo 'selected'; ?>>Refer to Other Technicians or Shop</option>
                                        <option value="Overdue" <?php if($serviceinfo->serviceprogress == 'Overdue') echo 'selected'; ?>>Overdue</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="text-align:center; display: none;" id="serviceEndGroup">
                                <label for="serviceend">Service End Date</label>
                                <input type="datetime-local" name="xserviceend" value="{{$serviceinfo->serviceend}}" required>
                            </div>

                            <!-- Row group for Service Remarks -->
                            <div class="form-row">
    <div class="form-group">
        <label for="Service Remarks">Service Report</label>
        <input class="textexpand2" type="text" name="xserviceremarks" value="{{ $serviceinfo->serviceremarks }}" readonly />
    </div>
</div>

                            <button type="submit" id="submitBtn"  style="text-align:center;background-color:green">Update Info</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const serviceProgressSelect = document.getElementById('serviceProgress');
            const serviceEndGroup = document.getElementById('serviceEndGroup');

            serviceProgressSelect.addEventListener('change', function () {
                if (serviceProgressSelect.value === 'Completed') {
                    serviceEndGroup.style.display = 'block';
                } else {
                    serviceEndGroup.style.display = 'none';
                }
            });

            serviceProgressSelect.dispatchEvent(new Event('change'));
        });

        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');
            const togglePasswordButton = document.getElementById('togglePassword');

            togglePasswordButton.addEventListener('click', function () {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                togglePasswordButton.innerHTML = type === 'password' ? '&#x1F441;' : '&#x1F440;';
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const submitButton = document.getElementById('submitBtn');
            const updateForm = document.getElementById('updateForm');

            submitButton.addEventListener('click', function () {
                submitButton.disabled = true;
                submitButton.style.opacity = '0.5'; // Set the opacity to a value between 0 (invisible) and 1 (fully visible)
                updateForm.submit();
            });
        });
    </script>
</x-app-layout>
