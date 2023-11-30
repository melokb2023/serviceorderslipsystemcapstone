@include('layouts.adminnavigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer Appointment Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h6>List of Staff</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Staff Number</th>
                        <th>Staff Name</th>
</tr>
                    <tbody>
                    @foreach($staff as $staffco)
                       <tr>
                       <td>{{$staffco->staffnumber}}</td>
                       <td>{{$staffco->staffname}}</td>
                    </tr>
                        @endforeach
                   </tbody>

                    </table>
                    <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('staff')}}"> Back </a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>