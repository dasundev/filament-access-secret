<?php

namespace Dasundev\FilamentAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAccessSecret\FilamentAccessSecretCookie;
use Illuminate\Http\RedirectResponse;

class StoreSecret extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $secret = config('filament-access-secret.key');

        return to_route('filament.auth.login')->withCookie(FilamentAccessSecretCookie::create($secret));
    }
}
