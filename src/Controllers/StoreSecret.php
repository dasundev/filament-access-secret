<?php

namespace Dasundev\FilamentAdminAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAdminAccessSecret\AdminAccessSecretCookie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StoreSecret extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $secret = config('filament-admin-access-secret.key');

        return to_route('filament.auth.login')->withCookie(AdminAccessSecretCookie::create($secret));
    }
}
