<?php

namespace Dasundev\FilamentAccessSecret\Tests\Browser;

use Dasundev\FilamentAccessSecret\Tests\Browser\Pages\Login;
use Dasundev\FilamentAccessSecret\Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    /**
     * @test
     */
    public function it_can_render_login_page_without_secret_key()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login);
        });
    }
}
