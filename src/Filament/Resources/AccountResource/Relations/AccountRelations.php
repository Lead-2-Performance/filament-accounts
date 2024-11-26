<?php

namespace TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Relations;

use TomatoPHP\FilamentAccounts\Facades\FilamentAccounts;

class AccountRelations
{
    public static function get(): array
    {
        $loadRelations = FilamentAccounts::loadRelations();

        $relations = [];

        if (config('filament-accounts.features.meta')) {
            $relations[] = \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\RelationManagers\AccountMetaManager::make();
        }
        if (config('filament-accounts.features.locations')) {
            $relations[] = \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\RelationManagers\AccountLocationsManager::make();
        }
        if (config('filament-accounts.features.requests')) {
            $relations[] = \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\RelationManagers\AccountRequestsManager::make();
        }
        return array_merge($relations, $loadRelations);
    }
}
