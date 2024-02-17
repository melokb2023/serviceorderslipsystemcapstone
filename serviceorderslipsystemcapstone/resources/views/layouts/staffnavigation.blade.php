<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include external stylesheets, scripts, or other head elements here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        .top-nav {
            background-color: #2980b9;
            font-weight: bold;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
            align-items: center;
            transition: all 0.3s ease;
            color:white;
            padding: 20px; /* Adjust the padding to increase the size of the navigation bar */
    height: auto; /* Set the height to auto to allow it to expand based on content */
    width: 100%; /* Set the width to 100% to extend the length of the navigation bar */
        }
        .nav-container {
    display: flex;
    align-items: center;
}
        .top-nav-link {
            text-decoration: none;
            color:white;
            padding: 5px 5px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .top-nav-link:hover {
            border-color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .user-card {
    display: flex;
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
    font-size: 14px;
    padding: 10px;
    height: 30px; /* Set the desired height */
    width: auto; /* Let the width adjust to the content */
    background-color: white; /* Set background color to white */
    color: black; /* Set text color to black */
}
    </style>
</head>

<body>

    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-50" style="background-color:#2980b9">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#2980b9">
            <div class="flex justify-between h-16" style="background-color:#2980b9">

          
                <!-- Top Navigation Links -->
                <div class="top-nav">
                <div class="user-card">
                <span>{{ Auth::user()->name }}</span>
    <!-- Add any additional user information here -->
</div>
<a class="top-nav-link" href="{{ route('staffdashboard') }}" :active="request()->routeIs('staffdashboard')">
    <i class="fa fa-home" style="margin-right: 5px;"></i>{{ __('DASHBOARD') }}
</a>

<a class="top-nav-link" href="{{ route('staffdatabase') }}" :active="request()->routeIs('staffdatabase')">
    <i class="fa fa-list" style="margin-right: 5px;"></i>{{ __('STAFF WORK') }}
</a>

<a class="top-nav-link" href="{{ route('stafflogs') }}" :active="request()->routeIs('stafflogs')">
    <i class="fa fa-history" style="margin-right: 5px;"></i>{{ __('LOGS') }}
</a>
                 
                </div>
                 <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #2980b9;">
    <!-- Teams Dropdown -->
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="ml-3 relative">
            <x-dropdown align="right" width="60">
                <x-slot name="trigger">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-800 transition ease-in-out duration-150">
                        {{ Auth::user()->currentTeam->name }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="w-60">
                        <!-- Team Management -->
                        <div class="block px-4 py-2 text-sm text-gray-600">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-dropdown-link href="{{ route('teams.create') }}">
                                {{ __('Create New Team') }}
                            </x-dropdown-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-sm text-gray-600">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                            @endforeach
                        @endif
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    @endif

    <!-- Settings Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #2980b9;">
    <!-- Other navigation links -->
    
    <!-- Log Out button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="white-space: nowrap; background-color: #d70021; color: white; border: none; border-radius: 10px; padding: 6px 12px; font-size: 12px;">
            <i class="fa fa-sign-out"></i> {{ __('Log Out') }}
        </button>
    </form>
</div>
    </div>
</div>
            </div>
</body>
</nav>

</html>
