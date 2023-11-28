<x-guest-layout>
    <x-slot name="logo">
            <!-- You can add a logo here if needed -->
        </x-slot>

        <style>
            /* Your existing styles */
            label {
                font-style: "Century Gothic";
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
                font-style: "Century Gothic";
            }

            .custom-login-button:hover {
                /* Your existing button hover styles */
                background: black;
            }

            * {
                text-align: center;
                align-items: center;
            }

            table {
                margin: 0 auto; /* Center the table */
                padding-top: 100px;
                padding-bottom: 20px;
                padding-left: 100px;
                padding-right: 40px;
            }
        </style>
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
      <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" >
            @csrf

            <div >
                <label for="name" >Name </label>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div >

            <div  class="mt-4">
                <label for="email"> Email </label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div  class="mt-4">
                <label for="phone" > Phone Number </label>
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="username" />
            </div>

            <div  class="mt-4">
                <label for="address" > Address </label>
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="username" />
            </div>

            <div  class="mt-4">
                <label for="password" >Password </label>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div  class="mt-4">
                <label for="password_confirmation"> Confirm Password </label>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="custom-login-button ">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </td>
                                
</x-guest-layout>
