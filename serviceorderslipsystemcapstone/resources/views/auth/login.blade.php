<x-guest-layout>

    <x-slot name="logo">
        <!-- You can add a logo here if needed -->
    </x-slot>

    <style>
        /* Your existing styles */
        * {
            font-family: "Century Gothic";
            align-items: center;
            font-weight: bold;
        }

        x-button {
            align-items: center;
        }

        x-authentication-card {
            align-items: center;
            padding-top: 100px;
            padding-bottom: 20px;
            padding-left: 100px;
            padding-right: 40px;
        }

        .custom-login-button {
            /* Your existing button styles */
            margin-top: 1.5rem;
            padding: 0.5rem 1rem;
            border: none;
            display: flex;
            border-radius: 0.25rem;
            color: white;
            font-weight: bold;
            cursor: pointer;
            outline: none;
            transition: all 0.3s ease-in-out;
            background-color: blue;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            justify-content: center;
            font-family: "Century Gothic";
        }

        .custom-login-button:hover {
            /* Your existing button hover styles */
            background: black;
        }

        * {
            text-align: center;
            align-items: center;
        }

        table, tr {
            padding-top: 200px;
            padding-bottom: 20px;
            padding-left: 100px;
            padding-right: 40px;
            background-color: #cbd6e4;
        }

        /* Center the table */
        table {
            margin: 0 auto;
        }

        /* Increase the padding */
        table, tr {
            padding: 50px; /* Adjust the value as needed */
        }

        /* Custom class for Century Gothic placeholder */
        .century-gothic-placeholder::placeholder {
            font-family: "Century Gothic";
            font-weight: bold;
        }

        body {
            background-color: #d70021; /* Set the background color */
        }
    </style>

<body>
    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <table>
        <tr>
            <td>
                <!-- Your provided HTML code -->
                <section class="vh-100">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                    class="img-fluid" alt="Sample image">
                            </div>
            </td>
            <td>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form method="POST" action="{{ route('login') }}" class="mt-8">
                                    @csrf
                                    <!-- Your login form content -->
                                    <div>
                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                                    </div>

                                    <div class="mt-4">
                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                                    </div>

                                    <button class="custom-login-button">
                                        {{ __('LOG IN') }}
                                    </button>
                                </form>
                            </div>
            </td>
        </tr>

        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright and social media links -->
            <!-- ... Your social media links ... -->
        </div>
    </table>
    </div>
    </body>
</x-guest-layout>
