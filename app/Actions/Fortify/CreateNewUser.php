<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ], [
            'firstname.required' => 'Your first name is required.',
            'firstname.string' => 'Your first name doesn\'t look right.',
            'firstname.max' => 'Your name isn\'t that long.. try again',
            'lastname.required' => 'Your last name is required.',
            'lastname.string' => 'Your last name doesn\'t look right.',
            'lastname.max' => 'Your name isn\'t that long.. try again',
            'email.required' => 'Your email address is required.',
            'email.string' => 'Your email address is invalid.',
            'email.email' => 'Your email address is invalid.',
            'email.max' => 'Your email address is too long. It must be less than 255 characters.',
            'email.unique' => 'That email is already registered. Try another email address or <a href="./login" class="font-bold">sign in</a> instead.',
        ])->validate();

        return User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
