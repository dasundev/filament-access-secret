<?php

namespace Dasundev\FilamentAdminAccessSecret\Middleware;

use Closure;
use Dasundev\FilamentAdminAccessSecret\AdminAccessSecretCookie;
class VerifyAdminAccessSecret
{
    public function handle($request, Closure $next)
    {
        $secret = config('filament-admin-access-secret.secret');

        $cookie = $request->cookie('filament_admin_access_secret');

        dd($request->routeIs(route('admin.store-secret')));

        if ($cookie) {
            return $next($request);
        }

        abort(404);
    }
}
