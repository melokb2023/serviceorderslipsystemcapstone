<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Your CSS styles -->
    <style>
        /* Your CSS styles */
        * {
            font-family: "Poppins", sans-serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #2980b9;
            height: 100vh;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 620px; /* Increased max-width */
            width: 95%; /* Adjusted width */
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
            padding: 30px; /* Adjusted padding */
        }

        .center h1 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 20px; /* Adjusted padding */
            box-sizing: border-box;
        }

        .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input, .txt_field select {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: 0.5s;
        }

        .txt_field span::before {
            content: "";
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: 0.5s;
        }

        .txt_field input:focus ~ label, .txt_field select:focus ~ label, .txt_field input:valid ~ label, .txt_field select:valid ~ label {
            top: -5px;
            color: #2691d9;
        }

        .txt_field input:focus ~ span::before, .txt_field select:focus ~ span::before, .txt_field input:valid ~ span::before, .txt_field select:valid ~ span::before {
            width: 100%;
        }

        .pass {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .pass:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            transition: 0.5s;
            border: none;
        }

        input[type="submit"]:hover {
            border-color: #2691d9;
        }

        .signup_link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .signup_link a {
            color: #2691d9;
            text-decoration: none;
        }

        .signup_link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <x-guest-layout>
        <x-slot name="logo">
            <!-- You can add a logo here if needed -->
        </x-slot>

        <div class="center">
            <h1>Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Your form fields -->
                <div class="txt_field">
                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                    <span></span>
                    <label>Name</label>
                </div>
                @php
                    $isAdminExists = \App\Models\User::where('usertype', 'admin')->exists();
                @endphp
                <!-- Add the usertype field dynamically -->
                <div class="txt_field">
                    <select id="usertype" name="usertype" required>
                        <option value="staff" {{ old('usertype') === 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="customer" {{ old('usertype') === 'customer' ? 'selected' : '' }}>Customer</option>
                        @if (!$isAdminExists)
                            <option value="admin" {{ old('usertype') === 'admin' ? 'selected' : '' }}>Admin</option>
                        @endif
                    </select>
                    <span></span>
                    <label>User Type</label>
                </div>
                <div class="txt_field">
                    <x-input id="email" type="email" name="email" :value="old('email')" required />
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <x-input id="phone" type="tel" name="phone" :value="old('phone')" required />
                    <span></span>
                    <label>Phone</label>
                </div>
                <div class="txt_field">
                    <x-input id="address" type="text" name="address" :value="old('address')" required />
                    <span></span>
                    <label>Address</label>
                </div>
                <div class="txt_field">
                    <x-input id="password" type="password" name="password" required autocomplete="new-password" />
                    <span></span>
                    <label>Password</label>
                    <i id="password-eye" class="fa fa-eye pass-toggle" onclick="togglePassword('password', 'password-eye')"></i>
                </div>
                <div class="txt_field">
                    <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <span></span>
                    <label>Confirm Password</label>
                    <i id="confirm-password-eye" class="fa fa-eye pass-toggle" onclick="togglePassword('password_confirmation', 'confirm-password-eye')"></i>
                </div>
                <input type="submit" value="Register" class="custom-login-button">
            </form>
            <div class="signup_link">
                <span>Already have an account? </span>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </x-guest-layout>
</body>
</html>
