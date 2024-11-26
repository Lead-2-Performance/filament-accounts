<?php

return [
    /*
    * Features of Tomato CRM
    *
    * accounts: Enable/Disable Accounts Feature
    */
    "features" => [
        "accounts" => true,
        "meta" => true,
        "locations" => true,
        "contacts" => true,
        "requests" => true,
        "notifications" => true,
        "loginBy" => true,
        "avatar" => true,
        "types" => false,
        "teams" => false,
        "apis" => true,
        "send_otp" => true,
        "impersonate" => [
            'active' => false,
            'redirect' => '/app',
        ],
    ],

    /*
     * Accounts Configurations
     *
     * resource: User Resource Class
     */
    "resource" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource::class,

    /*
     * Accounts Configurations
     *
     * login_by: Login By Phone or Email
     */
    "login_by" => "email",

    /*
     * Accounts Configurations
     *
     * required_otp: Enable/Disable OTP Verification
     */
    "required_otp" => true,

    /*
     * Accounts Configurations
     *
     * model: User Model Class
     */
    "model" => \TomatoPHP\FilamentAccounts\Models\Account::class,

    /*
     * Accounts Configurations
     *
     * guard: Auth Guard
     */
    "guard" => "accounts",


    "teams" => [
        "allowed" => false,
        "model" => \TomatoPHP\FilamentAccounts\Models\Team::class,
        "invitation" => \TomatoPHP\FilamentAccounts\Models\TeamInvitation::class,
        "membership" => \TomatoPHP\FilamentAccounts\Models\Membership::class,
        "resource" => \TomatoPHP\FilamentAccounts\Filament\Resources\TeamResource::class,
    ],

    /**
     * Accounts Relations Managers
     *
     * you can set selected relations to show in account resource
     */
    "relations" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Relations\AccountRelations::class,


    /**
     * Accounts Resource Builder
     *
     * you can change the form, table, actions and filters of account resource by using filament-helpers class commands
     *
     * link: https://github.com/tomatophp/filament-helpers
     */
    "accounts" => [
        "form" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Forms\AccountsForm::class,
        "table" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Tables\AccountsTable::class,
        "actions" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Actions\AccountsTableActions::class,
        "filters" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Filters\AccountsFilters::class,
        "types" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Pages\AccountTypes::class,
        "pages" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Pages\AccountPagesList::class,
    ],


    "requests" => [
        "model" => \TomatoPHP\FilamentAccounts\Models\AccountRequest::class,
        "resource" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountRequestResource::class,
        "status" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountRequestResource\Pages\RequestsStatus::class,
        "types" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountRequestResource\Pages\RequestsTypes::class,
    ],

    "contact" => [
        "model" => \TomatoPHP\FilamentAccounts\Models\Contact::class,
        "status" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\Pages\AccountTypes::class,
        "resource" => \TomatoPHP\FilamentAccounts\Filament\Resources\ContactResource::class,
    ],

    "meta" => [
        "model" => \TomatoPHP\FilamentAccounts\Models\AccountsMeta::class,
        "contact" => \TomatoPHP\FilamentAccounts\Models\ContactsMeta::class,
        "resource" => \TomatoPHP\FilamentAccounts\Filament\Resources\AccountResource\RelationManagers\AccountMetaManager::class,
    ],



];
