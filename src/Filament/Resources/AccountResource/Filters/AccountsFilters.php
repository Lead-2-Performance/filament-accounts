<?php

namespace TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Filters;

use Filament\Tables;
use TomatoPHP\FilamentAccounts\Services\Helpers;
use TomatoPHP\FilamentHelpers\Contracts\FiltersBuilder;

class AccountsFilters extends FiltersBuilder
{
    public function filters(): array
    {
        $filters = [
            Tables\Filters\TrashedFilter::make(),
        ];
        if (filament('filament-accounts')->useTypes) {
            $type = config('filament-types.model') ?? \TomatoPHP\FilamentTypes\Models\Type::class;
            $filters[] = Tables\Filters\SelectFilter::make('type')
                ->label(trans('filament-accounts::messages.accounts.filters.type'))
                ->searchable()
                ->preload()
                ->options($type::query()->where('for', 'accounts')->where('type', 'type')->pluck('name', 'key')->toArray());
        }

        if (filament('filament-accounts')->useTeams) {
            $team =  Helpers::loadTeamModelClass();
            $filters[] = Tables\Filters\SelectFilter::make('teams')
                ->label(trans('filament-accounts::messages.accounts.filters.teams'))
                ->searchable()
                ->preload()
                ->relationship('teams', 'name')
                ->options($team::query()->pluck('name', 'id')->toArray());
        }

        if (filament('filament-accounts')->canLogin) {
            $filters[] = Tables\Filters\TernaryFilter::make('is_login')
                ->label(trans('filament-accounts::messages.accounts.filters.is_login'));
        }

        if (filament('filament-accounts')->canBlocked) {
            $filters[] = Tables\Filters\TernaryFilter::make('is_active')
                ->label(trans('filament-accounts::messages.accounts.filters.is_active'));
        }
        return $filters;
    }
}
