<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include external stylesheets, scripts, or other head elements here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
       * {
    font-family: 'Century Gothic', sans-serif;
}

.top-nav {
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
    .active {
    opacity: 0.6; /* Adjust the opacity value as needed */
}
    .top-nav-link {
        display: inline-block;
        padding: 10px;
        text-decoration: none;
        color:white;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;

    }

   .user-card {
    font-size: 14px;
    padding: 10px;
    height: 30px;
    width: auto;
    background-color: white;
    color: black;
    margin-right: 20px; /* Adjust the right margin to create distance */
}
    .top-nav-link:hover {
        border-color: #fff;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #FF7F50;
    border: 3px solid black;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Updated styles for the dropdown links */
.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Hover effect for dropdown links */
.dropdown-content a:hover {
    background-color: #45a049;
    border-radius: 5px;
}
    </style>
</head>

<body>

    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-50" style="background-color:#2980b9">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#2980b9">
            <div class="flex justify-between h-16" style="background-color:#2980b9">
            <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #2980b9;">
    <!-- Teams Dropdown -->
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="ml-3 relative">
        <x-dropdown align="right" width="60">
    <x-slot name="trigger">
        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-gray-300 transition ease-in-out duration-150">
            {{ Auth::user()->currentTeam->name }}
            <svg class="ml-2 -mr-0.5 h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
        <div class="w-60 bg-white border border-gray-300 rounded shadow-md">
            <!-- Team Management -->
            <div class="block px-4 py-2 text-sm text-gray-600 bg-gray-100">
                {{ __('Manage Team') }}
            </div>

            <!-- Team Settings -->
            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Team Settings') }}
            </x-dropdown-link>

            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-dropdown-link href="{{ route('teams.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ __('Create New Team') }}
                </x-dropdown-link>
            @endcan

            <!-- Team Switcher -->
            @if (Auth::user()->allTeams()->count() > 1)
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-sm text-gray-600 bg-gray-100">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                    <x-switchable-team :team="$team" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" />
                @endforeach
            @endif
        </div>
    </x-slot>
</x-dropdown>
        </div>
    @endif

    <!-- Settings Dropdown -->
    <div class="ml-3 relative">
        

                <!-- Top Navigation Links -->
                <div class="top-nav flex">
                <div class="user-card" style="font-size: 14px; padding: 10px; height: 30px; width: auto;">
                <span>{{ Auth::user()->name }}</span>
    <!-- Add any additional user information here -->
</div>
                <a class="top-nav-link @if(request()->routeIs('admindashboard')) active @endif" href="{{ route('admindashboard') }}" @if(request()->routeIs('admindashboard')) style="pointer-events: none;" @endif>
                <i class="fa fa-tachometer"></i>{{ __('DASHBOARD') }}
</a>
<a class="top-nav-link @if(request()->routeIs(['servicedata', 'add-service', 'service-store', 'add-service.getAppointmentInfo', 'add-service.getStaff'])) active @endif" href="{{ route('servicedata') }}" @if(request()->routeIs(['servicedata', 'add-service', 'service-store', 'add-service.getAppointmentInfo', 'add-service.getStaff'])) style="pointer-events: none;" @endif>
    <i class="fa fa-database"></i>{{ __('SERVICE DATA') }}
</a>

<a class="top-nav-link @if(request()->routeIs('servicelist')) active @endif" href="{{ route('servicelist') }}" @if(request()->routeIs('servicelist')) style="pointer-events: none;" @endif>
    <i class="fa fa-list-alt"></i>{{ __('SERVICE LIST') }}
</a>
<a class="top-nav-link @if(request()->routeIs('staff')) active @endif" href="{{ route('staff') }}" @if(request()->routeIs('staff')) style="pointer-events: none;" @endif>
    <i class="fa fa-users"></i>{{ __('STAFF LIST') }}
</a>
<a class="top-nav-link @if(request()->routeIs('customerrating')) active @endif" href="{{ route('customerrating') }}" @if(request()->routeIs('customerrating')) style="pointer-events: none;" @endif>
    <i class="fa fa-star"></i>{{ __('REVIEWS & RATINGS') }}
</a>
<a class="top-nav-link @if(request()->routeIs('customerlist')) active @endif" href="{{ route('customerlist') }}" @if(request()->routeIs('customerlist')) style="pointer-events: none;" @endif>
    <i class="fa fa-calendar"></i>{{ __('APPOINTMENTS') }}
</a>
<a class="top-nav-link @if(request()->routeIs('users')) active @endif" href="{{ route('users') }}" @if(request()->routeIs('users')) style="pointer-events: none;" @endif>
    <i class="fa fa-user"></i>{{ __('LIST OF USERS') }}
</a>
<a class="top-nav-link @if(request()->routeIs('reportmenu')) active @endif" href="{{ route('reportmenu') }}" @if(request()->routeIs('reportmenu')) style="pointer-events: none;" @endif>
<i class="fa fa-bar-chart"></i>{{ __('REPORTS') }}
</a>
<a class="top-nav-link @if(request()->routeIs('servicelogs')) active @endif" href="{{ route('servicelogs') }}" @if(request()->routeIs('servicelogs')) style="pointer-events: none;" @endif>
    <i class="fa fa-history"></i>{{ __('LOGS') }}
</a>
                </div>
            </div>
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
</body>
</nav>

