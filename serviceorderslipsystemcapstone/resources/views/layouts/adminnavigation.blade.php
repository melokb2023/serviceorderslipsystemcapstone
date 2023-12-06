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
        overflow-x: auto; /* Enable horizontal scrolling */
      /* Prevent line breaks */
        border: 2px solid black;
        font-weight:bold;
    }

    .top-nav-link {
        display: inline-block;
        padding: 10px;
        text-decoration: none;
        color:white;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;

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
    <nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-50" style="background-color:#d70021">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#d70021">
            <div class="flex justify-between h-16" style="background-color:#d70021">
            <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #d70021;">
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
    <div class="ml-3 relative">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-800 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                @endif
            </x-slot>

            <x-slot name="content" style="border: 3px solid black; background-color: #FF7F50;">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-sm text-white">
                    {{ __('Manage Account') }}
                </div>

                <x-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-dropdown-link>
                @endif

                <div class="border-t border-gray-200"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</div>

                <!-- Top Navigation Links -->
                <div class="top-nav">
                   <a class="top-nav-link" href="{{ route('admindashboard') }}" :active="request()->routeIs('admindashboard')">
                        <i class="fa fa-database"></i>{{ __('DASHBOARD') }}
                    </a>
                   <a class="top-nav-link" href="{{ route('servicedata') }}" :active="request()->routeIs('servicedata')">
                        <i class="fa fa-database"></i>{{ __('SERVICE DATA') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('servicelist') }}" :active="request()->routeIs('servicelist')">
                        <i class="fa fa-list"></i> {{ __('SERVICE LIST') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('staff') }}" :active="request()->routeIs('staff')">
                        <i class="fa fa-star"></i> {{ __('STAFF LIST') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('customerrating') }}" :active="request()->routeIs('customerrating')">
                        <i class="fa fa-star"></i> {{ __('REVIEWS & RATINGS') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('customerlist') }}" :active="request()->routeIs('customerlist')">
                        <i class="fa fa-play"></i> {{ __('CUSTOMER LIST') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('reportmenu') }}" :active="request()->routeIs('reportmenu')">
                        <i class="fa fa-bar-chart"></i> {{ __('REPORTS') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('servicelogs') }}" :active="request()->routeIs('servicelogs')">
                        <i class="fa fa-bar-chart"></i> {{ __('LOGS') }}
                    </a>
                </div>
            </div>
</body>
</nav>

