<?php

namespace Dasundev\FilamentAccessSecret;

use Dasundev\FilamentAccessSecret\Controllers\StoreSecret;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAccessSecretServiceProvider extends PackageServiceProvider
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
        $this->registerRoute();
    }

    /**
     * Register the route.
     *
     * @return void
     */
    private function registerRoute(): void
    {
        $panel = Filament::getCurrentPanel();
        $panelPath = $panel->getPath();

        $secret = config('filament-access-secret.key');

        Route::get("$panelPath/$secret", StoreSecret::class);
    }
}
