@include('layouts.adminnavigation')
<x-app-layout>
    @if(session('success_message'))
        <script>
            // Replace this with your preferred pop-up library or implementation
            alert("{{ session('success_message') }}");
        </script>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <style>
                        /* CSS styles */
                        body {
                            font-family: 'Helvetica Neue', Helvetica, Arial;
                            font-size: 14px;
                            line-height: 20px;
                            font-weight: 400;
                            color: #3b3b3b;
                            -webkit-font-smoothing: antialiased;
                            font-smoothing: antialiased;
                            background: #2b2b2b;
                        }

                        @media screen and (max-width: 580px) {
                            body {
                                font-size: 16px;
                                line-height: 22px;
                            }
                        }

                        .wrapper {
                            margin: 0 auto;
                            padding: 40px;
                            max-width: 800px;
                        }

                        .table {
                            margin: 0 0 40px 0;
                            width: 100%;
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                        }

                        .table-row {
                            display: flex;
                            flex-wrap: wrap;
                            background: #f6f6f6;
                        }

                        .table-row:nth-of-type(odd) {
                            background: #e9e9e9;
                        }

                        .table-header {
                            font-weight: 900;
                            color: #ffffff;
                            background-color: #2980b9; /* Retain light blue color */
                        }

                        .table-header .cell {
                            flex: 1;
                            padding: 12px;
                            text-align: center;
                            background-color: #2980b9;
                        }

                        .cell {
                            flex: 1;
                            padding: 12px;
                            text-align: center;
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
                    </style>
                    <div class="wrapper">
                        <div class="table">
                            <div class="table-row table-header">
                                <div class="cell">Name</div>
                                <div class="cell">User Type</div>
                                <div class="cell">Status</div>
                                <div class="cell">Options</div>
                            </div>
                            @foreach($users as $user)
                                <div class="table-row">
                                    <div class="cell">{{ $user->name }}</div>
                                    <div class="cell">{{ $user->usertype }}</div>
                                    <div class="cell">
                                        @if($user->is_logged_in)
                                            Active
                                        @else
                                            Offline
                                        @endif
                                    </div>
                                    <div class="cell">
                                        <a href="{{ route('user-editusertype', ['id' => $user->id]) }}" class="bg-blue-500 text-black font-bold p-1 rounded hover:bg-blue-600 h-8 w-8 flex items-center justify-center text-base" title="Change User Type">🔄</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
