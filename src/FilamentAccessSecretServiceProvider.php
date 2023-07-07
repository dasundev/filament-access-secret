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
    /**
     * Configure the package.
     *
     * @param Package $package
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-access-secret')
            ->hasConfigFile();
    }

    /**
     * Booting the package.
     *
     * @return void
     */
    public function bootingPackage(): void
    {
        $this->registerMiddleware();
        $this->registerRoute();
    }

    /**
     * Register the middleware.
     *
     * @return void
     */
    private function registerMiddleware(): void
    {
        Config::prepend('filament.middleware.base', VerifyAdminAccessSecret::class);
    }

    /**
     * Register the route.
     *
     * @return void
     */
    private function registerRoute(): void
    {
        $path = config('filament.path');
        $secret = config('filament-access-secret.key');

        Route::get("$path/$secret", StoreSecret::class);
    }
}
