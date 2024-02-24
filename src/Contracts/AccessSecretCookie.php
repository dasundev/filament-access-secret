<?php

namespace Dasundev\FilamentAccessSecret\Contracts;

use Symfony\Component\HttpFoundation\Cookie;

interface AccessSecretCookie
{
    /**
     * @param string $keyName
     * @param string $key
     * @return Cookie
     */
    public static function create(string $keyName, string $key): Cookie;

    /**
     * @param string $cookie
     * @param string $key
     * @return bool
     */
    public static function isValid(string $cookie, string $key): bool;
}
