<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesCustomerProfileInformation;

class UpdateCustomerProfileInformation implements UpdatesCustomerProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($customer, array $input)
    {
        Validator::make($input, [
            'nama_customer' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('customer')->ignore($customer->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $customer->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $customer->email &&
            $customer instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($customer, $input);
        } else {
            $customer->forceFill([
                'nama_customer' => $input['nama_customer'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($customer, array $input)
    {
        $customer->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $customer->sendEmailVerificationNotification();
    }
}
