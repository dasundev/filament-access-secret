<?php

namespace Dasundev\FilamentAdminAccessSecret;

use Dasundev\FilamentAdminAccessSecret\Controllers\StoreSecret;
use Dasundev\FilamentAdminAccessSecret\Middleware\VerifyAdminAccessSecret;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;

class FilamentAdminAccessSecretServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-admin-access-secret')
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        $this->registerMiddleware();
        $this->registerRoute();
    }

    private function registerMiddleware(): void
    {
        Config::prepend('filament.middleware.base', VerifyAdminAccessSecret::class);
    }

    private function registerRoute(): void
    {
        $path = config('filament.path');
        $secret = config('filament-admin-access-secret.key');

        Route::get("$path/$secret", StoreSecret::class);
    }
}
