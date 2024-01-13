<?php

namespace Dasundev\FilamentAccessSecret;

use Dasundev\FilamentAccessSecret\Contracts\AccessSecretCookie;
use Dasundev\FilamentAccessSecret\Controllers\StoreSecret;
use Dasundev\FilamentAccessSecret\Exceptions\InvalidAccessSecretCookieException;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAccessSecretServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package.
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-access-secret')
            ->hasConfigFile();
    }

    /**
     * Booting the package.
     */
    public function bootingPackage(): void
    {
        $this->registerSingleton();

        if (! $this->app->runningInConsole()) {
            $this->registerRoute();
        }
    }

    /**
     * Register the route.
     */
    private function registerRoute(): void
    {
        $panelPath = Filament::getCurrentPanel()->getPath();

        $secret = config('filament-access-secret.key');

        Route::get("$panelPath/$secret", StoreSecret::class);
    }

    /**
     * Register the singleton.
     */
    public function registerSingleton(): void
    {
        $this->app->singleton('filament-access-secret', function () {
            $cookie = config('filament-access-secret.cookie');

            if (! class_exists($cookie) || ! class_implements($cookie, AccessSecretCookie::class)) {
                throw new InvalidAccessSecretCookieException;
            }

            return new $cookie;
        });
    }
}
