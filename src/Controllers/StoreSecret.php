<?php

namespace Dasundev\FilamentAdminAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAdminAccessSecret\FilamentAccessSecretCookie;
use Illuminate\Http\RedirectResponse;

class StoreSecret extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $secret = config('filament-access-secret.key');

        return to_route('filament.auth.login')->withCookie(FilamentAccessSecretCookie::create($secret));
    }
}
