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
                            display: table;
                        }

                        @media screen and (max-width: 580px) {
                            .table {
                                display: block;
                            }
                        }

                        .row {
                            display: table-row;
                            background: #f6f6f6;
                        }

                        .row:nth-of-type(odd) {
                            background: #e9e9e9;
                        }

                        .row.header {
                            font-weight: 900;
                            color: #ffffff;
                            background: #2980b9;
                        }

                        .row.green {
                            background: #27ae60;
                        }

                        .row.blue {
                            background: #2980b9;
                        }

                        @media screen and (max-width: 580px) {
                            .row {
                                padding: 14px 0 7px;
                                display: block;
                            }

                            .row.header {
                                padding: 0;
                                height: 6px;
                                
                            }

                            .row.header .cell {
                                display: none;
                            }

                            .cell {
                                margin-bottom: 10px;
                            }

                            .cell:before {
                                margin-bottom: 3px;
                                content: attr(data-title);
                                min-width: 98px;
                                font-size: 10px;
                                line-height: 10px;
                                font-weight: bold;
                                text-transform: uppercase;
                                color: #969696;
                                display: block;
                            }
                        }

                        .cell {
                            padding: 6px 12px;
                            display: table-cell;
                        }

                        @media screen and (max-width: 580px) {
                            .cell {
                                padding: 2px 16px;
                                display: block;
                            }
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
                            <div class="row header">
                                <div class="cell">Name</div>
                                <div class="cell">User Type</div>
                                <div class="cell">Options</div>
                            </div>
                            @foreach($users as $user)
                                <div class="row">
                                    <div class="cell">{{ $user->name }}</div>
                                    <div class="cell">{{ $user->usertype }}</div>
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
