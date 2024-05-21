<?php

namespace Dasundev\FilamentAccessSecret\Tests\Browser\Pages;

use Dasundev\FilamentAccessSecret\Tests\WithSecretKey;
use Laravel\Dusk\Page;

class AdminLogin extends Page
{
    use WithSecretKey;

    protected string $panel = 'admin';
}
