<?php

namespace TomatoPHP\FilamentAccounts\Services;


class Helpers
{
    public static function loadAccountModelClass()
    {
        $class = config('filament-accounts.model') ??  \TomatoPHP\FilamentAccounts\Models\Account::class;
        return $class;
    }

    public static function loadTeamModelClass()
    {
        $class = config('filament-accounts.teams.model')  ?? \TomatoPHP\FilamentAccounts\Models\Team::class;
        return $class;
    }

    public static function loadTeamInvitationModelClass()
    {
        $class = config('filament-accounts.teams.invitation') ?? \TomatoPHP\FilamentAccounts\Models\TeamInvitation::class;
        return $class;
    }

    public static function loadTeamMembershipModelClass()
    {
        $class = config('filament-accounts.teams.membership') ?? \TomatoPHP\FilamentAccounts\Models\Membership::class;
        return $class;
    }

    public static function loadAccountResourceClass()
    {
        $class = config('filament-accounts.resource') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource::class;
        return $class;
    }

    public static function loadTeamResourceClass()
    {
        $class = config('filament-accounts.teams.resource') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\TeamResource::class;
        return $class;
    }

    public static function loadAccountRelationsResourceClass()
    {
        $class = config('filament-accounts.relations') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Relations\AccountRelations::class;
        return $class;
    }

    public static function loadAccountFormResourceClass()
    {
        $class = config('filament-accounts.accounts.form') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Forms\AccountsForm::class;
        return $class;
    }

    public static function loadAccountTableResourceClass()
    {
        $class = config('filament-accounts.accounts.table') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Tables\AccountsTable::class;
        return $class;
    }


    public static function loadAccountTableActionsResourceClass()
    {
        $class = config('filament-accounts.accounts.actions') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Actions\AccountsTableActions::class;
        return $class;
    }

    public static function loadAccountFiltersResourceClass()
    {
        $class = config('filament-accounts.accounts.filters') ??    \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Filters\AccountsFilters::class;
        return $class;
    }

    public static function loadAccountPagesResourceClass()
    {
        $class = config('filament-accounts.accounts.pages') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Pages\AccountPagesList::class;
        return $class;
    }

    public static function loadAccountRequestResourceClass()
    {
        $class = config('filament-accounts.requests.resource') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\AccountRequestResource::class;
        return $class;
    }

    public static function loadAccountRequestModelClass()
    {
        $class = config('filament-accounts.requests.model') ?? \TomatoPHP\FilamentAccounts\Models\AccountRequest::class;
        return $class;
    }


    public static function loadContactResourceClass()
    {
        $class = config('filament-accounts.contact.resource') ?? \TomatoPHP\FilamentAccounts\Filament\Resources\ContactResource::class;
        return $class;
    }

    public static function loadContactModelClass()
    {
        $class = config('filament-accounts.contact.model') ?? \TomatoPHP\FilamentAccounts\Models\Contact::class;
        return $class;
    }

    public static function loadAccountTypePageClass()
    {
        $class = config('filament-accounts.accounts.types') ??  \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Pages\AccountTypes::class;
        return $class;
    }


    public static function loadAccountRequestTypePageClass()
    {
        $class = config('filament-accounts.requests.types') ??  \TomatoPHP\FilamentAccounts\Filament\Resources\AccountRequestResource\Pages\RequestsTypes::class;
        return $class;
    }

    public static function loadAccountRequestStatusPageClass()
    {
        $class = config('filament-accounts.requests.status') ??  \TomatoPHP\FilamentAccounts\Filament\Resources\AccountRequestResource\Pages\RequestsStatus::class;
        return $class;
    }


    public static function loadContactStatusPageClass()
    {
        $class = config('filament-accounts.contact.status') ??  \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Pages\AccountTypes::class;
        return $class;
    }

    public static function loadAccountMetaModelClass()
    {
        $class = config('filament-accounts.meta.model') ??  \TomatoPHP\FilamentAccounts\Models\AccountsMeta::class;
        return $class;
    }

    public static function loadContactMetaModelClass()
    {
        $class = config('filament-accounts.meta.contact') ??  \TomatoPHP\FilamentAccounts\Models\ContactsMeta::class;
        return $class;
    }
}
