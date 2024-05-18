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
            color: white;
            padding: 20px;
            height: auto;
            width: 100%;
        }

        .active {
            opacity: 0.6;
        }

        .top-nav-link {
            display: inline-block;
            padding: 10px;
            text-decoration: none;
            color: white;
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
            margin-right: 20px;
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

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #45a049;
            border-radius: 5px;
        }

        /* Hamburger icon */
        .hamburger {
            display: none;
            position: absolute;
            top: 18px;
            right: 20px;
            z-index: 1000;
        }

        .hamburger-dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 20px;
            background-color: #2980b9;
            border: 1px solid white;
            border-radius: 5px;
            padding: 10px;
        }

        @media screen and (max-width: 768px) {
            .top-nav {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .hamburger-dropdown {
                display: block;
            }
        }

        @media screen and (min-width: 769px) {
            .hamburger-dropdown {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }" class="bg-red-500 border-b border-gray-50" style="background-color:#2980b9">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#2980b9">
            <div class="flex justify-between h-16" style="background-color:#2980b9">
                <!-- Hamburger icon -->
                <div class="hamburger" onclick="toggleDropdown()">
                    <i class="fa fa-bars fa-2x" style="color: white;"></i>
                </div>
                <!-- Hamburger Dropdown Menus -->
                <div class="hamburger-dropdown" id="hamburgerDropdown">
                <a href="{{ route('admindashboard') }}" class="top-nav-link"><i class="fa fa-tachometer"></i> DASHBOARD</a>
    <a href="{{ route('servicedata') }}" class="top-nav-link"><i class="fa fa-database"></i> SERVICE DATA</a>
    <a href="{{ route('servicelist') }}" class="top-nav-link"><i class="fa fa-list-alt"></i> SERVICE LIST</a>
    <a href="{{ route('staff') }}" class="top-nav-link"><i class="fa fa-users"></i> STAFF LIST</a>
    <a href="{{ route('customerrating') }}" class="top-nav-link"><i class="fa fa-star"></i> REVIEWS & RATINGS</a>
    <a href="{{ route('customerlist') }}" class="top-nav-link"><i class="fa fa-calendar"></i> APPOINTMENTS</a>
    <a href="{{ route('users') }}" class="top-nav-link"><i class="fa fa-user"></i> LIST OF USERS</a>
    <a href="{{ route('reportmenu') }}" class="top-nav-link"><i class="fa fa-bar-chart"></i> REPORTS</a>
    <a href="{{ route('servicelogs') }}" class="top-nav-link"><i class="fa fa-history"></i> LOGS</a>
    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="white-space: nowrap; background-color: #d70021; color: white; border: none; border-radius: 10px; padding: 6px 12px; font-size: 12px;">
                            <i class="fa fa-sign-out"></i> Log Out
                        </button>
                    </form>
                </div>
                <!-- Top Navigation Links -->
                <div class="top-nav" id="topNav">
                    <!-- User Card -->
                    <div class="user-card">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    <!-- Navigation Links -->
                    <a class="top-nav-link @if(request()->routeIs('admindashboard')) active @endif" href="{{ route('admindashboard') }}">
                        <i class="fa fa-tachometer"></i> DASHBOARD
                    </a>
                    <a class="top-nav-link @if(request()->routeIs(['servicedata', 'add-service', 'service-store', 'add-service.getAppointmentInfo', 'add-service.getStaff'])) active @endif" href="{{ route('servicedata') }}">
                        <i class="fa fa-database"></i> SERVICE DATA
                    </a>
                    <a class="top-nav-link @if(request()->routeIs('servicelist')) active @endif" href="{{ route('servicelist') }}">
                        <i class="fa fa-list-alt"></i> SERVICE LIST
                    </a>
                    <!-- Add more navigation links as needed -->
                    <a class="top-nav-link @if(request()->routeIs('staff')) active @endif" href="{{ route('staff') }}">
                        <i class="fa fa-users"></i> STAFF LIST
                    </a>
                    <a class="top-nav-link @if(request()->routeIs('customerrating')) active @endif" href="{{ route('customerrating') }}">
                        <i class="fa fa-star"></i> REVIEWS & RATINGS
                    </a>
                    <a class="top-nav-link @if(request()->routeIs('customerlist')) active @endif" href="{{ route('customerlist') }}">
                        <i class="fa fa-calendar"></i> APPOINTMENTS
                    </a>
                    <a class="top-nav-link @if(request()->routeIs('users')) active @endif" href="{{ route('users') }}">
                        <i class="fa fa-user"></i> LIST OF USERS
                    </a>
                    <a class="top-nav-link @if(request()->routeIs('reportmenu')) active @endif" href="{{ route('reportmenu') }}">
                        <i class="fa fa-bar-chart"></i> REPORTS
                    </a>
                    <a class="top-nav-link @if(request()->routeIs('servicelogs')) active @endif" href="{{ route('servicelogs') }}">
                        <i class="fa fa-history"></i> LOGS
                    </a>
                    <!-- Log Out button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="white-space: nowrap; background-color: #d70021; color: white; border: none; border-radius: 10px; padding: 6px 12px; font-size: 12px;">
                            <i class="fa fa-sign-out"></i> Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("hamburgerDropdown");
            dropdown.style.display === "none" ? dropdown.style.display = "block" : dropdown.style.display = "none";
        }
    </script>

</body>

</html>
