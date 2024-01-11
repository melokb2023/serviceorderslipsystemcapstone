<x-guest-layout>
    <x-slot name="logo">
        <!-- You can add a logo here if needed -->
    </x-slot>

    <style>
        /* Your existing styles with added font-weight: bold; */
        * {
            font-family: "Century Gothic";
            font-weight: bold;
        }

        body {
            background-color: #d70021; /* Set the background color */
        }

        label {
            font-family: "Century Gothic";
            align-items: center;
            font-weight: bold;
            margin-bottom: 6px;
            display: inline-block;
            width: 150px; /* Set a fixed width for labels */
            color:black;
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
            background-color: green;
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

        table {
            margin: 0 auto; /* Center the table */
            padding-top: 100px;
            padding-bottom: 20px;
            padding-left: 100px;
            padding-right: 40px;
            background-color: #cbd6e4;
        }

        .form-group {
            display: flex;
            flex-direction: row;
            text-align: left;
            margin-bottom: 16px;
            align-items: center;
        }

        .form-group label {
            margin-right: 10px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            flex: 1; /* Use the remaining space */
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            font-size: 14px; /* Adjust font size */
        }

        /* Center the layout */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensure full height of the viewport */
        }

        /* Justify the button to the middle */
        .flex {
            display: flex;
            justify-content: center;
        }
    </style>

    <div class="center-container">
        <table>
            <tr>
                <td>
                    <!-- Your existing HTML code -->
                    <section class="vh-100">
                        <div class="container-fluid h-custom">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-md-9 col-lg-6 col-xl-5">
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                        class="img-fluid" alt="Sample image">
                                </div>
            </td>
            <td>
                <x-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>
            @php
    $isAdminExists = \App\Models\User::where('usertype', 'admin')->exists();
@endphp
            <!-- Add the usertype field dynamically -->
            <div class="form-group">
    <label for="usertype">User Type</label>
    <select id="usertype" name="usertype" class="block mt-1 w-full" required>
        <option value="staff" {{ old('usertype') === 'staff' ? 'selected' : '' }}>Staff</option>
        <option value="customer" {{ old('usertype') === 'customer' ? 'selected' : '' }}>Customer</option>
        <?php if (!$isAdminExists): ?>
            <option value="admin" {{ old('usertype') === 'admin' ? 'selected' : '' }}>Admin</option>
        <?php endif; ?>
    </select>
</div>
            <div class="form-group">
                <label for="email">Email</label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="email" />
            </div>

            <!-- Add other form fields as needed -->

            <div class="form-group">
                <label for="password">Password</label>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="custom-login-button ">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </td>
</tr>
</table>
</div>
</x-guest-layout>