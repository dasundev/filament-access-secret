<?php

namespace Dasundev\FilamentAccessSecret\Controllers;

use App\Http\Controllers\Controller;
use Dasundev\FilamentAccessSecret\AccessSecretCookie;
use Exception;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;

class StoreSecret extends Controller
{
    /**
     * Store a cookie on the web browser.
     * @param $panelId
     * @return RedirectResponse
     * @throws Exception
     */
    public function __invoke($panelId): RedirectResponse
    {
        $panel = Filament::getPanel($panelId);

        $panelId = $panel->getId();

        $keyName = $panel->isDefault() ? 'default' : $panelId;

        $secret = Config::get("filament-access-secret.keys.$keyName");

        return to_route("filament.{$panelId}.auth.login")
            ->withCookie(AccessSecretCookie::create(
                keyName: $keyName,
                key: $secret
            ));
    }
}
