<x-guest-layout>
    <x-authentication-card style="background-color:red;">
        <x-slot name="logo">
            <!-- You can add a logo here if needed -->
        </x-slot>

        <style>
            .custom-login-button {
                margin-top: 1.5rem;
                padding: 0.5rem 1rem;
                border: none;
                display: flex;
                flex-direction: column;
                border-radius: 0.25rem;
                color: white;
                font-weight: bold;
                cursor: pointer;
                outline: none;
                transition: all 0.3s ease-in-out;
                background: linear-gradient(to right, #3498db, #8e44ad);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
                align-items: center;
                justify-content: center;
            }

            .custom-login-button:hover {
                background: linear-gradient(to right, #2980b9, #9b59b6);
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
            <div>
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

            <x-button class="custom-login-button">
                {{ __('Log in') }}
            </x-button>
        </form>
    </x-authentication-card>
</x-guest-layout>
