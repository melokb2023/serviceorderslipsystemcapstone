<x-guest-layout>
    <x-authentication-card style="background-color:red;">
        <x-slot name="logo">
            <!-- You can add a logo here if needed -->
        </x-slot>

        <style>
            *{
                font-style: "Century Gothic";
                align-items:center;
            }
            x-button{
                align-items:center;
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
                font-style: "Century Gothic";
            }

            .custom-login-button:hover {
                background: black;
            }
            *{
                text-align:center;
                align-items:center;
            }
        </style>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-8">
            @csrf
            <div style ="font-weight:bold">
                COMPUSOURCE COMPUTER CENTER
            </div>

            <div>
                <x-label style="color:black" for="email" value="{{ __('Email') }}" class="text-white" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label style="color:black" for="password" value="{{ __('Password') }}" class="text-white" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <button class="custom-login-button">
                {{ __('LOG IN') }}
            </button>
        </form>
    </x-authentication-card>
</x-guest-layout>
