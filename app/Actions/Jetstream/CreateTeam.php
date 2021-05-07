<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given customer$customer.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return mixed
     */
    public function create($customer, array $input)
    {
        Gate::forUser($customer)->authorize('create', Jetstream::newTeamModel());

        Validator::make($input, [
            'nama_customer' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createTeam');

        AddingTeam::dispatch($customer);

        $customer->switchTeam($team = $customer->ownedTeams()->create([
            'nama_customer' => $input['nama_customer'],
            'personal_team' => false,
        ]));

        return $team;
    }
}
