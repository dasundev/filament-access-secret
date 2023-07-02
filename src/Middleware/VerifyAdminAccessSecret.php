<?php

namespace Dasundev\FilamentAdminAccessSecret\Middleware;

use Closure;
use Dasundev\FilamentAdminAccessSecret\AdminAccessSecretCookie;
use Illuminate\Http\Request;

class VerifyAdminAccessSecret
{
    public function handle(Request $request, Closure $next)
    {
        $secret = config('filament-admin-access-secret.key');

        $cookie = $request->cookie('filament_admin_access_secret');

        if ($cookie && AdminAccessSecretCookie::isValid($cookie, $secret)) {
            return $next($request);
        }

        abort(404);
    }
}
