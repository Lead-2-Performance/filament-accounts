<?php

namespace TomatoPHP\FilamentAccounts\Actions\Fortify;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use TomatoPHP\FilamentAccounts\Services\Helpers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $account = Helpers::loadAccountModelClass();

        return DB::transaction(function () use ($input, $account) {
            return tap($account::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'loginBy' => 'email',
                'type' => 'account',
                'password' => Hash::make($input['password']),
            ]), function (Model $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(Model $user): void
    {
        $team = Helpers::loadTeamModelClass();
        $user->ownedTeams()->save($team::forceCreate([
            'account_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
