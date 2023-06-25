<?php

namespace Dasundev\FilamentAdminAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAdminAccessSecret\AdminAccessSecretCookie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class StoreSecret extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $secret = Hash::make(config('filament-admin-access-secret.secret'));

        return redirect()
            ->route('filament.auth.login')
            ->withCookie(AdminAccessSecretCookie::create($secret));
    }
}
