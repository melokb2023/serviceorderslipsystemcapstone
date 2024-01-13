@if(session('success_message'))
    <script>
        // Replace this with your preferred pop-up library or implementation
        alert("{{ session('success_message') }}");
    </script>
@endif

@include('layouts.adminnavigation')
<x-app-layout style="background-color:#d70021;">

    <div class="py-12" style="display: flex; justify-content: center; align-items: center;">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
             style="background-color: #d70021; text-align: center;width: 1600px;border: 3px solid black;">
            <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #d70021;">
                <div class="form-group" style="display: flex; gap: 10px;">
                
                </div>
                <br>
                <br>
                <br>

                <link rel="stylesheet" href="style.scss">
                <style>
                    /* Existing styles ... */

                    /* Additional style for the wrapper div */
                    .table-wrapper {
                        height: 500px;
                        overflow-y: auto;
                    }

                    table,
                    tr {
                        font-family: "Century ";
                        font-weight: bold;
                        width: 100%;
                        margin: auto;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }

                    th,
                    td {
                        font-family: "Arial";
                        background-color: #cbd6e4;
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: center;
                    }

                    th {
                        font-family: "Arial";
                        background-color: white;
                    }

                    h1 {
                        font-family: Arial;
                        color: white;
                        font-size: 30px;
                        font-weight: bold;
                    }

                    #customers {
                        width: 50%;
                        margin: auto;
                    }

                    /* Center the table header text */
                    #customers th {
                        text-align: center;
                    }

                    /* Center the table content text */
                    #customers td {
                        text-align: center;
                    }

                    label {
                        font-family: "Century Gothic";
                        font-weight: bold;
                        color: white;
                    }

                    button {
                        font-family: "Century Gothic";
                        font-weight: bold;
                        color: white;
                        background-color: blue;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 8px;
                        font-size: 16px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                    }

                    button:hover {
                        background-color: darkblue;
                    }

                    .button {
                        border: none;
                        color: white;
                        text-decoration: none;
                        display: inline-block;
                        padding: 15px 32px;
                        border-radius: 8px;
                        font-size: 16px;
                        cursor: pointer;
                        transition: transform 0.2s ease-in-out;
                        background-color: green;
                        font-weight: bold;
                    }

                    .button:hover {
                        transform: scale(1.05);
                    }

                    .ongoing {
                        background-color: #f6e05e; /* Set your desired color for Ongoing */
                    }

                    .incomplete {
                        background-color: #FFB6C1; /* Set your desired color for Incomplete */
                    }

                    .completed {
                        background-color: #4caf50; /* Set your desired color for Completed */
                    }
                    .refer-to-other-technicians {
    background-color: #ffcccb; /* Set your desired color for "Refer to Other Technicians" */
    /* Add any other styles as needed */
}

                    .search-button {
                        background-color: green;
                        color: white;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 8px;
                        font-size: 16px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                    }

                    .search-button:hover {
                        background-color: darkgreen;
                    }

                    /* Styling for the clear button */
                    .clear-button {
                        background-color: red;
                        color: white;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 8px;
                        font-size: 16px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                        text-decoration: none;
                        display: inline-block;
                        font-weight: bold;
                    }

                    .clear-button:hover {
                        background-color: darkred;
                    }

                    input[type="text"] {
                        font-weight: bold;
                        /* Add any additional styles you want for the input boxes */
                    }

                </style>

                <h1 style="font-family:Arial; color:white; font-size:30px; font-weight:bold;">List of Users</h1>
                <div class="table-wrapper">
                    <table id="customers">
                        <tr>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Options</th>
                        </tr>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->usertype}} </td>
                              <td>
    <div class="flex items-center gap-2">
        <a href="{{ route('user-editusertype', ['id' => $user->id]) }}"
           class="bg-blue-500 text-black font-bold p-1 rounded hover:bg-blue-600 h-8 w-8 flex items-center justify-center text-base"
           title="Change User Type">
           🔄
        </a>
        <a href="{{ route('user-editpassword', ['id' => $user->id]) }}"
           class="bg-blue-500 text-black font-bold p-1 rounded hover:bg-blue-600 h-8 w-8 flex items-center justify-center text-base"
           title="Change Password">
           🔐
        </a>
    </div>
</td>
        </div>
    </div>
</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Additional space if needed -->
            </div>
        </div>
    </div>
</x-app-layout>
