<?php

namespace TomatoPHP\FilamentAccounts\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditProfile\HasBrowserSessions;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditProfile\HasDeleteAccount;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditProfile\HasEditPassword;
use TomatoPHP\FilamentAccounts\Filament\Pages\EditProfile\HasEditProfile;
use Filament\Notifications\Notification;


class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;
    use HasEditProfile;
    use HasEditPassword;
    use HasBrowserSessions;
    use HasDeleteAccount;

    protected static string $view = 'filament-accounts::teams.edit-profile';

    protected ?string $maxWidth = '6xl';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return  trans('filament-accounts::messages.profile.title');
    }

    public static function getNavigationLabel(): string
    {
        return  trans('filament-accounts::messages.profile.title');
    }

    public static function canAccess(): bool
    {
        return true;
    }

    public static function shouldShowDeleteAccountForm()
    {
        return true;
    }

    public static function shouldShowBrowserSessionsForm()
    {
        return true;
    }

    public static function shouldShowSanctumTokens()
    {
        return true;
    }

    public ?array $profileData = [];
    public ?array $passwordData = [];

    public function mount(): void
    {
        $this->fillForms();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
            'deleteAccountForm',
            'browserSessionsForm',
        ];
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();

        $this->editProfileForm->fill($data);
        $this->editPasswordForm->fill();
        $this->browserSessionsForm->fill();
    }

    public function getUser()
    {
        return auth(filament()->getPlugin('filament-saas-accounts')->authGuard)->user();
    }

    public function sendSuccessNotification()
    {
        Notification::make()
            ->title("Success")
            ->success()
            ->send();
    }
}
