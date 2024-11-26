<?php

namespace TomatoPHP\FilamentAccounts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getApiValidationCreate()
 * @method static array getApiValidationEdit()
 * @method static array getAttachedItems()
 * @const string LOGIN_BY_EMAIL
 * @const string LOGIN_BY_PHONE
 * @method static void  registerAccountActions(array $actions)
 * @method static void  registerAccountRelation(array $relations)
 * @method static array loadRelations()
 * @method static array loadActions()
 * @method static \TomatoPHP\FilamentAccounts\Services\FilamentAccountsServices make()
 */
class FilamentAccounts extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'filament-accounts';
    }
}
