@include('layouts.customernavigation')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: #2980b9;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #2980b9; text-align: center;">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #2980b9;">

                    <style>
                        * {
                            box-sizing: border-box;
                            font-family: "Century Gothic";
                            font-weight: bold;
                        }

                        input[type=text],
                        select,
                        textarea {
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

                        .star {
                            color: orange;
                        }

                        .description {
                            color: black;
                        }

                        .submit {
                            text-align: center;
                            background-color: green;
                        }

                        .error-message {
                            color: white;
                        }

                        .no-services {
                            color: white;
                        }
                        label{
                            color:white;
                        }
                        .user-card {
        width: 200px;
        height: 50px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 10px;
        margin: 10px;
        color: #333;
    }
                    </style>

                    
                    @if($errors)
                        <ul class="error-message">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    @if(count($servicedata) > 0)
                            <form style="align-items:center" method="POST" action="{{ route('add-customerrating') }}">
                                @csrf

                                <div class="flex-items-center" style="text-align:center">
                                    <label for="Service Number">Service Number</label>
                                    <div>
                                        <select name="xserviceno">
                                            @foreach($servicedata as $service)
                                                    <option value="{{ $service->serviceno }}">
                                                        Service Number {{ $service->serviceno }} - Type of Service: {{ $service->typeofservice }} - Customer: {{ $service->customername }} - Staff: {{ $service->staffname }}
                                                    </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="flex-items-center">
                                    <label for="Review">Review</label>
                                    <div>
                                        <input type="text" name="xreview" value="{{ old('xreview') }}" />
                                    </div>
                                </div>

                                <div class="flex-items-center">
                                    <label for="Staff Performance Rating">Staff Performance Rating</label>
                                    <div>
                                    <select name="xstaffperformance">
                                    <option style="color: orange" value="1">&#9733; - Very Poor</option> <!-- ★ -->
    <option style="color: orange" value="2">&#9733;&#9733; - Poor</option> <!-- ★★ -->
    <option style="color: orange" value="3">&#9733;&#9733;&#9733; - Average</option> <!-- ★★★ -->
    <option style="color: orange" value="4">&#9733;&#9733;&#9733;&#9733; - Good</option> <!-- ★★★★ -->
    <option style="color: orange" value="5">&#9733;&#9733;&#9733;&#9733;&#9733; - Excellent</option> <!-- ★★★★★ -->
                                        </select>
                                    </div>
                                </div>
                                <div class="flex-items-center">
                                    <label for="Service Rating">Service Rating</label>
                                    <div>
                                        <select name="xrating">
                                        <option style="color: orange" value="1">&#9733; - Very Dissatisfied</option> <!-- ★ -->
    <option style="color: orange" value="2">&#9733;&#9733; - Somewhat Dissatisfied</option> <!-- ★★ -->
    <option style="color: orange" value="3">&#9733;&#9733;&#9733; - Neither Satisfied nor Dissatisfied</option> <!-- ★★★ -->
    <option style="color: orange" value="4">&#9733;&#9733;&#9733;&#9733; - Somewhat Satisfied</option> <!-- ★★★★ -->
    <option style="color: orange" value="5">&#9733;&#9733;&#9733;&#9733;&#9733; - Very Satisfied</option> <!-- ★★★★★ -->
                                        </select>
                                    </div>
                                </div>

                                <button class="submit" type="submit">Submit Info</button>
                            </form>
                            @else
                        <p class="no-services">You have no completed services for rating.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
