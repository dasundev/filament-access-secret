<?php

namespace Dasundev\FilamentAccessSecret\Middleware;

use Closure;
use Dasundev\FilamentAccessSecret\AccessSecretCookie;
use Illuminate\Http\Request;

class VerifyAdminAccessSecret
{
    /**
     * Handle the incoming request.
     *
     * @return mixed|void
     */
    public function handle(Request $request, Closure $next)
    {
        $secret = config('filament-access-secret.key');

        $cookie = $request->cookie('filament_access_secret');

        if ($cookie && AccessSecretCookie::isValid($cookie, $secret) || blank($secret)) {
            return $next($request);
        }

        abort(404);
    }
}
