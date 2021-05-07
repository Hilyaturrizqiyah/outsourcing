<?php

namespace App\Actions\Fortify;

use App\CustomerModel;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewCustomers;
use Laravel\Jetstream\Jetstream;

class CreateNewCustomer implements CreatesNewCustomers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nama_customer' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customer'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(CustomerModel::create([
                'nama_customer' => $input['nama_customer'],
                'email' => $input['email'],
                'alamat' => $input['alamat'],
                'no_telp' => $input['no_telp'],
                'password' => Hash::make($input['password']),
            ]), function (CustomerModel $customer) {
                $this->createTeam($customer);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(CustomerModel $customer)
    {
        $customer->ownedTeams()->save(Team::forceCreate([
            'id_customer' => $customer->id_customer,
            'nama_customer' => explode(' ', $customer->nama_customer, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
