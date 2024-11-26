<?php

namespace TomatoPHP\FilamentAccounts\Actions\Jetstream;

use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Contracts\DeletesTeams;

class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     */
    public function delete(Model $team): void
    {
        $team->purge();
    }
}
