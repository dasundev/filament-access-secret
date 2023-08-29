<?php

namespace Dasundev\FilamentAccessSecret;

use Illuminate\Support\Facades\Facade;

class AccessSecretCookie extends Facade
{
    /**
     * @method static create(string $key): Cookie
     * @method isValid(string $cookie, string $key): bool
     *
     * @see \Dasundev\FilamentAccessSecret\AccessSecretCookie
     */
    protected static function getFacadeAccessor(): string
    {
        return "filament-access-secret";
    }
}