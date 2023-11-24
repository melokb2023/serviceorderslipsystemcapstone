<x-guest-layout style="background-color:#E51818;">

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head style="background-color:#E51818;">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Service Order Slip System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            .button1 {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.button2{
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #E51818;
            }

            .links {
                margin-top: 20px;
                display: flex;
                gap: 20px;
            }

            .nav-link {
                text-decoration: none;
                color: #fff;
                font-weight: bold;
                font-size: 18px;
                background-color: blue;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .nav-link2 {
                text-decoration: none;
                color: #fff;
                font-weight: bold;
                font-size: 18px;
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }


            .content {
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #E51818;
            }

            .logo {
                margin-bottom: 20px;
            }

            .link-box {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
                background-color: #E51818;
                color: black;
                border-radius: 8px;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .link-box:hover {
                background-color: #e0e0e0;
            }

            .h-16 {
                height: 4rem;
            }

        </style>
    </head>

    <body>

            <div class="content">
                
                        <h2 style = "font-weight:bold;font-size:35px;color:white">CompuSource Computer Center</h2>
                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link2">Register</a>
                    @endif
                @endauth
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-guest-layout>
