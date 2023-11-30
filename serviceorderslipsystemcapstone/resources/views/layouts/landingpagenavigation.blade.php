<!DOCTYPE html>
<html lang="en">
<div class="top-nav">
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

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .top-nav {
            overflow-x: auto;
            /* Enable horizontal scrolling */
            /* Prevent line breaks */
            border: 2px solid rgba(215, 0, 33, 0.5);
            /* Red-orange border with some transparency */
            border-radius: 5px; /* Rounded corners */
            font-weight: bold;
            color: black;
            background-color: rgba(255, 255, 255, 0.9); /* White background with some transparency */
            flex: 1; /* Take remaining space */
        }

        .top-nav-link {
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            color: black;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .top-nav-link:hover {
            border-color: #fff;
            background-color: rgba(215, 0, 33, 0.9); /* Darker red-orange on hover */
            border-radius: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
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

        /* Footer styles */
        footer {
            background-color: white;
            padding: 20px;
            text-align: center;
            border-top: 2px solid rgba(215, 0, 33, 0.5); /* Red-orange border with some transparency */
        }
    </style>
</head>

<body>

    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }" style="color:black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
            <div class="flex justify-end h-16">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Top Navigation Links -->
                   
                        <a class="top-nav-link" href="{{ route('landingpagehome') }}" :active="request()->routeIs('landingpagehome')">
                            <i class="fa fa-database"></i>{{ __('HOME') }}
                        </a>
                        <a class="top-nav-link" href="{{ route('landingpageaboutus') }}" :active="request()->routeIs('landingpageaboutus')">
                            <i class="fa fa-list"></i> {{ __('ABOUT US') }}
                        </a>
                        <a class="top-nav-link" href="{{ route('landingpagecontactus') }}" :active="request()->routeIs('landingpagecontactus')">
                            <i class="fa fa-cogs"></i> {{ __('CONTACT US') }}
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
            </div>
        </div>
    </nav>

  

</body>

</html>
