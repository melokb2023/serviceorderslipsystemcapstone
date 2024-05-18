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
    background-color: #2980b9;
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

.hamburger {
    display: none;
    cursor: pointer;
}

.hamburger-dropdown {
    display: none;
    position: absolute;
    top: 60px; /* Adjust this value as per your design */
    right: 20px;
    background-color: #2980b9;
    padding: 10px;
    border-radius: 5px;
    z-index: 999;
}

.hamburger-dropdown a {
    display: block;
    color: white;
    text-decoration: none;
    margin-bottom: 5px;
}

@media screen and (max-width: 768px) {
    .top-nav {
        display: none;
    }

    .hamburger {
        display: block;
        position: absolute;
        top: 18px; /* Adjust this value to vertically center the icon */
        right: 20px;
        z-index: 1000;
    }

    .hamburger-dropdown {
        display: none;
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
    <nav class="bg-red-500 border-b border-gray-50" style="background-color:#2980b9">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 " style="background-color:#2980b9">
            <div class="flex justify-between h-16" style="background-color:#2980b9">
                <!-- Hamburger icon -->
                <div class="hamburger" onclick="toggleDropdown()">
                    <i class="fa fa-bars fa-2x" style="color: white;"></i>
                </div>
                <!-- Top Navigation Links -->
                <div class="top-nav">
                    <div class="user-card" style="font-size: 14px; padding: 10px; height: 30px; width: auto;">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    <a class="top-nav-link" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <i class="fa fa-tachometer"></i> {{ __('DASHBOARD') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('customerdashboard') }}" :active="request()->routeIs('customerdashboard')">
                        <i class="fa fa-calendar"></i> {{ __('MY APPOINTMENTS') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('add-appointment') }}" :active="request()->routeIs('add-appointment')">
                        <i class="fa fa-plus-circle"></i> {{ __('START APPOINTMENT') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('add-customerrating') }}" :active="request()->routeIs('add-customerrating')">
                        <i class="fa fa-star"></i> {{ __('RATE THE SERVICE') }}
                    </a>
                    <a class="top-nav-link" href="{{ route('customerlogs') }}" :active="request()->routeIs('customerlogs')">
                        <i class="fa fa-history"></i> {{ __('LOGS') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="white-space: nowrap; background-color: #d70021; color: white; border: none; border-radius: 10px; padding: 6px 12px; font-size: 12px;">
                            <i class="fa fa-sign-out"></i> {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
                <!-- Hamburger Dropdown Links -->
                <div class="hamburger-dropdown" id="hamburgerDropdown">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i> DASHBOARD</a>
                    <a href="{{ route('customerdashboard') }}"><i class="fa fa-calendar"></i> MY APPOINTMENTS</a>
                    <a href="{{ route('add-appointment') }}"><i class="fa fa-plus-circle"></i> START APPOINTMENT</a>
                    <a href="{{ route('add-customerrating') }}"><i class="fa fa-star"></i> RATE THE SERVICE</a>
                    <a href="{{ route('customerlogs') }}"><i class="fa fa-history"></i> LOGS</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="white-space: nowrap; background-color: #d70021; color: white; border: none; border-radius: 10px; padding: 6px 12px; font-size: 12px;">
                            <i class="fa fa-sign-out"></i> {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Your existing JavaScript code, if any -->
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("hamburgerDropdown");
            if (dropdown.style.display === "none" || dropdown.style.display === "") {
                dropdown.style.display = "block";
            } else {
                dropdown.style.display = "none";
            }
        }
        window.addEventListener("resize", function() {
            var hamburger = document.querySelector(".hamburger");
            var hamburgerDropdown = document.querySelector(".hamburger-dropdown");
            if (window.innerWidth > 768) {
                hamburger.style.display = "none";
                hamburgerDropdown.style.display = "none";
            } else {
                hamburger.style.display = "block";
            }
        });
    </script>

</body>

</html>
