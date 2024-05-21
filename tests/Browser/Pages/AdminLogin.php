<?php

namespace Dasundev\FilamentAccessSecret\Tests\Browser\Pages;

use Dasundev\FilamentAccessSecret\Tests\WithSecretKey;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class AdminLogin extends Page
{
    use WithSecretKey;

    public function url(): string
    {
        return $this->url;
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs('/admin/login');
    }
}
