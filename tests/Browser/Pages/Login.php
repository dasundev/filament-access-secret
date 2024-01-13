<?php

namespace Dasundev\FilamentAccessSecret\Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class Login extends Page
{
    public function url(): string
    {
        return '/admin/login';
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs($this->url());
    }
}