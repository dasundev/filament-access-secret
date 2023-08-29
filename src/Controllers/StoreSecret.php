<?php

namespace Dasundev\FilamentAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAccessSecret\AccessSecretCookie;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;

class StoreSecret extends Controller
{
    /**
     * Store a cookie on the web browser.
     *
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        $secret = config('filament-access-secret.key');

        $panelId = Filament::getCurrentPanel()->getId();

        return to_route("filament.{$panelId}.auth.login")->withCookie(AccessSecretCookie::create($secret));
    }
}
