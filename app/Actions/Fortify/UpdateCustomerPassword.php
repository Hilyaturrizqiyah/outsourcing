<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesCustomerPasswords;

class UpdateCustomerPassword implements UpdatesCustomerPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($customer, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($customer, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $customer->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $customer->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
