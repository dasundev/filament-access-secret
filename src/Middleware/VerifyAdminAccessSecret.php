<?php

namespace Dasundev\FilamentAdminAccessSecret\Middleware;

use Closure;
use Dasundev\FilamentAdminAccessSecret\FilamentAccessSecretCookie;
use Illuminate\Http\Request;

class VerifyAdminAccessSecret
{
    public function handle(Request $request, Closure $next)
    {
        $secret = config('filament-access-secret.key');

        $cookie = $request->cookie('filament_access_secret');

        if ($cookie && FilamentAccessSecretCookie::isValid($cookie, $secret) || blank($secret)) {
            return $next($request);
        }

        abort(404);
    }
}
