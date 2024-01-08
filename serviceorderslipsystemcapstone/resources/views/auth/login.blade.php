<x-guest-layout>
    <x-slot name="logo">
        <!-- You can add a logo here if needed -->
    </x-slot>

    <style>
        /* Your updated styles with red error message and curved rectangular shape */
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
            background: black;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        table {
            background-color: #cbd6e4;
        }

        /* Custom class for Century Gothic placeholder */
        .century-gothic-placeholder::placeholder {
            font-family: "Century Gothic";
            font-weight: bold;
        }

        /* Red error message with curved rectangular shape */
        .error-message {
            background-color: #ff9999; /* Light red background */
            color: #cc0000; /* Dark red text color */
            padding: 1rem;
            border-radius: 0.5rem; /* Rounded corners */
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <body>
        @error('email')
            <div class="error-message">
                @if($message == 'These credentials do not match our records.')
                    Your username or password is incorrect.
                @else
                    {{ $message }}
                @endif
            </div>
        @enderror

        <table>
            <tr>
                <td>
                    <section class="vh-100">
                        <div class="container-fluid h-custom">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-md-9 col-lg-6 col-xl-5">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                        class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </section>
                </td>
                <td>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('login') }}" class="mt-8">
                            @csrf
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
        </table>

        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright and social media links -->
            <!-- ... Your social media links ... -->
        </div>
    </body>
</x-guest-layout>
