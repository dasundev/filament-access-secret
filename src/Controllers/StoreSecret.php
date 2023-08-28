<?php

namespace Dasundev\FilamentAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAccessSecret\FilamentAccessSecretCookie;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;

class StoreSecret extends Controller
{
    /**
     * Store a cookie on the web browser.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        $secret = config('filament-access-secret.key');

        $panel = Filament::getCurrentPanel();
        $panelId = $panel->getId();

        return to_route("filament.{$panelId}.auth.login")->withCookie(FilamentAccessSecretCookie::create($secret));
    }
}
