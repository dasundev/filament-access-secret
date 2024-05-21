<?php

namespace Dasundev\FilamentAccessSecret\Tests\Browser\Pages;

use Dasundev\FilamentAccessSecret\Tests\WithSecretKey;
use Laravel\Dusk\Page;

class AppLogin extends Page
{
    use WithSecretKey;

    protected string $panel = 'app';
}
