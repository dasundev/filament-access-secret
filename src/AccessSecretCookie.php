<?php

namespace Dasundev\FilamentAccessSecret;

use Illuminate\Support\Facades\Facade;

/**
 * @method static create(string $keyName, string $key): Cookie
 * @method isValid(string $cookie, string $key): bool
 */
class AccessSecretCookie extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'filament-access-secret';
    }
}
