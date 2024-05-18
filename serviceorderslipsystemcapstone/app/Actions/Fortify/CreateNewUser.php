<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\MyMail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'usertype' => ['required', 'string'],
        ])->validate();

        // Store the plain text password before hashing
        $plainPassword = $input['password'];

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'usertype' => $input['usertype'],
            'password' => Hash::make($plainPassword),
        ]);

        // Send registration email
        $details = [
            'title' => 'Registration Successful',
            'body' => "Dear {$input['name']},\n\nWe are pleased to inform you that your registration is now complete.  Below are your account details:\n\nUsername: {$input['name']}\nPassword: {$plainPassword}\n\nPlease keep this information secure.\n\nThank you for registering with us.\n\nBest regards,\nThe CodersVibe Team",
        ];

        Mail::to($user->email)->send(new MyMail($details));

        Session::flash('success_message', 'Registration successful. You can now log in.');

        // Redirect to the login page
        redirect()->route('login')->send();

        return $user;
    }
}

   
