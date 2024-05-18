@include('layouts.adminnavigation')
<x-app-layout>
    @if(session('success_message'))
        <div>
            <script>
                // Replace this with your preferred pop-up library or implementation
                alert("{{ session('success_message') }}");
            </script>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <style>
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
                            margin: 0 auto;
                            width: 100%;
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                            display: table;
                        }

                        .table-row {
                            display: table-row;
                            background: #f6f6f6;
                        }

                        .table-row:nth-of-type(odd) {
                            background: #e9e9e9;
                        }

                        .table-header {
                            font-weight: 900;
                            color: #ffffff;
                            background-color: #2980b9;
                        }

                        .cell {
                            padding: 6px 12px;
                            display: table-cell;
                            text-align: center;
                            background-color: #2980b9;
                        }

                        @media screen and (max-width: 580px) {
                            .table {
                                display: block;
                            }

                            .table-row {
                                padding: 14px 0 7px;
                                display: block;
                            }

                            .table-row.header {
                                padding: 0;
                                height: 6px;
                            }

                            .table-row.header .cell {
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
                            <div class="table-row table-header" ;>
                                <div class="cell">ID</div>
                                <div class="cell">Staff Name</div>
                                <div class="cell">Staff Email</div>
                                <div class="cell">Options</div>
                            </div>
                            @foreach($staff as $staffco)
                                <div class="table-row">
                                    <div class="cell" style="background-color:white" data-title="ID">{{ $staffco->id }}</div>
                                    <div class="cell" style="background-color:white" data-title="Staff Name">{{ $staffco->name }}</div>
                                    <div class="cell" style="background-color:white" data-title="Staff Email">{{ $staffco->email }}</div>
                                    <div class="cell" style="background-color:white">
                                        <div class="form-group" style="display: flex; justify-content: center; align-items: center;">
                                            <a href="{{ route('staff-show', ['staff' => $staffco->staffnumber]) }}" class="bg-blue-500 text-black font-bold p-1 rounded hover:bg-blue-600 h-8 w-8 flex items-center justify-center text-lg" title="View">👁</a>
                                            <form method="POST" action="{{ route('staff-delete', ['staff' => $staffco->staffnumber]) }}" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-red-500 text-black font-bold p-1 rounded hover:bg-red-600 h-8 w-8 flex items-center justify-center text-lg" title="Delete">🗑</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <br>
                        <div style="text-align: center;">
                            <a href="{{ route('add-staff') }}" class="button">ADD STAFF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
