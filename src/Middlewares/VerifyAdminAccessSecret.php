<?php

namespace Dasundev\FilamentAccessSecret\Middlewares;

use Closure;
use Dasundev\FilamentAccessSecret\AccessSecretCookie;
use Exception;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class VerifyAdminAccessSecret
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed|void
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        $panel = Filament::getCurrentPanel();

        $panelId = $panel->getId();

        $keyName = $panel->isDefault() ? 'default' : $panelId;

        $secret = Config::get("filament-access-secret.keys.$keyName");

        $cookie = $request->cookie("filament_access_secret_$keyName");

        if ($cookie && AccessSecretCookie::isValid($cookie, $secret) || blank($secret)) {
            return $next($request);
        }

        abort(404);
    }
}
