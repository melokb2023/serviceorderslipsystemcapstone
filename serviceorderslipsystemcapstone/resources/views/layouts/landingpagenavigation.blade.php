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

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .top-nav {
            background: #fae8d2;
            box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.4);
            border: 2px solid rgba(215, 0, 33, 0.5);
            border-radius: 5px;
            font-weight: bold;
            color: #454545;
            overflow-x: auto;
            border-radius: 5px;
            font-weight: bold;
            color: #454545;
            background-color: #fae8d2;
            box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.4);
            flex: 1;
        }

        .top-nav-link {
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            color: #454545;
            transition: all 0.3s ease;
        }
        .top-nav-link-login {
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            background-color: blue;
            transition: all 0.3s ease;
            border: none;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 15px 32px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            font-weight:bold;
        }
        .top-nav-link-register {
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            background-color: green;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 15px 32px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            font-weight:bold;
        }

        .top-nav-link:hover {
            border-radius: 6px;
            background: linear-gradient(145deg, #ffe7ca, #f5d7b2);
            box-shadow: 4px 4px 8px #ddc1a0, -4px -4px 8px #f7e5cc;
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
            border-top: 2px solid rgba(215, 0, 33, 0.5);
        }
    </style>
</head>

<body>

    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }" class="top-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                    <a href="{{ url('/dashboard') }}" class="top-nav-link">DASHBOARD</a>
                    @else
                    <a href="{{ route('login') }}" class="top-nav-link-login">LOG IN</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="top-nav-link-register">REGISTER</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</body>
</html>