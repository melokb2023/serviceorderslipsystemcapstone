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
    <nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-50" style="background-color:#FF4433">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#FF4433">
            <div class="flex justify-between h-16" style="background-color:#FF4433">
            <div class="hidden sm:flex sm:items-center sm:ml-6" style="background-color: #FF4433;">
                <!-- Top Navigation Links -->
                <div class="top-nav">
                   <a class="top-nav-link" href="{{ route('servicedata') }}" :active="request()->routeIs('servicedata')">
                        <i class="fa fa-database"></i>{{ __('HOME') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('servicelist') }}" :active="request()->routeIs('servicelist')">
                        <i class="fa fa-list"></i> {{ __('ABOUT US') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('serviceprogressmenu') }}" :active="request()->routeIs('serviceprogressmenu')">
                        <i class="fa fa-cogs"></i>  {{ __('CONTACT US') }}
                    </a>
                    @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">DASHBOARD</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">LOG IN</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link2">REGISTER</a>
                    @endif
                @endauth
                </div>
            </div>
</body>
</nav>

