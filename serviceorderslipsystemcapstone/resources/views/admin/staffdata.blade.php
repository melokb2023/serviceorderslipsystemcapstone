@include('layouts.adminnavigation')
<x-app-layout>
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
                        button{
                            align-items:center;
                        }
                    </style>
                    <div class="wrapper">
                        <div class="table">
                            <div class="row header">
                                <div class="cell">ID</div>
                                <div class="cell">Staff Name</div>
                                <div class="cell">Staff Email</div>
                                <div class="cell">Options</div>
                            </div>
                            @foreach($staff as $staffco)
                                <div class="row">
                                    <div class="cell" data-title="ID">{{ $staffco->id }}</div>
                                    <div class="cell" data-title="Staff Name">{{ $staffco->name }}</div>
                                    <div class="cell" data-title="Staff Email">{{ $staffco->email }}</div>
                                    <div class="cell">
                                        <div class="form-group" style="display: flex; justify-content: center; align-items: center;">
                                            <a style="display: inline-block; margin-right: 0.5rem; padding: 0.5rem 1rem; background-color: #f6e05e; color: #000; text-decoration: none; font-weight: bold; border-radius: 0.25rem; transition: background-color 0.3s;" href="{{ route('staff-show', ['staff' => $staffco->staffnumber]) }}" title="View">👁</a>
                                            <form method="POST" action="{{ route('staff-delete', ['staff' => $staffco->staffnumber]) }}" onclick="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('delete')
                                                <button style="display: inline-block; margin-right: 0.5rem; padding: 0.5rem 1rem; background-color: red; color: black; text-decoration: none; font-weight: bold; border-radius: 0.25rem; transition: background-color 0.3s;" type="submit" title="Delete">🗑</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>  
                        <div style="text-align: center;">
                        <a class="button" href="{{ route('add-staff') }}">ADD STAFF</a>
                    </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
