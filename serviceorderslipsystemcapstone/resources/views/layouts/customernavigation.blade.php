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
    font-family: 'Montserrat', sans-serif;
}

.top-nav {
    background-color: #FF4433;
    border: 3px solid black;
    font-weight: bold;
    overflow: hidden;
    display: flex;
    justify-content: space-around;
    align-items: center;
    transition: all 0.3s ease;
    padding: 20px; /* Adjust the padding to increase the size of the navigation bar */
    height: auto; /* Set the height to auto to allow it to expand based on content */
    width: 100%; /* Set the width to 100% to extend the length of the navigation bar */
    font-family:"Century Gothic";

}
.top-nav-link {
    text-decoration: none;
    color: white;
    padding: 5px 5px;
    border-bottom: 3px solid transparent;
    transition: all 0.3s ease;
    white-space: nowrap;
    font-family:"Century Gothic";
}

.top-nav-link:hover {
    border-color: #fff;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}
    </style>
</head>

<body>

    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-50" style="background-color:#FF4433">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#FF4433">
            <div class="flex justify-between h-16" style="background-color:#FF4433">
            <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #FF4433;">
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
                    <a class="top-nav-link" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <i class="fa fa-home"></i> {{ __('DASHBOARD') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('add-appointment') }}" :active="request()->routeIs('add-appointment')">
                        <i class="fa fa-home"></i> {{ __('START APPOINTMENT') }}
                    </a>
                   <a class="top-nav-link" href="{{ route('add-customerrating') }}" :active="request()->routeIs('add-customerrating')">
                        <i class="fa fa-list"></i> {{ __('RATE THE SERVICE') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('customerlogs') }}" :active="request()->routeIs('customerlogs')">
                        <i class="fa fa-database"></i>{{ __('LOGS') }}
                    </a>                
                </div>
            </div>
</body>
</nav>

