<?php

namespace TomatoPHP\FilamentAccounts\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Pages\Tenancy\EditTenantProfile;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasCancelTeamInvitation;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasDeleteTeam;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasEditTeam;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasLeavingTeam;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasManageRoles;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasManageTeamMembers;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasNotifications;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditTeam\HasTeamInvitation;


class EditTeam extends EditTenantProfile
{
    use HasEditTeam;
    use HasDeleteTeam;
    use HasManageRoles;
    use HasManageTeamMembers;
    use HasTeamInvitation;
    use HasCancelTeamInvitation;
    use HasLeavingTeam;
    use HasNotifications;

    protected static string $view = 'filament-accounts::teams.edit-team';

    /**
     * @return bool
     */
    public static function isShouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getLabel(): string
    {
        return trans('filament-accounts::messages.teams.title');
    }

    public ?array $deleteTeamData = [];
    public ?array $editTeamData = [];
    public ?array $manageTeamMembersData = [];

    public function mount(): void
    {
        $this->fillForms();
    }

    protected function getForms(): array
    {
        return [
            'editTeamForm',
            'deleteTeamFrom',
            'manageTeamMembersForm',
        ];
    }

    protected function fillForms(): void
    {
        $data = Filament::getTenant();

        $this->editTeamForm->fill($data->toArray());
        $this->deleteTeamFrom->fill($data->toArray());
        $this->manageTeamMembersForm->fill($data->toArray());
    }

    protected function getViewData(): array
    {
        return [
            'team' => Filament::getTenant(),
        ];
    }
}
