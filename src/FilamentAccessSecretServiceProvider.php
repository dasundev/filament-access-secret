<?php

namespace Dasundev\FilamentAccessSecret;

use Dasundev\FilamentAccessSecret\Controllers\StoreSecret;
use Dasundev\FilamentAccessSecret\Middleware\VerifyAdminAccessSecret;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;

class FilamentAccessSecretServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-access-secret')
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
        $secret = config('filament-access-secret.key');

        Route::get("$path/$secret", StoreSecret::class);
    }
}
