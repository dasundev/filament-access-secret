<?php

namespace Dasundev\FilamentAccessSecret\Contracts;

use Symfony\Component\HttpFoundation\Cookie;

interface AccessSecretCookie
{
    public static function create(string $key): Cookie;

    public static function isValid(string $cookie, string $key): bool;
}
